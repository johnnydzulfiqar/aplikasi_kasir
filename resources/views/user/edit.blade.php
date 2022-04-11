@extends('layout.master')
@section('judul')
    User
@endsection
@section('content')
<form action="/user/{{ $user->id }}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nama User</label>
      <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name">
      @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email User</label>
      <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email">
      @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Password</label>
        <input type="password" value="{{ $user->password }}" class="form-control" id="password" name="password">
        @error('password')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
          @enderror
      </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection