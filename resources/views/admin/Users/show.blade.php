@extends('layouts.user_type.admin')
@section('content')

<main id="main" class="main">
  @component('components.admin_alert')    
  @endcomponent
    <div class="pagetitle">
      <h1>Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>          
          <li class="breadcrumb-item active">User</li>
          <li class="breadcrumb-item active">Show</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>                    
                <th scope="col">Email Verified</th>                    
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>
                  @foreach ($user->roles as $role)
                  {{ $role->name }}
                  @endforeach                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email_verified_at ? 'Verified' : 'Not Verified' }}</td>
                <td>
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
                </td>
            </tr>
        </tbody>
    </table>

  </main><!-- End #main -->
  @endsection