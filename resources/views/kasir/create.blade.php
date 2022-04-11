@extends('layout.master')
@section('judul')
    Master Barang
@endsection
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
<form action="/kasir" method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Jumlah Barang</label>
      <input type="number" class="form-control" id="jumlah" name="jumlah">
      @error('jumlah')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    {{-- <div class="form-group">
        <label for="body">Pilih Master Barang</label>
        <select name="master_barang_id" id="" class="form-control">
            <option value="">Pilih Barang</option>
            @foreach ($barang as $item)
                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
            @endforeach
        </select>
        @error('master_barang_id')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            
        @enderror --}}
        <div class="form-group">
            <label for="body">Pilih Master Barang</label>
            <select class="form-control selectpicker" name="master_barang_id" id="select-country" data-live-search="true">
                <option value="">Pilih Barang</option>
                @foreach ($barang as $item)
                <option value="{{ $item->id }}" >{{ $item->nama_barang }}</option>
               
                @endforeach
                
                @error('master_barang_id')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            
        @enderror
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
    {{-- <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Harga Satuan Barang</label>
      <input type="text" class="form-control" id="harga_satuan" name="harga_satuan">
      @error('harga_satuan')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div> --}}
    
   
  </form>
@endsection