@extends('layouts.main')

@section('content')

@section('styles')
@endsection

<br><br><br><br><br><br><br><br>

{{--Profile picture--}}
<div class="container">
    <div class="row">        

        <div class="col-md-2">
        
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

            <div class="col-md-5">

            <div class="card">
                <div class="card-header">Update Your Profile</div>

                <form action="{{route('profile.create')}}" method="POST">@csrf

                <div class="card-body">

                <h6 ><strong>Quick Info: </strong></h6>
                            <div class="form-group">
                                <label for="name">Name</label>
                                 <input type="text" class="form-control" name="name" value="{{Auth::user()->profile->name}}">
                                 @if($errors->has('name'))
                                 <div class="error" style="color: red;">{{$errors->first('name')}}</div>
                                 @endif
                            </div>

                            <div class="form-group">
                                <label for="surname">Surname</label>
                                 <input type="text" class="form-control" name="surname"value="{{Auth::user()->profile->surname}}">
                            </div>

                            <div class="form-group">
                                <label for="title">Current/Last Job Title</label>
                                 <input type="text" class="form-control" name="title"value="{{Auth::user()->profile->title}}">

                                 @if($errors->has('title'))
                                 <div class="error" style="color: red;">{{$errors->first('title')}}</div>
                                 @endif
                            </div>
                            <div class="form-group">
                            <label for="race">Race:</label>
                            <select class="form-control" name="race">
                            <option value="">--Select--</option>
                            <option value="Black">Black</option>
                            <option value="White">White</option>
                            <option value="Colored">Colored</option>
                            <option value="Indian">Indian</option>
    </select>
</div>




                            <div class="form-group">
                            <label for="group_id">Current/Last Dealer Group:</label>
                            <select name="group_id" class="form-control">
                            <option value="">--Select--</option>
                              @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                              @endforeach
                             </select>

                            @if($errors->has('group_id'))
                                 <div class="error" style="color: red;">{{$errors->first('group_id')}}</div>
                                 @endif
                            </div>


                            <div class="form-group">
                            <label for="category_id">Department:</label>
                            <select name="category_id" class="form-control">
                            <option value="">--Select--</option>
                              @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                              @endforeach
                             </select>

                             <br>
                            <div class="form-group">
                            <label for="brand_id">Current or Last Brand Worked for:</label>
                            <select name="brand_id" class="form-control">
                            <option value="">--Select--</option>
                              @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                              @endforeach
                             </select>

                             <div class="form-group">

                             <br>
    <label for="salary_range">Current/Last basic per month:</label>
    <select class="form-control" name="salary_range">
    <option value="">--Select--</option>
        <option value="negotiable">Negotiable</option>
        <option value="R6000-R10000">R6000-R10000</option>
        <option value="R10 000 - R20 000">R10 000 - R20 000</option>
        <option value="R20 000 - R30 000">R20 000 - R30 000</option>
        <option value="R30 000 - R40 000">R30 000 - R40 000</option>
        <option value="R50 000 - R60 000">R50 000 - R60 000</option>
        <option value="R60 000 plus">R60 0000 plus</option>
    </select>
</div>

<h6 ><strong>Employment History: </strong></h6>

<div class="form-group">
                                <label for="employer_job1">Last/Current Employer</label>
                                 <input type="text" class="form-control" name="employer_job1" placeholder=" ie. Audi Sandton" value="{{Auth::user()->profile->employer_job1}}">

                                 @if($errors->has('employer_job1'))
                                 <div class="error" style="color: red;">{{$errors->first('title_job1')}}</div>
                                 @endif
                            </div>

                               <div class="form-group">
                                <label for="title_job1">Last Job Title</label>
                                 <input type="text" class="form-control" name="title_job1" placeholder=" ie. Sales Executive" value="{{Auth::user()->profile->title_job1}}" >

                                 @if($errors->has('title_job1'))
                                 <div class="error" style="color: red;">{{$errors->first('title_job1')}}</div>
                                 @endif
                            </div>

                            <div class="form-group">
                                <label for="date_job1">Employment Dates</label>
                                 <input type="text" class="form-control" name="date_job1" placeholder=" ie. Jan 2010- Oct 2020" value="{{Auth::user()->profile->date_job1}}" >

                                 @if($errors->has('date_job1'))
                                 <div class="error" style="color: red;">{{$errors->first('date_job1')}}</div>
                                 @endif
                            </div>

                            <h6 ><strong>History Continued: </strong></h6>


                            <label for="employer_job2"> Previous  Employer</label>
                                 <input type="text" class="form-control" name="employer_job2" placeholder=" ie. Audi Sandton" value="{{Auth::user()->profile->employer_job2}}">

                                 @if($errors->has('employer_job1'))
                                 <div class="error" style="color: red;">{{$errors->first('title_job1')}}</div>
                                 @endif
                            </div>

                               <div class="form-group">
                                <label for="title_job2">Previous Job Title</label>
                                 <input type="text" class="form-control" name="title_job2" placeholder=" ie. Sales Executive" value="{{Auth::user()->profile->title_job2}}" >

                                 @if($errors->has('title_job2'))
                                 <div class="error" style="color: red;">{{$errors->first('title_job2')}}</div>
                                 @endif
                            </div>

                            <div class="form-group">
                                <label for="date_job2"> Previous Employment Dates</label>
                                 <input type="text" class="form-control" name="date_job2" placeholder=" ie. Jan 2010- Oct 2020" value="{{Auth::user()->profile->date_job2}}">

                                 @if($errors->has('date_job2'))
                                 <div class="error" style="color: red;">{{$errors->first('date_job2')}}</div>
                                 @endif
                            </div>

                            <br>
                            <h6 ><strong>Personal Info: </strong></h6>

                            <br>

                            
                            <div class="form-group">
                                <label for="bio">About me:</label>
                                <textarea name="bio" class="form-control" >{{Auth::user()->profile->bio}}</textarea>
                            </div>



    <div class="form-group">
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

