@extends('layouts.app')

@section('content')
<div class="container">

<div class="col-md-12" >
    <div class="company-profile">

    @if(empty($dealership->cover_photo))
                           
    <img src="{{asset('company/cover_photo.png')}}" style="width: 100%">

                               @else
                          
   <img src="{{asset('uploads/coverphoto')}}/{{$dealership->cover_photo}}" style="width: 100%;">

                           @endif


    <div class="company-desc">
    <br>
    @if(empty($dealership->logo))
    <img src="{{asset('company/authorized-dealer.png')}}" style="width: 10%">
    
    @else

    <img width="100" src="{{asset('uploads/logo')}}/{{$dealership->logo}}" >
    @endif

    <br>
   <br>
    <h1>{{$dealership->dname}}</h1>

    <p>{{$dealership->description}}</p>

    <p>Slogan-{{$dealership->slogan}}&nbsp;Address-{{$dealership->address}}&nbsp; Phone-{{$dealership->phone}}&nbsp; Website-{{$dealership->website}}&nbsp;</p>


   </div>
   </div>
   <h1>Vacancies:</h1>
   <br>
   <table class="table">
        <thead>
            <th></th>
            <th>Position</th>
            <th>Address</th>
            <th>Date </th>
            <th></th>
        </thead>
<tbody>

@foreach($dealership->jobs as $job )
  
    <tr>
        <td><img src="{{asset('avatar/job.png')}}" width="80"></td>
        <td>Position: {{$job->position}}
    <br>
    <i class="far fa-clock"></i>&nbsp;{{$job->type}}

        </td>
        <td> <i class="fas fa-map-marker-alt"></i>&nbsp; Address:{{$job->address}}</td>
        <td>
        <i class="far fa-clock"></i>&nbsp;Date:&nbsp;{{$job->created_at->diffForHumans()}}</td>
        
        <td>
            <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
        <button class="btn btn-success">Apply </button>
                                                </a>
    
    </td>
           
    </tr>

@endforeach

</tbody>
        </table>

    </div>

</div>
  
@endsection
