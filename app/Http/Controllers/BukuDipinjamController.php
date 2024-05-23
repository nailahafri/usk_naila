<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class BukuDipinjamController extends Controller
{
    public function index()
    {
        return view('anggota.index',[
            'title' => 'Buku Dipinjam',
            'peminjaman' => Peminjaman::where('f_idanggota', auth()->guard('anggota')->user()->f_id)->get()
        ]);
    }
}
