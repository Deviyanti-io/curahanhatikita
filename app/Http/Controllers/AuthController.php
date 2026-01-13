<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'regex:/^[a-zA-Z0-9_\s]+$/',
            ],
        ], [
            'username.required' => 'Nama tidak boleh kosong!',
            'username.min' => 'Nama minimal 3 karakter!',
            'username.max' => 'Nama maksimal 50 karakter!',
            'username.regex' => 'Nama hanya boleh mengandung huruf, angka, underscore, dan spasi!',
        ]);

        // Trim whitespace
        $username = trim($validated['username']);
        
        // Cek apakah username hanya berisi spasi
        if (empty($username)) {
            return back()->withErrors(['username' => 'Nama tidak boleh hanya berisi spasi!'])->withInput();
        }

        session([
            'username' => $username,
            'logged_in' => true,
            'login_time' => now()
        ]);
        
        return redirect()->route('mutiara')->with('success', 'Selamat datang, ' . $username . '! 👋');
    }

    public function logout()
    {
        $username = session('username');
        session()->flush();
        return redirect()->route('login')->with('success', 'Sampai jumpa lagi, ' . $username . '! 👋');
    }
}