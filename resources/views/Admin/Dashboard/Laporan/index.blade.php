@extends('admin.dashboard.master')

@section('content')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">Laporan</h1>
      <a href="/dashboard/laporan/cetak-pdf"><button class="button blue">Cetak Laporan</button></a>
  </div>
</section>

<section class="section main-section">
  <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
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
          <span class="icon widget-icon text-red-500"><i class="mdi mdi-book-arrow-left mdi-48px"></i></span>
        </div>
      </div>
    </div>
  </div>
    
    
    @if (count($peminjamans) < 1)
    
    <section class="section main-section">
      <div class="notification red">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          <b>Empty table.</b>
        </div>
        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
      </div>
    </div>

    <div class="card empty">
      <div class="card-content">
        <div>
          <span class="icon large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span>
        </div>
        <p>Nothing's here…</p>
      </div>
    </div>
  </section>  
  @else

    @if (session()->has('success'))
    <div class="notification green">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          <b>{{ session('success') }}</b>
        </div>
        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
      </div>
    @endif
    </div>

    <div class="card has-table">
      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th>No</th>
            <th>Anggota</th>
            <th>Tanggal Peminjaman</th>
            <th>Kategori</th>
            <th>Judul Buku</th>
            <th>Admin / Pustakawan</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($peminjamans as $peminjaman)
                
            <tr>
              <td >{{ $loop->iteration }}</td>
              <td >{{ $peminjaman->anggota->f_nama }}</td>
              <td >{{ $peminjaman->f_tanggalpeminjaman }}</td>
              <td >{{ $peminjaman->detailpeminjaman->detailbuku->buku->kategoris->f_kategori }}</td>
              <td >{{ $peminjaman->detailpeminjaman->detailbuku->buku->f_judul }}</td>
              <td >{{ $peminjaman->admin->f_nama }}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <a href="/dashboard/entri-peminjaman/{{ $peminjaman->f_id }}/edit" class="button small " type="button" style="background-color: rgb(235, 235, 21)">
                    
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                  </a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif
  </div>
</section>

@endsection