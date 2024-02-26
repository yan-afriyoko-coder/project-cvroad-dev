@extends('layouts.user_type.auth')
@section('content')

<!-- Logo Modal -->
<div class="modal fade" id="updatePictureModal" tabindex="-1" aria-labelledby="updatePictureModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updatePictureModalLabel">Update Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('avatar')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">        
          @csrf
          <div class="form-group">
            <label for="cover_photo">Logo</label>
            <input type="file" class="form-control" name="avatar">
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-main">Save changes</button>
      </div>
    </form>
    </div>
</div>
</div>
<main>
    <div class="main">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="underscore mb-5">Edit <span class="green">Profile</span></h2>
                  <div class="line"></div>

                  <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div  class="card">
                        <div class="card-header">
                          <h4>Personal Information</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="team-person py-3 text-center">
                                <div class="person">                      
                                  <div class="photo">
                                    @if(Auth::user()->profile->avatar)
                                      <img src="{{asset('uploads/avatar/'. Auth::user()->profile->avatar)}}" width="200px">
                                    @else  
                                      <img src="{{asset('uploads/avatar/account.png')}}" width="200px" alt="">
                                    @endif
                                    <br>
                                    <button type="button" class="btn btn-main mt-2" data-bs-toggle="modal" data-bs-target="#updatePictureModal"> <i class="fas fa-edit"></i> Update Avatar </button>                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-9">
                              <div class="form-group mt-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->profile->name}}">
                              </div>
                              <div class="form-group mt-2">
                                <label for="name">Surname</label>
                                <input type="text" class="form-control" name="surname" value="{{Auth::user()->profile->surname}}">
                              </div>                              
                              <div class="form-group mt-2">
                                <label for="title">Gender</label>
                                <select name="gender" id="" class="form-control">
                                  <option {{Auth::user()->profile->gender === "Male" ? 'selected' : ''}} >Male</option>
                                  <option {{Auth::user()->profile->gender === "Female" ? 'selected': ''}} >Female</option>
                                </select>
                              </div>
                              <div class="form-group mt-2">
                                <label for="race">Race</label>
                                <select name="race" id="" class="form-control">
                                  <option value="Black" {{Auth::user()->profile->race == "Black" ? 'selected' : '' }} >Black</option>
                                  <option value="Coloured" {{Auth::user()->profile->race == "Coloured" ? 'selected' : '' }}>Coloured</option>
                                  <option value="Indian" {{Auth::user()->profile->race == "Indian" ? 'selected' : '' }}>Indian</option>                              
                                  <option value="White" {{Auth::user()->profile->race == "White" ? 'selected' : '' }}>White</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mt-2">
                        <div class="card-header">
                          <h4>Work Information</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group">
                            <label for="group_id">Group</label>
                            <select name="group_id" id="" class="form-control">
                              @foreach ( $groups as $group)
                              <option value="{{$group->id}}" {{Auth::user()->profile->group->id === $group->id ? 'selected' : ''}}>{{$group->name}}</option>                                
                              @endforeach                              
                            </select>
                          </div>
                          <div class="form-group mt-2">
                            <label for="title">Current Job Title</label>
                            <input type="text" class="form-control" name="title" value="{{Auth::user()->profile->title}}">
                          </div>

                          <div class="form-group mt-2">
                            <label for="group_id">Department</label>
                            <div class="form-control">
                              <select name="category_id" class="form-control" id="">
                                @foreach ($cats as $cat)
                                <option value="{{$cat->id}}" {{Auth::user()->profile->category_id === $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>                                 
                                @endforeach
                                <option value=""></option>
                              </select>
                            </div>
                          </div>


                          <div class="form-group mt-2">
                            <label for="group_id">Current / Last Brand</label>
                            <div class="form-control">
                              <select name="brand_id" class="form-control" id="">
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}" {{Auth::user()->profile->brand_id === $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>                                 
                                @endforeach
                                <option value=""></option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group mt-2">
                            <label for="salary_range">Current/Last basic per month:</label>
                            <select class="form-control" name="salary_range" class="form-control">                            
                                <option value="negotiable" {{Auth::user()->profile->slary_range === "negotiable" ? 'selected' : '' }}>Negotiable</option>
                                <option value="R6000 - R10000" {{Auth::user()->profile->slary_range === "R6000-R10000" ? 'selected' : '' }}>R6000-R10000</option>
                                <option value="R10 000 - R20 000" {{Auth::user()->profile->slary_range === "R10 000 - R20 000" ? 'selected' : '' }}>R10 000 - R20 000</option>
                                <option value="R20 000 - R30 000" {{Auth::user()->profile->slary_range === "R20 000 - R30 000" ? 'selected' : '' }}>R20 000 - R30 000</option>
                                <option value="R30 000 - R40 000" {{Auth::user()->profile->slary_range === "R30 000 - R40 000" ? 'selected' : '' }}>R30 000 - R40 000</option>
                                <option value="R50 000 - R60 000" {{Auth::user()->profile->slary_range === "R50 000 - R60 000" ? 'selected' : '' }}>R50 000 - R60 000</option>
                                <option value="R60 000 plus" {{Auth::user()->profile->slary_range === "R60 000 plus" ? 'selected' : '' }}>R60 0000 plus</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="card mt-2">
                        <div class="card-header">
                          <h5>Languages</h5>
                        </div>
                        <div class="card-body">
                          <div class="form-group">
                            <label for="bio">About me</label>
                            <textarea name="bio" class="form-control" cols="30" rows="10"></textarea>
                          </div>

                          <div class="card-body">
                            <div class="row">                              
                              <div class="col-md-3 mt-2">
                                <div class="form-group"> 
                                  <label for="first_language">First Language</label>
                                  <select name="first_language" class="form-control">
                                    <option value="" disabled>Select Language</option>
                                    @foreach ($languages as $language)
                                    <option value="{{$language->name}}" {{Auth::user()->profile->first_language === $language->name ? 'selected' : ''}}>{{$language->name}}</option>                                    
                                    @endforeach
                                    <option value=""></option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="">Level</label>
                                  <select name="fl1" class="form-control">                                    
                                    @foreach ($fls as $language)
                                    <option value="{{$language['value']}}" {{$language['value'] === Auth::user()->profile->fl1 ? 'selected' : '' }}>{{$language['level']}}</option>                                      
                                    @endforeach
                                  </select>
                                </div>                                
                              </div>

                              <div class="col-md-3 mt-2">
                                <div class="form-group"> 
                                  <label for="second_language">Second Language</label>
                                  <select name="second_language" class="form-control">
                                    <option value="" disabled>Select Language</option>
                                    @foreach ($languages as $language)
                                    <option value="{{$language->name}}" {{Auth::user()->profile->second_language === $language->name ? 'selected' : ''}}>{{$language->name}}</option>                                    
                                    @endforeach
                                    <option value=""></option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="fl2">Level</label>
                                  <select name="fl2" class="form-control">
                                    <option value="" disabled>Select Level</option>
                                    @foreach ($fls as $language)
                                    <option value="{{$language['value']}}" {{$language['value'] === Auth::user()->profile->fl2 ? 'selected' : '' }}>{{$language['level']}}</option>                                      
                                    @endforeach
                                  </select>
                                </div>                                
                              </div>

                              <div class="col-md-3 mt-2">
                                <div class="form-group"> 
                                  <label for="third_language">Third Language</label>
                                  <select name="third_language" class="form-control">
                                    <option value="" disabled>Select Language</option>
                                    @foreach ($languages as $language)
                                    <option value="{{$language->name}}" {{Auth::user()->profile->third_language === $language->name ? 'selected' : ''}}>{{$language->name}}</option>                                    
                                    @endforeach
                                    <option value=""></option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="fl3">Level</label>
                                  <select name="fl3" class="form-control">
                                    <option value="" disabled>Select Level</option>
                                    @foreach ($fls as $language)
                                    <option value="{{$language['value']}}" {{$language['value'] === Auth::user()->profile->fl3 ? 'selected' : '' }}>{{$language['level']}}</option>                                      
                                    @endforeach
                                  </select>
                                </div>                                
                              </div>

                              <div class="col-md-3 mt-2">
                                <div class="form-group"> 
                                  <label for="fourth_language">Fourth Language</label>
                                  <select name="fourth_language" class="form-control">
                                    <option value="" disabled>Select Language</option>
                                    @foreach ($languages as $language)
                                    <option value="{{$language->name}}" {{Auth::user()->profile->fourth_language === $language->name ? 'selected' : ''}}>{{$language->name}}</option>                                    
                                    @endforeach
                                    <option value=""></option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="fl4">Level</label>
                                  <select name="fl4" class="form-control">
                                    <option value="" disabled>Select Level</option>
                                    @foreach ($fls as $language)
                                    <option value="{{$language['value']}}" {{$language['value'] === Auth::user()->profile->fl4 ? 'selected' : '' }}>{{$language['level']}}</option>                                      
                                    @endforeach
                                  </select>
                                </div>                                
                              </div>
                            </div>
                            
                          </div>
                          
                        </div>
                      </div>
                      
                      <div class="card mt-2">
                        <div class="card-header">
                          <h5>Update Documents</h5>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4 mb-2">
                              <div class="from-group">
                                <label for="cover_letter">Cover Letter</label>
                                <input type="file" name="cover_letter" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4 mb-2">
                              <div class="from-group">
                                <label for="cv">Resume</label>
                                <input type="file" name="cv" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4 mb-2">
                              <div class="from-group">
                                <label for="cv">Certificates</label>
                                <input type="file" name="certificates" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4 mb-2">
                              <div class="from-group">
                                <label for="cv">Payslips</label>
                                <input type="file" name="payslips" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4 mb-2">
                              <div class="from-group">
                                <label for="cv">Other Documents</label>
                                <input type="file" name="other_documents" class="form-control">
                              </div>
                            </div>


                          </div>
                        </div>
                      </div>    
                  </div>
                    <br>
                    <button type="submit" class="main-btn">Update Profile</button>
                    
                  </form>
            </div>
        </div>
      </div>
    </div>
</main>        


@endsection