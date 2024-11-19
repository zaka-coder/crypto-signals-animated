<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes([
  'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
  return view('welcome');
});


Route::middleware(['auth'])->group(function () {
  Route::resource('customers', CustomerController::class);


  // Route::get('/dashboard', function () {
  //   return view('admin.dashboard');
  // });

  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');


  Route::get('/blocked-members', function () {
    $customers = \App\Models\Customer::where('is_blocked', true)->get();
    return view('admin.members.blocked-members', compact('customers'));
  });

  Route::get('/expired-members', function () {
    $customers = \App\Models\Customer::where('expires_at', '<', now())
      ->orWhere('status', 'expired')
      ->get();
    return view('admin.members.expired-members', compact('customers'));
  });

  Route::get('/recyclebin', function () {
    $customers = \App\Models\Customer::onlyTrashed()->get();
    return view('admin.members.recyclebin', compact('customers'));
  });


  Route::post('customers/{customer}/restore', [CustomerController::class, 'restore'])->name('customers.restore');
  Route::get('customers/{customer}/block-toggle', [CustomerController::class, 'blockToggle'])->name('customers.blockToggle');

  Route::get('customers/{customer}/renew-plan', [CustomerController::class, 'renewPlan'])->name('customers.renewPlan');
  Route::post('customers/{customer}/renew-plan/store', [CustomerController::class, 'renewPlanStore'])->name('customers.renewPlanStore');

  Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
  Route::get('notifications/{notification}', [NotificationController::class, 'show'])->name('notifications.show');
  



});
Route::get('/checking', function () {
  return view('auth.checking');
});
