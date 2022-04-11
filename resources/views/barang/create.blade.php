@extends('layout.master')
@section('judul')
    Master Barang
@endsection
@section('content')
<form action="/barang" method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
      <input type="text" class="form-control" id="nama_barang" name="nama_barang">
      @error('nama_barang')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Harga Satuan Barang</label>
      <input type="text" class="form-control" id="harga_satuan" name="harga_satuan">
      @error('harga_satuan')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  
@endsection