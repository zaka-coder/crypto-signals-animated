<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function index()
  {
    $customers = Customer::all();
    return view('admin.members.index', get_defined_vars());
  }
  public function blocked()
  {
    // $customers = Customer::all();
    // return view('admin.members.index', get_defined_vars());
  }
  public function expired()
  {
    // $customers = Customer::all();
    // return view('admin.members.index', get_defined_vars());
  }
  public function trashed()
  {
    // $customers = Customer::all();
    // return view('admin.members.index', get_defined_vars());
  }
  public function create()
  {
    $categories = Category::all();
    return view('admin.members.create', compact('categories'));
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
      'starts_at' => $startDate,
      'expires_at' => $expiresAt,
    ]);

    // create subscription history
    $customer->subscriptionsHistory()->create([
      'category_id' => $category->id,
      'starts_at' => $startDate,
      'expires_at' => $expiresAt,
    ]);

    // Redirect or return response
    return redirect()->route('customers.index')->with('success', 'Member added successfully!');
  }

  public function edit($id) {}

  public function update(Request $request, $id) {}

  public function show($id) {}

  public function destroy($id) {}
}
