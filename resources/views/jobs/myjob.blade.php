@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <br>    <br>    <br>    <br>    <br>    <br>
            <div class="card">

           
                <div class="card-header"><h5>{{ __('My Jobs') }}</div>

                <div class="card-body">
               
                <table class="table">
        <thead>
            <th></th>
            <th>Position</th>
            <th></th>
            <th>Date </th>
            <th></th>
        </thead>
<tbody>

@foreach($jobs as $job )
  
    <tr>
        <td>    
     
        @if(empty(Auth::user()->dealership->logo))
        <img width="100" src="{{asset('avatar/account.png')}}">

        @else 
        <img width="100" src="{{asset('uploads/logo')}}/{{Auth::user()->dealership->logo}}">

        @endif
    
    
    </td>
        <td>Position: {{$job->position}}
    <br>
    <i class="far fa-clock"></i>&nbsp;{{$job->type}}

        </td>
        <td> <i class="fas fa-map-marker-alt"></i>&nbsp; Address:{{$job->address}}</td>
        <td>
        <i class="far fa-clock"></i>&nbsp;Date:&nbsp;{{$job->created_at->diffForHumans()}}</td>
        
        <td>
         <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
        <button class="btn btn-success">View</button>
                                                </a>

        <a href="{{route('jobs.edit',[$job->id])}}">
        <button class="btn btn-dark">Edit</button>
                                                </a>                              
                                            
    
    </td>
           
    </tr>

@endforeach

</tbody>
        </table>



                </div>
            </div>
        </div>
    </div>
</div>
<br>    <br>    <br>    <br>    <br>    <br>
@endsection
