@extends('layouts.user_type.auth')
@section('content')
<main>
    <div class="main">
        <!-- Header Section -->
      <header class="jumbotron jumbotron-fluid text-center mb-5" style="background-image: url({{asset('uploads/coverphoto/'.$dealership->cover_photo)}}); background-size: cover; background-position: center;">
        <div class="header-overlay">
          <div class="container">
            <img src="{{asset('uploads/logo/'.$dealership->logo)}}" class="header-logo" alt="">      
            <p class="lead">{{$dealership->dname}}</p>      
          </div>
        </div>  
      </header>
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    {{$errors->first()}}
                </div>            
                @endif
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        {{session('success')}}
                  </div>
                @endif
            </div>        
        </div> 
        <div class="row">            
            <div class="col-md-12">
                <h2 class="underscore mb-5">Post <span class="green">Job</span></h2>
                  <div class="line"></div>
            </div>
            <div class="col-md-12">
              <form action="{{route('job.create')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-6">
                          <!--title-->
                          <div class="form-group mt-3">
                              <label for="title">Vacany Title</label>
                              <input type="text" name="title" class="form-control" required>
                          </div>

                          <!--Department-->
                          <div class="form-group mt-3">
                              <label for="title">Department</label>
                              <select name="category_id" class="form-control" required>
                                <option value="" selected disabled>Select category</option>                                 
                                  @foreach ($categories as $cat)
                                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                                  @endforeach
                              </select>                                
                          </div>

                          <!--Province-->
                          <div class="form-group mt-3">
                              <label for="title">Province</label>
                              <select name="province" class="form-control" required>
                                <option value="" selected disabled>Select province</option>                                 
                                  @foreach ($provinces as $province)
                                      <option value="{{$province->name}}" >{{$province->name}}</option>
                                  @endforeach
                              </select>                                
                          </div>

                          <!--Brand-->
                          <div class="form-group mt-3">
                            <label for="brand_id">Brand</label>
                            <select name="brand_id" id="" class="form-control">
                                <option value="" selected disabled></option>                                 
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" >{{$brand->name}}</option>
                                @endforeach
                            </select>  
                          </div>

                          <!--position-->
                          <div class="form-group mt-3">
                              <label for="title">Position</label>
                              <input type="text" name="position" class="form-control" required>
                          </div>

                          <!--description-->
                          <div class="form-group mt-3">
                              <label for="title">Brief Description</label>                              
                              <textarea name="description" class="form-control" id="" cols="30" rows="5" required></textarea>                                
                          </div>
                          <!--duties-->
                          <div class="form-group mt-3">
                              <label for="title">Duties</label>
                              <textarea name="duties" class="form-control" id="" cols="30" rows="5" required></textarea>                                
                          </div>

                          <br>
                          
                      </div>
                      <div class="col-md-6">
                          <!--qualifications-->
                          <div class="form-group mt-3">
                              <label for="title">Qualifications (optional)</label>
                              <textarea name="qualification" class="form-control" id="" cols="30" rows="5" required></textarea>                                
                          </div>

                          <!--address-->
                          <div class="form-group mt-3">
                              <label for="address">Address</label>
                              <input type="text" class="form-control" name="address" required>
                          </div>

                          <!--Number-->
                          <div class="form-group mt-3">
                              <label for="number_of_vacancy">Number of Applications</label>
                              <input type="number" name="number_of_vacancy" class="form-control" required>
                          </div>

                          <!--Experience-->
                          <div class="form-group">
                              <label for="years_experience">Years of Exprience:</label>
                              <select class="form-control" name="years_experience">
                                <option value="" disabled selected>Select Experience</option>
                                <option value="None">None</option>
                                <option value="1-2 years">1-2 years</option>
                                <option value="2-5 years">2-5 years</option>
                                <option value="5-10 years">5-10 years</option>
                                <option value="10-15">10-15 years</option>
                                <option value="15 years plus">15 years plus</option>
                              </select>
                          </div>

                          <!--Salary-->
                          <div class="form-group">
                              <label for="salary_range">Salary per Month:</label>
                              <select class="form-control" name="salary_range">
                                <option value="" disabled selected>Select Salary Range</option>
                                <option value="Basic plus Commission">Basic plus Commission</option>
                                <option value="Market Related">Market Related</option>
                                <option value="R6000-R10000">R6000-R10000</option>
                                <option value="R10 000 - R20 000">R10 000 - R20 000</option>
                                <option value="R20 000 - R30 000">R20 000 - R30 000</option>
                                <option value="R30 000 - R40 000">R30 000 - R40 000</option>
                                <option value="R50 000 - R60 000">R50 000 - R60 000</option>
                                <option value="R60 000 plus">R60 0000 plus</option>
                                <option value="negotiable">Negotiable</option>
                              </select>
                          </div>

                          <!--employment type-->
                          <div class="form-group">
                              <label for="type">Type:</label>
                              <select class="form-control" name="type">
                                <option value="" disabled selected>Select Job Type</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Contract/Temp">Contract/Temp</option>
                                <option value="casual">Casual</option>
                              </select>
                          </div>

                          <!--status-->
                          <div class="form-group">
                              <label for="status">Status:</label>
                              <select class="form-control" name="status">
                                <option value="" disabled selected> Select Status</option>
                                  <option value="1">Live</option>
                                  <option value="0">Draft</option>
                              </select>
                          </div>

                          <!--last date -->
                          <div class="form-group">
                              <label for="last_date">Last date:</label>
                              <input type="date" id="datepicker"  name="last_date" class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}"  >
                              @if ($errors->has('last_date'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('last_date') }}</strong>
                              </span>
                               @endif
                          </div>
                      </div>
                      <div class="col-md-6">
                        <button type="submit" class="main-btn">Post Job</button>
                      </div>
                      
                      
                  </div>
                  
              </form>
          </div>

        </div>
      </div>
    </div>
</main>        


@endsection