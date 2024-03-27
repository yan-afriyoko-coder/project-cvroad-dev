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
                            <form method="POST" action="{{ route('dealer.register.post') }}" method="POST">
                                @csrf
                                <input type="hidden" value="employer" name="user_type">
                                <!-- Name input -->
                                <div class="mb-3">
                                    <input class="form-control" name="name" type="text" placeholder="First Name *"
                                        required />
                                    <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                </div>
                                <!-- Email address input -->
                                <div class="mb-3">
                                    <input class="form-control" name="email" type="email" placeholder="Email *"
                                        required />
                                    <div class="invalid-feedback" data-sb-feedback="email:required">Email Address is
                                        required.</div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Invalid email format.</div>
                                </div>
                                <!-- ID Number input -->
                                <div class="mb-3">
                                    <input class="form-control" name="identification_number" type="text"
                                        placeholder="ID Number *" required />
                                    <div class="invalid-feedback" data-sb-feedback="identification_number:required">ID
                                        Number is required.</div>
                                </div>
                                <!-- Password input -->
                                <div class="mb-3">
                                    <input class="form-control" name="password" type="password" placeholder="Password *"
                                        required />
                                    <div class="invalid-feedback" data-sb-feedback="password:required">Password is required.
                                    </div>
                                </div>
                                <!-- Confirm Password input -->
                                <div class="mb-3">
                                    <input class="form-control" name="password_confirmation" type="password"
                                        placeholder="Confirm Password *" required />
                                    <div class="invalid-feedback" data-sb-feedback="password_confirmation:required">Confirm
                                        Password is required.</div>
                                </div>
                                <!-- Form submit button -->
                                <div class="justify-content-center text-center">
                                    <button type="submit" class="btn btn-full-width">Next</button>
                                </div>
                                {{-- <div class="d-grid">
                                    <button class="main-btn mt-0 disabled" id="submitButton"
                                        type="submit">Register</button>
                                </div> --}}
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
