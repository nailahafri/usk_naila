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
        Schema::create('t_detailbuku', function (Blueprint $table) {
            $table->bigIncrements('f_id');
            $table->foreignId('f_idbuku')->constrained(table: 't_buku', column: 'f_id');
            $table->enum('f_status',['Tersedia', 'Tidak Tersedia']);
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
