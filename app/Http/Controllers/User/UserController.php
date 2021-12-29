<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    public function create(Request $request){
      $request->validate([
        'name' => 'required|min:3|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|max:50|confirmed',
        'password_confirmation' => 'required|min:6|max:100'
      ]);
      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => \Hash::make($request->password)
      ]);
      return redirect()->back()->with('success', 'Regisered successfully!');
    }


    public function check(Request $request){
      $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6|max:50',
      ],
      [
        'email.exists' => 'This email does not exist.'
      ]);
      $creds = $request->only(['email', 'password']);
      if (Auth::attempt($creds)) {
        return redirect()->route('user.home');
      }
      return redirect()->back()->with('fail', 'Invalid password!');
    }


    public function logout(){
      Auth::logout();
      return redirect('/');
    }


}
