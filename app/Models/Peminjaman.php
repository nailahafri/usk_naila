<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 't_peminjaman';

    protected $primaryKey = 'f_id';
    protected $guarded = ['f_id'];
    protected $with = ['detailpeminjaman'];


    public function detailpeminjaman() {
        return $this->hasOne(DetailPeminjaman::class, 'f_idpeminjaman', 'f_id');
    }

    public function anggota() {
        return $this->belongsTo(Anggota::class, 'f_idanggota', 'f_id');
    }

    public function admin() {
        return $this->belongsTo(Admin::class, 'f_idadmin', 'f_id');
    }
}
