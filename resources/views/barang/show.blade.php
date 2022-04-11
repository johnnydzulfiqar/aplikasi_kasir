@extends('layout.master')
@section('judul')
Halaman Detail Baramg
@endsection 

@section('content')

<h1>Nama Barang : {{ $barang->nama_barang }} </h1>
<div class="row">
<div class="col-4">
    <div class="card">
      <div class="card-body">
        <h5> Harga Barang : {{ $barang->harga_satuan }}</h5>
        <h5> Barang dibuat pada : {{ $barang->created_at->format('D d M Y H:i') }}</h5>

        </div>
    </div>
</div>


@endsection