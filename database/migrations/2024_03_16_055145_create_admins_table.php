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
        Schema::create('t_admin', function (Blueprint $table) {
            $table->bigIncrements('f_id');
            $table->string('f_nama');
            $table->string('f_username')->unique();
            $table->string('f_password');
            $table->enum('f_level', ['Admin', 'Pustakawan']);
            $table->enum('f_status', ['Aktif', 'Tidak Aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_admin');
    }
};
