@extends('layouts.app')
@section('guest')
@include('layouts.navbar.guest.guest_navbar')
@yield('content')
@include('layouts.footer.guest.guest_footer')
@endsection