@extends('layouts.user_type.auth')
@section('content')

<!-- Cover Photo Modal -->
<div class="modal fade" id="addUserExperienceModal" tabindex="-1" aria-labelledby="addUserExperienceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserExperienceModalLabel">Add Experience</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('experience.create')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
          @csrf
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <div class="form-group">
            <label for="company">Company</label>
            <input type="text" class="form-control" name="company" required>
          </div>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" required>
          </div>
          <div class="form-group">
            <label for="start_date">Start</label>
            <input type="date" class="form-control" name="start_date" required>
          </div>
          <div class="form-group">
            <label for="present">Status</label>
           <select name="present" id="present" class="form-control" id="">
            <option value="1">Present</option>
            <option value="0">No longer working there</option>
           </select>
          </div>
          <div class="form-group" id="end_date">
            <label for="end_date">End</label>
            <input type="date" class="form-control" name="end_date">
          </div>
          <div class="form-group">
            <label for="manager">Manager Fullname</label>
            <input type="text" class="form-control" name="manager" required>
          </div>
          <div class="form-group">
            <label for="phone">Manager Contact Number</label>
            <input type="text" class="form-control" name="phone" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-main">Add Experience</button>
      </div>
    </form>
    </div>
  </div>
</div>


<main>
  <div class="main">
    <div class="container">
      <div class="row">
        @component('components.alert')        
        @endcomponent
        <div class="col-md-12">
          <div class="team mt-5">
            <h3><span class="green">My </span>Profile &nbsp; <a href="{{route('edit.profile')}}"><i class="fas fa-edit"></i></a> </h3>                                  
          </div>           
        </div>
      </div>
      <div class="row mt-5">
        <div class="header">
          <div class="card-header">
            <h5>Personal Information</h5>            
          </div>
          <div class="card-body">
            <div class="row">
              
              <div class="col-md-4">
                <div class="team-person py-3 text-center">
                  <div class="person">                      
                    <div class="photo">
                      @if(Auth::user()->profile->avatar)
                        <img src="{{asset('uploads/avatar/'. Auth::user()->profile->avatar)}}" width="200px">
                      @else  
                        <img src="{{asset('uploads/avatar/account.png')}}" width="200px" alt="">
                      @endif
                    </div>
                  </div>
                </div>                
              </div>

              <div class="col-md-8">          
                <ul class="list-group">
                  <li class="list-group-item"><strong>Name:</strong> {{Auth::user()->profile->surname}} {{Auth::user()->profile->name}}</li>                              
                  <li class="list-group-item"><strong>Phone:</strong> {{Auth::user()->profile->phone_number}}</li>
                  <li class="list-group-item"><strong>Race:</strong> {{Auth::user()->profile->race}}</li>
                  <li class="list-group-item"><strong>Gender:</strong> {{Auth::user()->profile->gender}}</li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row mt-5">
      <div class="row">
        <div class="card">
          <div class="card-header">
            <h5>Work Information</h5>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item"><strong>Dealer Group:</strong> {{Auth::user()->profile->group->name ?? 'Not set' }}</li>
              <li class="list-group-item"><strong>Current Job Title:</strong> {{Auth::user()->profile->title}}</li>
              <li class="list-group-item"><strong>Dealer Experience:</strong> {{Auth::user()->profile->dealer_experience ?? '0'}} Yrs</li>                  
              <li class="list-group-item"><strong>Department:</strong> {{Auth::user()->profile->department->name ?? 'Not set'}}</li>                  
              <li class="list-group-item"><strong>Brand:</strong> {{Auth::user()->profile->brand->name ?? 'Not set'}}</li>  
              <li class="list-group-item"><strong>Salary:</strong> {{Auth::user()->profile->salary_range ?? 'Not set'}}</li>                  
            </ul>
          </div>          
        </div>        
      </div>

      <div class="row mt-5">
        <div class="card">
          <div class="card-header">
            <h5>Languages</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="mt-2">
                <strong>About me:</strong>
                <p>{{Auth::user()->profile->bio}}</p>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="mt-2">
                  <strong>First Language:</strong>
                  <p>{{Auth::user()->profile->first_language}}</p>
                  <p>
                    @php 
                    $fl1 = Auth::user()->profile->fl1
                    @endphp 
                    @if ( $fl1 >= 100)
                        {{ "Native" }}
                    @elseif ($fl1 >= 65)
                        {{ "Fluent" }}
                    @elseif ($fl1 >= 50)
                        {{ "Proficient" }}
                    @elseif ($fl1 >= 25)
                        {{ "Basic" }}
                    @else
                        {{ "Unknown" }}
                    @endif
    
                  </p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="mt-2">
                  <strong>Second Language:</strong>
                  <p>{{Auth::user()->profile->second_language}}</p>
                  <p>
                    @php 
                    $fl2 = Auth::user()->profile->fl2
                    @endphp 
                    @if ( $fl2 >= 100)
                        {{ "Native" }}
                    @elseif ($fl2 >= 65)
                        {{ "Fluent" }}
                    @elseif ($fl2 >= 50)
                        {{ "Proficient" }}
                    @elseif ($fl2 >= 25)
                        {{ "Basic" }}
                    @else
                        {{ "Unknown" }}
                    @endif
                  </p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="mt-2">
                  <strong>Second Language:</strong>
                  <p>{{Auth::user()->profile->third_language}}</p>
                  <p>
                    @php 
                    $fl3 = Auth::user()->profile->fl3
                    @endphp 
                    @if ( $fl3 >= 100)
                        {{ "Native" }}
                    @elseif ($fl3 >= 65)
                        {{ "Fluent" }}
                    @elseif ($fl3 >= 50)
                        {{ "Proficient" }}
                    @elseif ($fl3 >= 25)
                        {{ "Basic" }}
                    @else
                        {{ "Unknown" }}
                    @endif
                  </p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="mt-2">
                  <strong>Second Language:</strong>
                  <p>{{Auth::user()->profile->fourth_language}}</p>
                  <p>
                    @php 
                    $fl4 = Auth::user()->profile->fl4
                    @endphp 
                    @if ( $fl4 >= 100)
                        {{ "Native" }}
                    @elseif ($fl4 >= 65)
                        {{ "Fluent" }}
                    @elseif ($fl4 >= 50)
                        {{ "Proficient" }}
                    @elseif ($fl4 >= 25)
                        {{ "Basic" }}
                    @else
                        {{ "Unknown" }}
                    @endif
                  </p>
                </div>
              </div>
            </div>
            <hr> 
            <div class="row">
              <div class="col-md-3">
                <p><strong>Drivers:</strong>{{Auth::user()->profile->drivers_liscence}}</p>
                <p><strong>Notice Period:</strong>{{Auth::user()->profile->notice_period}}</p>
                <p><strong>Province:</strong>{{Auth::user()->profile->province}}</p>
                <p><strong>Employement Status:</strong>{{Auth::user()->profile->employment_status}}</p>
              </div>
            </div>           
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="card">
          <div class="card-header">
            <h5>Documents</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 mt-3">
                @if(!is_null(Auth::user()->profile->cover_letter))
                <a href="{{asset('uploads/cover_letters/' . Auth::user()->profile->cover_letter  )}}"  class="btn btn-lg btn-main" download=""> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Cover Letter </a>
                @else  
                <h6 class="underscore mb-5">No Cover  <span class="green">Letter...</span></h6>  
                @endif 
              </div>
              <div class="col-md-3 mt-3">
                @if(!is_null(Auth::user()->profile->cv))                
                <a href="{{asset('uploads/cvs/'.Auth::user()->profile->cv)}}"  class="btn btn-lg btn-main" download=""> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> CV </a>
                @else  
                <h6 class="underscore mb-5">No CV  <span class="green">found...</span></h6>  
                @endif 
              </div>
              <div class="col-md-3 mt-3">
                @if(!is_null(Auth::user()->profile->certificates))
                <a href="{{asset('uploads/certificates/' . Auth::user()->profile->certificates  )}}"  class="btn btn-lg btn-main" download=""> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Certificates </a>
                @else  
                <h6 class="underscore mb-5">No <span class="green">Certificates...</span></h6>  
                @endif 
              </div>
              <div class="col-md-3 mt-3">
                @if(!is_null(Auth::user()->profile->payslips))
                <a href="{{asset('uploads/payslips/' . Auth::user()->profile->payslips  )}}"  class="btn btn-lg btn-main" download=""> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Payslips</a>
                @else  
                <h6 class="underscore mb-5">No <span class="green">Payslips...</span></h6>  
                @endif 
              </div>
              <div class="col-md-3 mt-3">
                @if(!is_null(Auth::user()->profile->other_documents))
                <a href="{{asset('uploads/other_documents/' . Auth::user()->profile->other_documents  )}}"  class="btn btn-lg btn-main" download=""> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Other Documents</a>
                @else  
                <h6 class="underscore mb-5">No <span class="green">Other Extra Documents...</span></h6>  
                @endif 
              </div>
            </div>
            
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-6">
                <h5>Work Experience</h5>
              </div>
              <div class="col-md-6 justify-content-end">
                <div class="d-flex justify-content-end">
                  <button type="button" class="btn btn-main" data-bs-toggle="modal" data-bs-target="#addUserExperienceModal"> <i class="fas fa-plus"></i> Add Experience</button>
                </div>  
              </div>
            </div>
            
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @if(count(Auth::user()->experience) > 0)
              <table class="table">
                <thead>
                  <th>
                    Company
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                    Start
                  </th>
                  <th>
                    End
                  </th>
                  <th>
                    Manager
                  </th>
                  <th>
                    Phone
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                <tbody>
                  @foreach (Auth::user()->experience as $exp)
                    <tr>
                      <td>
                        {{$exp->title}}
                      </td>
                      <td>
                        {{$exp->company}}
                      </td>
                      <td>
                        {{$exp->start_date}}
                      </td>
                      <td>                        
                        {{$exp->present === 1 ? 'Present' : $exp->end_date}}                        
                      </td>
                      <td>
                        {{$exp->manager}}
                      </td>
                      <td>
                        {{$exp->phone}}
                      </td>
                      <td>
                        <section>
                          <form action="{{route('experience.delete',[$exp->id])}}" method="POST">
                            @csrf
                          </form>
                          <button type="button" class="btn btn-main btn-confirm-div-form btn-sm"> <i class="fas fa-trash"></i> Delete</button>
                        </section>                        
                      </td>
                    </tr>
                  @endforeach
                </tbody>

              </table>
              @else  
                <h4 class="underscore mb-5">No Work Experience  <span class="green">Found...</span></h4>  
              @endif
              
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>

  </div>
  </div>
    
</main>
<script>
  $(document).ready(function(){  
    $("#end_date").hide();  
    $("#present").change(function(){
      var present = $(this).val();
      if(present == "0")
      {
        console.log(present);
        $("#end_date").show();
        $("#end_date").attr("required", true);

      }
      else
      {
        console.log(present);
        $("#end_date").hide();
        $("#end_date").attr("required", false);
      }
    })
  })

</script>
@endsection