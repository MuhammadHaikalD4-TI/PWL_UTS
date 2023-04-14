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
              <h3 class="card-title">Data Pengunjung</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <form action="/pengunjung" method="get">
                    <input type="search" name="q" class="form-control float-right" placeholder="Search" value="{{request('q')}}">
                  </form>
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

                <a href="{{url('pengunjung/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
            
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>HP</th>
                      <th>Alamat</th>
                      <th>Tanggal</th>
                      <th>Jam Masuk</th>
                      <th>Jam Keluar</th>
<th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($pengunjung->count() > 0)
                      @foreach($pengunjung as $i => $p)
                        <tr>
                          <td>{{++$i}}</td>
                          <td>{{$p->nik}}</td>
                          <td>{{$p->nama}}</td>
                          <td>{{$p->jk}}</td>
                          <td>{{$p->hp}}</td>
                          <td>{{$p->alamat}}</td>
                          <td>{{$p->tgl_datang}}</td>
                          <td>{{$p->jam_datang}}</td>
<td>{{$p->jam_keluar}}</td>
                          <td>
                            <!-- Bikin tombol edit dan delete -->
                            <a href="{{ url('/pengunjung/'. $p->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>
            
                            <form method="POST" action="{{ url('/pengunjung/'.$p->id) }}" class="form">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger" onclick="konfirm()">hapus</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    @else
                      <tr><td colspan="10" class="text-center">Data tidak ada</td></tr>
                    @endif
                  </tbody>
                </table>
                <div class="mt-1 d-flex justify-content-end">
                  {{ $pengunjung->onEachSide(1)->links() }}
                </div>
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
@push('custom_js')
<script>
  function konfirm(){
    if(confirm('Apakah Anda Yakin Menghapus?')){
      document.querySelector(".form").sumbit();
    } else {
      event.preventDefault();
    }
}
</script>  
@endpush
@endpush