@extends('admin.dashboard.master')
@section('content')

    <section class="is-hero-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <h1 class="title">
          Anggota
          </h1>
          <a href="/dashboard/anggota/create"><button class="button blue">Tambah Anggota</button></a>
      </div>
    </section>
  
    
    @if (count($anggota) < 1)
    
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
            <th>Name</th>
            <th>Username</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($anggota as $a)
                
            <tr>
              <td >{{ $loop->iteration }}</td>
              <td >{{ $a->f_nama }}</td>
              <td >{{ $a->f_username }}</td>
              <td >{{ $a->f_tempatlahir }}</td>
              <td >{{ $a->f_tanggallahir }}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <a href="/dashboard/anggota/{{ $a->f_id }}/edit" class="button small " type="button" style="background-color: rgb(248, 248, 15)">
                    
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                  </a>
                  <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="hapus({{ $a->f_id }}, '{{ $a->f_username }}')">
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
      <p class="modal-card-title">Yakin ingin menghapus anggota <b><span id="usernametext"></span></b>?</p>
    </header>
    {{-- <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
    </section> --}}
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <form id="form-delete" action="/dasboard/anggota/" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="button red --jb-modal-close">Confirm</button>
      </form>
    </footer>
  </div>
</div>

<script>
  let form_delete = document.getElementById('form-delete');
  let usernametext = document.getElementById('usernametext');
  function hapus(id, username) {
    form_delete.action = '/dashboard/anggota/' + id;
    usernametext.innerHTML = username;
  }
</script>

@endsection
