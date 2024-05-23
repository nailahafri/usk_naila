@extends('admin.dashboard.master')
@section('content')


  <section class="section main-section">
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-plus"></i></span>
          Tambah Anggota
        </p>
      </header>
      <div class="card-content">
        <form method="post" action="/dashboard/anggota">
          @csrf
          <div class="field">
            <label class="label">Form</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="Name" name="f_nama">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              <div class="field">
                <div class="control icons-left icons-right">
                  <input class="input" type="text" placeholder="Username" name="f_username">
                  <span class="icon left"><i class="mdi mdi-mail"></i></span>
                  {{-- <span class="icon right"><i class="mdi mdi-check"></i></span> --}}
                </div>
              </div>
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="password" placeholder="Password" name="f_password">
                  <span class="icon left"><i class="mdi mdi-lock"></i></span>
                </div>
              </div>
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="Tempat Lahir" name="f_tempatlahir">
                  <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
                </div>
              </div>
              <div class="field">
                <div class="control icons-left">
                  <input class="input  input-field date" type="date" placeholder="Tanggal Lahir" name="f_tanggallahir" onfocus="this.showPicker()">
                  <span class="icon left"><i class="mdi mdi-calendar-month"></i></span>
                </div>
              </div>
            </div>
          </div>
          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <style>
      input[type="date"]::-webkit-calendar-picker-indicator {
          color: rgba(0, 0, 0, 0);
          opacity: 1;
          display: block;
          background: url(/yourURLHere/) no-repeat;
          width: 25px;
          height: 25px;
          border-width: thin
      }
      </style>
  </section>


<div id="sample-modal" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>
    <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button red --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

<div id="sample-modal-2" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>
    <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button blue --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>
@endsection