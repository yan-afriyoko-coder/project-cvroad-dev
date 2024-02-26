<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CVroad &mdash; Automotive Jobs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@include('partials.head')
    
  </head>
  <body>
  
  @include('partials.nav')
  
  @include('partials.hero')

  @include('partials.category')

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mb-5 h3">Recent Jobs</h2>
            <div class="rounded border jobs-wrap">
            @foreach($jobs as $job )

              <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{asset('uploads/logo')}}/{{$job->dealership->logo}}" alt="Image" class="img-fluid mx-auto">
                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{$job->position}}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$job->dealership->dname}}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span>{{\Illuminate\Support\Str::limit($job->address,20)}}</div>
                      <div><span class="icon-money mr-1"></span> {{$job->salary_range}}</div>
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">
                  @if($job->type=='Permanent')
                  <div class="p-3">
                    <span class="text-info p-2 rounded border border-info">{{$job->type}}</span>
                  </div>
                  @elseif($job->type=='Contract/Temp')
                  <div class="p-3">
                    <span class="text-danger p-2 rounded border border-danger">{{$job->type}}</span>
                  </div>
                  @else
                   <div class="p-3">
                    <span class="text-warning p-2 rounded border border-warning">{{$job->type}}</span>
                  </div>
                  @endif

                </div>  
              </a>
              @endforeach

            </div>

            <div class="col-md-12 text-center mt-5">
              <a href="{{route('alljobs')}}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
            </div>
          </div>
        </div>
      </div>
    </div>

   


    <div class="site-blocks-cover overlay inner-page" style="background-image: url('external2/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center" data-aos="fade">
            <h1 class="h3 mb-0">Your Dream Job</h1>
            <p class="h3 text-white mb-5">Is Waiting For You</p>
            <p><a href="/register" class="btn btn-outline-success py-3 px-4">Find Jobs</a> <a href="{{route('dealer.register')}}" class="btn btn-outline-success py-3 px-4">Find Candidates</a></p>
            
          </div>
        </div>
      </div>
    </div>

    

    <div class="site-section site-block-feature bg-light">
      <div class="container">
        
        <div class="text-center mb-5 section-heading">
          <h2>Why Choose Us</h2>
        </div>

        <div class="d-block d-md-flex border-bottom">
          <div class="text-center p-4 item border-right" data-aos="fade">
            <span  class=" display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">More Jobs Every Day</h2>Don't miss out on the only site that can keep you up-t-date with all things that go "vrooM!" and "brapapapapapa!" </p>
            
          </div>
          <div class="text-center p-4 item" data-aos="fade">
            <span class="display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Pre-screened Candidates</h2>
            <p>What other site offers pre-screen applicants before it hits your screen, No more timeous amounts spent with 
              recruitment agents</p>
            
          </div>
        
        </div>
      </div>
    </div>
     
    @include('partials.footer')
  </body>
</html>