<?php

use App\Http\Controllers\CustomerController;
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


  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  });


  Route::get('/create-member', function () {
    return view('admin.members.create');
  });
  Route::get('/edit-member', function () {
    return view('admin.members.edit');
  });
  Route::get('/members-list', function () {
    return view('admin.members.index');
  });
  // Route::get('/profile', function () {
  //   return view('admin.members.show');
  // });
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

  // Route::get('customers/blocked', [CustomerController::class, 'blocked'])->name('customers.blocked');
  // Route::get('customers/expired', [CustomerController::class, 'expired'])->name('members.expired');
  // Route::get('customers/trashed', [CustomerController::class, 'trashed'])->name('customers.trashed');


  Route::post('customers/{customer}/restore', [CustomerController::class, 'restore'])->name('customers.restore');

});
