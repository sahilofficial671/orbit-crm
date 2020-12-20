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
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                <div class="card-header">
                    Edit Contact
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
                        @if ($contact)
                            <input type="hidden" name="contactId" value="{{$contact->id}}">
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="@if($contact->name) {{$contact->name}} @endIf">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="@if($contact->email) {{$contact->email}} @endIf">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Job Title" value="@if($contact->job_title) {{$contact->job_title}} @endIf">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone/Mobile" value="@if($contact->job_title) {{$contact->job_title}} @endIf">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="number" class="form-control" id="landline" name="landline" placeholder="Landline" value="@if($contact->landline) {{$contact->landline}} @endIf}">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="number" class="form-control" id="fax" name="fax" placeholder="Fax" value="@if($contact->fax) {{$contact->fax}} @endIf"></div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" value="@if($contact->city) {{$contact->city}} @endIf"></div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Pincode/PostCode" value="@if($contact->postcode) {{$contact->postcode}} @endIf">
                            </div>
                            <div class="form-group col-sm-6">
                                <select class="custom-select form-control" name="state_code">
                                    @foreach ($states as $state)
                                        @if ($state->code === $contact->state)
                                            <option value="{{$state->code}}" selected>{{$state->name}}</option>
                                        @endif
                                            <option value="{{$state->code}}">{{$state->name}}</option>
                                    @endforeach
                                    </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <select class="custom-select form-control" name="country_code">
                                    @foreach ($countries as $country)
                                        @if ($country->code === $contact->country)
                                            <option value="{{$country->code}}" selected>{{$country->name}}</option>
                                        @endif
                                            <option value="{{$country->code}}">{{$country->name}}</option>
                                    @endforeach
                                    </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <textarea name="address" rows="3" placeholder="Add Address.." class="form-control">@if($contact->address) {{$contact->address}} @endIf</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            @if ($contact)
                                Edit
                            @else
                                Create
                            @endIf
                        </button>
                    </form>
                </div>
            </div>
        </div> {{-- col --}}
    </div> {{-- row --}}
</div> {{-- container-fluid --}}
@endsection
