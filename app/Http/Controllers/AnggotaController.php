<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.anggota.index',[
            'title' => 'Anggota',
            'anggota' => Anggota::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.anggota.create', [
            'title' => 'Tambah Anggota'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'f_nama' => 'required|max:100|min:3',
            'f_username' => 'required|unique:t_anggota',
            'f_password' => 'required|min:3',
            'f_tempatlahir' => 'required',
            'f_tanggallahir' => 'required'
        ]);

        // $validatedData['f_password'] = Hash::make($validatedData['f_password']);
        Anggota::create($validatedData);
        return redirect('/dashboard/anggota')->with('success', 'Berhasil menambahkan anggota baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
    // dd($anggota);
        return view('admin.dashboard.anggota.edit', [
            'title' => 'Edit Anggota',
            'anggota' => $anggota
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggota)
    {
        $rules = [
            'f_nama' => 'required|max:100|min:3',
            'f_username' => 'required|unique:t_anggota',
            'f_tempatlahir' => 'required',
            'f_tanggallahir' => 'required'
        ];

        if ($request->f_password != "") {
            $rules['f_password'] = 'required|min:3';
        }

        if ($request->f_username == $anggota->f_username) {
            $rules['f_username'] = 'required';
        }

        $validatedData = $request->validate($rules);

        // $validatedData['f_password'] = Hash::make($validatedData['f_password']);

        $anggota->update($validatedData);
        
        return redirect('/dashboard/anggota')->with('success', 'Berhasil mengedit anggota!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota)
    {
        try {
            $anggota->delete();
        } catch (\Throwable $th) {
            if ($th instanceof \Illuminate\Database\QueryException && $th->getCode() == 23000) {
                return back()->with('error', 'Gagal menghapus anggota!');
            }
        }

        $anggota->delete();

        return back()->with('success', 'Berhasil menghapus anggota!');
    }
}
