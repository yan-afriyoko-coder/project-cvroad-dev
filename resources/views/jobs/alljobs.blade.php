@extends('layouts.main')
@section('content')

<br><br>

<div class="container">
    <div class="row ">
    <form action="{{route('alljobs')}}" method="GET">

    <h1>All Jobs:</h1>

    <br><br>
    <div class="form-inline">
        <div class="form-group">
            <label>Position:&nbsp;</label>
            <input type="text" name="position" class="form-control" placeholder="Job position">&nbsp;&nbsp;&nbsp;
        </div>

        <div class="form-group">
            <label>Type: &nbsp;</label>
            <select class="form-control" name="type">
                    <option value="">-select-</option>
                    <option value="Permanent">Permanent</option>
                    <option value="Contract/Temp">Contract/Temp</option>
                    <option value="Casual">Casual</option>
                </select>
                &nbsp;&nbsp;
        </div>

        <div class="form-group">
            <label>Department:&nbsp;</label>
            <select name="category_id" class="form-control">
            <option value="">-select-</option>

            @foreach(App\Models\Category::all() as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
        </select>
        &nbsp;&nbsp;
        </div>


        <div class="form-group">
            <label>Province:&nbsp;</label>
            <select name="province" class="form-control">
            <option value="">-select-</option>

            @foreach(App\Models\Province::all() as $prov)
            <option value="{{$prov->id}}">{{$prov->name}}</option>
        @endforeach
        </select>
        &nbsp;&nbsp;
        </div>

       

        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" class="form-control" placeholder="address">&nbsp;&nbsp;
        </div>
        
        <div class="form-group">
            <input type="submit" class="btn btn-outline-primary" value="Search">

        </div>

    </div>

    </form>



<div class="col-md-12">
    <div class="rounded border jobs-wrap">
            @foreach($jobs as $job )

              <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{asset('uploads/logo')}}/{{$job->dealership->logo}}" alt="Image" class="img-fluid mx-auto">
                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{$job->position}}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$job->dealership->dname}}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span>{{Illuminate\Support\Str::limit($job->address,20)}}</div>
                      <div><span class="icon-money mr-1"></span> {{$job->salary_range}}</div>
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">
                  @if($job->type=='Permanent')
                  <div class="p-3">
                    <span class="text-info p-2 rounded border border-info">{{$job->type}}</span>
                  </div>
                  @elseif($job->type=='Contract/Temp')
                  <div class="p-3">
                    <span class="text-danger p-2 rounded border border-danger">{{$job->type}}</span>
                  </div>
                  @else
                   <div class="p-3">
                    <span class="text-warning p-2 rounded border border-warning">{{$job->type}}</span>
                  </div>
                  @endif

                </div>  
              </a>
              @endforeach

            </div>

</div>
</div>
</div>
<br><br><br>
@endsection

<style>
.fa{
    color: #4183D7;
}

</style>