<div class="form-group">
                           

                           <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl1" id="fl1" value="25">
  <label class="form-check-label" for="fl1">Basic</label>
</div>
                           <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl1" id="fl1" value="50">
  <label class="form-check-label" for="fl1">Proficient</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl1" id="fl1" value="65">
  <label class="form-check-label" for="fl1">Fluent</label>
  </div>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl1" id="fl1" value="100">
  <label class="form-check-label" for="fl1">Native</label>
  </div>
  
  <br>  <br>  
                        
<div class="form-group">
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
<div class="form-group">
                           
                           

                           <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl2" id="fl2" value="25">
  <label class="form-check-label" for="fl1">Basic</label>
</div>
                           <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl2" id="fl2" value="50">
  <label class="form-check-label" for="fl1">Proficient</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl2" id="fl2" value="65">
  <label class="form-check-label" for="fl1">Fluent</label>
  </div>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl2" id="fl2" value="100">
  <label class="form-check-label" for="fl1">Native</label>
  </div></div>
  <br>  <br> 

  
  <div class="form-group">
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

<div class="form-group">
                           

                           <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl3" id="fl3" value="25">
  <label class="form-check-label" for="fl1">Basic</label>
</div>
                           <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl3" id="fl3" value="50">
  <label class="form-check-label" for="fl1">Proficient</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl3" id="fl3" value="65">
  <label class="form-check-label" for="fl1">Fluent</label>
  </div>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl3" id="fl3" value="100">
  <label class="form-check-label" for="fl1">Native</label>
  </div>
  
  <br>  <br> 


<div class="form-group">
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

<div class="form-group">
                           

                           <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl4" id="fl4" value="25">
  <label class="form-check-label" for="fl1">Basic</label>
</div>
                           <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl4" id="fl4" value="50">
  <label class="form-check-label" for="fl1">Proficient</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl4" id="fl4" value="65">
  <label class="form-check-label" for="fl1">Fluent</label>
  </div>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="fl4" id="fl4" value="100">
  <label class="form-check-label" for="fl1">Native</label>
  </div>
  
  <br>  <br> 



                            <div class="form-group">
                            <label for="driver_liscence">Drivers:</label>
                            <select name="driver_liscence" class="form-control">
                            <option value="">--Select--</option>
                              @foreach($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                              @endforeach
                             </select>

                            @if($errors->has('driver_liscence'))
                                 <div class="error" style="color: red;">{{$errors->first('driver_liscence')}}</div>
                                 @endif
                            </div>


                            
                            <div class="form-group">
                             <p>Availability:</p>
                            <input type="radio" id="immediately" name="notice_period" value="Immediate's">
                            <label for="Immediate">Immediately</label><br>
                            <input type="radio" id="two_weeks" name="notice_period" value="two weeks">
                            <label for="two_weeks">2 weeks</label><br>
                            <input type="radio" id="month" name="notice_period" value=" 1 months">
                            <label for=" 1 month">1 Month</label><br>
                            @if($errors->has('notice_period'))
                                 <div class="error" style="color: red;">{{$errors->first('notice_period')}}</div>
                                 @endif
                            </div>

                            <div class="form-group">
                            <label for="province">Province:</label>
                            <select name="province" class="form-control">
                            <option value="">--Select--</option>
                              @foreach($provinces as $province)
                            <option value="{{$province->name}}">{{$province->name}}</option>
                              @endforeach
                             </select>

                            <br>
                            
                         

                            
                            <div class="form-group">
                            <p>Employment Status:</p>
                            <input type="radio" id="employed" name="employment_status" value="Employed">
                            <label for="Employed">Employed</label><br>
                            <input type="radio" id="unemployed" name="employment_status" value="Unemployed">
                            <label for="Unemployed">Unemployed</label><br>
                            <input type="radio" id="contract" name="employment_status" value="contract">
                            <label for="Contract">Contract</label><br>
                            @if($errors->has('employment_status'))
                                 <div class="error" style="color: red;">{{$errors->first('employment_status')}}</div>
                                 @endif
                            </div>
                            

                          
                            <div class="form-group">
                                <label for="address">City and Area</label>
                                 <input type="text" class="form-control" name="address" placeholder="ie. Johannesburg, Kempton Park"value="{{Auth::user()->profile->address}}">
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone number</label>
                                 <input type="text" class="form-control" name="phone_number"value="{{Auth::user()->profile->phone_number}}">
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
                                <label for="education">Education</label>
                                <textarea name="education" class="form-control" id="editor" ></textarea>
                            </div>

                            <div class="form-group">
                            <label for="profile_status">Set my profile to be seen by dealers:</label>
    <select class="form-control" name="status">
        <option value="1">Live</option>
        <option value="0">Offline</option>
    </select>
</div>

                            </div>

                            <div class="form-group">
                                <label for="software">Dealer Software Experience</label>
                                 <input type="text" class="form-control" name="software"value="{{Auth::user()->profile->software}}">
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

                            <div class="form-group">
    

</form>
</div>
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
                        <a href="{{asset('storage/files')}}/{{Auth::user()->profile->cv}}" class="btn btn-success">Download CV</a>


                        <!--src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}"-->

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

<br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

@push('scripts')

<script src="{{asset('external/ckeditor5-build-classic/ckeditor.js')}}"></script>
<script>
  
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endpush