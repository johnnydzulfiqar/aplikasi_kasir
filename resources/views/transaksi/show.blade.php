@extends('layout.master')
@section('judul')
Halaman Detail Transaksi
@endsection 

@section('content')

<h1>Barang yang di Beli : {{ $transaksi->master_barang->nama_barang }} </h1>
<div class="row">
<div class="col-4">
    <div class="card">
      <div class="card-body">
        
        
        <h5> Total Transaksi : {{ $transaksi->master_barang->harga_satuan * $transaksi->jumlah  }}</h5>
        <h5> Waktu Transaksi : {{ $transaksi->created_at->format('D d M Y H:i') }}</h5>

        </div>
    </div>
</div>


@endsection