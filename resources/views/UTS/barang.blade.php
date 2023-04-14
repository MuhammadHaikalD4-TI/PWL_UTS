@extends('layout.template')
@section('content')
<div class="card-body" style="margin-left: 250px;">

    <a href="{{url('/barang/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nama_Barang</th>
          <th>Jumlah</th>
          <th>Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        @if($brg->count() > 0)
          @foreach($brg as $i => $m)
            <tr>
              
              <td>{{$m->id}}</td>
              <td>{{$m->nama_barang}}</td>
              <td>{{$m->jumlah}}</td>
              <td>{{$m->deskripsi}}</td>
              <td>
                <!-- Bikin tombol edit dan delete -->
                <a href="{{ url('/barang/'. $m->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>

                <form method="POST" action="{{ url('/barang/'.$m->id) }}" class="form">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="konfirm()">hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        @else
          <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>
        @endif
      </tbody>
    </table>
    <div class="mt-1 d-flex justify-content-end">
      {{ $brg->onEachSide(1)->links() }}
    </div>
  </div>
  <!-- /.card-body -->
@endsection
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