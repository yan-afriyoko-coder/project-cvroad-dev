<nav class="navbar navbar-expand-xl fixed-top">
  <div class="container">
          <a class="navbar-brand" href="{{ route('homepage') }}"><img style="max-width: 70px" claass="w-50"
                  src="{{ asset('assets/img/logo.png') }}" alt=""></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
                  <li class="nav-card-item">
                      <a class="nav-link  " href="{{ route('jobs') }}">Home</a>
                  </li>
                  <li class="nav-card-item">
                      <a class="nav-link  " href="{{ route('alljobs') }}">Abaout Us</a>
                  </li>
                  <li class="nav-card-item">
                      <a class="nav-link " href="{{ route('user.profile') }}">Contack Us</a>
                  </li>
          </ul>
          <ul class="right navbar-nav ms-auto">
              <li class="nav-card-item-right">
                  <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-default"><i class="fas fa-sign-out-alt"></i></button>
                  </form>
              </li>
              <li class="nav-item nav-card-item-right">
                  <a class="nav-link" href="{{ route('user.profile') }}"><img style="max-width: 70px" class="w-50" src="{{ asset('avatar/account.png') }}" alt=""></a>
              </li>
          </ul>
      </div>
  </div>
</nav>