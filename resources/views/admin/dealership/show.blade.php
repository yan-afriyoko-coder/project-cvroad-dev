@extends('layouts.user_type.admin')
@section('content')
<main id="main" class="main">
    @component('components.admin_alert')        
    @endcomponent
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Dealerships</li>
          <li class="breadcrumb-item active">{{$dealership->dname}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <h5 class="card-title mx-auto">{{$dealership->dname}}</h5>  

            <div class="mx-auto">
              <img src="{{asset('uploads/coverphoto/'.$dealership->cover_photo)}}" alt="" style="max-width: 100%">
            </div>
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              @if($dealership->logo)
                <img src="{{asset('uploads/logo/'. $dealership->logo)}}">
              @else                              
                <img src="{{asset('uploads/avatar/account.png')}}">
              @endif
              {{-- <h2>{{$profile->name}} {{$profile->surname}}</h2>
              <h3>{{$profile->title}}</h3> --}}
              <p>
                {{$dealership->description}}
              </p>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Dealer Information</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Documents</button>
                </li>

               

               

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Dealership Information</h5>                  

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8">{{$dealership->dname}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Province</div>
                    <div class="col-lg-9 col-md-8">{{$dealership->province}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Group</div>
                    <div class="col-lg-9 col-md-8">{{$dealership->group->name ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{$dealership->address}}</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Website</div>
                    <div class="col-lg-9 col-md-8">{{$dealership->website}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Slogan</div>
                    <div class="col-lg-9 col-md-8">{{$dealership->slogan}}</div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">Documents</h5>
                        
                    </div>    
                </div>                
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection