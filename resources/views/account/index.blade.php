@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="title mt-4 mb-4 border-bottom">
                <h1>Orbit Accounts</h1>
            </div>
        </div>
    </div>
    @alertSuccess
    @alertError
    @alertInfo
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-hover bg-white">
                <thead>
                    <tr>
                        <th scope="col" class="text-center" width="5%">#</th>
                        <th scope="col" width="25%">Name</th>
                        <th scope="col" width="25%">Email</th>
                        <th scope="col" width="10%">No. of Contacts</th>
                        <th scope="col" class="text-center" width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($accounts->count())
                        @foreach ($accounts as $account)
                            <tr>
                                <td class="text-center">{{$loop->index+1}}</td>
                                <td>{{$account->name}}</td>
                                <td>{{$account->domain}}</td>
                                <td>{{$account->companies->count()}}</td>
                                <td>
                                    <div class="d-flex justify-content-around align-items-center">
                                        <div class="select">
                                            <a href="{{ route('account.select').'?account='.$account->id }}">
                                                <button class="btn btn-primary">Select</button>
                                            </a>
                                        </div>
                                        <div class="delete">
                                            <a href="{{ route('account.delete').'?account='.$account->id }}">
                                                <svg width="3em" height="1.2em" viewBox="0 0 16 16" class="m-auto bi bi-trash-fill" fill="#ff3721" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    @else
                    <td colspan="4" class="text-center">No Company Found</td>
                    @endif
                </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
