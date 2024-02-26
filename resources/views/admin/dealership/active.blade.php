@extends('layouts.user_type.admin')
@section('content')
<main id="main" class="main">

    @component('components.admin_alert')        
    @endcomponent

    <div class="pagetitle">
      <h1>Active Dealships</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item">Dealerships</li>
          <li class="breadcrumb-item active">Active</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dealerships</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Group</th>
                    <th scope="col">Location</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dealerships as $index => $dealership)
                        <tr>
                            <th scope="row">{{$index + 1}}</th>
                            <td><a href="{{route('admin.dealership_show',[$dealership->id])}}">{{$dealership->dname}}</a> </td>
                            <td>{{$dealership->group->name ?? 'not set'}}</td>
                            <td>{{$dealership->province}} {{$dealership->address}}</td>
                            <td>
                                <div class="filter text-end">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                      <li class="dropdown-header text-start">
                                        <h6>Active Dealership</h6>
                                      </li>
                                      <li>
                                        <div>
                                            <form action="{{route('admin.dealership_suspend',[$dealership->id])}}">
                                            </form>
                                            <button type="button" class="dropdown-item btn-confirm"><i class="bi bi-check"></i> Suspend</button>
                                        </div>                                        
                                      </li>
                                      <li>
                                        <a href="" class="dropdown-item"> <i class="bi bi-eye"></i> Details</a>
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