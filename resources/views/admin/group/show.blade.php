@extends('layouts.user_type.admin')
@section('content')

<!--Modal-->
<div class="modal fade" id="dealershipModal" tabindex="-1" aria-labelledby="dealershipModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Dealeship to {{$group->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <form action="{{route('admin.group_add_dealer',[$group->id])}}" class="row g-3" enctype="multipart/form-data" method="POST">
                    @csrf
                    @include('includes.search_dealer')                
                    <div>
                    <button type="submit" class="btn btn-primary form-control">Add Dealership</button>                  
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>


<main id="main" class="main">
    @component('components.admin_alert')        
    @endcomponent

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="index.html">Groups</a></li>
          <li class="breadcrumb-item active">{{$group->name}}</li>
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
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <h5 class="card-title">Group<span>| {{$group->name}}</span></h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dealershipModal"> <i class="bi bi-plus-circle-dotted"></i> Add Dealerhip</button>
                        </div>
                    </div>
                  

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>                        
                        <th scope="col">Logo</th>
                        <th scope="col">Dealership</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>                        
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($group->dealerships as $index => $dealership)
                        <tr>
                          <th scope="row">
                            {{$index + 1}}
                          </th>
                          <td><a href="{{route('admin.dealership_show',[$dealership->id])}}"><img class="mx-auto mt-2" src="{{asset('uploads/logo/'.$dealership->logo)}}" style="max-width: 50px" alt=""></a></td>
                          <td><a href="" class="text-primary fw-bold">{{$dealership->dname}}</a></td>
                          <td>{{$dealership->phone}}</td>
                          <td class="fw-bold">{{$dealership->address}}</td>                          
                          <td>
                            <div class="text-end">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                  <li class="dropdown-header text-start">
                                    <h6>Group Dealership</h6>
                                  </li>
                                  <li>
                                    <div>
                                        <form action="{{route('admin.group_remove_dealer',[$dealership->id])}}">
                                            @csrf
                                        </form>                                    
                                        <button type="button" class="dropdown-item btn-confirm"><i class="bi bi-x"></i> Remove dealer</button>
                                    </div>                                    
                                  </li>
                                  <li>
                                    
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