@extends('layouts.user_type.admin')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dealership</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dealership</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Active Dealerships</h6>
                    </li>
                    <li><a class="dropdown-item" href="{{route('admin.dealership_active')}}"><i class="bi bi-eye"></i> Show</a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-file-excel"></i> Export</a></li>                    
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Active <span>| Dealerships</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-car-front"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$active_count}}</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Suspended Dealerships</h6>
                    </li>
                    <li><a class="dropdown-item" href="{{route('admin.dealership_suspended')}}"><i class="bi bi-eye"></i>Show</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-file-excel"></i>Export</a></li>                    
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Suspended <span>| Dealerships</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-x-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$suspended_count}}</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>New Applications</h6>
                    </li>
                    <li>                      
                      <a class="dropdown-item" href="{{route('admin.dealership_pending')}}"> <i class="bi bi-check"></i> Show</a>
                    </li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-file-excel"></i> Export</a></li>                    
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pending <span>| Dealerships</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$pending_count}}</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                    </div>
                  </div>
                </div>
              </div>

            </div><!-- End Customers Card -->


        

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">New Candidates<span>| Pending Approval</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Profile</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Title</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Group</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($profiles as $profile)
                        <tr>
                          <th scope="row">
                            <a href="{{route('admin.candidate_show',[$profile->id])}}">
                              @if($profile->avatar)
                                <img src="{{asset('uploads/avatar/'. $profile->avatar)}}" width="200px">
                              @else                              
                                <img src="{{asset('uploads/avatar/account.png')}}" width="200px" alt="">
                              @endif
                            </a>
                          </th>
                          <td><a href="{{route('admin.candidate_show',[$profile->id])}}" class="text-primary fw-bold">{{$profile->surname}} {{$profile->name}}</a></td>
                          <td>{{$profile->title ?? 'not set'}}</td>
                          <td class="fw-bold">{{$profile->gender ?? 'not set'}}</td>
                          <td>{{$profile->group->name ?? 'not set'}}</td>
                        </tr>                        
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
      </div>
    </section>
  </main><!-- End #main -->
  @endsection