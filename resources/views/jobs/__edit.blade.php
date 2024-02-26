@extends('layouts.main')

@section('content')

<br><br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">Update a job</div>
            <div class="card-body">
      

<form action="{{route('jobs.update',[$job->id])}}" method="POST">@csrf

<div class="form-group">
    <label for="title">Vacancy Title:</label>
    <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"  value="{{ $job->title }}">
    @if ($errors->has('title'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('title') }}</strong>
    </span>
     @endif
    
</div>

<div class="form-group">
    <label for="category_id">Department:</label>
    <select name="category_id" class="form-control">
        @foreach(App\Category::all() as $cat)
            <option value="{{$cat->id}}"{{$cat->id==$job->category_id?'selected':''}}>{{$cat->name}}</option>
        @endforeach
    </select>

    <br> 
    
    <div class="form-group">
    <label for="province">Province:</label>
    <select name="province" class="form-control">
        @foreach(App\Province::all() as $prov)
            <option value="{{$prov->id}}"{{$prov->id==$job->province?'selected':''}}>{{$prov->name}}</option>
        @endforeach
    </select>


</div>
<div class="form-group">
    <label for="position">Position:</label>
    <input type="text" name="position" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}"  value="{{ $job->position}}">
    @if ($errors->has('position'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('position') }}</strong>
    </span>
     @endif

</div>

<div class="form-group">
    <label for="description">Brief Description:</label>
<textarea name="description" id="summernote" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" >{{ $job->description }}</textarea>
@if ($errors->has('description'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('description') }}</strong>
    </span>
     @endif
</div>

<div class="form-group">
    <label for="duties">Duties:</label>
<textarea name="duties"  class="form-control {{ $errors->has('duties') ? ' is-invalid' : '' }}" >{{ $job->duties }}</textarea>
@if ($errors->has('duties'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('duties') }}</strong>
    </span>
     @endif
</div>

<div class="form-group">
    <label for="qualification">Qualifications(Optional):</label>
<textarea name="qualification"  class="form-control {{ $errors->has('qualification') ? ' is-invalid' : '' }}" >{{ $job->qualification }}</textarea>
@if ($errors->has('duties'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('duties') }}</strong>
    </span>
     @endif
</div>

<div class="form-group">
    <label for="address">Address:</label>
    <input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  value="{{ $job->address }}">
    @if ($errors->has('address'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('address') }}</strong>
    </span>
     @endif
</div>




<div class="form-group">
    <label for="number_of_vacancy">No of applicants needed:</label>
    <input type="text" name="number_of_vacancy" class="form-control{{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}"  value="{{ $job->number_of_vacancy }}">
    @if ($errors->has('number_of_vacancy'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('number_of_vacancy') }}</strong>
    </span>
     @endif
</div>

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

<div class="form-group">
    <label for="type">Type:</label>
    <select class="form-control" name="type">
        <option value="Permanent"{{$job->type=='Permanent'?'selected':''}}>Permanent</option>
        <option value="Contract/Temp"{{$job->type=='Contract/Temp'?'selected':''}}>Contract/Temp</option>
        <option value="casual"{{$job->type=='casual'?'selected':''}}>Casual</option>
    </select>
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="status">
        <option value="1"{{$job->status=='1'?'selected':''}}>Live</option>
        <option value="0"{{$job->status=='0'?'selected':''}}>Draft</option>
    </select>
</div>
<div class="form-group">
    <label for="last_date">Last date:</label>
    <input type="text" id="datepicker"  name="last_date" class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}"  value="{{ $job->last_date}}">
    @if ($errors->has('last_date'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('last_date') }}</strong>
    </span>
     @endif
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Update</button>
</div>
 

@if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}
                        </div>@endif</v-container>


</div>
</form>



        </div>



        </div>

        </div>
    </div>
</div>
<br><br><br><br><br><br>
@endsection
