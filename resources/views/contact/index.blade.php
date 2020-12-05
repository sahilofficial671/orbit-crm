@extends('layouts.app', ['class'=>'contacts'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="title-container main">
                <h1 class="head">Contacts</h1>
            </div>
        </div>
    </div>
    @alertSuccess
    @alertError
    @alertInfo
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Add Contact
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
                    <form method="POST" action="{{ route('contact.create', ['account' => Session::get('account')->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                <table class="table table-responsives table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" width="5%">#</th>
                            <th scope="col" width="25%">Name</th>
                            <th scope="col" width="25%">Email</th>
                            <th scope="col" width="10%">Phone</th>
                            <th scope="col" class="text-center" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($contacts->count())
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="text-center">{{$loop->index+1}}</td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>
                                        <div class="d-flex justify-content-around align-items-center">
                                            <div class="delete">
                                                <a href="{{ route('contact.delete', ['account' => Session::get('account')->id]).'?contact='.$contact->id }}">
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
                        <td colspan="5" class="text-center">No Contacts Found</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
