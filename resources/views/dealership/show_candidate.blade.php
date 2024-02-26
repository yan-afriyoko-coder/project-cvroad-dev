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
          <input type="hidden" name="user_id" value="{{$user->id}}">
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
            <h3><span class="green">{{$user->profile->name}} </span>{{$user->profile->surname}} &nbsp; </h3>                                  
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
                      @if($user->profile->avatar)
                        <img src="{{asset('uploads/avatar/'. $user->profile->avatar)}}" width="200px">
                      @else  
                        <img src="{{asset('uploads/avatar/account.png')}}" width="200px" alt="">
                      @endif
                    </div>
                  </div>
                </div>                
              </div>

              <div class="col-md-8">          
                <ul class="list-group">
                  <li class="list-group-item"><strong>Name:</strong> {{$user->profile->surname}} {{$user->profile->name}}</li>                              
                  <li class="list-group-item"><strong>Phone:</strong> {{$user->profile->phone_number}}</li>
                  <li class="list-group-item"><strong>Race:</strong> {{$user->profile->race}}</li>
                  <li class="list-group-item"><strong>Gender:</strong> {{$user->profile->gender}}</li>
                  
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
              <li class="list-group-item"><strong>Dealer Group:</strong> {{$user->profile->group->name ?? 'Not set' }}</li>
              <li class="list-group-item"><strong>Current Job Title:</strong> {{$user->profile->title}}</li>
              <li class="list-group-item"><strong>Dealer Experience:</strong> {{$user->profile->dealer_experience ?? '0'}} Yrs</li>                  
              <li class="list-group-item"><strong>Department:</strong> {{$user->profile->department->name ?? 'Not set'}}</li>                  
              <li class="list-group-item"><strong>Brand:</strong> {{$user->profile->brand->name ?? 'Not set'}}</li>  
              <li class="list-group-item"><strong>Salary:</strong> {{$user->profile->salary_range ?? 'Not set'}}</li>                  
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
                <p>{{$user->profile->bio}}</p>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="mt-2">
                  <strong>First Language:</strong>
                  <p>{{$user->profile->first_language}}</p>
                  <p>
                    @php 
                    $fl1 = $user->profile->fl1
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
                  <p>{{$user->profile->second_language}}</p>
                  <p>
                    @php 
                    $fl2 = $user->profile->fl2
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
                  <p>{{$user->profile->third_language}}</p>
                  <p>
                    @php 
                    $fl3 = $user->profile->fl3
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
                  <p>{{$user->profile->fourth_language}}</p>
                  <p>
                    @php 
                    $fl4 = $user->profile->fl4
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
                <p><strong>Drivers:</strong>{{$user->profile->drivers_liscence}}</p>
                <p><strong>Notice Period:</strong>{{$user->profile->notice_period}}</p>
                <p><strong>Province:</strong>{{$user->profile->province}}</p>
                <p><strong>Employement Status:</strong>{{$user->profile->employment_status}}</p>
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
                @if(!is_null($user->profile->cover_letter))
                <a href="{{asset('uploads/cover_letters/' . $user->profile->cover_letter  )}}" class="btn btn-lg btn-main" download=""> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Cover Letter </a>
                @else  
                <h6 class="underscore mb-5">No Cover  <span class="green">Letter...</span></h6>  
                @endif 
              </div>
              <div class="col-md-3 mt-3">
                @if(!is_null($user->profile->cv))
                <a href="{{asset('uploads/cvs/' . $user->profile->cv  )}}" class="btn btn-lg btn-main" download=""> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> CV </a>
                @else  
                <h6 class="underscore mb-5">No CV  <span class="green">found...</span></h6>  
                @endif 
              </div>
              <div class="col-md-3 mt-3">
                @if(!is_null($user->profile->certificates))
                <a href="{{asset('uploads/certificates/' . $user->profile->certificates  )}}" target="_blank" class="btn btn-lg btn-main" download=""> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Certificates </a>
                @else  
                <h6 class="underscore mb-5">No <span class="green">Certificates...</span></h6>  
                @endif 
              </div>
              <div class="col-md-3 mt-3">
                @if(!is_null($user->profile->payslips))
                <a href="{{asset('uploads/payslips/' . $user->profile->payslips  )}}" target="_blank" class="btn btn-lg btn-main" download> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Payslips</a>
                @else  
                <h6 class="underscore mb-5">No <span class="green">Payslips...</span></h6>  
                @endif 
              </div>

              <div class="col-md-3 mt-3">
                @if(!is_null($user->profile->other_documents))
                <a href="{{asset('uploads/other_documents/' . $user->profile->other_documents  )}}" target="_blank" class="btn btn-lg btn-main" download=""> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Other Documents</a>
                @else  
                <h6 class="underscore mb-5">No <span class="green">other_documents...</span></h6>  
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
                  
                </div>  
              </div>
            </div>
            
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @if(count($user->experience) > 0)
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
                </thead>
                <tbody>
                  @foreach ($user->experience as $exp)
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