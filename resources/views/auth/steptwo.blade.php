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
            <h2 class="underscore mb-5 text-center">Candidate <span class="green">Registration</span></h2>              
            <div class="line"></div>

            <!-- section form 2 -->
            <form action="{{ route('candidates.create.step.three.post') }}" method="post" >
              <h2 class="text-center">Work Experience</h2>
                @csrf
                <!-- Departement input -->
                <div class="mb-3">
                  <label for="current_department">Current or Last Department *</label>
                  <select class="form-control" name="category_id">
                  @php
                    $categorys = App\Models\Category::all();
                    foreach ($categorys as $category) {
                      echo "<option value='{$category->id}'>{$category->name}</option>";
                    }
                  @endphp
                  </select>                
                <div class="invalid-feedback">Current or Last Department is required.</div>
                </div>
                <!-- Brand Experience input -->
                <div class="mb-3">
                  <label for="brand_experience">Last or Current Brand Experience</label>
                  <select class="form-control" name="brand_id">
                    @php
                      $brands = App\Models\Brand::all();
                      foreach ($brands as $brand) {
                        echo "<option value='{$brand->id}'>{$brand->name}</option>";
                      }
                    @endphp
                  </select>                  
                </div>
                <!-- Title input -->
                <div class="mb-3">
                  <label for="current_title">Last or Current Title</label>
                  <select class="form-control" name="title">
                    @php
                      $titles = App\Models\Title::all();
                      foreach ($titles as $title) {
                        echo "<option value='{$title->title}'>{$title->title}</option>";
                      }
                    @endphp
                  </select>                
                </div>
                <!-- Dealer Group input -->
                <div class="mb-3">
                  <label for="group_id">Last or Current Dealer Group *</label>
                  <select class="form-control" name="group_id">
                    @php
                      $groups = App\Models\Group::all();
                      foreach ($groups as $group) {
                        echo "<option value='{$group->name}'>{$group->name}</option>";
                      }
                    @endphp
                  </select>                 
                <div class="invalid-feedback">Last or Current Dealer Group is required.</div>
                </div>
                <!-- Notice Period input -->
                <div class="mb-3">
                  <label for="notice_period">Notice Period *</label>
                  <select class="form-control" name="notice_period" required>
                    <option value="">Select Notice Period *</option>
                    <option value="2-3 weeks">2-3 weeks</option>
                    <option value="Immediate">Immediate</option>
                  </select>
                  <div class="invalid-feedback">Notice Period is required.</div>
                </div>
                <!-- Employment Status input -->
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
                <!-- Current Salary input -->
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
                <!-- Dealer Experience input -->
                <div class="mb-3">
                  <label for="dealer_experience">Dealer Experience *</label>
                  <select class="form-control" name="dealer_experience" required>
                    <option value="">Select Dealer Experience *</option>
                    <option value="">None</option>
                    <option value="1">1-2 years</option>
                    <option value="3">3-5 years</option>
                    <option value="6">6-10 years</option>
                    <option value="10">10-15 years</option>
                    <option value="20">20+ years</option>
                  </select>
                  <div class="invalid-feedback">Dealer Experience is required.</div>
                </div>
  
                <!-- Form submit button -->
                <div class="container">
                  <div class="row justify-content-center text-center">
                      <div class="col-md-6">
                          <a href="{{ route('candidates.create.step.two') }}" class="btn btn-danger btn-block mt-2">Previous</a>
                      </div>
                      <div class="col-md-6">
                          <button type="submit" class="btn btn-primary btn-block mt-2">Next</button>
                      </div>
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