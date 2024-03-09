@extends('layouts.user_type.admin')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="card-body">
                  <h5 class="card-title">Sales <span class="float-end"><i class="bi bi-arrow-up-right"></i> 12%</span></h5>
                  <h5 class="card-title">Active <span>| Dealerships</span></h5>
                </div>
              </div>
            </div><!-- End Sales Card -->
                
        
      </div> 
    </section>
  </main><!-- End #main -->
  @endsection