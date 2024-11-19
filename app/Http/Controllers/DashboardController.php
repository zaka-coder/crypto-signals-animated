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
      // dd($expiringCustomers);

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

      // fetch all notifications with is_read = false
      // $notifications = Notification::where('is_read', false)->get();

      return view('admin.dashboard', get_defined_vars());
    }
}
