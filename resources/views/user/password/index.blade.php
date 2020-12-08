@extends('layouts.app', ['class'=>'contacts'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-container main">
                    <h1 class="head">Change Password</h1>
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
                        Change Password
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.password.edit') }}">
                            @csrf
                            <div class="form-group">
                                <input type="password" class="form-control @error('current_password') is-invalid @endError" id="current_password" name="current_password" placeholder="Current Password">

                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @endError" id="password" name="password" placeholder="New Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @endError" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input @error('logout_from_all_sessions') is-invalid @endError" id="logout_from_all_sessions" name="logout_from_all_sessions">
                                <label for="logout_from_all_sessions">Logout from all sessions</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
