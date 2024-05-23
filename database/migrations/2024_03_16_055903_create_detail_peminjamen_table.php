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
        Schema::create('t_detailpeminjaman', function (Blueprint $table) {
            $table->bigIncrements('f_id');
            $table->foreignId('f_idpeminjaman')->constrained(table: 't_peminjaman', column: 'f_id');
            $table->foreignId('f_iddetailbuku')->constrained(table: 't_detailbuku', column: 'f_id');
            $table->date('f_tanggalkembali')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_detailpeminjaman');
    }
};
