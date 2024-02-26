@extends('layouts.admin')
@section('auth')
@include('layouts.navbar.auth.admin_navbar')
@include('layouts.navbar.auth.admin_sidebar')
@yield('content')
@include('layouts.footer.auth.admin_footer')
@endsection