@extends('admin.dashboard.master')
@section('content')

    <section class="is-hero-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <h1 class="title">
          Kategori
          </h1>
          <a href="/dashboard/kategori/create"><button class="button blue">Tambah Kategori</button></a>
      </div>
    </section>
  
    
    @if (count($kategoris) < 1)
    
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
    {{-- <div class="notification blue">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          <b>Berhasil mengedit anggota</b>
        </div>
        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
      </div>
    </div> --}}

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

    </div>

    <div class="card has-table">
      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th>No</th>
            <th>Kategori</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($kategoris as $kategori)
                
            <tr>
              <td >{{ $loop->iteration }}</td>
              <td >{{ $kategori->f_kategori }}</td>
             
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <a href="/dashboard/kategori/{{ $kategori->f_id }}/edit" class="button small " type="button" style="background-color: rgb(235, 235, 21)">
                    
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                  </a>
                  <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="hapus({{ $kategori->f_id }}, '{{ $kategori->f_kategori }}')">
                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                  </button>
                </div>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
        {{-- <div class="table-pagination">
          <div class="flex items-center justify-between">
            <div class="buttons">
              <button type="button" class="button active">1</button>
              <button type="button" class="button">2</button>
              <button type="button" class="button">3</button>
            </div>
            <small>Page 1 of 3</small>
          </div>
        </div> --}}
      </div>
    </div>
  </section>
  

  @endif



<div id="sample-modal" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Yakin ingin menghapus kategori <b><span id="judul"></span><b>?</p>
    </header>
    {{-- <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
    </section> --}}
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <form id="form-delete" action="/dasboard/kategori/" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="button red --jb-modal-close">Confirm</button>
      </form>
    </footer>
  </div>
</div>

<script>
  let form_delete = document.getElementById('form-delete');
  let kategori = document.getElementById('kategori');
  function hapus(id, kategorii) {
    form_delete.action = '/dashboard/kategori/' + id;
    judul.innerHTML = kategorii;
  }
</script>

@endsection
