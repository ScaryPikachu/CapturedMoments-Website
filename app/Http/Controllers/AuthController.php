<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function showRegistrationForm()
   {
    return view('auth.register');
}

public function showLoginForm()
{
 return view('auth.login');
}

public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
}

public function register(Request $request)
   {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:8|confirmed',
   ]);

   User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make ($request->password),
   ]);

      Auth::attempt($request->only('email', 'password'));

         return redirect()->intended('dashboard');
   }
}