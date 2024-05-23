<?php

namespace App\Models;

use App\Models\DetailBuku;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $table = 't_detailpeminjaman';
    protected $guarded = ['f_id'];
    protected $primaryKey = 'f_id';
    protected $with = ['peminjaman', 'detailbuku'];


    public function peminjaman() {
        return $this->belongsTo(Peminjaman::class, 'f_peminjamanid', 'f_id');
    }

    public function detailbuku() {
        return $this->belongsTo(DetailBuku::class, 'f_iddetailbuku', 'f_id');
    }
}
