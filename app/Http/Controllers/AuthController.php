<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            if(Auth::user()->role == 'admin')
            {
                return redirect('/dashboard');
            }

            return redirect('/transaksi');
        }

        return back()->with(
            'error',
            'Email atau password salah'
        );
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}