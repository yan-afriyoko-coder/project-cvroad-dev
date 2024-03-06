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

              <!-- section form 4 -->
              <form action="{{ route('candidates.create.step.four.post') }}" method="post" action="/upload" enctype="multipart/form-data" >
                <h2 class="step-title"> Step 3 <span class="step-description"> Upload Documents</span></h2>
                @csrf
                <!-- CV input -->
                <div class="mb-3">
                  <label for="cv">CV *</label>
                  <input class="form-control" name="cv" type="file" placeholder="CV" accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx" required />
                  <div class="invalid-feedback">CV is required.</div>
                </div>
                <!-- Certificates input -->
                <div class="mb-3">
                  <label for="certificates">Certificates *</label>
                  <input class="form-control" name="certificates" type="file" placeholder="Certificates"  accept="image/*" required />
                  <div class="invalid-feedback">Certificates are required.</div>
                </div>
                <!-- Payslips input -->
                <div class="mb-3">
                  <label for="payslips">Payslips *</label>
                  <input class="form-control" name="payslips" type="file" placeholder="Payslips" accept="image/*" required />
                  <div class="invalid-feedback">Payslips are required.</div>
                </div>
                <!-- Other Documents input -->
                <div class="mb-3">
                  <label for="other_documents">Other Documents *</label>
                  <input class="form-control" name="other_documents" type="file" placeholder="Other Documents" accept="image/*" required />
                  <div class="invalid-feedback">Other Documents are required.</div>
                </div>
                <!-- Form submit button -->
                <div class="d-flex">
                    <div class="col-md-6 text-left">
                        <a href="{{ route('candidates.create.step.two') }}" class="btn btn-danger pull-right">Previous</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
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