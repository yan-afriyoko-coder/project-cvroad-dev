@extends('layouts.user_type.form')
@section('content')

{{-- <main>
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
</main> --}}

{{-- ========================================================================================================================================== --}}
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
        
            <!-- Form Bagian 1 -->
            <form id="form-part-1" method="POST" action="{{route('register')}}">
              @csrf
              <input type="hidden" name="user_type" value="seeker">
              <div class="mb-3">
                <label for="name">Name *</label>
                <input class="form-control" name="name" type="text" />
                <div class="invalid-feedback">Name is required.</div>
              </div>
              <div class="mb-3">
                <label for="surname">Surname *</label>
                <input class="form-control" name="surname" type="text" />
                <div class="invalid-feedback">Surname is required.</div>
              </div>
              <div class="mb-3">
                <label for="race">Race *</label>
                <select class="form-control" name="race" required>
                  <option value="White">White</option>
                  <option value="Black">Black</option>
                  <option value="Colored">Colored</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="id_number">ID Number *</label>
                <input class="form-control" name="id_number" type="text" />
                <div class="invalid-feedback">ID Number is required.</div>
              </div>
              <div class="mb-3">
                <label for="gender">Gender *</label>
                <select class="form-control" name="gender" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="address">Address</label>
                <input class="form-control" name="address" type="text" />
              </div>
              <div class="mb-3">
                <label for="drivers_license">Driver's License</label>
                <select class="form-control" name="drivers_license">
                  @php
                    $drivers = App\Models\Driver::all();
                    foreach ($drivers as $driver) {
                      echo "<option value='{$driver->name}'>{$driver->name}</option>";
                    }
                  @endphp
                </select>
              </div>
              <div class="mb-3">
                <label for="province">Province</label>
                <select class="form-control" name="provinces">
                  @php
                    $provinces = App\Models\Province::all();
                    foreach ($provinces as $province) {
                      echo "<option value='{$province->name}'>{$province->name}</option>";
                    }
                  @endphp
                </select>              
              </div>
              <div class="mb-3">
                <label for="first_language">First Language</label>
                <select class="form-control" name="first_languages">
                  @php
                    $languages = App\Models\Language::all();
                    foreach ($languages as $language) {
                      echo "<option value='{$language->name}'>{$language->name}</option>";
                    }
                  @endphp
                </select>               
              </div>
              <div class="mb-3">
                <label for="second_language">Second Language</label>
                <select class="form-control" name="second_languages">
                  @php
                    $languages = App\Models\Language::all();
                    foreach ($languages as $language) {
                      echo "<option value='{$language->name}'>{$language->name}</option>";
                    }
                  @endphp
                </select>              
              </div>
               <!-- Form submit button -->
                <div class="d-grid">
                  <button class="btn btn-primary btn-lg ms-auto" id="nextButton" type="button" onclick="nextFormPart(1)" style="float: right;">Next</button>
                </div>
            </form>

            <!-- Form Bagian 2 -->
            <form id="form-part-2" method="POST" action="{{route('register')}}" style="display: none;">
              @csrf
              <div class="mb-3">
                <label for="current_department">Current or Last Department *</label>
                <select class="form-control" name="second_languages">
                @php
                  $categorys = App\Models\category::all();
                  foreach ($categorys as $category) {
                    echo "<option value='{$category->name}'>{$category->name}</option>";
                  }
                @endphp
                </select>                
              <div class="invalid-feedback">Current or Last Department is required.</div>
              </div>
              <div class="mb-3">
                <label for="brand_experience">Last or Current Brand Experience</label>
                <select class="form-control" name="second_languages">
                  @php
                    $brands = App\Models\brand::all();
                    foreach ($brands as $brand) {
                      echo "<option value='{$brand->name}'>{$brand->name}</option>";
                    }
                  @endphp
                </select>                  
              </div>
              <div class="mb-3">
                <label for="current_title">Last or Current Title</label>
                <select class="form-control" name="second_languages">
                  @php
                    $titles = App\Models\title::all();
                    foreach ($titles as $title) {
                      echo "<option value='{$title->name}'>{$title->name}</option>";
                    }
                  @endphp
                </select>                
              </div>
              <div class="mb-3">
                <label for="dealer_group">Last or Current Dealer Group *</label>
                <select class="form-control" name="second_languages">
                  @php
                    $dealerships = App\Models\dealership::all();
                    foreach ($dealerships as $dealership) {
                      echo "<option value='{$dealership->name}'>{$dealership->name}</option>";
                    }
                  @endphp
                </select>                 
              <div class="invalid-feedback">Last or Current Dealer Group is required.</div>
              </div>
              <div class="mb-3">
                <label for="notice_period">Notice Period *</label>
                <select class="form-control" name="notice_period" required>
                  <option value="">Select Notice Period *</option>
                  <option value="2-3 weeks">2-3 weeks</option>
                  <option value="Immediate">Immediate</option>
                </select>
                <div class="invalid-feedback">Notice Period is required.</div>
              </div>
              <div class="mb-3">
                <label for="employment_status">Employment Status *</label>
                <select class="form-control" name="employment_status" required>
                  <option value="">Select Employment Status *</option>
                  <option value="Employed">Employed</option>
                  <option value="Contracted">Contracted</option>
                  <option value="Unemployed">Unemployed</option>
                </select>
                <div class="invalid-feedback">Employment Status is required.</div>
              </div>
              <div class="mb-3">
                <label for="current_salary">Current Salary *</label>
                <select class="form-control" name="current_salary" required>
                  <option value="">Select Current Salary *</option>
                  <option value="Negotiable">Negotiable</option>
                  <option value="R6000 – R10 000">R6000 – R10 000</option>
                  <option value="R10 000 – R15 000">R10 000 – R15 000</option>
                  <option value="R15 000 – R20 000">R15 000 – R20 000</option>
                  <option value="R20 000 – R30 000">R20 000 – R30 000</option>
                  <option value="R30 000 - R40 000">R30 000 - R40 000</option>
                  <option value="R40 000 – R100 000">R40 000 – R100 000</option>
                </select>
                <div class="invalid-feedback">Current Salary is required.</div>
              </div>
              <div class="mb-3">
                <label for="dealer_experience">Dealer Experience *</label>
                <select class="form-control" name="dealer_experience" required>
                  <option value="">Select Dealer Experience *</option>
                  <option value="none">None</option>
                  <option value="1-2 years">1-2 years</option>
                  <option value="3-5 years">3-5 years</option>
                  <option value="6-10 years">6-10 years</option>
                  <option value="10-15 years">10-15 years</option>
                  <option value="20+ years">20+ years</option>
                </select>
                <div class="invalid-feedback">Dealer Experience is required.</div>
              </div>

              <!-- Form submit button -->
              <div class="d-flex">
                <button class="main-btn mt-10 disabled" id="backButton" type="button" onclick="prevFormPart(2)" style="float: left;">Back</button>
                <button class="btn btn-primary btn-lg ms-auto" id="nextButton" type="button" onclick="nextFormPart(2)" style="float: right;">Next</button>
              </div>
              
            </form>

            <!-- Form Bagian 3 -->
            <form id="form-part-3" method="POST" action="{{route('register')}}" style="display: none;">
              @csrf
              <div class="mb-3">
                <label for="cv">CV *</label>
                <input class="form-control" name="cv" type="file" placeholder="CV" required />
                <div class="invalid-feedback">CV is required.</div>
              </div>
              <div class="mb-3">
                <label for="certificates">Certificates *</label>
                <input class="form-control" name="certificates" type="file" placeholder="Certificates" required />
                <div class="invalid-feedback">Certificates are required.</div>
              </div>
              <div class="mb-3">
                <label for="payslips">Payslips *</label>
                <input class="form-control" name="payslips" type="file" placeholder="Payslips" required />
                <div class="invalid-feedback">Payslips are required.</div>
              </div>
              <div class="mb-3">
                <label for="other_documents">Other Documents *</label>
                <input class="form-control" name="other_documents" type="file" placeholder="Other Documents" required />
                <div class="invalid-feedback">Other Documents are required.</div>
              </div>
              <div class="d-flex">
                <button class="main-btn mt-10 disabled" id="backButton" type="button" onclick="prevFormPart(3)" style="float: left;">Back</button>
                <button class="btn btn-success btn-lg ms-auto" id="register1" type="submit" style="float: right;">Register</button>         
              </div>   
            </form>
            
            <!-- Back to login or register as dealer -->
            <div class="mb-3 d-flex">
              <a href="{{route('dealer.register')}}" class="btn-link" style="text-decoration:none">Register as Dealer</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or&nbsp;
              <a class="btn-link" href="{{route('login')}}" style="text-decoration:none">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

{{-- ================================================================================= --}}
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
   <script>
    // Fungsi untuk menampilkan form berikutnya
    function nextFormPart(currentPart) {
      var nextPart = currentPart + 1;
      var currentForm = document.getElementById('form-part-' + currentPart);
      var nextForm = document.getElementById('form-part-' + nextPart);
      currentForm.style.display = 'none';
      nextForm.style.display = 'block';
    }
  
    // Fungsi untuk menampilkan form sebelumnya
    function prevFormPart(currentPart) {
      var prevPart = currentPart - 1;
      var currentForm = document.getElementById('form-part-' + currentPart);
      var prevForm = document.getElementById('form-part-' + prevPart);
      currentForm.style.display = 'none';
      prevForm.style.display = 'block';
    }
  </script>
  
@endsection
