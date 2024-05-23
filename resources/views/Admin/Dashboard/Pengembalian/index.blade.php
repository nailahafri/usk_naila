@extends('admin.dashboard.master')
@section('content')

    <section class="is-hero-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <h1 class="title">
          Pengembalian
          </h1>
      </div>
    </section>
  
    
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


  <section class="section main-section">

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
            <th>Tanggal Pengembalian</th>
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
              <td >
                @if ($peminjaman->detailpeminjaman->f_tanggalkembali == null)
                  Belum Kembali
                @else
                  {{ $peminjaman->detailpeminjaman->f_tanggalkembali }}
                @endif
              </td>
              <td >{{ $peminjaman->detailpeminjaman->detailbuku->buku->kategoris->f_kategori }}</td>
              <td >{{ $peminjaman->detailpeminjaman->detailbuku->buku->f_judul }}</td>
              <td >{{ $peminjaman->admin->f_nama }}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                    @if (!$peminjaman->detailpeminjaman->f_tanggalkembali)
                        <form action="/dashboard/entri-pengembalian/{{ $peminjaman->f_id }}" method="post">
                        @method('put')
                        @csrf
                        <button type="submit" class="button green">Kembalikan Buku</button>
                        </form>
                    @endif
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="hapus({{ $peminjaman->f_id }} )">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                </div>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
  

  @endif



<div id="sample-modal" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Yakin ingin menghapus Entri Pengembalian?</p>
    </header>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <form id="form-delete" action="/dasboard/entri-pengembalian/" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="button red --jb-modal-close">Confirm</button>
      </form>
    </footer>
  </div>
</div>

<script>
  let form_delete = document.getElementById('form-delete');
  function hapus(id) {
    form_delete.action = '/dashboard/entri-pengembalian/' + id;
  }
</script>

@endsection
