<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    //
    public function register()
    {
        return view('registration.register');
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password2' => 'required|required_with:password|same:password',
            'terms' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password2),
        ];

        User::create($data);
        
        unset($data['name']);
        
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        }

        return redirect()->to('/');
    }
}
