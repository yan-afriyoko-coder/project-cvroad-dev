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
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              @if($profile->avatar)
                <img src="{{asset('uploads/avatar/'. $profile->avatar)}}" class="rounded-circle">
              @else                              
                <img src="{{asset('uploads/avatar/account.png')}}" class="rounded-circle">
              @endif
              <h2>{{$profile->name}} {{$profile->surname}}</h2>
              <h3>{{$profile->title}}</h3>
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
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Personal</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Work Experince</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Documents</button>
                </li>

               

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Bio</h5>
                  <p class="small fst-italic">{{$profile->bio}}</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{$profile->name}} {{$profile->surname}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date of birth</div>
                    <div class="col-lg-9 col-md-8">{{$profile->dob}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8">{{$profile->gender}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Race</div>
                    <div class="col-lg-9 col-md-8">{{$profile->race}}</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{$profile->phone_number}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$profile->user->email}}</div>
                  </div>
                  
                  <h5 class="card-title">Languages</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">First language</div>
                    <div class="col-lg-9 col-md-8">{{$profile->user->first_language}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Second language</div>
                    <div class="col-lg-9 col-md-8">{{$profile->user->second_language}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Third language</div>
                    <div class="col-lg-9 col-md-8">{{$profile->user->third_language}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Four language</div>
                    <div class="col-lg-9 col-md-8">{{$profile->user->fourth_language}}</div>
                  </div>

                </div>
                

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">Work Information</h5>
                        <div class="row">                            
                            <div class="col-lg-3 col-md-4 label">Dealer Experience</div>
                            <div class="col-lg-9 col-md-8">{{$profile->dealer_experience}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Experience</div>
                            <div class="col-lg-9 col-md-8">{{$profile->experience}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Employement Status</div>
                            <div class="col-lg-9 col-md-8">{{$profile->employement_status}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Notice Period</div>
                            <div class="col-lg-9 col-md-8">{{$profile->notice_period}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Salary Range</div>
                            <div class="col-lg-9 col-md-8">{{$profile->salary_range}}</div>
                        </div>

                        <hr>

                        <h5 class="card-title">Work Reference</h5>
                        @if($profile->user->experience)
                          @foreach ($profile->user->experience as $exp)
                          <div class="row">                            
                            <div class="col-lg-3 col-md-4 label">Company</div>
                            <div class="col-lg-9 col-md-8">{{$exp->company}}</div>
                          </div>           
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Position</div>
                            <div class="col-lg-9 col-md-8">{{$exp->title}}</div>
                          </div>                 
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Duration</div>
                            <div class="col-lg-9 col-md-8">{{$exp->start_date}} - {{$exp->present == true ? 'Present' : $exp->end_date}}</div>                                                       
                          </div>    
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Contact</div>
                            <div class="col-lg-9 col-md-8">{{$exp->manager}} ( {{$exp->phone}} )</div>
                          </div>                                              
                          @endforeach
                        @endif
                        


                    </div>    
                        

                    

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <div class="row">                    
                      <div class="col-lg-3 col-md-4 label">Cover Letter</div>
                      @if($profile->cover_letter)
                        <div class="col-lg-9 col-md-8"> <a href="{{asset('uploads/cover_letters/'.$profile->cover_letter)}}" download> <i class="bi bi-download"></i> Download </a> </div>                    
                      @endif
                    </div>
                    <div class="row">                    
                      <div class="col-lg-3 col-md-4 label">CV</div>
                      @if($profile->cv)
                        <div class="col-lg-9 col-md-8"> <a href="{{asset('uploads/cvs/'.$profile->cv)}}" download> <i class="bi bi-download"></i> Download </a> </div>                    
                      @endif
                    </div>
                    <div class="row">                    
                      <div class="col-lg-3 col-md-4 label">Certificatres</div>
                      @if($profile->cv)
                        <div class="col-lg-9 col-md-8"> <a href="{{asset('uploads/certificates/'.$profile->certificates)}}" download> <i class="bi bi-download"></i> Download </a> </div>                    
                      @endif
                    </div>
                    <div class="row">                    
                      <div class="col-lg-3 col-md-4 label">PaySlips</div>
                      @if($profile->cv)
                        <div class="col-lg-9 col-md-8"> <a href="{{asset('uploads/payslips/'.$profile->payslips)}}" download> <i class="bi bi-download"></i> Download </a> </div>                    
                      @endif
                    </div>
                    <div class="row">                    
                      <div class="col-lg-3 col-md-4 label">Other Documents</div>
                      @if($profile->other_documents)
                        <div class="col-lg-9 col-md-8"> <a href="{{asset('uploads/other_documents/'.$profile->other_documents)}}" download> <i class="bi bi-download"></i> Download </a> </div>                    
                      @endif
                    </div>
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