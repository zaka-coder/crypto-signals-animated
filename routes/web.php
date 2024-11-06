<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/create-member', function () {
    return view('members.create');
});
Route::get('/edit-member', function () {
    return view('members.edit');
});
Route::get('/members-list', function () {
    return view('members.index');
});
Route::get('/profile', function () {
    return view('members.show');
});
Route::get('/blocked-members', function () {
    return view('members.blocked-members');
});
Route::get('/expired-members', function () {
    return view('members.expired-members');
});
Route::get('/recyclebin', function () {
    return view('members.recyclebin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
