@extends('layouts.user_type.admin')
@section('content')

<main id="main" class="main">
  @component('components.admin_alert')    
  @endcomponent
    <div class="pagetitle">
      <h1>Role</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>          
          <li class="breadcrumb-item active">Role</li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <form action="{{ route('admin.roles.store') }}" method="POST">
      @csrf
      <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ isset($roles) ? $roles->name : '' }}" required>
      </div>
      <div class="mb-3">
          <label for="permissions" class="form-label">Permissions</label><br>
          @foreach($permissions as $permission)
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" {{ isset($roles) && $roles->permissions->contains($permission) ? 'checked' : '' }}>
                  <label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
              </div>
          @endforeach
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
      <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Cancel</a>
  </form>

  </main><!-- End #main -->
  @endsection