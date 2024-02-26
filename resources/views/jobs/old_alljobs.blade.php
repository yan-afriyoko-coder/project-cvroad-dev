@extends('layouts.app')

@section('content')
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

            @foreach(App\Category::all() as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
        </select>
        &nbsp;&nbsp;
        </div>


        <div class="form-group">
            <label>Province:&nbsp;</label>
            <select name="province" class="form-control">
            <option value="">-select-</option>

            @foreach(App\Province::all() as $prov)
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




    <br><br>
        <table class="table">
        <thead>
            <th></th>
            <th>Position</th>
            <th>Address</th>
            <th>Date </th>
            <th></th>
        </thead>
<tbody>

@foreach($jobs as $job )


    <tr>
                
        <td>
        @if(empty($job->company->logo))    
        <img src="{{asset('uploads/logo')}}/{{$job->dealership->logo}}" width="100">
        @else
        <img src="{{asset('uploads/logo')}}/authorized-dealer.png"width="100">
              @endif
    </td>
        <td><i class="fas fa-money-check"></i> {{$job->position}}
    <br>
    <i class="fas fa-business-time"></i>&nbsp;{{$job->type}}

        </td>
        <td> <i class="fas fa-map-marker-alt"></i>&nbsp;{{$job->address}}</td>
        <td>
        <i class="far fa-clock"></i>&nbsp;{{$job->created_at->diffForHumans()}}</td>
        
        <td>
            <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
        <button class="btn btn-outline-success">Apply </button>
                                                </a>
    
    </td>
           
    </tr>

@endforeach

</tbody>
        </table>

        {{$jobs->links()}}
    </div>

</div>
</div>
@endsection

<style>
.fa{
    color: #4183D7;
}

</style>