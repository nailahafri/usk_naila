<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.kategori.index', [
            'title' => 'Kategori',
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.kategori.create', [
            'title' => 'Tambah Kategori',
            'kategoris' => new Kategori()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->f_kategori == null) {
            $validatedData = $request->validate([
                'f_kategori' => 'required|unique:t_kategori'
            ]);
            Kategori::create($validatedData);
            return redirect('/dashboard/kategori')->with('success', 'Berhasil menambahkan kategori!');
        }
        return redirect('/dashboard/kategori')->with('error', 'Kategori sudah tersedia!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.dashboard.kategori.edit', [
            'title' => 'Edit Kategori',
            'kategoris' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validatedData  = $request->validate([
            'f_kategori' => 'required|unique:t_kategori'
        ]);

        $kategori->update($validatedData);

        return redirect('/dashboard/kategori')->with('success', 'Berhasil mengedit kategori!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();
        } catch (\Throwable $th) {
            if ($th instanceof \Illuminate\Database\QueryException && $th->getCode() == 23000) {
                return back()->with('error', 'Gagal menghapus kategori!');
            }
        }

        return back()->with('success', 'Berhasil menghapus kategori!');
    }
}
