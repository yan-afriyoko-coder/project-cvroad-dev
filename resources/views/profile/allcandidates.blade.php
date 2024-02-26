@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">

    <form action="{{route('allcandidates')}}" method="GET">

    <br><br>  <br><br> <br><br>

        <h1>Search Candidates:</h1>

<div class="col-md-12">
    <br><br>
    <div class="form-inline">
        <div class="form-group">
            <label>Position:&nbsp;</label>
            <input type="text" name="title" class="form-control" placeholder="Job position">&nbsp;&nbsp;&nbsp;
        </div>

        
        

        <div class="form-group">
            <label>Department:&nbsp;</label>
            <select name="category_id" class="form-control">
            <option value="">-select-</option>

            @foreach($cats as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
        </select>
        &nbsp;&nbsp;
        </div>

        <div class="form-group">
            <label>Status: &nbsp;</label>
            <select class="form-control" name="employment_status">
                    <option value="">-select-</option>
                    <option value="Employed">Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="contract">Contract</option>
                </select>
                &nbsp;&nbsp;
                </div>

                <div class="form-group">
            <label>Brand:&nbsp;</label>
            <select name="brand_id" class="form-control">
            <option value="">-select-</option>

            @foreach($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach
        </select>
        &nbsp;&nbsp;
        </div>


        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" class="form-control" placeholder="Address">&nbsp;&nbsp;
        </div>

        <div class="form-group">
            <label>Dealer experience:&nbsp;</label>
            <select name="dealer_experience" class="form-control">
            <option value="">-select-</option>
            <option value="0">None</option>
            <option value="1">Yes</option>
            </select>
   

       </div>&nbsp;&nbsp;
        

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
&nbsp;&nbsp;&nbsp;&nbsp;


        <div class="form-group">
            <input type="submit" class="btn btn-outline-primary" value="Search">

        </div>

    </div>

</div>

    <br><br><br>

    </form>

   
        <div class="col-md-12">

        @foreach($candidates as $candidate)
            <div class="card">
            
            <table class="vertical-align: middle;">
        <thead>
            <th></th>          
            <th>Status</th>
            <th>Area</th>
            <th>Member Since </th>
            <th></th>
            <th></th>
        </thead>
<tbody>



    <tr>    
    
        <td>
        <div class="p-1 d-flex flex-row align-items-center mb-1"> <img src="{{asset('uploads/avatar')}}/{{$candidate->avatar}}" width="100" class="rounded-circle">
                        <div class="d-flex flex-column ml-3"> <span  class="d-block font-weight-bold" style="font-size:1.5em">{{$candidate->name}} </span> <span class="text-muted" style="font-size: 1.0em">{{$candidate->title}}</span> </div>
                    </div> </td>
   
     
    <br>

    
    <td>
    {{$candidate->employment_status}}</td>
        <td> &nbsp; {{$candidate->address}}</td>
        <td>
        <i class="far fa-clock"></i>&nbsp;{{$candidate->created_at->diffForHumans()}}</td>
        
        <td>
            <a href="{{Storage::url($candidate->cv)}}">
        <button class="btn btn-outline-primary">View CV </button>
                                                </a> </td>
                                              
        <td>
            
            <a href="{{route('candidate.show',[$candidate->id,$candidate->slug])}}">
        <button class="btn btn-outline-primary">View Profile </button>
                                                </a> 
    
    </td>
           
    </tr>


</tbody>
        </table>

                   </div><br>
                    @endforeach

                    {{$candidates->links()}}


            </div>
        </div>
    </div>
</div>
@endsection
