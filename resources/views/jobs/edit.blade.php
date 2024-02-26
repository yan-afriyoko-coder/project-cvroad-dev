@extends('layouts.user_type.auth')
@section('content')
<main>

    <div class="main">
      <div class="container">
        <div class="row">
            @component('components.alert')        
            @endcomponent
            <div class="col-md-12">
                <h2 class="underscore mb-5">Edit <span class="green">Job</span></h2>
                  <div class="line"></div>
            </div>
            <div class="col-md-12">
                <form action="{{route('jobs.update',[$job->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <!--title-->
                            <div class="form-group mt-3">
                                <label for="title">Vacany Title</label>
                                <input type="text" name="title" class="form-control" value="{{$job->title}}">
                            </div>

                            <!--Department-->
                            <div class="form-group mt-3">
                                <label for="title">Department</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $cat)
                                        <option value="{{$cat->id}}" {{$cat->id === $job->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                                    @endforeach
                                </select>                                
                            </div>

                            <!--Province-->
                            <div class="form-group mt-3">
                                <label for="title">Province</label>
                                <select name="province_id" class="form-control">
                                    @foreach ($provinces as $province)
                                        <option value="{{$province->id}}" {{$province->id === $job->province_id ? 'selected' : ''}}>{{$province->name}}</option>
                                    @endforeach
                                </select>                                
                            </div>

                            <!--position-->
                            <div class="form-group mt-3">
                                <label for="title">Position</label>
                                <input type="text" class="form-control" name="position" value="{{$job->position}}">
                            </div>

                            <!--description-->
                            <div class="form-group mt-3">
                                <label for="title">Brief Description</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="5" required>{{$job->description}}</textarea>                                
                            </div>
                            <!--duties-->
                            <div class="form-group mt-3">
                                <label for="title">Duties</label>
                                <textarea name="duties" class="form-control" id="" cols="30" rows="5" required>{{$job->duties}}</textarea>                                
                            </div>

                            <br>
                            <button type="submit" class="main-btn">Update Job</button>
                        </div>
                        <div class="col-md-6">
                            <!--qualifications-->
                            <div class="form-group mt-3">
                                <label for="title">Qualifications (optional)</label>
                                <textarea name="qualification" class="form-control" id="" cols="30" rows="5" required>{{$job->qualification}}</textarea>                                
                            </div>

                            <!--address-->
                            <div class="form-group mt-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" value="{{$job->address}}">
                            </div>

                            <!--Number-->
                            <div class="form-group mt-3">
                                <label for="number_of_vacancy">Number of Applications</label>
                                <input type="number" class="form-control" value="{{$job->number_of_vacancy}}">
                            </div>

                            <!--Experience-->
                            <div class="form-group">
                                <label for="years_experience">Years of Exprience:</label>
                                <select class="form-control" name="years_experience">
                                <option value="None"{{$job->years_experience=='None'?'selected':''}}>None</option>
                                    <option value="1-2 years" {{$job->years_experience=='1-2 years'?'selected':''}}>1-2 years</option>
                                    <option value="2-5 years"{{$job->years_experience=='2-5 years'?'selected':''}}>2-5 years</option>
                                    <option value="5-10 years" {{$job->years_experience=='5-10 years'?'selected':''}}>5-10 years</option>
                                    <option value="10-15"{{$job->years_experience=='10-15 years'?'selected':''}}>10-15 years</option>
                                    <option value="15 years plus" {{$job->years_experience=='15 years plus'?'selected':''}}>15 years plus</option>
                                </select>
                            </div>

                            <!--Salary-->
                            <div class="form-group">
                                <label for="salary_range">Salary per Month:</label>
                                <select class="form-control" name="salary_range">
                                <option value="Basic plus Commission"{{$job->salary_range=='Basic plus Commission'?'selected':''}}>Basic plus Commission</option>
                                    <option value="Market Related"{{$job->salary_range=='Market Related'?'selected':''}}>Market Related</option>
                                          <option value="R6000-R10000" {{$job->salary_range=='R6000-R10000'?'selected':''}}>R6000-R10000</option>
                                    <option value="R10 000 - R20 000"{{$job->salary_range=='R10 000 - R20 000'?'selected':''}}>R10 000 - R20 000</option>
                                    <option value="R20 000 - R30 000"{{$job->salary_range=='R20 000 - R30 000'?'selected':''}}>R20 000 - R30 000</option>
                                    <option value="R30 000 - R40 000"{{$job->salary_range=='R30 000 - R40 000'?'selected':''}}>R30 000 - R40 000</option>
                                    <option value="R50 000 - R60 000"{{$job->salary_range=='R50 000 - R60 000'?'selected':''}}>R50 000 - R60 000</option>
                                    <option value="R60 000 plus"{{$job->salary_range=='R60 000 plus'?'selected':''}}>R60 0000 plus</option>
                                    <option value="negotiable"{{$job->salary_range=='negotiable'?'selected':''}}>Negotiable</option>
                                </select>
                            </div>

                            <!--employment type-->
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select class="form-control" name="type">
                                    <option value="Permanent"{{$job->type=='Permanent'?'selected':''}}>Permanent</option>
                                    <option value="Contract/Temp"{{$job->type=='Contract/Temp'?'selected':''}}>Contract/Temp</option>
                                    <option value="casual"{{$job->type=='casual'?'selected':''}}>Casual</option>
                                </select>
                            </div>

                            <!--status-->
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" name="status">
                                    <option value="1"{{$job->status=='1'?'selected':''}}>Live</option>
                                    <option value="0"{{$job->status=='0'?'selected':''}}>Draft</option>
                                </select>
                            </div>

                            <!--last date -->
                            <div class="form-group">
                                <label for="last_date">Last date:</label>
                                <input type="text" id="datepicker"  name="last_date" class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}"  value="{{ $job->last_date}}">
                                @if ($errors->has('last_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('last_date') }}</strong>
                                </span>
                                 @endif
                            </div>
                        </div>
                        
                    </div>
                    
                </form>
            </div>

            
        </div>
      </div>
    </div>
</main>        


@endsection