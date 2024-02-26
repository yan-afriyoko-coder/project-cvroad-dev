@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">

    

    <div class="col-md-12" >

    @if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}
                        </div>@endif</v-container>

    <div class="company-profile">

    @if(empty($dealership->cover_photo))
                           
                           <img src="{{asset('company/cover_photo.png')}}" style="width: 100%">
                       
                                                      @else
                                                 
                          <img src="{{asset('uploads/coverphoto/')}}{{$dealership->cover_photo}}" style="width: 100%;">
                       
                                                  @endif
                       


    <div class="company-desc">
    <br>
    @if(empty($dealership->logo))
    <img src="{{asset('company/authorized-dealer.png')}}" style="width: 10%">
    
    @else

    <img width="100" src="{{asset('uploads/logo/')}}{{$dealership->logo}}" >
    @endif

    <br>
   <br>
       
        <div class="col-md-12">
            

        
            <div class="card">

            
                <div class="card-header"><h3>{{$job->title}}</h3></div>

                

                <div class="card-body">
                    <p>
                    <h5 class="text-primary"><i class="fas fa-pencil-alt"></i>  Description:</h5>    
                    {{$job->description}}</p>

                    <p>
                    <h5 class="text-primary"><i class="fas fa-user-edit"></i>  Duties:</h5>{{$job->duties}}
                </p>
                </div>
                    <br>
                </div>
            </div>
        </div>
        <br> 
        <div class="col-md-12">
        <div class="card">
                <div class="card-header"><h5>{{ __('Short info') }}</h5></div>

                <div class="card-body">

                <p><i class="fas fa-car"></i>  <a href="{{route('dealership.index',[$job->dealership->id,$job->dealership->slug])}}">{{$job->dealership->dname}}</a></p>
                <p><i class="fas fa-map-marker-alt"></i>  {{$job->address}}</p>
                <p><i class="fas fa-business-time"></i>  {{$job->type}}</p>
                <p><i class="fas fa-money-check"></i> {{$job->position}}</p>
                <p><i class="far fa-clock"></i> {{$job->created_at->diffForHumans()}}</p>
                <p><i class="fas fa-lock"></i>  {{date('F d,Y', strtotime($job->last_date))}}</p>
                <p><i class="fas fa-money-bill"></i>  {{$job->salary_range}}</p>
                    
                </div>
            </div>
            <br>
            @if(Auth::check()&&Auth::user()->user_type='seeker')

            @if(!$job->checkApplication())
            <form action="{{route('apply',[$job->id])}}" method="POST">@csrf
            <button type="submit" class="btn btn-success btn-lg" style="width: 100%;">Apply</button>
            </form>
            @endif
            @endif
            
        </div>

    </div>
</div>
@endsection
