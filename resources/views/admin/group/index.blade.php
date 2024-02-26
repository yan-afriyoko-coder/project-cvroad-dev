@extends('layouts.user_type.admin')
@section('content')

@include('includes.group_modals')

<main id="main" class="main">
  @component('components.admin_alert')    
  @endcomponent
    <div class="pagetitle">
      <h1>Active Dealships</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>          
          <li class="breadcrumb-item active">Groups</li>
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
                        <h5 class="card-title">Groups</h5>
                    </div>
                    <div class="col-md-6 text-end">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createGroupModal">
                        <i class="bi bi-plus-circle-dotted"></i> Create Group
                      </button>                        
                    </div>
                </div>
              
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Dealers</th>                    
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($groups as $index => $group)
                        <tr>
                            <th scope="row">{{$index + 1}}  <input type="hidden" class="hidden-id" value="{{$group->id}}"></th>
                            <td><a href="{{route('admin.group_show',[$group->id])}}" class="text-primary fw-bold">{{$group->name}} </a> </td>                            
                            <td>{{count($group->dealerships)}}</td>
                            <td>
                                <div class="filter text-end">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                      <li class="dropdown-header text-start">
                                        <h6>Active Dealership</h6>
                                      </li>                                      
                                      <li>
                                        <a href="{{route('admin.group_show',[$group->id])}}" class="dropdown-item"> <i class="bi bi-eye"></i> View Group</a>
                                      </li> 
                                      <li>
                                        <button class="dropdown-item edit-group-btn"> <i class="bi bi-pencil-square"></i> Edit Group</button>
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

  <script>
    $(document).ready(function(){
      $(".edit-group-btn").click(function(){
        var row = $(this).closest('tr');
        var group_id = $(row).find('.hidden-id').val();
        var get_group_url = "{{route('admin.groups_get_axios',[':id'])}}";
        get_group_url = get_group_url.replace(':id', group_id);

        axios.get(get_group_url)
        .then(function(response){
          console.log(response);
          var group = response.data.group;
           $("#group_name").val(group.name);

          //ghet form 
          var form = $("#edit_group_form");
          var update_group_url = "{{route('admin.groups_update',[':id'])}}";
          update_group_url = update_group_url.replace(':id', group.id);
          form.attr("action", update_group_url);

          console.log(form.attr("action"));

          //display form modal 
          $("#editGroupModal").modal("show");
          

        }).catch(function(error){
          console.log(error);
        })
        console.log(group_id);


        
        
      })
    })
   
  </script>
  @endsection