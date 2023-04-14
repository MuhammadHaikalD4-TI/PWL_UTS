@extends('layout.template')
@section('content')
<div style="margin-left:300px;">
    <h1>Tambah Barang</h1>
    <form action="{{ $url_form }}" method="post">
        @csrf
        {!! (isset($brg))? method_field('PUT') : '' !!}
        <div class="form-group">
            <label>Nama Barang</label>
            <input class="form-control @error('nama_barang') is-invalid @enderror" value="{{isset($brg)? $brg->nama_barang :old('nama_barang') }}" name="nama_barang" type="text"/>
            @error('nama_barang')
                <span class="error invalid-feedback">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label>Jumlah Barang</label>
            <input class="form-control @error('jumlah') is-invalid @enderror" value="{{isset($brg)? $brg->jumlah :old('jumlah') }}" name="jumlah" type="text"/>
            @error('jumlah')
                <span class="error invalid-feedback">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label>Deskripsi Barang</label>
            <input class="form-control @error('deskripsi') is-invalid @enderror" value="{{isset($brg)? $brg->deskripsi :old('deskripsi') }}" name="deskripsi" type="text"/>
            @error('deskripsi')
                <span class="error invalid-feedback">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <br>
    <a href="{{ route('barang.index') }}">Kembali ke List Barang</a>
</div>
@endsection