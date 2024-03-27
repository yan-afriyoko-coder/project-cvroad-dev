@extends('layouts.user_type.form')
@section('content')
    <main>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        @component('components.alert')
                        @endcomponent
                        <div class="contact-page">
                            <div class="text-center">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="" style="max-height: 150px">
                            </div>
                            <h2 class="underscore mb-5 text-center">Dealer <span class="green">Registration</span></h2>
                            <div class="line"></div>
                            <form method="POST" action="{{ route('dealer.additional.information.post') }}" method="post"
                                action="/upload" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="employer" name="user_type">
                                <!-- Name input -->
                                <div class="mb-3">
                                    <label for="dname">Dealership Name * </label>
                                    <input class="form-control" name="dname" type="text" required />
                                    <div class="invalid-feedback" >dealership name is required.</div>
                                </div>
                                <!-- Slug input -->
                                <div class="mb-3">
                                    <label for="slug">Slug Name * </label>
                                    <input class="form-control" name="slug" type="text" required />
                                    <div class="invalid-feedback" >slug name is required.</div>
                                </div>
                                <!-- Address input -->
                                <div class="mb-3">
                                    <label for="address">Address * </label>
                                    <input class="form-control" name="address" id="" type="text" required, />
                                    <div class="invalid-feedback" >Address isrequired.</div>
                                </div>
                                <!-- Province input -->
                                <div class="mb-3">
                                    <label for="province">Province</label>
                                    <select class="form-control" name="province">
                                        @php
                                            $provinces = App\Models\Province::all();
                                            foreach ($provinces as $province) {
                                                echo "<option value='{$province->name}'>{$province->name}</option>";
                                            }
                                        @endphp
                                    </select>
                                </div>
                                <!-- Phone input -->
                                <div class="mb-3">
                                    <label for="phone">Phone number *</label>
                                    <input class="form-control" name="phone" type="tel" required, />
                                    <div class="invalid-feedback">Phone number is required.</div>
                                </div>
                                 <!-- Website input -->
                                 <div class="mb-3">
                                    <label for="website">Website Name </label>
                                    <input class="form-control" name="website" type="text" />
                                    {{-- <div class="invalid-feedback" >Name is required.</div> --}}
                                </div>
                                 <!-- Logo input -->
                                 <div class="mb-3">
                                    <label for="logo">Logo picture </label>
                                    <input class="form-control" name="logo" type="file" accept="image/*" />
                                    {{-- <div class="invalid-feedback" >Name is required.</div> --}}
                                </div>
                                 <!-- Cover input -->
                                 <div class="mb-3">
                                    <label for="cover_photo">Cover photo </label>
                                    <input class="form-control" name="cover_photo" type="file" accept="image/*" />
                                    {{-- <div class="invalid-feedback" >Name is required.</div> --}}
                                </div>
                                <!--Group input -->
                                <div class="mb-3">
                                    <label for="group_id">Select Group </label>
                                    <select name="group_id" id="" class="form-control">
                                        @foreach (App\Models\Group::all() as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Brand input -->
                                <div class="mb-3">
                                    <label for="brand_id">Brand </label>
                                    <select name="brand_id" id="" class="form-control">
                                        @foreach (App\Models\Group::all() as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Slogan input -->
                                <div class="mb-3">
                                    <label for="slogan">Slogan </label>
                                    <input class="form-control" name="slogan" id="" type="text" />
                                    {{-- <div class="invalid-feedback" data-sb-feedback="password:required">Password Address isrequired.</div> --}}
                                </div>
                                <!-- Description input -->
                                <div class="mb-3">
                                    <label for="description">Description </label>
                                    <input class="form-control" name="description" id="" type="text" />
                                    {{-- <div class="invalid-feedback" data-sb-feedback="password_confirmation:required">PasswordAddress is required.</div> --}}
                                </div>
                                <!-- Form submit button -->
                                <div class="container">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-md-6">
                                            <a href="{{ route('dealer.register') }}"
                                                class="btn btn-danger btn-block mt-2">Back</a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary btn-block mt-2">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{ route('register') }}" class="btn-link" style="text-decoration:none">Register
                                    as Candidate</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or &nbsp;<a class="btn-link"
                                    href="{{ route('login') }}" style="text-decoration:none">Login </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
