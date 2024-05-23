<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPustakawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.admin-pustakawan.index', [
            'title' => 'Admin-Pustakawan',
            'admin_pustakawan' => Admin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.admin-pustakawan.create', [
            'title' => 'Tambah Admin-Pustakawan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'f_nama' => 'required',
            'f_username' => 'required|unique:t_admin',
            'f_password' => 'required|min:3',
            'f_level' => 'required|in:Admin,Pustakawan',
            'f_status' => 'required|in:Aktif,Tidak Aktif'
        ]);

        $validatedData['f_password'] = Hash::make($validatedData['f_password']);
        Admin::create($validatedData);
        return redirect('/dashboard/admin-pustakawan')->with('success', 'Berhasil menambahkan ' .  $request->f_level . ' baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.dashboard.admin-pustakawan.edit', [
            'title' => 'Edit Admin-Pustakawan',
            'admin_pustakawan' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $rules = [
            'f_nama' => 'required',
            'f_username' => 'required|unique:t_admin',
            'f_level' => 'required|in:Admin,Pustakawan',
            'f_status' => 'required|in:Aktif,Tidak Aktif'
        ];

        if ($request->f_password != "") {
            $rules['f_password'] = 'required|min:3';
        }

        if ($request->f_username == $admin->f_username) {
            $rules['f_username'] = 'required';
        }

        $validatedData = $request->validate($rules);

        $admin->update($validatedData);
        
        return redirect('/dashboard/admin-pustakawan')->with('success', 'Berhasil mengedit ' . $request->level . '!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return back()->with('success', 'Berhasil menghapus ' . $admin->level . '!');
    }
}
