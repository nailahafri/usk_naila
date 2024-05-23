<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailBuku extends Model
{
    use HasFactory;

    protected $table = 't_detailbuku';
    protected $primaryKey = 'f_id';
    protected $guarded = ['f_id'];
    protected $with = ['buku']; // Eager load buku

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'f_idbuku', 'f_id');
    }

}
