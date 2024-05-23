<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\DetailBuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;
    
    protected $table = 't_buku';

    protected $primaryKey = 'f_id';
    protected $guarded = ['f_id'];
    protected $with = ['kategoris'];

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class, 'f_idkategori', 'f_id');
    }

    public function detailbuku()
    {
        return $this->hasOne(DetailBuku::class, 'f_idbuku', 'f_id');
    }
}
