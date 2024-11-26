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
      'name'=> 'required',
      'email' => 'required|email|unique:users,email,' . auth()->user()->id .',id',
      'old_password' => 'required_with:password',
      'password' => 'nullable|confirmed|min:8',
    ]);

    $user = auth()->user();

    if($request->password) {
      if (!\Hash::check($request->old_password, $user->password)) {
        return back()->withErrors(['old_password' => 'The provided password was incorrect.']);
      }

      $user->password = bcrypt($request->password);
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return back()->with('success', 'Profile updated successfully.');
  }

}
