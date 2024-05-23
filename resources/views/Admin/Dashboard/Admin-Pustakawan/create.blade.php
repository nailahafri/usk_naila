@extends('admin.dashboard.master')
@section('content')


  <section class="section main-section">
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-plus"></i></span>
          Tambah Admin / Pustakawan
        </p>
      </header>
      <div class="card-content">
        <form method="post" action="/dashboard/admin-pustakawan">
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
                <label class="label">Level</label>
                <div class="field-body">
                  <div class="field grouped multiline">
                    <div class="control">
                      <label class="radio">
                        <input type="radio" name="f_level" value="Admin">
                        <span class="check"></span>
                        <span class="control-label">Admin</span>
                      </label>
                    </div>
                    <div class="control">
                      <label class="radio">
                        <input type="radio" name="f_level" value="Pustakawan">
                        <span class="check"></span>
                        <span class="control-label">Pustakawan</span>
                      </label>
                    </div>
                  </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Status</label>
                <div class="field-body">
                  <div class="field grouped multiline">
                    <div class="control">
                      <label class="radio">
                        <input type="radio" name="f_status" value="Aktif">
                        <span class="check"></span>
                        <span class="control-label">Aktif</span>
                      </label>
                    </div>
                    <div class="control">
                      <label class="radio">
                        <input type="radio" name="f_status" value="Tidak Aktif">
                        <span class="check"></span>
                        <span class="control-label">Tidak Aktif</span>
                      </label>
                    </div>
                </div>
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
@endsection