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
              <th>Date</th>
              <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
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
              <td>{{$profile->employment_status}}</td>
              <td>
                  <a href="{{route('profile.restore',[$profile->id])}}"><button class="btn btn-outline-primary">Restore </button></a>


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