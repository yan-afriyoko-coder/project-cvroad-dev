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
          <li class="breadcrumb-item active">Show</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                    <th scope="col">Role</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Number Of User</th>                    
                    <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $roles->id }}</th>
                <td>{{ $roles->name }}</td>
                <td>
                    @foreach ($roles->permissions as $permission)
                    {{ $permission->name }}<br>
                    @endforeach                    </td>
                <td>{{ $roles->users->count() }}</td>
                <td>
                    <!-- Tidak ada form input atau tombol Update -->
                    <!-- Jika ingin menambahkan tombol "Edit", Anda bisa menambahkannya di sini -->
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
                </td>
            </tr>
        </tbody>
    </table>

  </main><!-- End #main -->
  @endsection 