{{-- @extends('layouts.app')
@section('auth')
@include('layouts.navbar.auth.auth_navbar')
@yield('content')
@include('layouts.footer.auth.auth_footer')
@endsection   --}}

@extends('layouts.app')

@section('auth')
    @include('layouts.navbar.auth.auth_navbar')
    <div class="container-fluid">
        @yield('content')
    </div>
    <div class="profile">
        @yield('content2')
    </div>
    @include('layouts.footer.auth.auth_footer')
@endsection


