@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="card-header">Profile</div>
            </div>
            <div class="card-body">
                <form action="{{ route('profileUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" >
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Image</label>
                        <input type="file" name="user_image" class="form-control" >
                        @if ($errors->has('user_image'))
                            <span class="text-danger">{{ $errors->first('user_image') }}</span>
                        @endif
                        @if ($user->user_image != '')
                            <img src="{{ asset($user->user_image) }}" width="150" class="img-thumbnail" alt="">
                        @endif
                    </div>
                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn btn-dark btn-block">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

  </div>
@endsection
