@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="title mt-4 mb-4 border-bottom">
                    <h1>{{$account->name}}</h1>
                </div>
            </div>
        </div>
        @alertSuccess
        @alertError
        @alertInfo
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                </div>
            </div>
        </div>
    </div>
@endsection
