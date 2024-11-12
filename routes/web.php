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


Route::middleware(['auth'])->group(function(){
  Route::resource('customers', CustomerController::class);
  Route::get('customers/blocked', [CustomerController::class, 'blocked'])->name('members.blocked');
  Route::get('customers/expired', [CustomerController::class, 'expired'])->name('members.expired');
  Route::get('customers/trashed', [CustomerController::class, 'trashed'])->name('members.trashed');

});



Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');


Route::get('/create-member', function () {
    return view('admin.members.create');
});
Route::get('/edit-member', function () {
    return view('admin.members.edit');
});
Route::get('/members-list', function () {
    return view('admin.members.index');
});
Route::get('/profile', function () {
    return view('admin.members.show');
});
Route::get('/blocked-members', function () {
    return view('admin.members.blocked-members');
});
Route::get('/expired-members', function () {
    return view('admin.members.expired-members');
});
Route::get('/recyclebin', function () {
    return view('admin.members.recyclebin');
});


