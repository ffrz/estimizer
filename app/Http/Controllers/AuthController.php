<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi.',
            'password.required' => 'Kata Sandi harus diisi.',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if (!Auth::attempt($data)) {
            return redirect()->back()->withInput()->with('failed', 'Email atau password salah.');
        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
