<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;


Auth::routes([
  'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
  return view('welcome');
});


Route::middleware(['auth', 'admin'])->group(function () {
  Route::resource('customers', CustomerController::class);

  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

  Route::get('/blocked-members', function () {
    $customers = \App\Models\Customer::where('is_blocked', true)->get();
    return view('admin.members.blocked-members', compact('customers'));
  });

  Route::get('/active-members', function () {
    $customers = \App\Models\Customer::where('expires_at', '>=', now())->get();
    return view('admin.members.active-members', compact('customers'));
  });

  Route::get('/expired-members', function () {
    $customers = \App\Models\Customer::where('expires_at', '<', now())
      ->orWhere('status', 'expired')
      ->get();
    return view('admin.members.expired-members', compact('customers'));
  });

  // Route::get('/expired-members', function () {
  //   $customers = \App\Models\Customer::where('expires_at', '<', now()->subDays(3))
  //     ->orWhere('status', 'expired')
  //     ->get();
  //   return view('admin.members.expired-members', compact('customers'));
  // });

  // Route::get('/upcoming-renewal', function () {
  //   // fetch all customers whose expires_at is in upcoming 7 days or less than upto 3 days from now
  //   $customers = \App\Models\Customer::orderBy('expires_at', 'asc')->where('expires_at', '<=', now()->addDays(7))->where('expires_at', '>=', now()->subDays(3))->where('status', 'active')->get();
  //   return view('admin.members.upcoming-renewal', compact('customers'));
  // });

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
  Route::delete('notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
  Route::post('notifications/read-all', [NotificationController::class, 'readAll'])->name('notifications.readAll');


  Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
  Route::put('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');
  Route::get('/uploadspreadsheet', function () {
    return view('admin.uploadxlsx');
  });
  Route::post('customers/import', [ImportController::class, 'store'])->name('customers.import');
});

// Route::middleware(['auth', 'dev'])->group(function () {


//   Route::get('/logout-wijdan', function () {
//     Auth::logout();
//     return redirect('/');
//   });
// });
Route::get('/checking', function () {
  return view('auth.checking');
});
