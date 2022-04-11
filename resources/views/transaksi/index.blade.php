@extends('layout.master')
@section('judul')
    Master Transaksi
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="/transaksi/create/" class="btn btn-success">Tambah Transaksi</a>
        <h6 class="m-0 font-weight-bold text-primary">Master Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        
                            
                        
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Waktu Transaksi</th>
                        
                        <th>Total Harga</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        @forelse ($transaksi as $key=>$item)
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->created_at->format('D d M Y H:i') }}</td>
                        <td>{{ $item->master_barang->harga_satuan * $item->jumlah }}</td>
                        <td>@auth
                            {{-- @if ($user_id = Auth::user()->id === $item->users_id) --}}
                            <form action="/barang/{{  $item->id }}" method="POST">
                              @csrf
                             @method('delete')
                             {{-- <a href="/transaksi/{{ $item->id }}/cetak" class="btn btn-primary" target="_blank">CETAK PDF</a> --}}
                             <input type="submit" class="btn btn-danger btn-sm" value="delete">
                             </form>
                            {{-- @else
                               <h5>Tidak bisa CRUD anda bukan user pemilik post ini</h5>
                            @endif --}}
                             
                            @endauth                              
                            <a href="/transaksi/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
                                         </td>
                        
                    </tr>

                </tbody>
                 
                @empty
                    
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection