@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row" id="app">
          <div class="title" style="margin-top: 20px;">
             
          </div>

      @if(empty($dealership->cover_photo))


   <img src="{{asset('cover/520a34e3500f4_thumb900.jpg')}}" style="width:100%;">

   @else
<img src="{{asset('uploads/coverphoto')}}/{{$dealership->cover_photo}}" style="width: 100%;">


   @endif

          <div class="col-lg-12">
            
            
            <div class="p-4 mb-8 bg-white">
              
			        <div class="$dealership--desc">		
		

			

			
             

		


            
                <h1>{{$dealership->dname}}</h1>
                <p>Company info:</p>
                <p>{{$dealership->description}}</p>
                <p>Slogan-{{$dealership->slogan}}<br>Address-{{$dealership->address}}&nbsp; <br>Phone-{{$dealership->phone}}&nbsp;<br> Website-{{$dealership->website}}</p>

            </div>

        </div>
        <p>Posted Jobs by {{$dealership->dname}} :</p>
        <table class="table">
            
            <tbody>
                @foreach($dealership->jobs as $job)
                <tr>
                    <td>
                        @if(empty($dealership->logo))

                    <img width="100" src="{{asset('company/authorized-dealer.png')}}">

                     @else
                        <img width="100" src="{{asset('uploads/logo')}}/{{$dealership->logo}}">


                @endif



                    </td>
                    <td>Position:{{$job->position}}
                        <br>
                        <i class="fa fa-clock-o"aria-hidden="true"></i>&nbsp;{{$job->type}}
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address:{{$job->address}}</td>
                    <td><i class="fa fa-globe"aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success btn-sm">     Apply
                            </button>
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
@endsection
