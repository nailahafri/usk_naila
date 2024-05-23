<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'f_username' => $request->f_username,
            'password' => $request->f_password
        ];

        if (Auth::guard('anggota')->attempt($credentials, $request->remember)) {
            
            $request->session()->regenerate();
 
            return redirect('/buku-dipinjam');

        }

        return back()->with('error', 'Login gagal!');
    }

    public function logout(Request $request){
        Auth::guard('anggota')->logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
