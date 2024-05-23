<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Buku;
use App\Models\Admin;
use App\Models\Anggota;
use App\Models\Kategori;
use App\Models\DetailBuku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Kategori::create([
            'f_kategori' => 'Komik',
        ]);
        $novel = Kategori::create([
            'f_kategori' => 'Novel',
        ]);
        
        Kategori::create([
            'f_kategori' => 'Dongeng',
        ]);
        
        $fiksi = Kategori::create([
            'f_kategori' => 'Fiksi',
        ]);

        Kategori::create([
            'f_kategori' => 'Cerpen',
        ]);
        Kategori::create([
            'f_kategori' => 'Biografi',
        ]);
            
        Kategori::create([
            'f_kategori' => 'Ensiklopedia',
        ]);
            
        Kategori::create([
            'f_kategori' => 'Kamus',
        ]);
        
        Admin::create([
            'f_nama' => 'Admin',
            'f_username' => 'Admin',
            'f_password' => Hash::make('123'),
            'f_level' => 'Admin',
            'f_status' => 'Aktif'
        ]);
        
        Admin::create([
            'f_nama' => 'Pustakawan',
            'f_username' => 'Pustakawan',
            'f_password' => Hash::make('123'),
            'f_level' => 'Pustakawan',
            'f_status' => 'Aktif'
        ]);

        Anggota::create([
            'f_nama' => 'Anggota',
            'f_username' => 'anggota',
            'f_password' => Hash::make('123'),
            'f_tempatlahir' => 'Jakarta',
            'f_tanggallahir' => '2004-09-17'
        ]);
        
        Anggota::create([
            'f_nama' => 'Fadli',
            'f_username' => 'Fadli',
            'f_password' => Hash::make('123'),
            'f_tempatlahir' => 'Jakarta',
            'f_tanggallahir' => '2005-11-03'
        ]);

        $buku1 = Buku::create([
            'f_judul' => 'Elegi Haekal',
            'f_idkategori' => $novel->f_id,
            'f_pengarang' => 'Dhiaan Farah',
            'f_penerbit' => 'Loveable Group',
            'f_deskripsi' => 'Menceritakan bagaimana penjuangan seorang anak untuk mendapat kasih sayang dari sang mama.'
        ]);
        
        $buku2 = Buku::create([
            'f_judul' => 'Bodo Amat',
            'f_idkategori' => $fiksi->f_id,
            'f_pengarang' => 'Mark Manson',
            'f_penerbit' => 'Gramdia',
            'f_deskripsi' => 'Sebuah Seni untuk Bersikap Bodo Amat.'
        ]);
            
        DetailBuku::create([
            'f_idbuku' => $buku1->f_id,
            'f_status' => 'Tersedia'
        ]);
        
        DetailBuku::create([
            'f_idbuku' => $buku2->f_id,
            'f_status' => 'Tersedia'
        ]);
    }
}
