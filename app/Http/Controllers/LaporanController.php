<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.laporan.index',[
            'title' => 'Laporan',
            'peminjamans' => Peminjaman::whereHas('detailpeminjaman', function ($query) {
                $query->whereNotNull('f_tanggalkembali');
                })->get(),
            'anggota' => Anggota::count(),
            'buku' => Buku::count(),
            'peminjaman' => DetailPeminjaman::whereNull('f_tanggalkembali')->count(),
            'pengembalian' => DetailPeminjaman::whereNotNull('f_tanggalkembali')->count(),
        ]);
    }

    public function cetakpdf()
    {
        $peminjaman = Peminjaman::whereHas('detailpeminjaman', function ($query) {
            $query->whereNotNull('f_tanggalkembali');
            })->get();

        $pdf = PDF::loadView('Admin.Dashboard.Laporan.cetak-pdf',[
        'peminjamans'=> $peminjaman,
        'title' => 'Cetak Laporan'
        ]);

        return $pdf->download('laporan-peminjaman.pdf');
    }

    public function cetakpdfview()
    {
        return view('Admin.Dashboard.Laporan.cetak-pdf',[ 
            'peminjamans' => Peminjaman::whereHas('detailpeminjaman', function ($query) {
                $query->whereNotNull('f_tanggalkembali');
                })->get()
        ]);
    }
}
