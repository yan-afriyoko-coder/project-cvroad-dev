@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/lbs/jquery/3.1.0/jquery.min.js"></script>
{{--Profile picture--}}
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">        

        <div class="col-md-2 border-right">
        
    @if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}
                        </div>@endif</v-container>

        @if(empty(Auth::user()->profile->avatar))
        <img src="{{asset('avatar/account.png')}}" width="100%" style="width: 100%;">

        @else 
        <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" width="100%" style="width: 100%;">

        @endif
        <br><br>

            <form action="{{route('avatar')}}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="card">
                                 <div class="card-header">Profile Photo</div>
                                 <div class="card-body">
                                        <input type="file" class="form-control" name="avatar"><br>
                                    <button class="btn btn-success float-right" type="submit">Update</button>
                                 </div>
                                </div>
                             </form>
            </div>

            {{--Candidate input fields--}}

            <div class="col-md-5 border-right">

            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-right">Update Your Profile</h2>
                </div>
              

                <form action="{{route('profile.create')}}" method="POST">@csrf

    {{--Candidate_Status--}}

                <input type="hidden" value="0" name="profile_status">


                </div>
        <div class="row mt-2">

                                            
      
                        <div class="form-group row">
                            <div class="col-md-6" class="form-group">
                                <label for="name">Name</label>
                                 <input type="text" class="form-control" name="name">
                                 @if($errors->has('name'))
                                 <div class="error" style="color: red;">{{$errors->first('name')}}</div>
                                 @endif
                            </div>

                            <div class="form-group">
                                <label for="surname">Surname</label>
                                 <input type="text" class="form-control" name="surname">
                            </div>
                   
         </div>

            

                            <div class="col-md-12" class="form-group">
                                <label for="title">Current/Last Job Title</label>
                                 <input type="text" class="form-control" name="title">

                                 @if($errors->has('title'))
                                 <div class="error" style="color: red;">{{$errors->first('title')}}</div>
                                 @endif
                            </div>

                            </div>       

                            <br>
              <div class="row mt-10">

                            <div class="col-6" class="form-group">
                            <label for="group_id">Current/Last Dealer Group:</label>
                            <select name="group_id" class="form-control">
                              @foreach(App\Group::all() as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                              @endforeach
                             </select>

                            @if($errors->has('group_id'))
                                 <div class="error" style="color: red;">{{$errors->first('group_id')}}</div>
                                 @endif
                            </div>

             
                            <div class="col-6" class="form-group">
                            <label for="brand_id">Current/Last Brand Worked for:</label>
                            <select name="brand_id" class="form-control">
                              @foreach(App\Brand::all() as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                              @endforeach
                             </select>
                            </div>

              </div>


              <div class="row mt-3">
                            <div class="col" class="form-group">
                            <label for="notice_period">Availability:</label>
                            <select name="notice_period" class="form-control">
                            <option value="">--select--</option>
                            <option value="Immediately">Immediately</option>
                            <option value="two_weeks">2 weeks</option>
                            <option value="1 month">1 month</option>
                            </select>
                            </div>

                            <div class="col" class="form-group">
                            <label for="employment_status">Employment Status:</label>
                            <select name="employment_status" class="form-control">
                            <option value="">--select--</option>
                            <option value="Employed">Employed</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Contract">Contract</option>
                            </select>

                            </div>
                    
   
                            </div>

                            <br>
                           

   <div class="row mt-3">
 
                    
                                        
   <div class="col-5" class="form-group">
                        <label for="category_id">Select Department:</label>
                        <select name="category_id" class="form-control" style="width:250px">
                            <option value="">-- Select--</option>
                            @foreach ($categories as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-3" class="form-group">
                        <label for="title_id">Select Title:</label>
                        <select name="title_id" class="form-control"style="width:250px">
                        <option>--Title--</option>
                        </select>
                    </div>
  
            </div>

            <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="category_id"]').on('change',function(){
               var categoryID = jQuery(this).val();
               if(categoryID)
               {
                  jQuery.ajax({
                     url : '/user/profile/gettitles/' +categoryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="title_id"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="title_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="title_id"]').empty();
               }
            });
    });
    </script>
                            <br>   

    <div class="form-group">                       
    <label for="salary_range">Current/Last basic per month:</label>
    <select class="form-control" name="salary_range">
        <option value="negotiable">Negotiable</option>
        <option value="R6000-R10000">R6000-R10000</option>
        <option value="R10 000 - R20 000">R10 000 - R20 000</option>
        <option value="R20 000 - R30 000">R20 000 - R30 000</option>
        <option value="R30 000 - R40 000">R30 000 - R40 000</option>
        <option value="R50 000 - R60 000">R50 000 - R60 000</option>

        <option value="R60 000 plus">R60 0000 plus</option>
    </select>
