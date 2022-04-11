@extends('layout.master')
@section('judul')
    Master User
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="/barang/create/" class="btn btn-success">Tambah Kategori</a>
        <h6 class="m-0 font-weight-bold text-primary">Master User</h6>
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
                
                <tbody>
                    <tr>
                        @forelse ($user as $key=>$item)
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        
                        <td>@auth
                            {{-- @if ($user_id = Auth::user()->id === $item->users_id) --}}
                            <form action="/user/{{  $item->id }}" method="POST">
                              @csrf
                             @method('delete')
                             <a href="/user/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                             <input type="submit" class="btn btn-danger btn-sm" value="delete">
                             </form>
                            {{-- @else
                               <h5>Tidak bisa CRUD anda bukan user pemilik post ini</h5>
                            @endif --}}
                             
                            @endauth                              
                            <a href="/barang/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
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