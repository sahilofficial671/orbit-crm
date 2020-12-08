@extends('layouts.app', ['class'=>'contacts'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-container main">
                    <h1 class="head">Profile Settings</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                @alertSuccess
                @alertError
                @alertInfo
                <div class="card">
                    <div class="card-header">
                        Edit Profile
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.profile.edit') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @endError" id="name" name="name" placeholder="Name" value="{{old('name') ?? $user->name}}">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @endError" id="email" name="email" placeholder="Email" value="{{old('email') ?? $user->email}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
