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
                <img src="{{asset('assets/img/logo.png')}}" alt="" style="max-height: 150px">
              </div>                  
              <h2 class="underscore mb-5 text-center">welcome <span class="green">back!!</span></h2>              
              <div class="line"></div>
              <form method="POST" action="{{route('login')}}">
                @csrf
                <!-- Name input -->
                <div class="mb-3">
                  <input class="form-control" name="email" type="text" placeholder="Email *" data-sb-validations="required" />
                  <div class="invalid-feedback" data-sb-feedback="name:required">Email is required.</div>
                </div>
                <!-- Email address input -->
                <div class="mb-3">
                  <input class="form-control" name="password" id="emailAddress" type="password" placeholder="Password *" data-sb-validations="required, email" />
                  <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Password Address is required.</div>
                  <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Password Address Email is not valid.</div>
                </div>
                
               
                <!-- Form submit button -->
                <div class="d-grid">
                  <button class="main-btn mt-0 disabled" id="submitButton" type="submit">Login</button>
                </div>

                <div class="mb-3 d-flex">
                    Have no account? &nbsp; &nbsp;  <a href="{{route('dealer.register')}}" class="btn-link" style="text-decoration:none">Register as Dealer</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn-link" href="{{route('register')}}" style="text-decoration:none">Register as Candidate</a>
                </div>


              </form>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mx-auto text-center">
                <h5 class="mt-5">Or Login With....</h5>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <a href="" class="btn btn-google form-control mt-2" > <i class="fab fa-google"></i>    |  Google</a>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="btn btn-linkedin form-control mt-2"> <i class="fab fa-linkedin"></i>    | Linkedin</a>
                    </div>
                </div>
            </div>
        </div>        

          
      </div>
    </div>
</main>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
