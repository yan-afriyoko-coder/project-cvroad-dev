@extends('layouts.user_type.auth')
@section('content')
<main>


    <div class="main">
        @component('components.header', ['dealership' => $dealership])        
        @endcomponent

      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="underscore mb-5">My  <span class="green">Dealer</span></h2>
                  <div class="line"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center mb-2">
                        <h6>{{$dealership->dname}}</h6>
                    </div>
                    <div class="card-body text-center">
                        <img class="mx-auto" src="{{asset('uploads/coverphoto/'.$dealership->cover_photo)}}" style="max-width: 100%" alt="">
                        <br>
                        <img class="mx-auto mt-2" src="{{asset('uploads/logo/'.$dealership->logo)}}" style="max-width: 50%" alt="">
                        <p>
                            {{$dealership->description}}
                        </p>
                        
                    </div>
                </div>               
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6>Dealership Information</h6>                        
                    </div>
                    <div class="card-body">
                        <p><strong>Dealership Name: </strong>{{$dealership->dname}}</p>
                        <p><strong>Province: </strong>{{$dealership->province}}</p>
                        <p><strong>Group: </strong>{{$dealership->group->name}}</p>
                        <p><strong>Address: </strong>{{$dealership->address}}</p>
                        <p><strong>Phone: </strong>{{$dealership->phone}}</p>
                        <p><strong>Website: </strong>{{$dealership->website}}</p>
                        <p><strong>Slogan: </strong>{{$dealership->slogan}}</p>
                        <br>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row mt-3">
            <div class="col-md-12">
                  <a href="{{route('dealership.edit')}}" class="btn btn-main"><i fas fa-edit></i> Edit Dealer</a>  
            </div>
        </div>   

            
            
        
      </div>
    </div>
</main>        


@endsection