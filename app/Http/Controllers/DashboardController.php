<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    // Fetch revenue data for charts
    $monthlyRevenue = $this->getMonthlyRevenueData(); // Monthly revenue data
    $monthlyCustomersCount = $this->getMonthlyCustomersCountData(); // Monthly customer count data
    $categoryRevenueData = $this->getFormattedRevenueByCategory(); // Category revenue data
    $categoryRevenues = $categoryRevenueData['revenues']; // Category revenue values
    $categoryMonths = $categoryRevenueData['categories']; // Category names



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



  private function getMonthlyRevenueData()
  {
    $data = DB::table('subscriptions')
      ->select(
        DB::raw('YEAR(starts_at) as year'),
        DB::raw('MONTH(starts_at) as month'),
        DB::raw('SUM(price) as revenue')
      )
      ->where('starts_at', '>=', now()->subMonths(12)) // Only last 12 months
      ->groupBy('year', 'month')
      ->orderBy('year')
      ->orderBy('month')
      ->get();

    // Format the data to ensure all 12 months are represented
    $months = collect();
    for ($i = 11; $i >= 0; $i--) {
      $date = Carbon::now()->subMonths($i);
      $months->push([
        'month' => $date->format('F'),
        'revenue' => 0, // Default to 0 revenue
      ]);
    }

    // Map the fetched data into the prepared months array
    foreach ($data as $row) {
      $monthName = Carbon::create($row->year, $row->month)->format('F');
      $months = $months->map(function ($month) use ($monthName, $row) {
        if ($month['month'] === $monthName) {
          $month['revenue'] = $row->revenue;
        }
        return $month;
      });
    }

    return $months;
  }

  private function getSemiAnnualRevenueData()
  {
    $revenue = DB::table('subscriptions')
      ->selectRaw("
            CASE
                WHEN MONTH(starts_at) BETWEEN 1 AND 6 THEN 'Jan-Jun'
                WHEN MONTH(starts_at) BETWEEN 7 AND 12 THEN 'Jul-Dec'
            END as period,
            SUM(price) as revenue
        ")
      ->groupBy('period')
      ->get();

    return $revenue;
  }

  private function getAnnualRevenueData()
  {
    $revenue = DB::table('subscriptions')
      ->selectRaw("YEAR(starts_at) as year, SUM(price) as revenue")
      ->groupBy('year')
      ->get();

    return $revenue;
  }

  private function getMonthlyCustomersCountData()
  {
    // Fetch raw data
    $data = DB::table('subscriptions')
      ->selectRaw("YEAR(starts_at) as year, MONTH(starts_at) as month, COUNT(DISTINCT customer_id) as customer_count")
      ->where('starts_at', '>=', now()->subMonths(12)) // Only last 12 months
      ->groupByRaw("YEAR(starts_at), MONTH(starts_at)")
      ->orderBy('year')
      ->orderBy('month')
      ->get();

    // Prepare the default months array
    $months = collect();
    for ($i = 11; $i >= 0; $i--) {
      $date = Carbon::now()->subMonths($i);
      $months->push([
        'month' => $date->format('F'), // Month name
        'customer_count' => 0, // Default to 0 customers
      ]);
    }

    // Map the fetched data into the prepared months array
    foreach ($data as $row) {
      $monthName = Carbon::create($row->year, $row->month)->format('F');
      $months = $months->map(function ($month) use ($monthName, $row) {
        if ($month['month'] === $monthName) {
          $month['customer_count'] = $row->customer_count;
        }
        return $month;
      });
    }

    return $months;
  }

  private function getCurrentMonthRevenueByCategory()
  {
    $currentMonthStart = Carbon::now()->startOfMonth();
    $currentMonthEnd = Carbon::now()->endOfMonth();

    // Get the total revenue by category for the current month
    $revenueData = DB::table('subscriptions')
      ->select('category_id', DB::raw('SUM(price) as total_revenue'))
      ->whereBetween('starts_at', [$currentMonthStart, $currentMonthEnd])
      ->groupBy('category_id')
      ->get();

    return $revenueData;
  }

  private function getFormattedRevenueByCategory()
  {
    // Get total revenue by category for the current month
    $revenueData = $this->getCurrentMonthRevenueByCategory();

    // Fetch the category names (assuming a `categories` table)
    $categories = DB::table('categories')->pluck('name', 'id')->toArray();

    // Prepare the chart data
    $categoriesData = [];
    $revenues = [];

    foreach ($revenueData as $data) {
      // Get category name
      $categoryName = $categories[$data->category_id] ?? 'Unknown Category';
      $categoriesData[] = $categoryName;

      // Get the revenue for the category
      $revenues[] = $data->total_revenue;
    }

    return [
      'categories' => $categoriesData,
      'revenues' => $revenues,
    ];
  }
}
