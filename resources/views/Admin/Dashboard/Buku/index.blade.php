@extends('admin.dashboard.master')
@section('content')

    <section class="is-hero-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <h1 class="title">
          Buku
          </h1>
          <a href="/dashboard/buku/create"><button class="button blue">Tambah Buku</button></a>
      </div>
    </section>
  
    
    @if (count($bukus) < 1)
    
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
    @if (session()->has('error'))
    <div class="notification red">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          <b>{{ session('error') }}</b>
        </div>
        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
      </div>
    @endif
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
            <th>Buku</th>
            <th>Kategori</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($bukus as $buku)
                
            <tr>
              <td >{{ $loop->iteration }}</td>
              <td >{{ $buku->f_judul }}</td>
              <td >{{ $buku->kategoris->f_kategori }}</td>
              <td >{{ $buku->f_pengarang }}</td>
              <td >{{ $buku->f_penerbit }}</td>
              <td >{{ $buku->f_deskripsi }}</td>
              <td >{{ $buku->detailbuku->f_status }}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <a href="/dashboard/buku/{{ $buku->f_id }}/edit" class="button small " type="button" style="background-color: rgb(235, 235, 21)">
                    
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                  </a>
                  <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="hapus({{ $buku->f_id }}, '{{ $buku->f_judul }}')">
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
      <p class="modal-card-title">Yakin ingin menghapus buku <b><span id="judul"></span></b>?</p>
    </header>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <form id="form-delete" action="/dasboard/buku/" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="button red --jb-modal-close">Confirm</button>
      </form>
    </footer>
  </div>
</div>

<script>
  let form_delete = document.getElementById('form-delete');
  let judul = document.getElementById('judul');
  function hapus(id, judull) {
    form_delete.action = '/dashboard/buku/' + id;
    judul.innerHTML = judull;
  }
</script>

@endsection
