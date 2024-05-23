<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_buku', function (Blueprint $table) {
            $table->bigIncrements('f_id');
            $table->foreignId('f_idkategori')->constrained(table: 't_kategori', column: 'f_id');
            $table->string('f_judul');
            // $table->string('kategori');
            $table->string('f_pengarang');
            $table->string('f_penerbit');
            $table->text('f_deskripsi');
            // $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_buku');
    }
};