</div>


                            <br>
                            <div class="form-group">
                                <label for="bio">About me:</label>
                                <textarea name="bio" class="form-control"></textarea>
                            </div>
    <div class="row mt-1">
                            <div class="col-md-3" class="form-group">
                            <label for="first_language">First Language:</label>
                            <select class="form-control" name="first_language">
                            <option value="None">None</option>
                                <option value="English">English</option>
                                <option value="Afrikaans">Afrikaans</option>
                                <option value="Zulu">Zulu</option>
                                <option value="Xhosa">Xhosa</option>
                                <option value="Sesotho">Sesotho</option>
                                <option value="Northern Sotho">Northern Sotho</option>
                                <option value="Tswana">Tswana</option>
                                <option value="Tsonga">Tsonga</option>
                                <option value="Swati">Swati</option>
                                <option value="Venda">Venda</option>
                                <option value="Ndebele">Ndebele</option>
                                <option value="Sepedi">Sepedi</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Spanish">Spanish</option>
                                <option value="French">French</option>
                                <option value="Arabic">Arabic</option>
                                <option value="Russian">Russian</option>
                                <option value="Portuguese">Portuguese</option>
                                <option value="Italian">Italian</option>
                            </select>
                        </div>

                        <div class="col-md-3" class="form-group">
                        <label for="second_language">Second Language:</label>
                            <select class="form-control" name="second_language">

                                <option value="None">None</option>
                                <option value="English">English</option>
                                <option value="Afrikaans">Afrikaans</option>
                                <option value="Zulu">Zulu</option>
                                <option value="Xhosa">Xhosa</option>
                                <option value="Sesotho">Sesotho</option>
                                <option value="Northern Sotho">Northern Sotho</option>
                                <option value="Tswana">Tswana</option>
                                <option value="Tsonga">Tsonga</option>
                                <option value="Swati">Swati</option>
                                <option value="Venda">Venda</option>
                                <option value="Ndebele">Ndebele</option>
                                <option value="Sepedi">Sepedi</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Spanish">Spanish</option>
                                <option value="French">French</option>
                                <option value="Arabic">Arabic</option>
                                <option value="Russian">Russian</option>
                                <option value="Portuguese">Portuguese</option>
                                <option value="Italian">Italian</option>
                            </select>
                        </div>

                        <div class="col-md-3" class="form-group">
                        <label for="third_language">Third Language:</label>
                            <select class="form-control" name="third_language">
                            <option value="None">None</option>
                                <option value="English">English</option>
                                <option value="Afrikaans">Afrikaans</option>
                                <option value="Zulu">Zulu</option>
                                <option value="Xhosa">Xhosa</option>
                                <option value="Sesotho">Sesotho</option>
                                <option value="Northern Sotho">Northern Sotho</option>
                                <option value="Tswana">Tswana</option>
                                <option value="Tsonga">Tsonga</option>
                                <option value="Swati">Swati</option>
                                <option value="Venda">Venda</option>
                                <option value="Ndebele">Ndebele</option>
                                <option value="Sepedi">Sepedi</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Spanish">Spanish</option>
                                <option value="French">French</option>
                                <option value="Arabic">Arabic</option>
                                <option value="Russian">Russian</option>
                                <option value="Portuguese">Portuguese</option>
                                <option value="Italian">Italian</option>
                            </select>
                        </div>

                        <div class="col-md-3" class="form-group">
                        <label for="fourth_language">Fourth Language:</label>
                            <select class="form-control" name="fourth_language">
                            <option value="None">None</option>
                                <option value="English">English</option>
                                <option value="Afrikaans">Afrikaans</option>
                                <option value="Zulu">Zulu</option>
                                <option value="Xhosa">Xhosa</option>
                                <option value="Sesotho">Sesotho</option>
                                <option value="Northern Sotho">Northern Sotho</option>
                                <option value="Tswana">Tswana</option>
                                <option value="Tsonga">Tsonga</option>
                                <option value="Swati">Swati</option>
                                <option value="Venda">Venda</option>
                                <option value="Ndebele">Ndebele</option>
                                <option value="Sepedi">Sepedi</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Spanish">Spanish</option>
                                <option value="French">French</option>
                                <option value="Arabic">Arabic</option>
                                <option value="Russian">Russian</option>
                                <option value="Portuguese">Portuguese</option>
                                <option value="Italian">Italian</option>
                            </select>
                        </div>
    </div>


