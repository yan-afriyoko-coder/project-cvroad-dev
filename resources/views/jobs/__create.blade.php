@extends('layouts.main')

@section('content')

<br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">Create a job</div>
            <div class="card-body">
      

<form action="{{route('job.store')}}" method="POST">@csrf

<div class="form-group">
    <label for="title">Vacancy Title:</label>
    <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"  value="{{ old('title') }}">
    @if ($errors->has('title'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('title') }}</strong>
    </span>
     @endif
    
</div>

<div class="form-group">
    <label for="category">Department:</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>

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
    <label for="brand_id">Brand:</label>
    <select name="brand_id" class="form-control">
        <option selected disabled>Choose brand</option>
        @foreach($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="position">Position:</label>
    <input type="text" name="position" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}"  value="{{ old('position') }}">
    @if ($errors->has('position'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('position') }}</strong>
    </span>
     @endif
</div>

<div class="form-group">
    <label for="description">Brief Description:</label>
<textarea name="description" id="summernote" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" >{{ old('description') }}</textarea>
@if ($errors->has('description'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('description') }}</strong>
    </span>
     @endif
</div>

<div class="form-group">
    <label for="duties">Duties:</label>
<textarea name="duties"  class="form-control {{ $errors->has('duties') ? ' is-invalid' : '' }}" >{{old('duties')}}</textarea>
@if ($errors->has('duties'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('duties') }}</strong>
    </span>
     @endif
</div>

<div class="form-group">
    <label for="qualification">Qualifications(Optional):</label>
<textarea name="qualification"  class="form-control {{ $errors->has('qualification') ? ' is-invalid' : '' }}" >{{old('duties')}}</textarea>
@if ($errors->has('duties'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('duties') }}</strong>
    </span>
     @endif
</div>

<div class="form-group">
    <label for="address">Address:</label>
    <input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  value="{{ old('address') }}">
    @if ($errors->has('address'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('address') }}</strong>
    </span>
     @endif
</div>




<div class="form-group">
    <label for="number_of_vacancy">No of applicants needed:</label>
    <input type="text" name="number_of_vacancy" class="form-control{{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}"  value="{{ old('number_of_vacancy') }}">
    @if ($errors->has('number_of_vacancy'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('number_of_vacancy') }}</strong>
    </span>
     @endif
</div>

<div class="form-group">
    <label for="type">Years of Exprience:</label>
    <select class="form-control" name="years_experience">
        <option value="None">None</option>
        <option value="1-2 years">1-2 years</option>
        <option value="2-5 years">2-5 years</option>
        <option value="5-10 years">5-10 years</option>
        <option value="10-15">10-15 years</option>
        <option value="15 years plus">15 years plus</option>
    </select>
</div>

<div class="form-group">
    <label for="type">Salary per Month:</label>
    <select class="form-control" name="salary_range">
    <option value="Market Related">Basic plus Commission</option>
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

<div class="form-group">
    <label for="type">Type:</label>
    <select class="form-control" name="type">
        <option value="Permanent">Permanent</option>
        <option value="Contract/Temp">Contract/Temp</option>
        <option value="Casual">Casual</option>
    </select>
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="status">
        <option value="1">Live</option>
        <option value="0">Draft</option>
    </select>
</div>
<div class="form-group">
    <label for="lastdate">Last date:</label>
    <input type="date" id="datepicker"  name="last_date" class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}"  value="{{ old('last_date') }}">
    @if ($errors->has('last_date'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('last_date') }}</strong>
    </span>
     @endif
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Submit</button>
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
