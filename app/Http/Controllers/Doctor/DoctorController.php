<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;


class DoctorController extends Controller
{


    public function create(Request $request) {
      $request->validate([
        'name' => 'required|min:3|max:50',
        'email' => 'required|email|unique:doctors,email',
        'hospital' => 'required|min:5|max:100',
        'password' => 'required|min:6|max:50|confirmed',
        'password_confirmation' => 'required|min:6|max:100'
      ]);
      Doctor::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'hospital' => $request->hospital,
        'password' => \Hash::make($request->password)
      ]);
      return redirect()->back()->with('success', 'Regisered successfully!');
    }


    public function check(Request $request) {
      $request->validate([
        'email'    => 'required|email|exists:doctors,email',
        'password' => 'required|min:6|max:50',
      ],[
        'email.exists' => 'This email does not exist.'
      ]);
      $creds = $request->only(['email', 'password']);
      if (Auth::guard('doctor')->attempt($creds)) {
        return redirect()->route('doctor.home');
      }
      return redirect()->back()->with('fail', 'Invalid password!');
    }


    public function logout(){
      Auth::guard('doctor')->logout();
      return redirect('/');
    }



}
