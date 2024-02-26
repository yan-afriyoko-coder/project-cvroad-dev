@extends('layouts.user_type.admin')
@section('content')
<main id="main" class="main">
    @component('components.admin_alert')        
    @endcomponent

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="index.html">Candidates</a></li>
          <li class="breadcrumb-item active">Suspended</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

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
                  <h5 class="card-title">Candidates<span>| Active</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Profile</th>                        
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Title</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Group</th>
                        <th scope="col">Action</th>
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
                          <td><a href="{{route('admin.candidate_show',[$profile->id])}}" class="text-primary fw-bold">{{$profile->surname ?? 'not set'}} {{$profile->name}}</a></td>
                          <td><a href="mailto:{{$profile->user->email}}" class="text-primary fw-bold">{{$profile->user->email}}</a></td>
                          <td>{{$profile->title ?? 'not set'}}</td>
                          <td class="fw-bold">{{$profile->gender ?? 'not set'}}</td>
                          <td>{{$profile->group->name ?? 'not set'}}</td>
                          <td>
                            <div class="text-end">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                  <li class="dropdown-header text-start">
                                    <h6>Suspended Candidate</h6>
                                  </li>
                                  <li>
                                    <div>
                                        <form action="{{route('admin.candidate_approve',[$profile->id])}}">                                            
                                        </form>
                                        <button class="btn-confirm dropdown-item"> <i class="bi bi-check"></i> Unsuspend Candidate</button>
                                    </div>
                                  </li>                                 
                                </ul>
                              </div>
                          </td>
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