@extends('layouts.main')

@section('content')
<br><br><br><br><br><br>

{{--Profile picture--}}
<div class="container">
    <div class="row">        
        <div class="col-md-2">
        

        @if(empty(Auth::user()->dealership->logo))
        <img src="{{asset('avatar/account.png')}}" width="100%" style="width: 100%;">

        @else 
        <img width="100" src="{{asset('uploads/logo')}}/{{Auth::user()->dealership->logo}}">

        @endif
        <br><br>

            <form action="{{route('dealership.logo')}}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="card">
                                 <div class="card-header">Dealer Logo</div>
                                 <div class="card-body">
                                        <input type="file" class="form-control" name="logo"><br>
                                    <button class="btn btn-dark float-right" type="submit">Update</button>
                                 </div>
                                </div>
                             </form>
            </div>

            {{--Dealership input fields--}}

            <div class="col-md-6">

            <div class="card">
                <div class="card-header">Update Your Dealership Information</div>
                <div class="card-body">

                <form action="{{route('dealership.store')}}" method="POST">@csrf
                <br>
                <div class="form-group">
                    <label for="province">Province:</label>
                    <select name="province" class="form-control">
                    @foreach($provinces as $prov)
                    <option value="{{$prov->id}}">{{$prov->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="group_id">Group:</label>
                    <select name="group_id" class="form-control">
                    @foreach($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                    </select>
                </div>

              
                            <div class="form-group">
                                <label for="">Address</label>
                                 <input type="text" class="form-control" name="address" value="{{Auth::user()->dealership->address}}"> 
                                 @if($errors->has('address'))
                                 <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                                 @endif
                            </div>

                            <div class="form-group">
                                <label for="">Phone:</label>
                                 <input type="text" class="form-control" name="phone" value="{{Auth::user()->dealership->phone}}">
                            </div>

                            <div class="form-group">
                                <label for="">Website:</label>
                                 <input type="text" class="form-control" name="website" value="{{Auth::user()->dealership->website}}" >

                                 @if($errors->has('website'))
                                 <div class="error" style="color: red;">{{$errors->first('website')}}</div>
                                 @endif
                            </div>

                            
                            <div class="form-group">
                                <label for="">Slogan</label>
                                 <input type="text" class="form-control" name="slogan" value="{{Auth::user()->dealership->slogan}}">
                                 @if($errors->has('driver_liscence'))
                                 <div class="error" style="color: red;">{{$errors->first('driver_liscence')}}  </div>
                                 @endif
                            </div>
                            
                           

                            <div class="form-group">
                                <label for="">Description:</label>
                                <textarea name="description" class="form-control" >{{Auth::user()->dealership->description}}</textarea>
                            </div>

                         
                             <div class="form-group">
                                <button class="btn btn-dark" type="submit"  >Update</button>
                            </div>
                        </div>

                        @if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}
                        </div>@endif</v-container>
                 </div>
                


</form>
{{--Dealership details--}}
          </div>
                            <div class="col-md-3">

                            <div class="card">
                                <div class="card-header">About your Dealership:</div>
                                 <div class="card-body">
                                
                                 <strong><p>Dealership Name:<br> </strong>{{Auth::user()->dealership->dname}}</p>
                                 <strong><p>Address:<br> </strong>{{Auth::user()->dealership->address}}</p>
                                 <strong><p>Phone:<br> </strong>{{Auth::user()->dealership->phone}}</p>
                                 <strong><p>Website:<br> </strong><a href="{{Auth::user()->dealership->website}}">{{Auth::user()->dealership->website}}</a></p>
                                 <strong><p>Slogan:<br> </strong>{{Auth::user()->dealership->slogan}}</p>
                                 
                                 <strong><p>Description:<br> </strong>{{Auth::user()->dealership->description}}</p>

                                 <strong><p>View My Dealer Profile:<br> </strong></p>
                                 <p><a href="dealership/{{Auth::user()->dealership->slug}}">View</a></p>
                    
                                
                              
                            </div>
            </div>
                            <br>

                            <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">Update Banner Image</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cover_photo"><br>
                    <button class="btn btn-dark float-right" type="submit">Update</button>
                </div>
            </div>
        </form>
                            
    </div>
</div>
</div>
<br><br><br><br><br><br>
@endsection
