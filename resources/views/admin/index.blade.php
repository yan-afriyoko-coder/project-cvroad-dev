@extends('layouts.app')
@section('content')




        <div class="container">
          @if(Session::has('message'))

          <div class="alert alert-success">{{Session::get('message')}}</div>
          @endif

        <div class="row">
        <div class="col">
          @include('admin.left-menu')
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
        <table class="table table-striped">
        <thead>
        <tr>
              <th scope="col">Candidate</th>
              <th scope="col">Area</th>
              <th scope="col">Member Since</th>
              <th scope="col">Status</th>
              <th scope="col">Dealer</th>
              <th>Date</th>
              <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>

   

<div class="col">
    <br><br>
    <div class="form-inline">

    <form action="" method="GET">
       
        <div class="form-group">
            <label>Profile Status:&nbsp;</label>
            <select name="profile_status" class="form-control">
            <option value="">-select-</option>
            <option value="0">Offline</option>
            <option value="1">Live</option>

            <div class="form-group">
            <input type="submit" class="btn btn-outline-primary" value="Search">

        </div>

        <div class="form-group">
            <label>Dealer experience:&nbsp;</label>
            <select name="dealer_experience" class="form-control">
            <option value="">-select-</option>
            <option value="0">None</option>
            <option value="1">Yes</option>

            <div class="form-group">
            <input type="submit" class="btn btn-outline-primary" value="Search">

        </div>

        </form>


            @foreach($profiles as $profile)
            <tr>
              <td> <div class="p-1 d-flex flex-row align-items-center mb-1"> <img src="{{asset('uploads/avatar')}}/{{$profile->avatar}}" width="100" class="rounded-circle">
                        <div class="d-flex flex-column ml-3"> <span  class="d-block font-weight-bold" style="font-size:1.5em">{{$profile->name}} </span> <span class="text-muted" style="font-size: 1.0em">{{$profile->title}}</span> </div>
                    </div></td>
              <td>&nbsp; {{$profile->address}}</td>
              <td>
        <i class="far fa-clock"></i>&nbsp;{{$profile->created_at->diffForHumans()}}</td>
              <td>
                @if($profile->profile_status=='0')
                   <a href="{{route('post.toggle',[$profile->id])}}" class="badge badge-primary"> Offline</a>
                    @else
                   <a href="{{route('post.toggle',[$profile->id])}}" class="badge badge-success"> Live</a>
                @endif
            </td>

            <td>
                @if($profile->dealer_experience=='0')
                   <a href="{{route('post.toggle2',[$profile->id])}}" class="badge badge-primary"> None</a>
                    @else
                   <a href="{{route('post.toggle2',[$profile->id])}}" class="badge badge-success"> Yes</a>
                @endif
            </td>

              <td>{{$profile->employment_status}}</td>
              <td>
                  <a href="{{route('candidate.show',[$profile->id,$profile->slug])}}"><button class="btn btn-outline-primary">View </button></a>
              </td>
<td>
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{$profile->id}}">
  Delete
</button>

<!-- Modal -->
        <div class="modal fade" id="exampleModal{{$profile->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <div class="modal-body">
            Do you want to delete?
          </div>
          <form action="{{route('post.delete')}}" method="POST">@csrf
          <div class="modal-footer">
            <input type="hidden" name="id" value="{{$profile->id}}">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-danger">Delete</button></td>
          </div>
      </form>
        </div>
        </div>
        </div>




              </td>
            </tr>
            @endforeach
           
        </tbody>
        </table>
        {{$profiles->links()}}

     </div>
    </div>
    </div>
    </div>
</div>


@endsection