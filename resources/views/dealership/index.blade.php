@extends('layouts.user_type.auth')
@section('content')
<main>

    <div class="main">

      @component('components.header', ['dealership' => $dealership])        
      @endcomponent
      <div class="container">
        @component('components.alert')          
        @endcomponent
        <div class="row">          
            <div class="col-md-12">
                <h2 class="underscore mb-5">My <span class="green">Jobs</span></h2>
                  <div class="line"></div>
            </div>
            <div class="col-md-12 table-responsive">
              <table class="table" id="jobs_table">
                <thead>
                  <th>Position</th>
                  <th>Date</th>
                  <th></th>
                </thead>
                <tbody>
                  @foreach ($jobs as $job)
                  <tr>
                    <td>{{$job->position}}</td>
                    <td>{{$job->created_at->diffForHumans()}}</td>
                    <td>
                      <div class="d-flex">
                      <a href="{{route('applicants',[$job->id])}}" class="btn btn-sm btn-main"> <span class="badge bg-primary job-badge">{{count($job->users)}}</span>  Applicants</a> &nbsp;
                      <a class="btn btn-sm btn-main" href="{{route('jobs.edit',[$job->id])}}"> <i class="fas fa-edit"></i> Edit</a> &nbsp;
                      <a class="btn btn-sm btn-main" href="{{route('jobs.show',[$job->id, $job->slug])}}"> <i class="fas fa-list"></i> View Job</a>&nbsp;                                            
                      <form action="{{route('jobs.end',[$job->id])}}" method="POST">                        
                        @csrf                        
                      </form>
                      <button type="button" class="btn btn-sm btn-danger btn-confirm-div-form" href=""> <i class="fas fa-times"></i> End</button>
                      </div>
                      
                      
                    </td>
                  </tr>                    
                  @endforeach
                </tbody>
              </table>
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