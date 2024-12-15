<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
   function login()
   {
      return view('User.login');
   }
   public function authenticate(Request $request)
   {
      $formFields = $request->validate([
         'email' => 'required',
         'password' => 'required'
      ]);
      if (auth()->attempt($formFields)) {
         $request->session()->regenerate();
         return redirect('/articles/manage')->with('message', auth()->user()->name . ' خوش آمدید ');
      }
      return back()->withErrors(['message' => 'اطلاعات نامعتبراند']);
   }

   public function logout(Request $request)
   {
      auth()->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/')->with('message', 'کاربرگرامی شما از حساب خود خارج شدید');
   }
}
