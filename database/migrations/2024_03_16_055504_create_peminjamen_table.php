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
        Schema::create('t_peminjaman', function (Blueprint $table) {
            $table->bigIncrements('f_id');
            $table->foreignId('f_idadmin')->constrained(table: 't_admin', column: 'f_id');
            $table->foreignId('f_idanggota')->constrained(table: 't_anggota', column:'f_id');
            $table->date('f_tanggalpeminjaman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_peminjaman');
    }
};
