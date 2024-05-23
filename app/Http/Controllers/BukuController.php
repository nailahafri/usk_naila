<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailBuku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.buku.index', [
            'title' => 'Buku',
            'bukus' => Buku::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.buku.create', [
            'title' => 'Tambah Buku',
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->f_judul == null) {
            $validatedData = $request->validate([
                'f_judul' => 'required|max:255|unique:t_buku',
                'f_idkategori' => 'required',
                'f_pengarang' => 'required',
                'f_penerbit' => 'required',
                'f_deskripsi' => 'required|max:255'
            ]);
            $validatedDataDetail = $request->validate([
                'f_status' => 'required|in:Tersedia,Tidak Tersedia'
            ]);
    
            $buku = Buku::create($validatedData);
    
            $validatedDataDetail['f_idbuku'] = $buku->f_id;
    
            DetailBuku::create($validatedDataDetail);
            return redirect('/dashboard/buku')->with('success', 'Berhasil menambahkan buku!');
        }
        return redirect('/dashboard/buku')->with('error', 'Buku sudah tersedia!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('admin.dashboard.buku.edit', [
            'title' => 'Edit Buku',
            'buku' => $buku,
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {

        $validatedDataDetail = $request->validate([
            'f_status' => 'required|in:Tersedia,Tidak Tersedia'
        ]);

        $validatedData  = $request->validate([
            'f_judul' => 'required|max:255',
            'f_idkategori' => 'required',
            'f_pengarang' => 'required',
            'f_penerbit' => 'required',
            'f_deskripsi' => 'required|max:255'
        ]);

        $buku->update($validatedData);

        $buku->detailbuku->update($validatedDataDetail);

        return redirect('/dashboard/buku')->with('success', 'Berhasil mengedit buku!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->detailbuku()->delete();
        $buku->delete();

        return back()->with('success', 'Berhasil menghapus buku!');
    }
}
