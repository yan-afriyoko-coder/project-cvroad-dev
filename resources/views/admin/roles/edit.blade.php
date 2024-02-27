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
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
{{-- hdhd --}}

                <form action="{{ route('admin.roles.update', $roles->id) }}" method="POST">
                    @csrf 
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $roles->name }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Permission</label>
                      <input type="text" class="form-control" name="permission" value="{{ implode(', ', $roles->permissions->pluck('name')->toArray()) }}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Cancel</a>
                </form>

  </main><!-- End #main -->
  @endsection