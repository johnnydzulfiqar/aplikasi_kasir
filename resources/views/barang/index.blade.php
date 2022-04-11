@extends('layout.master')
@section('judul')
    Master Barang
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                         <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($barang as $key=>$item)
    <td>{{ $key + 1 }}</td>
    <td>{{ $item->nama_barang }}</td>
    <td>{{ $item->harga_satuan }}</td>
    <td>@auth
        {{-- @if ($user_id = Auth::user()->id === $item->users_id) --}}
        <form action="/barang/{{  $item->id }}" method="POST">
          @csrf
         @method('delete')
         <a href="/barang/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
         <input type="submit" class="btn btn-danger btn-sm" value="delete">
         </form>
        {{-- @else
           <h5>Tidak bisa CRUD anda bukan user pemilik post ini</h5>
        @endif --}}
         
        @endauth                              
        <a href="/barang/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
        
    </td>  
    
                   
                    
                </tbody>
                @endforeach 
            </table>
        </div>
    </div>
</div>
@endsection