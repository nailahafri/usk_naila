@extends('admin.dashboard.master')
@section('content')


  <section class="section main-section">
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-pencil-box-multiple"></i></span>
          Edit Anggota
        </p>
      </header>
      <div class="card-content">
        <form method="POST" onsubmit="return confirm('Do you really want to submit the form?');" action="/dashboard/anggota/{{ $anggota->f_id }}">
          @method('PATCH')
          
          @csrf
          <div class="field">
            <label class="label">Form</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="Name" name="f_nama" value="{{ $anggota->f_nama }}">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              <div class="field">
                <div class="control icons-left icons-right">
                  <input class="input" type="text" placeholder="Username" name="f_username" value="{{ $anggota->f_username }}">
                  <span class="icon left"><i class="mdi mdi-mail"></i></span>
                  {{-- <span class="icon right"><i class="mdi mdi-check"></i></span> --}}
                </div>
            </div>
            <div class="field">
              <div class="control icons-left">
                <input class="input" type="password" placeholder="Password ( isi jika perlu diganti )" name="f_password">
                <span class="icon left"><i class="mdi mdi-lock"></i></span>
              </div>
            </div>
            <div class="field">
              <div class="control icons-left">
                <input class="input" type="text" placeholder="Tempat Lahir" name="f_tempatlahir" value="{{ $anggota->f_tempatlahir }}">
                <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
              </div>
            </div>
            <div class="field">
              <div class="control icons-left">
                <input class="input  input-field date" type="date" placeholder="Tanggal Lahir" name="f_tanggallahir" onfocus="this.showPicker()" value="{{ $anggota->f_tanggallahir }}">
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

            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
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
@endsection