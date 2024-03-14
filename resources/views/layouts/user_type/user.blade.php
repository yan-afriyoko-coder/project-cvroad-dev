@extends('layouts.users')

@section('auth')
    @include('layouts.navbar.auth.user_navbar')
    <div class="container-fluid">
        @yield('content')
    </div>
    @include('layouts.footer.auth.user_footer')
@endsection
