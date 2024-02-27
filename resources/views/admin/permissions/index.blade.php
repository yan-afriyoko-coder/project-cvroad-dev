@extends('layouts.user_type.admin')
@section('content')

<main id="main" class="main">
  @component('components.admin_alert')    
  @endcomponent
  {{-- @dd($users) --}}
    <div class="pagetitle">
      <h1>Permission</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>          
          <li class="breadcrumb-item active">Permission</li>
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
                        <h5 class="card-title">Permission</h5>
                    </div>
                    <div class="col-md-6 text-end">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createGroupModal">
                        <a href="{{ route('admin.permissions.create') }}" class="dropdown-item"><i class="bi bi-plus-circle-dotted"></i>   Add Permission</a>
                      </button>                        
                    </div>
                </div>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <div class="filter text-end">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Actions</h6>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.permissions.show', $permission->id) }}" class="dropdown-item"><i class="bi bi-eye"></i> Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="dropdown-item"><i class="bi bi-pencil-square"></i> Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" id="delete-form-{{ $permission->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="dropdown-item" onclick="document.getElementById('delete-form-{{ $permission->id }}').submit()">
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