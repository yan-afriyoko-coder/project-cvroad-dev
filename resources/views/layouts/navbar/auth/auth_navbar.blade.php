{{-- <nav class="navbar navbar-expand-xl fixed-top">
  <div class="container">
    @if (Auth::user()->isEmployer())
      <a class="navbar-brand" href="{{route('dealership.index')}}"><img style="max-width: 70px" claass="w-50" src="{{asset('assets/img/logo.png')}}" alt=""></a>
    @elseif(Auth::user()->isSeeker())
    <a class="navbar-brand" href="{{route('jobs')}}"><img style="max-width: 70px" claass="w-50" src="{{asset('assets/img/logo.png')}}" alt=""></a>
    @endif
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        @if (Auth::user()->isSeeker())
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
        @if (Auth::user()->isEmployer())
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
</nav> --}}

<nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top py-3">
    <div class="container-fluid mx-5">
        <a class="navbar-brand" href="{{ Auth::user()->isEmployer() ? route('dealership.index') : route('jobs') }}">
            <img style="max-width: 100px" class="w-50" src="{{ asset('assets/img/logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="ms-auto navbar-nav text-center">
                @if (Auth::user()->isSeeker())
                    <li class="nav-item fw-semibold fs-5 text-dark">
                        <a class="nav-link" href="{{ route('jobs') }}">Home</a>
                    </li>
                    <li class="nav-item fw-semibold fs-5 text-center text-dark">
                        <a class="nav-link" href="{{ route('alljobs') }}">About Us</a>
                    </li>
                    <li class="nav-item fw-semibold fs-5 text-center text-dark">
                        <a class="nav-link" href="{{ route('user.profile') }}">Contact Us</a>
                    </li>
                @elseif (Auth::user()->isEmployer())
                    <li class="nav-item fw-semibold fs-5 text-center text-dark">
                        <a class="nav-link {{ Request::is('dealership') ? 'active' : '' }}"
                            href="{{ route('dealership.index') }}">My Jobs</a>
                    </li>
                    <li class="nav-item fw-semibold fs-5 text-center text-dark">
                        <a class="nav-link {{ Request::is('candidates') ? 'active' : '' }}"
                            href="{{ route('candidate.all') }}">Candidates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('job.create') }}">Post Job</a>
                    </li>
                    {{-- <li class="nav-item fw-semibold fs-5 text-center text-dark">
                      <a class="nav-link {{ Request::is('dealership/show') ? 'active' : '' }}"
                          href="{{ route('dealership.show') }}">Profile</a>
                  </li> --}}
                @endif
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item text-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-default "><i class="fas fa-sign-out-alt"></i></button>
                    </form>
                </li>
                <li class="nav-item text-center">
                    @if (Auth::user()->isSeeker())
                        <a class="nav-link" href="{{ route('user.profile') }}">
                            <img style="max-width: 90px" class="w-50" src="{{ asset('avatar/account.png') }}"
                                alt="">
                        </a>
                    @elseif (Auth::user()->isEmployer())
                        <a class="nav-link {{ Request::is('dealership/show') ? 'active' : '' }}"
                            href="{{ route('dealership.show') }}">
                            <img style="max-width: 90px" class="w-50" src="{{ asset('avatar/account.png') }}"
                                alt="">
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
