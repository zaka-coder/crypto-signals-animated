<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function edit()
  {
    return view('admin.profile.edit');
    // return view('auth.passwords.change');
  }

  public function update(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users,email,' . auth()->user()->id . ',id',
    ]);

    $user = auth()->user();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return back()->with('success', 'Profile updated successfully.');
  }

  public function updatePassword(Request $request)
  {
    $request->validate([
      'old_password' => 'required',
      'password' => 'required|confirmed|min:8',
    ]);

    $user = auth()->user();


    if (!\Hash::check($request->old_password, $user->password)) {
      return back()->withErrors(['old_password' => 'The provided password was incorrect.']);
    }

    $user->password = bcrypt($request->password);
    $user->save();

    return back()->with('success', 'Password updated successfully.');
  }
}
