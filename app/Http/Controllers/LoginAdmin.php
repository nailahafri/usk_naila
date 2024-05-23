<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdmin extends Controller
{
    public function login()
    {
        return view('login-admin', [
            'title' => "Login Admin-Pustakawan"
        ]);
    }

    public function authenticate(Request $request)
    {
        $kunci = [
            'f_username' => $request->f_username,
            'password' => $request->f_password
        ];

        if (Auth::guard('admin')->attempt($kunci)) {
            
            if (Auth::guard('admin')->user()->f_status == 'Tidak Aktif') {
                Auth::guard('admin')->logout();
                return back()->with('error', 'Akun anda tidak aktif!');
            }
            
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->with('error', 'Login gagal!');;
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
