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
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col-md-6">
                        <h5 class="card-title">User</h5>
                    </div>
                    <div class="col-md-6 text-end">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createGroupModal">
                        <a href="{{ route('admin.users.create') }}" class="dropdown-item"><i class="bi bi-plus-circle-dotted"></i>   Add User</a>
                      </button>                        
                    </div>
                </div>

              <!-- Table with stripped rows -->
              <table class="table datatable">
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
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>
                              @foreach ($user->roles as $role)
                              {{ $role->name }}<br>
                              @endforeach                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->email_verified_at}}</td>
                            <td>
                                <div class="filter text-end">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Actions</h6>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.users.show', $user->id) }}" class="dropdown-item"><i class="bi bi-eye"></i> Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="dropdown-item"><i class="bi bi-pencil-square"></i> Edit</a>
                                        </li>
                                        <li>
                                          <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" id="delete-form-{{ $user->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="dropdown-item" onclick="document.getElementById('delete-form-{{ $user->id }}').submit()">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection