@extends('admin.dashboard.master')
@section('content')

<style>
    input[type="date"]::-webkit-inner-spin-button,
    input[type="date"]::-webkit-calendar-picker-indicator {
        display: none;
        -webkit-appearance: none;
    }
</style>

  <section class="section main-section">
    
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-book-plus-multiple"></i></span>
          Tambah Entri Peminjaman
        </p>
      </header>
      <div class="card-content">
        <form method="post" onsubmit="return confirm('Do you really want to submit the form?');" action="/dashboard/entri-peminjaman/{{ $peminjaman->f_id }}">
          @method('PATCH')

            @csrf
          <div class="field">
              <div class="field-body">
                <div class="field">
                <label class="label">Admin</label>
                <div class="control icons-left">
                  <input class="input" type="text" disabled value='{{ $peminjaman->admin->f_nama }}' placeholder="Admin">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              <div class="field">
                <label class="label">Tanggal Peminjaman</label>
                <div class="control icons-left icons-right">
                  <input class="input" type="date" value='{{ old('f_tanggalpeminjaman', $peminjaman->f_tanggalpeminjaman) }}' onfocus="this.showPicker()" placeholder="Tanggal Peminjaman" name="f_tanggalpeminjaman">
                  <span class="icon left"><i class="mdi mdi-calendar-month"></i></span>
                </div>
              </div>
              <div class="field">
                <label class="label">Anggota</label>
                <div class="control">
                  <div class="select">
                    <select id="select1" name="f_idanggota">
                      <option value="" disabled {{ old('f_idanggota', $peminjaman->anggota->f_id) ? '' : 'selected' }}>Pilih Anggota</option>
                      @foreach( $anggotas as $anggota )
                        @if (old('f_idanggota', $peminjaman->anggota->id) == $anggota->f_id)
                            <option selected value="{{ $anggota->f_id }}">{{ $anggota->f_nama }}</option>
                        @else
                            <option value="{{ $anggota->f_id }}">{{$anggota->f_nama}}</option>  
                        @endif

                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="field">
                <label class="label">Judul Buku</label>
                <div class="control">
                  <div class="select">
                    <select id="select2" name="f_iddetailbuku">
                      <option value="" disabled {{ old('f_iddetailbuku', $peminjaman->detailpeminjaman->f_iddetailbuku) ? '' : 'selected' }}>Pilih Buku</option>
                      @foreach( $bukus as $buku )
                        @if (old('f_iddetailbuku', $peminjaman->detailpeminjaman->f_iddetailbuku) == $buku->f_id)
                            <option selected value="{{ $buku->detailbuku->f_id }}">{{ $buku->f_judul }}</option>
                        @else
                            <option value="{{ $buku->detailbuku->f_id }}">{{$buku->f_judul}}</option>  
                        @endif

                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="field grouped" style="margin-top: 2rem">
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

<script>
    $(function (){
        $('#select1').selectize();
        $('#select2').selectize();
    });
</script>
@endsection