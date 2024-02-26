@extends('layouts.user_type.auth')
@section('content')
<main>

    <div class="main">

      @component('components.header', ['dealership' => $dealership])        
      @endcomponent
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="underscore mb-5">My <span class="green">Jobs</span></h2>
                  <div class="line"></div>
            </div>
        </div>
        <div class="row job-offers">
            @foreach ($jobs as $job)
                <div class="col-md-3">                    
                    <div class="offert-wrapper">
                        <div class="offert">
                          <div>
                            <div class="offert-description">
                              <div class="company-logo">
                                <img src="{{asset('uploads/logo/'.$dealership->logo)}}"  alt="">
                              </div>
                              <div class="description">
                                <p class="company-name">{{$job->position}}</p>                                
                              </div>
                            </div>
                            <div>
                              <p>{{$job->description}}...</p>                              
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
                        <a href="" class="btn main-btn">Details</a> </a>
                      </div>
                </div>                
            @endforeach
        </div>  
        <div class="row">
            @if($jobs->hasPages())
              {{ $jobs->links() }}
            @endif
        </div>          
        </div>
      </div>
    </div>
</main> 
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script>
  $(document).ready(function(){
    $("#jobs_table").DataTable();
  })
</script>


@endsection