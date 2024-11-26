<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    // fetch all customers whose expires_at is in upcoming 7 days or less than upto 3 days from now
    $expiringCustomers = \App\Models\Customer::orderBy('expires_at', 'asc')->where('expires_at', '<=', now()->addDays(7))->where('expires_at', '>=', now()->subDays(3))->where('status', 'active')->get();

    $expiredCustomers = \App\Models\Customer::where('expires_at', '<', now()->subDays(3))
      ->orWhere('status', 'expired')
      ->get();

    $totalCustomers = \App\Models\Customer::all();
    $activeCustomers = \App\Models\Customer::where('expires_at', '>', now())->get();


    // Check if notifications have already been created for this session
    if (session()->has('notifications_created')) {
      return view('admin.dashboard', get_defined_vars());
    }


    // create notification for each expiring customer
    foreach ($expiringCustomers as $customer) {
      $notification = Notification::create([
        'title' => 'Subscription Expiring',
        'description' => $customer->discord_username . "'s subscription is expiring on " . $customer->expires_at->format('d M, Y'),
        'url' => route('customers.show', $customer->id),
        'customer_id' => $customer->id,
        'is_read' => false
      ]);
    }

    // Mark notifications as created for this session
    session(['notifications_created' => true]);

    return view('admin.dashboard', get_defined_vars());
  }
}
