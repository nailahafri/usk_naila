@extends('admin.dashboard.master')
@section('content')


  <section class="section main-section">
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-book-plus-multiple"></i></span>
          Tambah Buku
        </p>
      </header>
      <div class="card-content">
        <form method="post" action="/dashboard/buku">
            @csrf
          <div class="field">
              <div class="field-body">
                <div class="field">
                <label class="label">Judul</label>
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="Judul" name="f_judul">
                  <span class="icon left"><i class="mdi mdi-format-title"></i></span>
                </div>
              </div>
              <div class="field">
                <label class="label">Kategori</label>
                <div class="control">
                  <div class="select">
                    <select name="f_idkategori">
                      <option selected disabled>Pilih Kategori</option>
                      @foreach( $kategoris as $kategori )
                        <option value="{{ $kategori->f_id }}">
                          {{$kategori->f_kategori}}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="field">
                <label class="label">Pengarang</label>
                <div class="control icons-left icons-right">
                  <input class="input" type="text" placeholder="Pengarang" name="f_pengarang">
                  <span class="icon left"><i class="mdi mdi-account-edit"></i></span>
                </div>
              </div>
              <div class="field">
                <label class="label">Penerbit</label>
                <div class="control icons-left icons-right">
                  <input class="input" type="text" placeholder="Penerbit" name="f_penerbit">
                  <span class="icon left"><i class="mdi mdi-account-arrow-up"></i></span>
                </div>
              </div>
              <div class="field">
                <label class="label">Status</label>
                <div class="field-body">
                  <div class="field grouped multiline">
                    <div class="control">
                      <label class="radio">
                        <input type="radio" name="f_status" value="Tersedia">
                        <span class="check"></span>
                        <span class="control-label">Tersedia</span>
                      </label>
                    </div>
                    <div class="control">
                      <label class="radio">
                        <input type="radio" name="f_status" value="Tidak Tersedia">
                        <span class="check"></span>
                        <span class="control-label">Tidak Tersedia</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field">
                <label class="label">Deskripsi</label>
                <div class="control">
                  <textarea class="textarea" placeholder="Deskripsi Buku" name="f_deskripsi"></textarea>
                  <span class="icon left"><i class="mdi mdi-format-paragraphs"></i></span>
                </div>
              </div>
            </div>
          </div>
          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
                Submit
              </button>
            </div>
            <div class="control">
              <button type="reset" class="button red">
                Reset
              </button>
            </div>
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
        </form>
      </div>
    </div>
  </section>
@endsection