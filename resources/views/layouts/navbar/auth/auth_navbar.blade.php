<nav class="navbar navbar-expand-xl fixed-top">
  <div class="container">
    @if(Auth::user()->isEmployer())
      <a class="navbar-brand" href="{{route('dealership.index')}}"><img style="max-width: 70px" claass="w-50" src="{{asset('assets/img/logo.png')}}" alt=""></a>
    @elseif(Auth::user()->isSeeker())
    <a class="navbar-brand" href="{{route('jobs')}}"><img style="max-width: 70px" claass="w-50" src="{{asset('assets/img/logo.png')}}" alt=""></a>
    @endif
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        @if(Auth::user()->isSeeker())
        <li class="nav-card-item">
          <a class="nav-link  active" href="{{route('alljobs')}}">Jobs</a>
        </li>
        <li class="nav-card-item">
          <a class="nav-link" href="{{route('user.profile')}}">Profile</a>
        </li>
        @elseif (Auth::user()->isEmployer())    
        <li class="nav-card-item">
          <a class="nav-link {{Request::is('dealership') ? 'active' : ''}}" href="{{route('dealership.index')}}">My Jobs</a>
        </li>
        <li class="nav-card-item">
          <a class="nav-link {{Request::is('candidates') ? 'active' : ''}}" href="{{route('candidate.all')}}">Candidates</a>
        </li>
        <li class="nav-card-item">
          <a class="nav-link {{Request::is('dealership/show') ? 'active' : ''}}" href="{{route('dealership.show')}}">Profile</a>
        </li>
        @endif         
      </ul>
      <ul class="right navbar-nav ms-auto">
        @if(Auth::user()->isEmployer())
        <li class="nav-card-item-right create-account">
          <a class="nav-link" href="{{route('job.create')}}">Post Job</a>
        </li>       
        @endif
        <li class="nav-card-item-right">
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-default"><i class="fas fa-sign-out-alt"></i></button>
          </form>          
        </li>

      </ul>
    </div>
  </div>
</nav>