@extends('admin.master')
@section('title', 'Admin Profile')
@section('content')
    <div class="content-wrapper">
        <div class="profile rounded bg-white mt-5 mb-5">
            {{-- Success Message Show --}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                            width="150px" height="150px" src="{{ asset(Auth::user()->profile_img) }}">
                        <span class="font-weight-bold">{{ Auth::user()->name }}</span><span
                            class="text-black-50">{{ Auth::user()->email }}</span><span> </span>
                    </div>
                </div>
                <div class="col-md-8 border-right">
                    <form action="{{ route('admin.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Full Name</label><input type="text"
                                        name="name" class="form-control" placeholder="First name"
                                        value="{{ Auth::user()->name }}"></div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Email</label><input type="email"
                                        name="email" class="form-control" placeholder="Email"
                                        value="{{ Auth::user()->email }}"></div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">User Name</label><input type="text"
                                        name="username" class="form-control" placeholder="User Name"
                                        value="{{ Auth::user()->username }}"></div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                        name="number" class="form-control" placeholder="Phone Number"
                                        value="{{ Auth::user()->number }}"></div>
                                <div class="col-md-12"><label class="labels">Address</label><input type="text"
                                        name="address" class="form-control" placeholder="Enter Address"
                                        value="{{ Auth::user()->address }}"></div>
                                <div class="col-md-12"><label class="labels">Website</label><input type="text"
                                        name="website" class="form-control" placeholder="Enter Website"
                                        value="{{ Auth::user()->website }}"></div>
                                <div class="col-md-12"><label class="labels">Postcode</label><input type="text"
                                        name="postcode" class="form-control" placeholder="Enter Postcode"
                                        value="{{ Auth::user()->postcode }}"></div>
                                <div class="col-md-12"><label class="labels">Area</label><input type="text"
                                        name="area" class="form-control" placeholder="Enter Area"
                                        value="{{ Auth::user()->area }}"></div>
                                <div class="col-md-12"><label class="labels">Education</label><input type="text"
                                        name="education" class="form-control" placeholder="Education"
                                        value="{{ Auth::user()->education }}"></div>

                                <div class="col-md-12"><label class="labels d-block mt-1">Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" @if (Auth::user()->gender == 'male'):
                                            {{ 'checked' }} 
                                        @endif type="radio" name="gender" id="gender" value="male">
                                        <label class="form-check-label" for="gender">Male</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" @if (Auth::user()->gender == 'female'):
                                            {{ 'checked' }} 
                                        @endif type="radio" name="gender" id="gender" value="female">
                                        <label class="form-check-label" for="gender">Female</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" @if (Auth::user()->gender == 'other'):
                                            {{ 'checked' }} 
                                        @endif type="radio" name="gender" id="gender" value="other">
                                        <label class="form-check-label" for="gender">Other</label>
                                      </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Country</label><input type="text"
                                        name="country" class="form-control" placeholder="country"
                                        value="{{ Auth::user()->country }}"></div>
                                <div class="col-md-6"><label class="labels">State/Region</label><input type="text"
                                        name="state" class="form-control" value="{{ Auth::user()->state }}"
                                        placeholder="state"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Photo</label><input type="file"
                                        name="profile_img" class="form-control"></div>
                            </div>
                            <div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button"
                                    value="Update"> </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
