<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function show()
    {
        $data = User::find(Auth::id());
        return view('user-profile.editor', compact('data'));
    }

    public function edit()
    {
        $data = User::find(Auth::id());
        return view('user-profile.editor', compact('data'));
    }

    public function update(Request $request)
    {
        $id = Auth::id();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'nullable|min:6',
            'password2' => 'nullable|required_with:password|same:password',
        ], [
            'name.required' => 'Nama harus diisi.',
            'password.min' => 'Kata sandi minimal 6 karakter.',
            'password2.required_with' => 'Silahkan ulangi kata sandi anda.',
            'password2.same' => 'Kata sandi yang anda ulangi tidak cocok.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['name'] = $request->name;

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);
        return redirect()->to('/user-profile')->with('success', 'Profil telah diperbarui.');
    }
}
