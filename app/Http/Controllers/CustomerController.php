<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function index(Request $request)
  {
    $customers = Customer::query();

    // // Apply filtering based on category name
    // $filter = $request->query('filter');
    // if ($filter) {
    //   $customers = $customers->whereHas('category', function ($query) use ($filter) {
    //     $query->where('name', 'like', '%' . $filter . '%');
    //   });
    // }

    // Apply filtering based on category id
    $categoryId = $request->query('category_id');
    if ($categoryId) {
      $customers = $customers->whereHas('category', function ($query) use ($categoryId) {
        $query->where('id',  $categoryId);
      });
    }

    $category = Category::find($categoryId);

    // Retrieve customers with their category relationship
    $customers = $customers->with('category')->get();

    // Sort by remaining days (fewest remaining days first)
    $customers = $customers->sortBy(function ($customer) {
      return $customer->expires_at ? now()->diffInDays($customer->expires_at, false) : PHP_INT_MAX;
    });

    return view('admin.members.index', get_defined_vars());
  }



  public function create()
  {
    // Fetch all categories with their subcategories
    $categories = Category::with('subCategories')->get();

    // Group categories by their parent
    $groupedCategories = $categories->whereNull('parent_id')->map(function ($category) {
      return [
        'parent' => $category,
        'subCategories' => $category->subCategories
      ];
    });

    return view('admin.members.create', compact('groupedCategories'));
  }
  public function store(Request $request)
  {
    // Validation rules
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'discord_username' => 'required|string|max:255',
      'whatsapp' => 'required|string|max:20', // Adjust max length as per your requirement
      'email' => 'nullable|email|max:255|unique:customers,email', // nullable and unique for customers table
      'category_id' => 'required|exists:categories,id',
      'price' => 'required|numeric',
      'starts_at' => 'required|date',
      'remarks' => 'nullable|string',
    ], [
      'name.required' => 'The name field is required.',
      'discord_username.required' => 'The Discord username is required.',
      'whatsapp.required' => 'The Whatsapp number is required.',
      'email.email' => 'The email must be a valid email address.',
      'category_id.required' => 'Please select a subscription plan.',
      'category_id.exists' => 'The selected subscription plan is invalid.',
      'starts_at.required' => 'The start date is required.',
    ]);

    // fetch category
    $category = Category::find($validatedData['category_id']);

    // Calculate expires_at based on category name
    $expiresAt = null;
    $startDate = Carbon::parse($validatedData['starts_at']);
    if ($category) {
      switch (strtolower($category->name)) {
        case 'monthly':
          $expiresAt = $startDate->copy()->addMonth();
          break;
        case 'yearly':
          $expiresAt = $startDate->copy()->addYear();
          break;
        case '6-months':
          $expiresAt = $startDate->copy()->addMonths(6);
          break;
        default:
          $expiresAt = null; // default to the same start date if no match
          break;
      }
    }

    // Store validated data
    $customer = Customer::create([
      'name' => $validatedData['name'],
      'email' => $validatedData['email'] ?? null,
      'discord_username' => $validatedData['discord_username'],
      'whatsapp' => $validatedData['whatsapp'],
      'remarks' => $validatedData['remarks'] ?? null,
      'category_id' => $category->id,
      'price' => $validatedData['price'],
      'starts_at' => $startDate,
      'expires_at' => $expiresAt,
    ]);

    // create subscription history
    $customer->subscriptionsHistory()->create([
      'category_id' => $category->id,
      'price' => $validatedData['price'],
      'starts_at' => $startDate,
      'expires_at' => $expiresAt,
    ]);

    // Redirect or return response
    return redirect()->route('customers.index')->with('success', 'Member added successfully!');
  }

  public function renewPlan(Customer $customer)
  {
    if ($customer->is_blocked) {
      return redirect()->route('customers.index')->with('error', 'Member is blocked. Please unblock the member first.');
    }

    // $categories = Category::all();
    // Fetch all categories with their subcategories
    $categories = Category::with('subCategories')->get();

    // Group categories by their parent
    $groupedCategories = $categories->whereNull('parent_id')->map(function ($category) {
      return [
        'parent' => $category,
        'subCategories' => $category->subCategories
      ];
    });

    return view('admin.members.renew', compact('customer', 'groupedCategories'));
  }

  public function renewPlanStore(Request $request, Customer $customer)
  {
    if ($customer->is_blocked) {
      return redirect()->route('customers.index')->with('error', 'Member is blocked. Please unblock the member first.');
    }
    // Validation rules
    $validatedData = $request->validate([
      'category_id' => 'required|exists:categories,id',
      'price' => 'required|numeric',
      'starts_at' => 'required|date',
    ], [
      'category_id.required' => 'Please select a subscription plan.',
      'category_id.exists' => 'The selected subscription plan is invalid.',
      'starts_at.required' => 'The start date is required.',
    ]);

    // fetch category
    $category = Category::find($validatedData['category_id']);

    // Calculate expires_at based on category name
    $expiresAt = null;
    $startDate = Carbon::parse($validatedData['starts_at']);
    if ($category) {
      switch (strtolower($category->name)) {
        case 'monthly':
          $expiresAt = $startDate->copy()->addMonth();
          break;
        case 'yearly':
          $expiresAt = $startDate->copy()->addYear();
          break;
        case '6-months':
          $expiresAt = $startDate->copy()->addMonths(6);
          break;
        default:
          $expiresAt = null; // default to the same start date if no match
          break;
      }
    }

    // update the customer
    $customer->update([
      'category_id' => $category->id,
      'price' => $validatedData['price'],
      'starts_at' => $startDate,
      'expires_at' => $expiresAt,
    ]);

    // check if expires_at is in the future, if so, update the status
    if ($expiresAt && $expiresAt > now()) {
      $customer->status = 'active';
      $customer->save();
    } elseif ($expiresAt && $expiresAt < now()) {
      $customer->status = 'expired';
      $customer->save();
    }

    // update the current active subscription
    $customer->subscriptionsHistory()->where('is_current', true)->update([
      'is_current' => false,
    ]);

    // create subscription history
    $customer->subscriptionsHistory()->create([
      'category_id' => $category->id,
      'price' => $validatedData['price'],
      'starts_at' => $startDate,
      'expires_at' => $expiresAt,
      'is_current' => true,
    ]);

    // Redirect or return response
    return redirect()->route('customers.index')->with('success', 'Subscription renewed successfully!');
  }

  public function edit(Customer $customer)
  {
    $categories = Category::all();
    return view('admin.members.edit', compact('customer', 'categories'));
  }

  public function update(Request $request, Customer $customer)
  {
    // Validation rules
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'discord_username' => 'required|string|max:255',
      'whatsapp' => 'required|string|max:20', // Adjust max length as per your requirement
      'email' => 'nullable|email|max:255|unique:customers,email,' . $customer->id . ',id', // nullable and unique for customers table
      'category_id' => 'required|exists:categories,id',
      'price' => 'required|numeric',
      'starts_at' => 'required|date',
      'remarks' => 'nullable|string',
    ], [
      'name.required' => 'The name field is required.',
      'discord_username.required' => 'The Discord username is required.',
      'whatsapp.required' => 'The Whatsapp number is required.',
      'email.email' => 'The email must be a valid email address.',
      'category_id.required' => 'Please select a subscription plan.',
      'category_id.exists' => 'The selected subscription plan is invalid.',
      'starts_at.required' => 'The start date is required.',
    ]);

    // fetch category
    $category = Category::find($validatedData['category_id']);

    // Calculate expires_at based on category name
    $expiresAt = null;
    $startDate = Carbon::parse($validatedData['starts_at']);
    if ($category) {
      switch (strtolower($category->name)) {
        case 'monthly':
          $expiresAt = $startDate->copy()->addMonth();
          break;
        case 'yearly':
          $expiresAt = $startDate->copy()->addYear();
          break;
        case '6-months':
          $expiresAt = $startDate->copy()->addMonths(6);
          break;
        default:
          $expiresAt = null; // default to the same start date if no match
          break;
      }
    }

    // update the customer
    $customer->update([
      'name' => $validatedData['name'],
      'email' => $validatedData['email'] ?? null,
      'discord_username' => $validatedData['discord_username'],
      'whatsapp' => $validatedData['whatsapp'],
      'remarks' => $validatedData['remarks'] ?? null,
      'category_id' => $category->id,
      'price' => $validatedData['price'],
      'starts_at' => $startDate,
      'expires_at' => $expiresAt,
    ]);

    // check if expires_at is in the future, if so, update the status
    if ($expiresAt && $expiresAt > now()) {
      $customer->status = 'active';
      $customer->save();
    } elseif ($expiresAt && $expiresAt < now()) {
      $customer->status = 'expired';
      $customer->save();
    }

    // update the current active subscription
    $customer->subscriptionsHistory()->where('is_current', true)->update([
      'category_id' => $category->id,
      'price' => $validatedData['price'],
      'starts_at' => $startDate,
      'expires_at' => $expiresAt,
    ]);

    // Redirect or return response
    return redirect()->route('customers.show', $customer)->with('success', 'Member updated successfully!');
  }

  public function show(Customer $customer)
  {
    return view('admin.members.show', compact('customer'));
  }

  public function destroy($id)
  {
    $customer = Customer::findOrFail($id);
    $customer->delete();
    return response()->json(['success' => true, 'message' => 'Member deleted successfully!']);
  }

  public function deleteMultiple(Request $request)
  {
    try {
      $ids = $request->ids;
      if (!$ids) {
        return response()->json(['success' => false, 'message' => 'No members selected.'], 400);
      }

      Customer::whereIn('id', $ids)->delete();

      return response()->json(['success' => true, 'message' => 'Selected members deleted successfully.']);
    } catch (\Exception $e) {
      return response()->json(['success' => false, 'message' => 'Error deleting members.'], 500);
    }
  }


  public function restore($id)
  {
    $customer = Customer::onlyTrashed()->findOrFail($id);
    $customer->restore();
    return response()->json(['success' => true, 'message' => 'Member restored successfully.']);

    // return redirect()->back()->with('success', 'Member restored successfully.');
  }

  public function blockToggle($id)
  {
    $customer = Customer::findOrFail($id);

    $customer->is_blocked = !$customer->is_blocked;

    if ($customer->is_blocked) {
      $customer->blocked_at = now();
    } else {
      $customer->unblocked_at = now();
    }

    $customer->save();

    return response()->json(['success' => true, 'message' => 'Member status updated successfully.']);
  }
}