<br>

                            <div class="form-group">
                            <label for="driver_liscence">Drivers:</label>
                            <select name="driver_liscence" class="form-control">
                              @foreach(App\Driver::all() as $driver)
                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                              @endforeach
                             </select>

                            @if($errors->has('driver_liscence'))
                                 <div class="error" style="color: red;">{{$errors->first('driver_liscence')}}</div>
                                 @endif
                            </div>

                       
                            

                            <div class="form-group">
                            <label for="province">Province:</label>
                            <select name="province" class="form-control">
                            <option value="">--select--</option>
                              @foreach(App\Province::all() as $province)
                            <option value="{{$province->id}}">{{$province->name}}</option>
                              @endforeach
                             </select>

                            <br>
                            
                         
                        

                            <br>
                            
                         
                            

                            
                            <div class="form-group">
                                <label for="address">City and Area</label>
                                 <input type="text" class="form-control" name="address" placeholder="ie. Johannesburg, Kempton ">
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone number</label>
                                 <input type="text" class="form-control" name="phone_number">
                                 @if($errors->has('phone_number'))
                                 <div class="error" style="color: red;">{{$errors->first('phone_number')}}</div>
                                 @endif
                            </div>


                            
                            <div class="form-group">
                            <p>Gender:</p>
                            <input type="radio" id="male" name="gender" value="Male">
                            <label for="Male">Male</label><br>
                            <input type="radio" id="female" name="gender" value="Female">
                            <label for="Female">Female</label><br>
                            @if($errors->has('gender'))
                                 <div class="error" style="color: red;">{{$errors->first('gender')}}</div>
                                 @endif
                            </div>

                            
                 
                            <div class="form-group">
                                <label for="education">Education:</label>
                                 <textarea name="education" class="form-control"></textarea>
                                 @if($errors->has('education'))
                                 <div class="error" style="color: red;">{{$errors->first('education')}}</div>
                                 @endif
                            </div>

                            <div class="form-group">
                                <label for="software">Dealer Software Experience</label>
                                 <input type="text" class="form-control" name="software">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit"  >Update</button>
                            </div>
                        </div>

                        @if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}
                        </div>@endif</v-container>
                 </div>
                            </div>

