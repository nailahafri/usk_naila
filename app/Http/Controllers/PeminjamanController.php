<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('admin.dashboard.peminjaman.index', [
            'title' => 'Peminjaman',
            'peminjamans' => Peminjaman::whereHas('detailpeminjaman', function ($query) {
                $query->whereNull('f_tanggalkembali');
            })->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.peminjaman.create', [
            'title' => 'Tambah Entri Peminjaman',
            'bukus' => Buku::whereHas('detailbuku', function ($query) {
                $query->where('f_status', 'Tersedia');
            })->get(['f_id', 'f_judul']),
            'anggotas' => Anggota::all('f_id', 'f_nama')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $buku = DetailBuku::find($request->f_iddetailbuku);

        if ($buku->f_status == 'Tidak Tersedia') {
        return redirect('dashboard/entri-peminjaman')->with('error', 'Buku tidak tersedia');
        }

        $validatedDataDetail = $request->validate([
            'f_iddetailbuku' => 'required' 
        ]);

        $validatedDataPeminjaman = $request->validate([
            'f_idanggota' => 'required',
            'f_tanggalpeminjaman' => 'required|date',
        ]);

        $validatedDataPeminjaman['f_idadmin'] =  Auth::guard('admin')->user()->f_id;

        $peminjaman = Peminjaman::create( $validatedDataPeminjaman );
        $validatedDataDetail['f_idpeminjaman'] = $peminjaman->f_id;
        DetailPeminjaman::create($validatedDataDetail);
        $buku->f_status = 'Tidak Tersedia';
        $buku->save();
        return redirect('dashboard/entri-peminjaman')->with('success', 'Berhasil menambahkan entri peminjaman');
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
        return view('admin.dashboard.peminjaman.edit', [
            'title' => 'Edit Entri Peminjaman',
            'peminjaman' => $peminjaman,
            'bukus' => Buku::all('f_id', 'f_judul'),
            'anggotas' => Anggota::all('f_id', 'f_nama')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validatedDataDetail = $request->validate([
            'f_iddetailbuku' => 'required' 
        ]);

        $validatedDataPeminjaman = $request->validate([
            'f_idanggota' => 'required',
            'f_tanggalpeminjaman' => 'required|date',
        ]);

        $peminjaman->update($validatedDataPeminjaman);
        $peminjaman->detailpeminjaman->update($validatedDataDetail);
        return redirect('dashboard/entri-peminjaman')->with('success', 'Berhasil mengedit entri peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
