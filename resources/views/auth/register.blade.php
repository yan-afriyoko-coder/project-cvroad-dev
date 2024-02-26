@extends('layouts.user_type.form')
@section('content')

<main>
  <div class="main">
    @component('components.alert')                
    @endcomponent
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="contact-page">
            <div class="text-center">
              <img src="{{asset('assets/img/logo.png')}}" alt="" style="max-height: 150px">
            </div>  
            <h2 class="underscore mb-5 text-center">Employee <span class="green">Registration</span></h2>              
            <div class="line"></div>
            <form method="POST" action="{{route('register')}}">
              @csrf
              <input type="hidden" name="user_type" value="seeker">
              <!-- Name input -->
              <div class="mb-3">
                <input class="form-control" name="name" type="text" placeholder="Name *" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
              </div>
              <!-- Email address input -->
              <div class="mb-3">
                <input class="form-control" name="email" id="emailAddress" type="email" placeholder="Email *" data-sb-validations="required, email" />
                <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
              </div>
              <!-- ID Numner-->
              <div class="mb-3">
                <input class="form-control" name="identification_number" type="text" placeholder="ID Number *" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="identification_number:required">ID Number is required.</div>
              </div>
              <!-- Password input -->
              <div class="mb-3">
                <input class="form-control" name="password" id="password" type="password" placeholder="Password *" data-sb-validations="required, email" />
                <div class="invalid-feedback" data-sb-feedback="password:required">Password Address is required.</div>
                <div class="invalid-feedback" data-sb-feedback="password:password">Password is not valid.</div>
              </div>
              <!-- Password input -->
              <div class="mb-3">
                <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm Password *" data-sb-validations="required, email" />
                <div class="invalid-feedback" data-sb-feedback="password_confirmation:required">Password Address is required.</div>
                <div class="invalid-feedback" data-sb-feedback="password_confirmation:password_confirmation">Password is not valid.</div>
              </div>
              
             
              <!-- Form submit button -->
              <div class="d-grid">
                <button class="main-btn mt-0 disabled" id="submitButton" type="submit">Register</button>
              </div>

              <div class="mb-3 d-flex">
                   <a href="{{route('dealer.register')}}" class="btn-link" style="text-decoration:none">Register as Dealer</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or &nbsp;<a class="btn-link" href="{{route('login')}}" style="text-decoration:none">Login </a>

              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</main>


{{-- <div class="w3l-content-2 py-5">
  <div class="container py-md-5 py-2">
    <div class="row align-items-center">
      <div class="col-lg-6 whybox-wrap pr-lg-5">
      <div class="title-content text-left">
          <h6 class="title-subhny">Employer Registration</h6>          
          
      </div>          
      <div class="whybox-wrap-grid mb-4">
          <form action="{{ route('register') }}" method="POST">  
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"  placeholder="Enter your name">              
            </div>                  
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" name="email"  placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="identification_number">ID No.</label>
              <input type="text" class="form-control" name="identification_number"  placeholder="Enter email">              
            </div>
              <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control"  placeholder="Password">
              </div>
              <div class="form-group">
                <label for="password_confirmation">Password</label>
                <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm Password">
              </div>                 
                          
              <button type="submit" class="btn btn-primary">Register</button>
          </form>
          
      </div>
      
      </div>
      <div class="col-lg-6 whybox-wrap-img mt-lg-0 mt-5 pl-lg-5">
      <div class="w3l-img-hr position-relative">
          <img src="assets/images/pic-4.png" alt="" class="img-fluid">
      </div>
      </div>
  </div>
  </div>
</div>     --}}
   
@endsection
