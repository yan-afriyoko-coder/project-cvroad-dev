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
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div>
{{-- hdh --}}

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf 
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" name="role" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}required>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address:</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}"required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="email_verified" {{ $user->email_verified_at ? 'checked' : '' }}>
                        <label class="form-check-label">Verified</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
            </form> 

  </main><!-- End #main -->
  @endsection