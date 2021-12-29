<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{


  public function check(Request $request){
    $request->validate([
      'email' => 'required|email|exists:admins,email',
      'password' => 'required|min:6|max:50',
    ],[
      'email.exists' => 'Admin does not exist.'
    ]);
    $creds = $request->only(['email', 'password']);
    if (Auth::guard('admin')->attempt($creds)) {
      return redirect()->route('admin.home');
    }
    return redirect()->back()->with('fail', 'Invalid password!');
  }


  public function logout(){
    Auth::guard('admin')->logout();
    return redirect('/');
  }


}
