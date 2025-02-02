<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.pengembalian.index', [
            'title' => 'Pengembalian',
            'peminjamans' => Peminjaman::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->detailpeminjaman->update([
            'f_tanggalkembali' => Carbon::today()->format('Y-m-d')
        ]);
        $peminjaman->detailpeminjaman->detailbuku->update([
            'f_status' => 'Tersedia'
        ]);
        return redirect('/dashboard/entri-pengembalian')->with('success', 'Berhasil mengembalikan buku!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->detailpeminjaman->delete();
        $peminjaman->delete();

        return redirect('/dashboard/entri-pengembalian')->with('success', 'Berhasil menghapus entri.');
    }
}
