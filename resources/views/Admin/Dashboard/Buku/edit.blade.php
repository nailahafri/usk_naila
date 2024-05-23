@extends('admin.dashboard.master')
@section('content')


  <section class="section main-section">
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-pencil-box-multiple"></i></span>
          Edit Buku
        </p>
      </header>
      <div class="card-content">
        <form method="POST" onsubmit="return confirm('Do you really want to submit the form?');" action="/dashboard/buku/{{ $buku->f_id }}">
          @method('PATCH')
          
          @csrf
          <div class="field">
            <div class="field-body">
              <div class="field">
                <label class="label">Judul</label>
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="Judul" name="f_judul" value="{{ $buku->f_judul }}">
                  <span class="icon left"><i class="mdi mdi-format-title"></i></span>
                </div>
              </div>
              <div class="field">
                <label class="label">Kategori</label>
                <div class="control icons-left icons-right select">
                    <select name="f_idkategori">
                      @foreach( $kategoris as $kategori )
                        @if ($buku->kategoris->f_id ==  $kategori->f_id)
                            <option selected value="{{ $kategori->f_id }}">
                                {{ $kategori->f_kategori }}
                            </option>
                        @else
                            <option value="{{ $kategori->f_id }}">
                                {{$kategori->f_kategori}}
                            </option>
                        @endif
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="field">
            <label class="label">Pengarang</label>
              <div class="control icons-left">
                <input class="input" type="text" placeholder="Pengarang" name="f_pengarang" value="{{ $buku->f_pengarang }}">
                <span class="icon left"><i class="mdi mdi-account-edit"></i></span>
              </div>
            </div>
            <div class="field">
            <label class="label">Penerbit</label>
              <div class="control icons-left">
                <input class="input" type="text" placeholder="Penerbit" name="f_penerbit" value="{{ $buku->f_penerbit }}">
                <span class="icon left"><i class="mdi mdi-account-arrow-up"></i></span>
              </div>
            </div>
            <div class="field">
              <label class="label">Deskripsi</label>
              <div class="control">
                <textarea class="textarea" placeholder="Deskripsi Buku" name="f_deskripsi">{{ $buku->f_deskripsi }}</textarea>
                </div>
            </div>
            <div class="field">
              <label class="label">Status</label>
              <div class="field-body">
                <div class="field grouped multiline">
                  <div class="control">
                    <label class="radio">
                      <input type="radio" name="f_status" value="Tersedia" @if($buku->detailbuku->f_status == "Tersedia") checked @endif>
                      <span class="check"></span>
                      <span class="control-label">Tersedia</span>
                    </label>
                  </div>
                  <div class="control">
                    <label class="radio">
                      <input type="radio" name="f_status" value="Tidak Tersedia" @if($buku->detailbuku->f_status == "Tidak Tersedia") checked @endif>
                      <span class="check"></span>
                      <span class="control-label">Tidak Tersedia</span>
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