
@extends('layouts.user_type.auth')
@section('content')
<main>
    <div class="main">
      <!-- Header Section -->
      @component('components.header', ['dealership' => $dealership])        
      @endcomponent
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="underscore mb-5">Job <span class="green">Applicants</span></h2>
            <div class="line"></div>
            </div>
            <div class="col-md-12">
              @if(count($job->users) > 0)
              <table class="table" id="jobs_table">
                <thead>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Gender</th>
                  <th>Title</th>
                  <th>Salary</th>
                  {{-- <th>Status</th> --}}
                  <th>CV</th>
                  <th>Profile</th>
                </thead>
                <tbody>                  
                  @foreach ($job->users as $user)                                       
                    <tr>
                      <td> <i class="fas fa-user"></i> {{$user->profile->name}} {{$user->profile->surname ?? ''}}</td>
                      <td> <a href="mailto:{{$user->email ?? ''}}">{{$user->email ?? ''}}</a></td>
                      <td>
                      <a href="tel:{{$user->profile->phone_number ?? ''}}">{{$user->profile->phone_number ?? ''}}</a>
                      </td>
                      <td>
                        {{$user->profile->gender ?? ''}}
                      </td>
                      <td>
                        {{$user->profile->title ?? ''}}
                      </td>
                      <td>
                        {{$user->profile->salary_range ?? ''}}
                      </td>
                      {{-- <td>
                        {{$user->profile->profile_status ?? ''}}
                      </td> --}}
                      <td>
                        
                        <a href="{{asset('uploads/cvs/'.$user->profile->cv)}}" class="btn btn-sm btn-main" download><i class="fas fa-file-pdf"></i> Download CV</a>
                      </td>
                      <td>
                        <a href="{{route('dealer_job_candidate',[$user->id])}}" class="btn btn-sm btn-main"><i class="fas fa-user"></i> Profile</a>                        
                      </td>
                    </tr>                    
                  @endforeach
                </tbody>
              </table>
              @else
              <div class="text-center">
                <h4 class="underscore mb-5">No Applications <span class="green">Found...</span></h4>  
              </div>
              
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