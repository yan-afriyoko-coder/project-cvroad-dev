@extends('layouts.main')

@section('content')
    <br>    <br> <br>    <br>    <br>    <br>    <br>    <br>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12">       
          @foreach($applicants as $applicant)

            <div class="card">
                <div class="card-header"><a href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}"> {{$applicant->title}}</a></div>

                <div class="card-body">
                    @foreach($applicant->users as $user)
                       
            <table class="table" style="width: 100%;">

            <thead class="table-dark">

            <tr>
           
            <th>Applied</th>
            <th >Name</th>           
            <th>Area</th>
            <th>Gender</th>
            <th>Title</th>
            <th>Salary</th>
            <th>Status</th>
            
            
            <th></th>
            <th></th>


            </tr>

            </thead>


            <tbody>

            <tr>
        

     <td >{{ date('F d, Y', strtotime($applicant->created_at)) }}
                </td>
    <td >{{$user->name}}</td>
      
      <td >{{$user->profile->address}}</td>
      <td >{{$user->profile->gender}}</td>
      <td >{{$user->profile->title}}</td>
      <td >{{$user->profile->salary_range}}</td>
      <td >{{$user->profile->employment_status}}</td>

      <td><a href="{{Storage::url($user->profile->cv)}}"><button class="btn btn-outline-dark">View CV </button></a></td>

      
      <td> <a href="{{route('candidate.show',[$user->profile->id,$user->profile->slug])}}">
        <button class="btn btn-outline-dark">View Profile </button>
                                                </a></td>

    </tr>
    
  </tbody>
</table>

                   </div><br><br>
                    @endforeach
                </div> 
                <br>
                 @endforeach


            </div>

        </div>
    </div>
</div>
<br>    <br>    <br>    <br>    <br>    <br>
@endsection