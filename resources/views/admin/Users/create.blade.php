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
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <form action="{{ route('admin.users.store') }}" method="POST">
      @csrf
      <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-select" id="role" name="role" required>
              <option value="">Select Role</option>
              @foreach($roles as $role)
                  <option value="{{ $role->id }}">{{ $role->name }}</option>
              @endforeach
          </select>
      <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
  </form>

  </main><!-- End #main -->
  @endsection