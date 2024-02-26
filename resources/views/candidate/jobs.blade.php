@extends('layouts.user_type.auth')
@section('content')
<main>
  
    <div class="main">
      <div class="container">
        <!--All Jobs-->
        <div class="row">
          <div class="col-md-12">
              <h2 class="underscore mb-5">All <span class="green">Jobs</span></h2>
                <div class="line"></div>
          </div>
        </div>

        
        
      <!-- Newsletter -->
      <div class="update-news mb-5">        
        <form action="{{route('alljobs')}}">
        <div class="row">          
            <div class="col-md-4 job-filter">
              <input type="text" name="search" placeholder="Motor Industry Title" class="form-control">
            </div>
            <div class="col-md-4 job-filter">
              <input type="text" name="address" placeholder="position" class="form-control">
            </div>          
            <div class="col-md-4 job-filter">
              <button type="submit" class="btn btn-danger btn-lg form-control">Search </button>
            </div>                    
        </div>    
      </form>    
      </div>

      <!--Jobs-->
      <div class="row job-offers">
        @foreach ($jobs as $job)
            <div class="col-md-3">                    
                <div class="offert-wrapper">
                    <div class="offert">
                      <div>
                        <div class="offert-description">
                          <div class="company-logo">
                            <img src="{{asset('uploads/logo/'.$job->dealership->logo)}}"  alt="">
                          </div>
                          <div class="description">
                            <p class="company-name">{{$job->position}}</p>                                
                          </div>
                        </div>
                        <div class="job-container">
                          <p class="ellipsis-text">{{$job->description}}...</p>                              
                        </div>
                        <div class="offert-meta">
                          <p class="location">{{$job->created_at->diffForHumans()}}  </p>
                          <p class="offert-counter"> 
                            @if($job->users->contains('id', Auth::user()->id)) 
                              <i class="fas fa-check-circle text-success"></i>
                            @else   
                            <div>
                              <form action="{{route('apply',[$job->id])}}" method="POST">
                                @csrf
                              </form>
                              <button type="button" class="btn btn-sm btn-danger btn-confirm-div-form">Apply</button>
                            </div>
                              
                            @endif
                          </p>
                        </div>
                      </div>
                    </div>
                    <a href="{{route('jobs.show',[$job->id])}}" class="btn main-btn">Details</a> </a>
                  </div>
            </div>                
      @endforeach
    </div> 

      


        <div class="row">                   
          <div class="col-lg-12">
            <nav aria-label="blog navigation">
              <ul class="pagination">
                <li class="page-item ">
                  <a class="page-link" href="{{$jobs->previousPageUrl()}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <!--loop through jobs available pages -->
                @for ($i = 1; $i <= $jobs->lastPage(); $i++)
                  <li class="page-item{{ ($jobs->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $jobs->url($i) }}">{{ $i }}</a>
                  </li>
                @endfor
                <li class="page-item">
                  <a class="page-link" href="{{ $jobs->nextPageUrl() }}" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                  </a>
                </li>  
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection