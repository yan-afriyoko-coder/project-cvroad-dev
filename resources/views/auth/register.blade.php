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

            <!-- index register -->
            <form action="{{ route('candidates.create.step.one.post') }}" method="POST">
              @csrf
              <input type="hidden" name="user_type" value="seeker">
              <!-- Name input -->
              <div class="mb-3">
                  <input class="form-control" name="name" type="text" placeholder="First Name *" required />
                  <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
              </div>
              <!-- Email address input -->
              <div class="mb-3">
                  <input class="form-control" name="email" type="email" placeholder="Email *" required />
                  <div class="invalid-feedback" data-sb-feedback="email:required">Email Address is required.</div>
                  <div class="invalid-feedback" data-sb-feedback="email:email">Invalid email format.</div>
              </div>
              <!-- ID Number input -->
              <div class="mb-3">
                  <input class="form-control" name="identification_number" type="text" placeholder="ID Number *" required />
                  <div class="invalid-feedback" data-sb-feedback="identification_number:required">ID Number is required.</div>
              </div>
              <!-- Password input -->
              <div class="mb-3">
                  <input class="form-control" name="password" type="password" placeholder="Password *" required />
                  <div class="invalid-feedback" data-sb-feedback="password:required">Password is required.</div>
              </div>
              <!-- Confirm Password input -->
              <div class="mb-3">
                  <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password *" required />
                  <div class="invalid-feedback" data-sb-feedback="password_confirmation:required">Confirm Password is required.</div>
              </div>
              <!-- Form submit button -->
              <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Next</button>
              </div>
          </form>
          
            <!-- Back to login or register as dealer -->
            <div class="mb-3 d-flex justify-content-center">
              <a href="{{route('dealer.register')}}" class="btn-link" style="text-decoration:none">Register as Dealer</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or&nbsp;
              <a class="btn-link" href="{{route('login')}}" style="text-decoration:none">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
{{-- ============================================================================================= --}}

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
   {{-- ===================================================================================================== --}}
  
@endsection
