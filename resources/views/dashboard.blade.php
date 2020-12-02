@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="title-container main">
                <h1 class="head">Dashboard</h1>
            </div>
        </div>
    </div>
    @alertSuccess
    @alertError
    @alertInfo
    <div class="row">
        <div class="col-sm-12">
            @if (Session::has('account'))
                <div class="">Account Selected: {{Session::get('account')->name}}</div>
            @endif
        </div>
    </div>
</div>
@endsection
