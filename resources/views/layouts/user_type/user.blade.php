@extends('layouts.users')

@section('auth')
    @include('layouts.navbar.auth.user_navbar')
    <div class="container-fluid">
        @yield('content')
    </div>
    <div class="profile">
        @yield('content2')
    </div>
    @include('layouts.footer.auth.user_footer')
@endsection
