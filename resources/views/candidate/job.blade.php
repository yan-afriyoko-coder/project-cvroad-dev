@extends('layouts.user_type.auth')
@section('content')
<main>
    <div class="main">
        @component('components.header', ['dealership' => $job->dealership])        
        @endcomponent
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="underscore mb-5">Job: <span class="green">{{$job->position}}</span></h2>
                      <div class="line"></div>
                </div>
            </div>
            <div class="row job-offers">
                <div class="col-md-12">                    
                    <div class="offert-wrapper">
                        <div class="offert">
                          <div>
                            <div class="offert-description">
                              <div class="company-logo">
                                <img src="{{asset('uploads/logo/'.$job->dealership->logo)}}"  alt="">
                              </div>
                              <div class="description">
                                <p class="company-name">{{$job->position}}</p>   
                                <p class="description">{{$job->description}}</p>
                              </div>
                            </div>
                            <div>
                                <p><strong>Salary:</strong> {{$job->salary_range}}</p>   
                                <p><strong>Title:</strong> {{$job->title}}</p>  
                                <p><strong>Duties:</strong> {{$job->duties}}</p>  
                                <p><strong>Qualifications:</strong> {{$job->qualifications}}</p>  
                                <p><strong>Number of Vacancies:</strong> <span class="badge bg-success">{{$job->number_of_vacancy}}</span></p>  
                                <p><strong>Experience:</strong> {{$job->years_experience}}</p> 
                                <hr>
                                <p><strong>Province:</strong> {{$job->province}}</p>  
                                <p><strong>Address:</strong> {{$job->address}}</p>  
                                
                            </div>                            
                            <div class="offert-meta">
                              <p class="location">{{$job->created_at->diffForHumans()}}  </p>
                              <p class="offert-counter"> 
                                @if($job->users->contains('id', Auth::user()->id)) 
                                  <i class="fas fa-check-circle text-success"></i>
                                @else   
                                <div>
                                  @if(Auth::user()->isSeeker())
                                  <form action="{{route('apply',[$job->id])}}" method="POST">
                                    @csrf
                                  </form>                                  
                                  <button type="button" class="btn btn-sm btn-danger btn-confirm-div-form">Apply</button>
                                  @endif
                                  @if(Auth::user()->isEmployer())
                                  <a href="{{route('jobs.edit',[$job->id])}}" class="btn btn-main"> <i class="fas fa-edit"></i> Edit</a>
                                  @endif
                                </div>
                                  
                                @endif
                              </p>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                </div>                 
            </div>
        </div>
    </div>
</main>