</form>
{{--Candidate details--}}
            </div> </div> </div>
                            <div class="col-md-5">

                            <div class="card">
                                <div class="card-header">Your information</div>
                                 <div class="card-body">

                            <strong><p>Name:<br> </strong>{{Auth::user()->name}} {{Auth::user()->surname}}</p>
                            <strong><p>ID No:<br> </strong> {{Auth::user()->profile->identification_number}}</p>
                           <strong> <p>Email:<br> </strong> {{Auth::user()->email}}</p>
                           <strong> <p>Address:<br></strong> {{Auth::user()->profile->address}}</p>
                           <strong> <p>Phone Number:<br></strong> {{Auth::user()->profile->phone_number}}</p>
                           <strong> <p>About:<br></strong> {{Auth::user()->profile->bio}}</p>
                           <strong> <p>Job Title: <br></strong> {{Auth::user()->profile->title}}</p>
                           <strong> <p>Drivers Liscence: <br></strong>{{Auth::user()->profile->driver_liscence}}</p>
                           <strong> <p>Availability: <br></strong> {{Auth::user()->profile->notice_period}}</p>
                           <strong> <p>Province:<br></strong> {{Auth::user()->profile->province}}</p>
                           <strong> <p>Last/Current Car Brand:<br> </strong>{{Auth::user()->profile->brand_id}}</p>
                           <strong>  <p>Last/Current Dealer Group:<br></strong> {{Auth::user()->profile->group_id}}</p>
                           <strong>  <p>Employment Status:<br></strong> {{Auth::user()->profile->employment_status}}</p>
                           <strong>  <p>Experience: <br></strong> {{Auth::user()->profile->experience}}</p>
                           <strong>  <p>Member since: <br> </strong>{{date('F d Y',strtotime(Auth::user()->created_at))}}</p>

                           <strong> <p>Files and Attachments:</p> </strong>

                            @if(!empty(Auth::user()->profile->cover_letter))
                            <p><a href="{{Storage::url(Auth::user()->profile->cover_letter)}}"> Cover Letter </a> </p>
                            @else
                             <p> Please uploud cover letter </p>
                           @endif

                           @if(!empty(Auth::user()->profile->cv))
                            <p><a href="{{Storage::url(Auth::user()->profile->cv)}}"> CV </a> </p>
                            @else
                             <p> Please uploud CV </p>
                           @endif

                           @if(!empty(Auth::user()->profile->certificates))
                            <p><a href="{{Storage::url(Auth::user()->profile->certificates)}}"> Certificates </a> </p>
                            @else
                             <p> Please uploud your Certificates </p>
                           @endif

                           
                           @if(!empty(Auth::user()->profile->payslips))
                            <p><a href="{{Storage::url(Auth::user()->profile->payslips)}}"> Payslips </a> </p>
                            @else
                             <p> Please uploud your Payslips </p>
                           @endif

                           @if(!empty(Auth::user()->profile->other_documents))
                            <p><a href="{{Storage::url(Auth::user()->profile->other_documents)}}"> Other Documents </a> </p>
                            @else
                             <p> Please uploud your Documents </p>
                           @endif

{{--Upload folders and buttons--}}
                            

                                 </div>
                              </div>
                        <br>

                        <form action="{{route('cover.letter')}}" method="POST" enctype="multipart/form-data">@csrf
                              <div class="card">
                                <div class="card-header">Update Cover Letter</div>
                                 <div class="card-body">
                                        <input type="file" class="form-control" name="cover_letter"><br>
                                    <button class="btn btn-success float-right" type="submit">Update</button>
                                 </div>
                              </div>
                        </form>
                        <br>

                        <form action="{{route('cv')}}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="card">        
                                    <div class="card-header">Update CV</div>
                                         <div class="card-body">
                                        <input type="file" class="form-control" name="cv"><br>
                                    <button class="btn btn-success float-right" type="submit">Update</button>
                                    @if($errors->has('cv'))
                                 <div class="error" style="color: red;">{{$errors->first('cv')}}</div>
                                 @endif 
                                </div>
                                </div>
                        </form>

                             <br>

                             <form action="{{route('certificates')}}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="card">
                                 <div class="card-header">Certificates</div>
                                 <div class="card-body">
                                        <input type="file" class="form-control" name="certificates"><br>
                                    <button class="btn btn-success float-right" type="submit">Update</button>
                                 </div>
                                </div>
                             </form>
                       
                                    <br>

                                    <form action="{{route('payslips')}}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="card">
                                 <div class="card-header">Payslips</div>
                                 <div class="card-body">
                                        <input type="file" class="form-control" name="payslips"><br>
                                    <button class="btn btn-success float-right" type="submit">Update</button>
                                 </div>
                                </div>
                                    </form>

                                    <br>

                                    <form action="{{route('other_documents')}}" method="POST" enctype="multipart/form-data">@csrf
                                 <div class="card">
                                 <div class="card-header">Other Documents</div>
                                 <div class="card-body">
                                        <input type="file" class="form-control" name="other_documents"><br>
                                    <button class="btn btn-success float-right" type="submit">Update</button>
                                 </div>
                                </div>
                                    </form>


                              </div>






                            </div>
    </div>
</div>
@endsection
