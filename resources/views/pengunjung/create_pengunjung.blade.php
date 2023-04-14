@extends('layout.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengunjung</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('dashboard')}}>Home</a></li>
              <li class="breadcrumb-item active">Data Pengunjung</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah atau Edit Data Pengunjung</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <form method="POST" action="{{ $url_form}}">
                    @csrf
                    {!! (isset($p))? method_field('PUT') : '' !!}

                    <div class="form-group">
                        <label>NIK</label>
                        <input class="form-control @error('nik') is-invalid @enderror" value="{{ isset($p)? $p->nik : old('nik')}}" name="nik" type="text">
                        @error('nik')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($p)? $p->nama : old('nama')}}" name="nama" type="text">
                        @error('nama')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input class="form-control @error('jk') is-invalid @enderror" value="{{ isset($p)? $p->jk : old('jk')}}" name="jk" type="text">
                        @error('jk')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>HP</label>
                        <input class="form-control @error('hp') is-invalid @enderror" value="{{ isset($p)? $p->hp : old('hp')}}" name="hp" type="text">
                        @error('hp')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control @error('alamat') is-invalid @enderror" value="{{ isset($p)? $p->alamat : old('alamat')}}" name="alamat" type="text">
                        @error('alamat')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Datang</label>
                        <input class="form-control @error('tgl_datang') is-invalid @enderror" value="{{ isset($p)? $p->tgl_datang : old('tgl_datang')}}" name="tgl_datang" type="date">
                        @error('tgl_datang')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Waktu Datang</label>
                        <input class="form-control @error('jam_datang') is-invalid @enderror" value="{{ isset($p)? $p->jam_datang : old('jam_datang')}}" name="jam_datang" type="time">
                        @error('jam_datang')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Waktu Keluar</label>
                        <input class="form-control @error('jam_keluar') is-invalid @enderror" value="{{ isset($p)? $p->jam_keluar : old('jam_keluar')}}" name="jam_keluar" type="time">
                        @error('jam_keluar')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-sm btn-success my-2">
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection

@push('custom_js')
<script>
    alert('Welcome')
</script>
@endpush