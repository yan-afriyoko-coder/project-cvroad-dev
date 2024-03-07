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

            <!-- step 1 -->
            <form action="{{ route('candidates.create.step.two.post') }}" method="POST">
                <h2 class="step-title"> Step 1 <span class="step-description"> Personal Information</span></h2>
                @csrf
                <input type="hidden" name="user_type" value="seeker">
                <!-- Surname input -->
                <div class="mb-3">
                  <label for="surname">Surname *</label>
                  <input class="form-control" name="surname" type="text" />
                  <div class="invalid-feedback">Surname is required.</div>
                </div>
                <!-- Race input-->
                <div class="mb-3">
                  <label for="race">Race *</label>
                  <select class="form-control" name="race" required>
                    <option value="White">White</option>
                    <option value="Black">Black</option>
                    <option value="Colored">Colored</option>
                  </select>
                </div>
                <!-- Gender input -->
                <div class="mb-3">
                  <label for="gender">Gender *</label>
                  <select class="form-control" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <!-- Address input -->
                <div class="mb-3">
                  <label for="address">Address</label>
                  <input class="form-control" name="address" type="text" />
                </div>
                <!-- Drivers  License input -->
                <div class="mb-3">
                  <label for="driver_liscence">Driver's License</label>
                  <select class="form-control" name="driver_liscence">
                    @php
                      $drivers = App\Models\Driver::all();
                      foreach ($drivers as $driver) {
                        echo "<option value='{$driver->name}'>{$driver->name}</option>";
                      }
                    @endphp
                  </select>
                </div>
                <!-- Province input -->
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
                <!-- First Language input -->
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
                <!-- Second Language input -->
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
                 <div class="d-flex">
                    <div class="col-md-6 text-left">
                        <a href="{{ route('candidates.create.step.one') }}" class="btn btn-danger pull-right">Previous</a>
                    </div>
                    <div class="col-md-6 text-right">
                      <button type="submit" class="btn btn-primary">Next</button>
                    </div>
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