@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
      @if(Session::has('message'))

      <div class="alert alert-success">{{Session::get('message')}}</div>
      @endif
        @if(Session::has('err_message'))

      <div class="alert alert-danger">{{Session::get('err_message')}}</div>
      @endif
      @if(isset($errors)&&count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>

      @endif
<br><br><br><br><br><br>
       <div class="row" id="app">
          <div class="title" style="margin-top: 20px;">
                <h2>{{$job->title}}</h2> 

          </div>

      <img src="{{asset('external2/images/hero-job-image.jpg')}}" style="width: 100%;">

      <br><br>

          <div class="col-lg-8">
            
            
            <div class="p-4 mb-8 bg-white">
              <!-- icon-book mr-3-->
              <h3 class="h5 text-black mb-3"><i class="fa fa-book" style="color: blue;">&nbsp;</i>Description: <a href="#"data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i></a></h3>
              <p> {{$job->description}}.</p>
              
            </div>
            <div class="p-4 mb-8 bg-white">
              <!--icon-align-left mr-3-->
              <h3 class="h5 text-black mb-3"><i class="fa fa-user" style="color: blue;">&nbsp;</i>Roles and Responsibilities:</h3>
              <p>{{$job->duties}} .</p>
              
            </div>
            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fa fa-users" style="color: blue;">&nbsp;</i>Vacancies available:</h3>
              <p>{{$job->number_of_vacancy }}</p>
              
            </div>
         
            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fa fa-dollar" style="color: blue;">&nbsp;</i>Salary</h3>
              <p>{{$job->salary_range}}</p>
            </div>

          </div>
          <br><br><br><br>
          
            <div class="col-md-4 p-4 site-section bg-light">
              <h3 class="h5 text-black mb-3 text-center">Short Info</h3>
                  <p>Dealer name:  {{$job->dealership->dname}}</p>
                <p>Address:  {{$job->address}}</p>
                    <p>Employment Type:  {{$job->type}}</p>
                    <p>Position:  {{$job->position}}</p>
                    <p>Posted:  {{$job->created_at->diffForHumans()}}</p>
                    <p>Last date to apply:  {{ date('F d, Y', strtotime($job->last_date)) }}</p>



              <p><a href="{{route('dealership.index',[$job->dealership->id,$job->dealership->slug])}}" class="btn btn-outline-primary" style="width: 100%;">Visit Company Page</a></p>
              <p>
              <p>@if(Auth::check()&&Auth::user()->user_type='seeker')

@if(!$job->checkApplication())
<form action="{{route('apply',[$job->id])}}" method="POST">@csrf
<button type="submit" class="btn btn-outline-success" style="width: 100%;">Apply</button>
</form>

@endif
@endif</p>

               </div>
       

<br>
<br>
<br>

     </div>
   </div>
@endsection
