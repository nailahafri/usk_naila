@extends('admin.dashboard.master')

@section('content')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">{{ auth()->guard('admin')->user()->f_level }}</h1>
  </div>
</section>

<section class="section main-section">
  <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Admin
            </h3>
            <h1>
              {{ $admin }}
            </h1>
          </div>
          <span class="icon widget-icon" style="color: rgb(253, 253, 70)"><i class="mdi mdi-account-circle mdi-48px"></i></span>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Anggota
            </h3>
            <h1>
              {{ $anggota }}
            </h1>
          </div>
          <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-group mdi-48px"></i></span>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Buku
            </h3>
            <h1>
              {{ $buku }}
            </h1>
          </div>
          <span class="icon widget-icon text-blue-500"><i class="mdi mdi-book-open-page-variant mdi-48px"></i></span>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Kategori
            </h3>
            <h1>
              {{ $kategori }}
            </h1>
          </div>
          <span class="icon widget-icon" style="color:mediumpurple"><i class="mdi mdi-tag-multiple mdi-48px"></i></span>
        </div>
      </div>
    </div>
    
    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Buku Dipinjam
            </h3>
            <h1>
              {{ $peminjaman }}
            </h1>
          </div>
          <span class="icon widget-icon text-red-500"><i class="mdi mdi-book-arrow-right mdi-48px"></i></span>
        </div>
      </div>
    </div>
    
    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Buku Dikembalikan
            </h3>
            <h1>
              {{ $pengembalian }}
            </h1>
          </div>
          <span class="icon widget-icon" style="color:orangered;"><i class="mdi mdi-book-arrow-left mdi-48px"></i></span>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection