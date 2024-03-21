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
                            <form method="POST" action="{{ route('deal.register') }}">
                                @csrf
                                <input type="hidden" value="employer" name="user_type">

                                <!-- Name input -->
                                <div class="mb-3">
                                    <input class="form-control" name="dname" type="text"
                                        placeholder="Dealership Name *" required />
                                    <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                </div>
                                <!-- Email address input -->
                                <div class="mb-3">
                                    <input class="form-control" name="email" id="emailAddress" type="email"
                                        placeholder="Email *" required, email />
                                    <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is
                                        required.</div>
                                </div>
                                <!--Group input -->
                                <div class="mb-3">
                                    <select name="group_id" id="" class="form-control">
                                        <option value="" selected disabled>Select Group</option>
                                        @foreach (App\Models\Group::all() as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Password input -->
                                <div class="mb-3">
                                    <input class="form-control" name="password" id="password" type="password"
                                        placeholder="Password *" required, email />
                                    <div class="invalid-feedback" data-sb-feedback="password:required">Password Address is
                                        required.</div>
                                    <div class="invalid-feedback" data-sb-feedback="password:password">Password is not
                                        valid.</div>
                                </div>
                                <!-- Password input -->
                                <div class="mb-3">
                                    <input class="form-control" name="password_confirmation" id="password_confirmation"
                                        type="password" placeholder="Confirm Password *" required, email />
                                    <div class="invalid-feedback" data-sb-feedback="password_confirmation:required">Password
                                        Address is required.</div>
                                    <div class="invalid-feedback"
                                        data-sb-feedback="password_confirmation:password_confirmation">Password is not
                                        valid.</div>
                                </div>
                                <!-- Form submit button -->
                                <div class="d-grid">
                                    <button class="main-btn mt-0 disabled" id="submitButton"
                                        type="submit">Register</button>
                                </div>
                                <div class="mb-3 d-flex">
                                    <a href="{{ route('register') }}" class="btn-link" style="text-decoration:none">Register
                                        as Candidate</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or &nbsp;<a class="btn-link"
                                        href="{{ route('login') }}" style="text-decoration:none">Login </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
