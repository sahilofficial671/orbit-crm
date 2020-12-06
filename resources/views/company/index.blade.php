@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="title-container main">
                <h1 class="head">Companies</h1>
            </div>
        </div>
    </div>
    @alertSuccess
    @alertError
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Add Company
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('company.create', ['account' => Session::get('account')->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <table class="table table-responsive table-striped table-hover @if(!$companies->count()) blank @endIf">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. of Contacts</th>
                            <th scope="col">Created By</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($companies->count())
                            @foreach ($companies as $company)
                                <tr>
                                    <td class="text-center">{{$loop->index+1}}</td>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->contacts->count()}}</td>
                                    @if ($company->user->name == Auth::user()->name)
                                        <td>You</td>
                                    @else
                                        <td>{{$company->user->name}}</td>
                                    @endif
                                    <td>
                                        <div class="delete">
                                            <a href="{{ route('company.delete').'?company='.$company->id }}">
                                                <svg width="3em" height="1.2em" viewBox="0 0 16 16" class="m-auto bi bi-trash-fill" fill="#ff3721" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <td colspan="6" class="text-center">No Company Found</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
