{{-- @extends('layouts.user_type.auth')
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
@endsection --}}

@extends('layouts.user_type.auth')
@section('content')
    <div class="background-gradient-green-2">
        <div class="container">
            <div class="row pt-5">
                <div class="card profile-card shadow-sm col-md-4 p-4">
                    <div class=" text-center">
                        <img src="{{ asset('assets/img/team-1.jpg') }}" alt="Profile Picture"
                            class="img-fluid rounded-circle mb-3" width="200">
                        <h4 class="mb-2">Muhammad Ibrahim</h4>
                        <p class="text-muted">Sales Manager</p>
                        <p class="text-muted">California</p>
                    </div>
                    <div class="mt-4 d-flex align-items-center border-top border-bottom border-success py-2">
                        <i class="text-green mr-2">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.2546 6.50293L19.5046 9.75293M14.0879 21.6696H22.7546M5.42122 17.3363L4.33789 21.6696L8.67122 20.5863L21.2227 8.03476C21.6289 7.62845 21.8571 7.07745 21.8571 6.50293C21.8571 5.92841 21.6289 5.3774 21.2227 4.97109L21.0364 4.78476C20.6301 4.37857 20.0791 4.15039 19.5046 4.15039C18.93 4.15039 18.379 4.37857 17.9727 4.78476L5.42122 17.3363Z"
                                    stroke="#00CA72" stroke-width="2.03125" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </i>
                        <h5 class="m-0 fw-bold ms-2">Summary</h5>
                    </div>
                    <p class="mt-3">Lörem ipsum doktiga povärunt. Kingen pons anarusade de astrojåbel. Anan tinade.
                        Kvasifyra
                        dobel semimårade ultran så nide. Anasm nenöröna, sverka.Tredat uskap ifall triage, och ohägon oliga.
                    </p>
                    <div class="mt-4 d-flex align-items-center border-top border-bottom border-success py-2">
                        <i class="text-green mr-2">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.2051 1.62305C10.0664 1.62305 7.51758 4.17186 7.51758 7.31055C7.51758 10.4492 10.0664 12.998 13.2051 12.998C16.3438 12.998 18.8926 10.4492 18.8926 7.31055C18.8926 4.17186 16.3438 1.62305 13.2051 1.62305ZM13.2051 3.24805C15.4476 3.24805 17.2676 5.06805 17.2676 7.31055C17.2676 9.55305 15.4476 11.373 13.2051 11.373C10.9626 11.373 9.14258 9.55305 9.14258 7.31055C9.14258 5.06805 10.9626 3.24805 13.2051 3.24805ZM3.45508 22.748H13.2051C13.4206 22.748 13.6272 22.8337 13.7796 22.986C13.932 23.1384 14.0176 23.3451 14.0176 23.5605C14.0176 23.776 13.932 23.9827 13.7796 24.1351C13.6272 24.2874 13.4206 24.373 13.2051 24.373H2.64258C2.42709 24.373 2.22043 24.2874 2.06805 24.1351C1.91568 23.9827 1.83008 23.776 1.83008 23.5605V21.9355C1.83008 19.9962 2.6005 18.1362 3.97186 16.7648C5.34322 15.3935 7.20318 14.623 9.14258 14.623H12.9979C13.2134 14.623 13.42 14.7086 13.5724 14.861C13.7248 15.0134 13.8104 15.2201 13.8104 15.4355C13.8104 15.651 13.7248 15.8577 13.5724 16.0101C13.42 16.1624 13.2134 16.248 12.9979 16.248H9.14258C7.63416 16.248 6.18752 16.8473 5.12091 17.9139C4.0543 18.9805 3.45508 20.4271 3.45508 21.9355V22.748ZM20.3104 14.8603C17.6202 14.8603 15.4354 17.0443 15.4354 19.7353C15.4354 22.4255 17.6202 24.6103 20.3104 24.6103C23.0006 24.6103 25.1854 22.4255 25.1854 19.7353C25.1854 17.0443 23.0006 14.8603 20.3104 14.8603ZM20.3104 16.4853C22.1044 16.4853 23.5604 17.9413 23.5604 19.7353C23.5604 21.5285 22.1044 22.9853 20.3104 22.9853C18.5164 22.9853 17.0604 21.5285 17.0604 19.7353C17.0604 17.9413 18.5164 16.4853 20.3104 16.4853Z"
                                    fill="#00CA72" stroke="#00CA72" stroke-width="0.5" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21.1211 21.5343V19.8752C21.1211 19.6597 21.0355 19.453 20.8831 19.3006C20.7307 19.1483 20.5241 19.0627 20.3086 19.0627C20.0931 19.0627 19.8864 19.1483 19.7341 19.3006C19.5817 19.453 19.4961 19.6597 19.4961 19.8752V21.5343C19.4961 21.7498 19.5817 21.9564 19.7341 22.1088C19.8864 22.2612 20.0931 22.3468 20.3086 22.3468C20.5241 22.3468 20.7307 22.2612 20.8831 22.1088C21.0355 21.9564 21.1211 21.7498 21.1211 21.5343Z"
                                    fill="#00CA72" />
                                <path
                                    d="M20.3086 18.8506C20.7573 18.8506 21.1211 18.4868 21.1211 18.0381C21.1211 17.5894 20.7573 17.2256 20.3086 17.2256C19.8599 17.2256 19.4961 17.5894 19.4961 18.0381C19.4961 18.4868 19.8599 18.8506 20.3086 18.8506Z"
                                    fill="#00CA72" />
                            </svg>
                        </i>
                        <h5 class="m-0 fw-bold ms-2">About</h5>
                    </div>
                    <div class="about-profile p-2">
                        <ul>
                            <li class="abaout-list">Phone: <span>Dummy Data</span></li>
                            <li class="abaout-list">Race: <span>Dummy Data</span></li>
                            <li class="abaout-list">Gender: <span>Dummy Data</span></li>
                            <li class="abaout-list">Language: <span>Dummy Data</span></li>
                            <li class="abaout-list">Employment Status: <span>Dummy Data</span></li>
                            <li class="abaout-list">Dealer Group: <span>Dummy Data</span></li>
                            <li class="abaout-list">Current Job: <span>Dummy Data</span></li>
                            <li class="abaout-list">Experience: <span>Dummy Data</span></li>
                            <li class="abaout-list">Department: <span>Dummy Data</span></li>
                            <li class="abaout-list">Brand: <span>Dummy Data</span></li>
                            <li class="abaout-list">Salary: <span>Dummy Data</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card profile-card shadow-sm mb-3 p-3">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center border-bottom border-success py-2">
                                <i class="text-green mr-2">
                                    <svg width="32" height="33" viewBox="0 0 32 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20 8.5C20 8.5 20 4.5 16 4.5C12 4.5 12 8.5 12 8.5M8 26.5V8.5M24 26.5V8.5M30 8.5H2V26.5H30V8.5Z"
                                            stroke="#00CA72" stroke-width="2.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </i>
                                <h5 class="m-0 fw-bold ms-2">Work Experience</h5>
                            </div>
                            <div class="mb-3">
                                <h5 class="text-green">Sales Executive</h5>
                                <p>
                                    BMW (Bayerische Motoren Werke)<br>
                                    Dec 2023 - Present - 04 Months<br>
                                    Full Time - Onsite
                                </p>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <h5 class="text-green">HR Manager</h5>
                                <p>
                                    Mitsubishi Motors Automobile manufacturer<br>
                                    Jun 2023 - Dec 2023 - 07 Months<br>
                                    Full Time - Onsite
                                </p>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <h5 class="text-green">Sales Manager</h5>
                                <p>
                                    Toyota Automotive manufacturer<br>
                                    Mar 2022 - Jun 2023 - 01 Year 01 Month<br>
                                    Full Time - Onsite
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card profile-card-2 shadow-sm mb-3 p-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center border-bottom border-success py-2">
                                <i class=" text-green mr-2">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4 13.3327C4 8.30468 4 5.79002 5.56267 4.22868C7.124 2.66602 9.63867 2.66602 14.6667 2.66602H17.3333C22.3613 2.66602 24.876 2.66602 26.4373 4.22868C28 5.79002 28 8.30468 28 13.3327V18.666C28 23.694 28 26.2087 26.4373 27.77C24.876 29.3327 22.3613 29.3327 17.3333 29.3327H14.6667C9.63867 29.3327 7.124 29.3327 5.56267 27.77C4 26.2087 4 23.694 4 18.666V13.3327Z"
                                            stroke="#00CA72" stroke-width="3.33333" />
                                        <path d="M10.666 15.9993H21.3327M10.666 10.666H21.3327M10.666 21.3327H17.3327"
                                            stroke="#00CA72" stroke-width="3.33333" stroke-linecap="round" />
                                    </svg>

                                </i>
                                <h5 class="m-0 fw-bold ms-2"> Document</h5>
                            </div>
                            <!-- Your file storage section here -->
                            <div class="row p-3">
                                <!-- First row of files -->
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <svg width="51" height="51" viewBox="0 0 51 51" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M38.4089 3.30273L47.2765 12.5465V47.6982H14.1504V47.813H47.3896V12.6628L38.4089 3.30273Z"
                                                        fill="#909090" />
                                                    <path
                                                        d="M38.3007 3.1875H14.0391V47.6977H47.2783V12.5476L38.3007 3.1875Z"
                                                        fill="#F4F4F4" />
                                                    <path d="M13.7895 5.57812H3.60547V16.4587H35.6398V5.57812H13.7895Z"
                                                        fill="#7A7B7C" />
                                                    <path d="M35.8083 16.2725H3.81055V5.384H35.8083V16.2725Z"
                                                        fill="#DD2025" />
                                                    <path
                                                        d="M14.4268 7.22616H12.3438V14.8762H13.9821V12.2959L14.3439 12.3166C14.6954 12.3105 15.0437 12.2476 15.3751 12.1301C15.6656 12.0302 15.9329 11.8724 16.1608 11.6663C16.3927 11.47 16.5755 11.2223 16.6947 10.9428C16.8545 10.4782 16.9116 9.98446 16.862 9.49566C16.8521 9.14648 16.7909 8.80066 16.6803 8.46928C16.5797 8.23007 16.4304 8.01443 16.2419 7.83607C16.0534 7.65772 15.8298 7.52057 15.5854 7.43335C15.3741 7.35684 15.1558 7.30133 14.9336 7.2676C14.7653 7.24163 14.5954 7.22779 14.4252 7.22616M14.124 10.8822H13.9821V8.52347H14.2897C14.4255 8.51368 14.5617 8.53452 14.6883 8.58445C14.8149 8.63438 14.9287 8.71213 15.0213 8.81194C15.213 9.06856 15.3154 9.38091 15.3129 9.70125C15.3129 10.0933 15.3129 10.4487 14.9591 10.6989C14.7042 10.8391 14.4141 10.9038 14.124 10.8822ZM19.9746 7.20544C19.7977 7.20544 19.6256 7.21819 19.5045 7.22297L19.1252 7.23253H17.882V14.8825H19.3451C19.9042 14.8979 20.4609 14.8031 20.9835 14.6036C21.4041 14.4368 21.7765 14.1679 22.0672 13.8211C22.3499 13.4712 22.5528 13.0638 22.6617 12.6274C22.7869 12.1331 22.848 11.6248 22.8434 11.1149C22.8743 10.5127 22.8277 9.90906 22.7047 9.31875C22.588 8.88424 22.3695 8.48377 22.0672 8.15053C21.8301 7.88145 21.5397 7.66439 21.2146 7.51303C20.9353 7.38381 20.6415 7.28856 20.3396 7.22935C20.2195 7.20951 20.0979 7.20044 19.9762 7.20225M19.6862 13.4768H19.5268V8.5936H19.5475C19.8761 8.55579 20.2085 8.61508 20.5037 8.76413C20.72 8.93677 20.8961 9.15428 21.0201 9.40163C21.1539 9.66194 21.2311 9.94765 21.2464 10.2399C21.2608 10.5906 21.2464 10.8774 21.2464 11.1149C21.2529 11.3885 21.2353 11.662 21.1938 11.9325C21.1447 12.2102 21.0539 12.4788 20.9245 12.7294C20.778 12.9623 20.5801 13.1586 20.346 13.3031C20.1493 13.4303 19.9165 13.4896 19.683 13.4721M27.7792 7.23253H23.9064V14.8825H25.5448V11.848H27.6167V10.4264H25.5448V8.65416H27.776V7.23253"
                                                        fill="#464648" />
                                                    <path
                                                        d="M34.7214 32.2808C34.7214 32.2808 39.8023 31.3596 39.8023 33.0952C39.8023 34.8308 36.6546 34.1248 34.7214 32.2808ZM30.9649 32.4131C30.1577 32.5914 29.371 32.8526 28.6173 33.1924L29.2548 31.758C29.8923 30.3237 30.5537 28.3681 30.5537 28.3681C31.3145 29.6485 32.1995 30.8506 33.1962 31.9573C32.4446 32.0693 31.6997 32.2226 30.9649 32.4163V32.4131ZM28.9536 22.0537C28.9536 20.5412 29.4429 20.1285 29.8238 20.1285C30.2047 20.1285 30.6334 20.3117 30.6478 21.625C30.5237 22.9455 30.2472 24.2472 29.8238 25.5042C29.2439 24.4488 28.9437 23.2626 28.952 22.0585L28.9536 22.0537ZM21.5443 38.8136C19.9856 37.8812 24.8131 35.0109 25.688 34.9185C25.6832 34.92 23.1763 39.789 21.5443 38.8136ZM41.2861 33.3008C41.2701 33.1414 41.1267 31.3771 37.987 31.452C36.6783 31.431 35.3703 31.5232 34.0775 31.7278C32.8253 30.4662 31.7469 29.0431 30.8709 27.4964C31.4228 25.9017 31.7568 24.2398 31.8638 22.5557C31.8176 20.6432 31.3602 19.5467 29.8939 19.5627C28.4277 19.5786 28.2141 20.8616 28.407 22.7709C28.5959 24.0539 28.9522 25.3067 29.4668 26.4971C29.4668 26.4971 28.7895 28.6056 27.8938 30.703C26.9981 32.8004 26.3861 33.9 26.3861 33.9C24.8286 34.4071 23.3623 35.1604 22.0431 36.1313C20.7299 37.3537 20.196 38.2924 20.8876 39.2311C21.4837 40.0408 23.5699 40.224 25.4346 37.7808C26.4254 36.5189 27.3305 35.1921 28.144 33.8092C28.144 33.8092 30.9872 33.0299 31.8718 32.8163C32.7563 32.6027 33.8257 32.4338 33.8257 32.4338C33.8257 32.4338 36.4219 35.046 38.9257 34.9535C41.4295 34.8611 41.3084 33.457 41.2924 33.304"
                                                        fill="#DD2025" />
                                                    <path d="M38.1699 3.31055V12.6706H47.1475L38.1699 3.31055Z"
                                                        fill="#909090" />
                                                    <path d="M38.291 3.1875V12.5476H47.2686L38.291 3.1875Z"
                                                        fill="#F4F4F4" />
                                                    <path
                                                        d="M14.3096 7.10406H12.2266V14.7541H13.8713V12.1754L14.2347 12.1961C14.5862 12.19 14.9345 12.1271 15.2658 12.0096C15.5564 11.9096 15.8236 11.7519 16.0516 11.5458C16.2817 11.349 16.4629 11.1013 16.5807 10.8223C16.7405 10.3577 16.7976 9.86395 16.748 9.37515C16.7381 9.02597 16.6769 8.68015 16.5663 8.34878C16.4657 8.10957 16.3164 7.89392 16.1279 7.71557C15.9394 7.53722 15.7158 7.40006 15.4714 7.31284C15.2591 7.23559 15.0397 7.17954 14.8164 7.14549C14.6481 7.11953 14.4782 7.10569 14.308 7.10406M14.0068 10.7601H13.8649V8.40137H14.1741C14.3099 8.39158 14.4461 8.41242 14.5727 8.46235C14.6993 8.51228 14.8131 8.59003 14.9057 8.68984C15.0974 8.94646 15.1999 9.25881 15.1973 9.57915C15.1973 9.97121 15.1973 10.3266 14.8435 10.5768C14.5886 10.717 14.2985 10.7802 14.0084 10.7585M19.8574 7.08334C19.6805 7.08334 19.5084 7.09609 19.3873 7.10087L19.0127 7.11043H17.7696V14.7604H19.2327C19.7918 14.7758 20.3485 14.681 20.8711 14.4815C21.2917 14.3147 21.6641 14.0458 21.9548 13.699C22.2375 13.3491 22.4404 12.9417 22.5493 12.5053C22.6745 12.011 22.7356 11.5027 22.731 10.9928C22.7619 10.3906 22.7153 9.78696 22.5923 9.19665C22.4756 8.76214 22.2571 8.36167 21.9548 8.02843C21.7177 7.75935 21.4273 7.54229 21.1022 7.39093C20.8229 7.26171 20.5291 7.16646 20.2272 7.10725C20.1071 7.08741 19.9855 7.07834 19.8638 7.08015M19.5737 13.3547H19.4144V8.4715H19.4351C19.7637 8.43369 20.0961 8.49298 20.3913 8.64203C20.6076 8.81467 20.7837 9.03218 20.9077 9.27953C21.0415 9.53984 21.1187 9.82555 21.134 10.1178C21.1484 10.4685 21.134 10.7553 21.134 10.9928C21.1405 11.2664 21.1229 11.5399 21.0814 11.8104C21.0323 12.0881 20.9415 12.3567 20.8121 12.6073C20.6656 12.8402 20.4677 13.0365 20.2336 13.181C20.0369 13.3082 19.8041 13.3675 19.5706 13.35M27.662 7.11043H23.7892V14.7604H25.4276V11.7259H27.4995V10.3043H25.4276V8.53206H27.6588V7.11043"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">Resume.pdf</h5>
                                                    <p class="card-text"><small class="text-body-secondary">05-06-2024</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <svg width="51" height="51" viewBox="0 0 51 51" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M38.4089 3.30273L47.2765 12.5465V47.6982H14.1504V47.813H47.3896V12.6628L38.4089 3.30273Z"
                                                        fill="#909090" />
                                                    <path
                                                        d="M38.3007 3.1875H14.0391V47.6977H47.2783V12.5476L38.3007 3.1875Z"
                                                        fill="#F4F4F4" />
                                                    <path d="M13.7895 5.57812H3.60547V16.4587H35.6398V5.57812H13.7895Z"
                                                        fill="#7A7B7C" />
                                                    <path d="M35.8083 16.2725H3.81055V5.384H35.8083V16.2725Z"
                                                        fill="#DD2025" />
                                                    <path
                                                        d="M14.4268 7.22616H12.3438V14.8762H13.9821V12.2959L14.3439 12.3166C14.6954 12.3105 15.0437 12.2476 15.3751 12.1301C15.6656 12.0302 15.9329 11.8724 16.1608 11.6663C16.3927 11.47 16.5755 11.2223 16.6947 10.9428C16.8545 10.4782 16.9116 9.98446 16.862 9.49566C16.8521 9.14648 16.7909 8.80066 16.6803 8.46928C16.5797 8.23007 16.4304 8.01443 16.2419 7.83607C16.0534 7.65772 15.8298 7.52057 15.5854 7.43335C15.3741 7.35684 15.1558 7.30133 14.9336 7.2676C14.7653 7.24163 14.5954 7.22779 14.4252 7.22616M14.124 10.8822H13.9821V8.52347H14.2897C14.4255 8.51368 14.5617 8.53452 14.6883 8.58445C14.8149 8.63438 14.9287 8.71213 15.0213 8.81194C15.213 9.06856 15.3154 9.38091 15.3129 9.70125C15.3129 10.0933 15.3129 10.4487 14.9591 10.6989C14.7042 10.8391 14.4141 10.9038 14.124 10.8822ZM19.9746 7.20544C19.7977 7.20544 19.6256 7.21819 19.5045 7.22297L19.1252 7.23253H17.882V14.8825H19.3451C19.9042 14.8979 20.4609 14.8031 20.9835 14.6036C21.4041 14.4368 21.7765 14.1679 22.0672 13.8211C22.3499 13.4712 22.5528 13.0638 22.6617 12.6274C22.7869 12.1331 22.848 11.6248 22.8434 11.1149C22.8743 10.5127 22.8277 9.90906 22.7047 9.31875C22.588 8.88424 22.3695 8.48377 22.0672 8.15053C21.8301 7.88145 21.5397 7.66439 21.2146 7.51303C20.9353 7.38381 20.6415 7.28856 20.3396 7.22935C20.2195 7.20951 20.0979 7.20044 19.9762 7.20225M19.6862 13.4768H19.5268V8.5936H19.5475C19.8761 8.55579 20.2085 8.61508 20.5037 8.76413C20.72 8.93677 20.8961 9.15428 21.0201 9.40163C21.1539 9.66194 21.2311 9.94765 21.2464 10.2399C21.2608 10.5906 21.2464 10.8774 21.2464 11.1149C21.2529 11.3885 21.2353 11.662 21.1938 11.9325C21.1447 12.2102 21.0539 12.4788 20.9245 12.7294C20.778 12.9623 20.5801 13.1586 20.346 13.3031C20.1493 13.4303 19.9165 13.4896 19.683 13.4721M27.7792 7.23253H23.9064V14.8825H25.5448V11.848H27.6167V10.4264H25.5448V8.65416H27.776V7.23253"
                                                        fill="#464648" />
                                                    <path
                                                        d="M34.7214 32.2808C34.7214 32.2808 39.8023 31.3596 39.8023 33.0952C39.8023 34.8308 36.6546 34.1248 34.7214 32.2808ZM30.9649 32.4131C30.1577 32.5914 29.371 32.8526 28.6173 33.1924L29.2548 31.758C29.8923 30.3237 30.5537 28.3681 30.5537 28.3681C31.3145 29.6485 32.1995 30.8506 33.1962 31.9573C32.4446 32.0693 31.6997 32.2226 30.9649 32.4163V32.4131ZM28.9536 22.0537C28.9536 20.5412 29.4429 20.1285 29.8238 20.1285C30.2047 20.1285 30.6334 20.3117 30.6478 21.625C30.5237 22.9455 30.2472 24.2472 29.8238 25.5042C29.2439 24.4488 28.9437 23.2626 28.952 22.0585L28.9536 22.0537ZM21.5443 38.8136C19.9856 37.8812 24.8131 35.0109 25.688 34.9185C25.6832 34.92 23.1763 39.789 21.5443 38.8136ZM41.2861 33.3008C41.2701 33.1414 41.1267 31.3771 37.987 31.452C36.6783 31.431 35.3703 31.5232 34.0775 31.7278C32.8253 30.4662 31.7469 29.0431 30.8709 27.4964C31.4228 25.9017 31.7568 24.2398 31.8638 22.5557C31.8176 20.6432 31.3602 19.5467 29.8939 19.5627C28.4277 19.5786 28.2141 20.8616 28.407 22.7709C28.5959 24.0539 28.9522 25.3067 29.4668 26.4971C29.4668 26.4971 28.7895 28.6056 27.8938 30.703C26.9981 32.8004 26.3861 33.9 26.3861 33.9C24.8286 34.4071 23.3623 35.1604 22.0431 36.1313C20.7299 37.3537 20.196 38.2924 20.8876 39.2311C21.4837 40.0408 23.5699 40.224 25.4346 37.7808C26.4254 36.5189 27.3305 35.1921 28.144 33.8092C28.144 33.8092 30.9872 33.0299 31.8718 32.8163C32.7563 32.6027 33.8257 32.4338 33.8257 32.4338C33.8257 32.4338 36.4219 35.046 38.9257 34.9535C41.4295 34.8611 41.3084 33.457 41.2924 33.304"
                                                        fill="#DD2025" />
                                                    <path d="M38.1699 3.31055V12.6706H47.1475L38.1699 3.31055Z"
                                                        fill="#909090" />
                                                    <path d="M38.291 3.1875V12.5476H47.2686L38.291 3.1875Z"
                                                        fill="#F4F4F4" />
                                                    <path
                                                        d="M14.3096 7.10406H12.2266V14.7541H13.8713V12.1754L14.2347 12.1961C14.5862 12.19 14.9345 12.1271 15.2658 12.0096C15.5564 11.9096 15.8236 11.7519 16.0516 11.5458C16.2817 11.349 16.4629 11.1013 16.5807 10.8223C16.7405 10.3577 16.7976 9.86395 16.748 9.37515C16.7381 9.02597 16.6769 8.68015 16.5663 8.34878C16.4657 8.10957 16.3164 7.89392 16.1279 7.71557C15.9394 7.53722 15.7158 7.40006 15.4714 7.31284C15.2591 7.23559 15.0397 7.17954 14.8164 7.14549C14.6481 7.11953 14.4782 7.10569 14.308 7.10406M14.0068 10.7601H13.8649V8.40137H14.1741C14.3099 8.39158 14.4461 8.41242 14.5727 8.46235C14.6993 8.51228 14.8131 8.59003 14.9057 8.68984C15.0974 8.94646 15.1999 9.25881 15.1973 9.57915C15.1973 9.97121 15.1973 10.3266 14.8435 10.5768C14.5886 10.717 14.2985 10.7802 14.0084 10.7585M19.8574 7.08334C19.6805 7.08334 19.5084 7.09609 19.3873 7.10087L19.0127 7.11043H17.7696V14.7604H19.2327C19.7918 14.7758 20.3485 14.681 20.8711 14.4815C21.2917 14.3147 21.6641 14.0458 21.9548 13.699C22.2375 13.3491 22.4404 12.9417 22.5493 12.5053C22.6745 12.011 22.7356 11.5027 22.731 10.9928C22.7619 10.3906 22.7153 9.78696 22.5923 9.19665C22.4756 8.76214 22.2571 8.36167 21.9548 8.02843C21.7177 7.75935 21.4273 7.54229 21.1022 7.39093C20.8229 7.26171 20.5291 7.16646 20.2272 7.10725C20.1071 7.08741 19.9855 7.07834 19.8638 7.08015M19.5737 13.3547H19.4144V8.4715H19.4351C19.7637 8.43369 20.0961 8.49298 20.3913 8.64203C20.6076 8.81467 20.7837 9.03218 20.9077 9.27953C21.0415 9.53984 21.1187 9.82555 21.134 10.1178C21.1484 10.4685 21.134 10.7553 21.134 10.9928C21.1405 11.2664 21.1229 11.5399 21.0814 11.8104C21.0323 12.0881 20.9415 12.3567 20.8121 12.6073C20.6656 12.8402 20.4677 13.0365 20.2336 13.181C20.0369 13.3082 19.8041 13.3675 19.5706 13.35M27.662 7.11043H23.7892V14.7604H25.4276V11.7259H27.4995V10.3043H25.4276V8.53206H27.6588V7.11043"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">Resume.pdf</h5>
                                                    <p class="card-text"><small class="text-body-secondary">05-06-2024</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <svg width="51" height="51" viewBox="0 0 51 51" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M38.4089 3.30273L47.2765 12.5465V47.6982H14.1504V47.813H47.3896V12.6628L38.4089 3.30273Z"
                                                        fill="#909090" />
                                                    <path
                                                        d="M38.3007 3.1875H14.0391V47.6977H47.2783V12.5476L38.3007 3.1875Z"
                                                        fill="#F4F4F4" />
                                                    <path d="M13.7895 5.57812H3.60547V16.4587H35.6398V5.57812H13.7895Z"
                                                        fill="#7A7B7C" />
                                                    <path d="M35.8083 16.2725H3.81055V5.384H35.8083V16.2725Z"
                                                        fill="#DD2025" />
                                                    <path
                                                        d="M14.4268 7.22616H12.3438V14.8762H13.9821V12.2959L14.3439 12.3166C14.6954 12.3105 15.0437 12.2476 15.3751 12.1301C15.6656 12.0302 15.9329 11.8724 16.1608 11.6663C16.3927 11.47 16.5755 11.2223 16.6947 10.9428C16.8545 10.4782 16.9116 9.98446 16.862 9.49566C16.8521 9.14648 16.7909 8.80066 16.6803 8.46928C16.5797 8.23007 16.4304 8.01443 16.2419 7.83607C16.0534 7.65772 15.8298 7.52057 15.5854 7.43335C15.3741 7.35684 15.1558 7.30133 14.9336 7.2676C14.7653 7.24163 14.5954 7.22779 14.4252 7.22616M14.124 10.8822H13.9821V8.52347H14.2897C14.4255 8.51368 14.5617 8.53452 14.6883 8.58445C14.8149 8.63438 14.9287 8.71213 15.0213 8.81194C15.213 9.06856 15.3154 9.38091 15.3129 9.70125C15.3129 10.0933 15.3129 10.4487 14.9591 10.6989C14.7042 10.8391 14.4141 10.9038 14.124 10.8822ZM19.9746 7.20544C19.7977 7.20544 19.6256 7.21819 19.5045 7.22297L19.1252 7.23253H17.882V14.8825H19.3451C19.9042 14.8979 20.4609 14.8031 20.9835 14.6036C21.4041 14.4368 21.7765 14.1679 22.0672 13.8211C22.3499 13.4712 22.5528 13.0638 22.6617 12.6274C22.7869 12.1331 22.848 11.6248 22.8434 11.1149C22.8743 10.5127 22.8277 9.90906 22.7047 9.31875C22.588 8.88424 22.3695 8.48377 22.0672 8.15053C21.8301 7.88145 21.5397 7.66439 21.2146 7.51303C20.9353 7.38381 20.6415 7.28856 20.3396 7.22935C20.2195 7.20951 20.0979 7.20044 19.9762 7.20225M19.6862 13.4768H19.5268V8.5936H19.5475C19.8761 8.55579 20.2085 8.61508 20.5037 8.76413C20.72 8.93677 20.8961 9.15428 21.0201 9.40163C21.1539 9.66194 21.2311 9.94765 21.2464 10.2399C21.2608 10.5906 21.2464 10.8774 21.2464 11.1149C21.2529 11.3885 21.2353 11.662 21.1938 11.9325C21.1447 12.2102 21.0539 12.4788 20.9245 12.7294C20.778 12.9623 20.5801 13.1586 20.346 13.3031C20.1493 13.4303 19.9165 13.4896 19.683 13.4721M27.7792 7.23253H23.9064V14.8825H25.5448V11.848H27.6167V10.4264H25.5448V8.65416H27.776V7.23253"
                                                        fill="#464648" />
                                                    <path
                                                        d="M34.7214 32.2808C34.7214 32.2808 39.8023 31.3596 39.8023 33.0952C39.8023 34.8308 36.6546 34.1248 34.7214 32.2808ZM30.9649 32.4131C30.1577 32.5914 29.371 32.8526 28.6173 33.1924L29.2548 31.758C29.8923 30.3237 30.5537 28.3681 30.5537 28.3681C31.3145 29.6485 32.1995 30.8506 33.1962 31.9573C32.4446 32.0693 31.6997 32.2226 30.9649 32.4163V32.4131ZM28.9536 22.0537C28.9536 20.5412 29.4429 20.1285 29.8238 20.1285C30.2047 20.1285 30.6334 20.3117 30.6478 21.625C30.5237 22.9455 30.2472 24.2472 29.8238 25.5042C29.2439 24.4488 28.9437 23.2626 28.952 22.0585L28.9536 22.0537ZM21.5443 38.8136C19.9856 37.8812 24.8131 35.0109 25.688 34.9185C25.6832 34.92 23.1763 39.789 21.5443 38.8136ZM41.2861 33.3008C41.2701 33.1414 41.1267 31.3771 37.987 31.452C36.6783 31.431 35.3703 31.5232 34.0775 31.7278C32.8253 30.4662 31.7469 29.0431 30.8709 27.4964C31.4228 25.9017 31.7568 24.2398 31.8638 22.5557C31.8176 20.6432 31.3602 19.5467 29.8939 19.5627C28.4277 19.5786 28.2141 20.8616 28.407 22.7709C28.5959 24.0539 28.9522 25.3067 29.4668 26.4971C29.4668 26.4971 28.7895 28.6056 27.8938 30.703C26.9981 32.8004 26.3861 33.9 26.3861 33.9C24.8286 34.4071 23.3623 35.1604 22.0431 36.1313C20.7299 37.3537 20.196 38.2924 20.8876 39.2311C21.4837 40.0408 23.5699 40.224 25.4346 37.7808C26.4254 36.5189 27.3305 35.1921 28.144 33.8092C28.144 33.8092 30.9872 33.0299 31.8718 32.8163C32.7563 32.6027 33.8257 32.4338 33.8257 32.4338C33.8257 32.4338 36.4219 35.046 38.9257 34.9535C41.4295 34.8611 41.3084 33.457 41.2924 33.304"
                                                        fill="#DD2025" />
                                                    <path d="M38.1699 3.31055V12.6706H47.1475L38.1699 3.31055Z"
                                                        fill="#909090" />
                                                    <path d="M38.291 3.1875V12.5476H47.2686L38.291 3.1875Z"
                                                        fill="#F4F4F4" />
                                                    <path
                                                        d="M14.3096 7.10406H12.2266V14.7541H13.8713V12.1754L14.2347 12.1961C14.5862 12.19 14.9345 12.1271 15.2658 12.0096C15.5564 11.9096 15.8236 11.7519 16.0516 11.5458C16.2817 11.349 16.4629 11.1013 16.5807 10.8223C16.7405 10.3577 16.7976 9.86395 16.748 9.37515C16.7381 9.02597 16.6769 8.68015 16.5663 8.34878C16.4657 8.10957 16.3164 7.89392 16.1279 7.71557C15.9394 7.53722 15.7158 7.40006 15.4714 7.31284C15.2591 7.23559 15.0397 7.17954 14.8164 7.14549C14.6481 7.11953 14.4782 7.10569 14.308 7.10406M14.0068 10.7601H13.8649V8.40137H14.1741C14.3099 8.39158 14.4461 8.41242 14.5727 8.46235C14.6993 8.51228 14.8131 8.59003 14.9057 8.68984C15.0974 8.94646 15.1999 9.25881 15.1973 9.57915C15.1973 9.97121 15.1973 10.3266 14.8435 10.5768C14.5886 10.717 14.2985 10.7802 14.0084 10.7585M19.8574 7.08334C19.6805 7.08334 19.5084 7.09609 19.3873 7.10087L19.0127 7.11043H17.7696V14.7604H19.2327C19.7918 14.7758 20.3485 14.681 20.8711 14.4815C21.2917 14.3147 21.6641 14.0458 21.9548 13.699C22.2375 13.3491 22.4404 12.9417 22.5493 12.5053C22.6745 12.011 22.7356 11.5027 22.731 10.9928C22.7619 10.3906 22.7153 9.78696 22.5923 9.19665C22.4756 8.76214 22.2571 8.36167 21.9548 8.02843C21.7177 7.75935 21.4273 7.54229 21.1022 7.39093C20.8229 7.26171 20.5291 7.16646 20.2272 7.10725C20.1071 7.08741 19.9855 7.07834 19.8638 7.08015M19.5737 13.3547H19.4144V8.4715H19.4351C19.7637 8.43369 20.0961 8.49298 20.3913 8.64203C20.6076 8.81467 20.7837 9.03218 20.9077 9.27953C21.0415 9.53984 21.1187 9.82555 21.134 10.1178C21.1484 10.4685 21.134 10.7553 21.134 10.9928C21.1405 11.2664 21.1229 11.5399 21.0814 11.8104C21.0323 12.0881 20.9415 12.3567 20.8121 12.6073C20.6656 12.8402 20.4677 13.0365 20.2336 13.181C20.0369 13.3082 19.8041 13.3675 19.5706 13.35M27.662 7.11043H23.7892V14.7604H25.4276V11.7259H27.4995V10.3043H25.4276V8.53206H27.6588V7.11043"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">Resume.pdf</h5>
                                                    <p class="card-text"><small class="text-body-secondary">05-06-2024</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-3">
                                <!-- First row of files -->
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <svg width="51" height="51" viewBox="0 0 51 51" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M38.4089 3.30273L47.2765 12.5465V47.6982H14.1504V47.813H47.3896V12.6628L38.4089 3.30273Z"
                                                        fill="#909090" />
                                                    <path
                                                        d="M38.3007 3.1875H14.0391V47.6977H47.2783V12.5476L38.3007 3.1875Z"
                                                        fill="#F4F4F4" />
                                                    <path d="M13.7895 5.57812H3.60547V16.4587H35.6398V5.57812H13.7895Z"
                                                        fill="#7A7B7C" />
                                                    <path d="M35.8083 16.2725H3.81055V5.384H35.8083V16.2725Z"
                                                        fill="#DD2025" />
                                                    <path
                                                        d="M14.4268 7.22616H12.3438V14.8762H13.9821V12.2959L14.3439 12.3166C14.6954 12.3105 15.0437 12.2476 15.3751 12.1301C15.6656 12.0302 15.9329 11.8724 16.1608 11.6663C16.3927 11.47 16.5755 11.2223 16.6947 10.9428C16.8545 10.4782 16.9116 9.98446 16.862 9.49566C16.8521 9.14648 16.7909 8.80066 16.6803 8.46928C16.5797 8.23007 16.4304 8.01443 16.2419 7.83607C16.0534 7.65772 15.8298 7.52057 15.5854 7.43335C15.3741 7.35684 15.1558 7.30133 14.9336 7.2676C14.7653 7.24163 14.5954 7.22779 14.4252 7.22616M14.124 10.8822H13.9821V8.52347H14.2897C14.4255 8.51368 14.5617 8.53452 14.6883 8.58445C14.8149 8.63438 14.9287 8.71213 15.0213 8.81194C15.213 9.06856 15.3154 9.38091 15.3129 9.70125C15.3129 10.0933 15.3129 10.4487 14.9591 10.6989C14.7042 10.8391 14.4141 10.9038 14.124 10.8822ZM19.9746 7.20544C19.7977 7.20544 19.6256 7.21819 19.5045 7.22297L19.1252 7.23253H17.882V14.8825H19.3451C19.9042 14.8979 20.4609 14.8031 20.9835 14.6036C21.4041 14.4368 21.7765 14.1679 22.0672 13.8211C22.3499 13.4712 22.5528 13.0638 22.6617 12.6274C22.7869 12.1331 22.848 11.6248 22.8434 11.1149C22.8743 10.5127 22.8277 9.90906 22.7047 9.31875C22.588 8.88424 22.3695 8.48377 22.0672 8.15053C21.8301 7.88145 21.5397 7.66439 21.2146 7.51303C20.9353 7.38381 20.6415 7.28856 20.3396 7.22935C20.2195 7.20951 20.0979 7.20044 19.9762 7.20225M19.6862 13.4768H19.5268V8.5936H19.5475C19.8761 8.55579 20.2085 8.61508 20.5037 8.76413C20.72 8.93677 20.8961 9.15428 21.0201 9.40163C21.1539 9.66194 21.2311 9.94765 21.2464 10.2399C21.2608 10.5906 21.2464 10.8774 21.2464 11.1149C21.2529 11.3885 21.2353 11.662 21.1938 11.9325C21.1447 12.2102 21.0539 12.4788 20.9245 12.7294C20.778 12.9623 20.5801 13.1586 20.346 13.3031C20.1493 13.4303 19.9165 13.4896 19.683 13.4721M27.7792 7.23253H23.9064V14.8825H25.5448V11.848H27.6167V10.4264H25.5448V8.65416H27.776V7.23253"
                                                        fill="#464648" />
                                                    <path
                                                        d="M34.7214 32.2808C34.7214 32.2808 39.8023 31.3596 39.8023 33.0952C39.8023 34.8308 36.6546 34.1248 34.7214 32.2808ZM30.9649 32.4131C30.1577 32.5914 29.371 32.8526 28.6173 33.1924L29.2548 31.758C29.8923 30.3237 30.5537 28.3681 30.5537 28.3681C31.3145 29.6485 32.1995 30.8506 33.1962 31.9573C32.4446 32.0693 31.6997 32.2226 30.9649 32.4163V32.4131ZM28.9536 22.0537C28.9536 20.5412 29.4429 20.1285 29.8238 20.1285C30.2047 20.1285 30.6334 20.3117 30.6478 21.625C30.5237 22.9455 30.2472 24.2472 29.8238 25.5042C29.2439 24.4488 28.9437 23.2626 28.952 22.0585L28.9536 22.0537ZM21.5443 38.8136C19.9856 37.8812 24.8131 35.0109 25.688 34.9185C25.6832 34.92 23.1763 39.789 21.5443 38.8136ZM41.2861 33.3008C41.2701 33.1414 41.1267 31.3771 37.987 31.452C36.6783 31.431 35.3703 31.5232 34.0775 31.7278C32.8253 30.4662 31.7469 29.0431 30.8709 27.4964C31.4228 25.9017 31.7568 24.2398 31.8638 22.5557C31.8176 20.6432 31.3602 19.5467 29.8939 19.5627C28.4277 19.5786 28.2141 20.8616 28.407 22.7709C28.5959 24.0539 28.9522 25.3067 29.4668 26.4971C29.4668 26.4971 28.7895 28.6056 27.8938 30.703C26.9981 32.8004 26.3861 33.9 26.3861 33.9C24.8286 34.4071 23.3623 35.1604 22.0431 36.1313C20.7299 37.3537 20.196 38.2924 20.8876 39.2311C21.4837 40.0408 23.5699 40.224 25.4346 37.7808C26.4254 36.5189 27.3305 35.1921 28.144 33.8092C28.144 33.8092 30.9872 33.0299 31.8718 32.8163C32.7563 32.6027 33.8257 32.4338 33.8257 32.4338C33.8257 32.4338 36.4219 35.046 38.9257 34.9535C41.4295 34.8611 41.3084 33.457 41.2924 33.304"
                                                        fill="#DD2025" />
                                                    <path d="M38.1699 3.31055V12.6706H47.1475L38.1699 3.31055Z"
                                                        fill="#909090" />
                                                    <path d="M38.291 3.1875V12.5476H47.2686L38.291 3.1875Z"
                                                        fill="#F4F4F4" />
                                                    <path
                                                        d="M14.3096 7.10406H12.2266V14.7541H13.8713V12.1754L14.2347 12.1961C14.5862 12.19 14.9345 12.1271 15.2658 12.0096C15.5564 11.9096 15.8236 11.7519 16.0516 11.5458C16.2817 11.349 16.4629 11.1013 16.5807 10.8223C16.7405 10.3577 16.7976 9.86395 16.748 9.37515C16.7381 9.02597 16.6769 8.68015 16.5663 8.34878C16.4657 8.10957 16.3164 7.89392 16.1279 7.71557C15.9394 7.53722 15.7158 7.40006 15.4714 7.31284C15.2591 7.23559 15.0397 7.17954 14.8164 7.14549C14.6481 7.11953 14.4782 7.10569 14.308 7.10406M14.0068 10.7601H13.8649V8.40137H14.1741C14.3099 8.39158 14.4461 8.41242 14.5727 8.46235C14.6993 8.51228 14.8131 8.59003 14.9057 8.68984C15.0974 8.94646 15.1999 9.25881 15.1973 9.57915C15.1973 9.97121 15.1973 10.3266 14.8435 10.5768C14.5886 10.717 14.2985 10.7802 14.0084 10.7585M19.8574 7.08334C19.6805 7.08334 19.5084 7.09609 19.3873 7.10087L19.0127 7.11043H17.7696V14.7604H19.2327C19.7918 14.7758 20.3485 14.681 20.8711 14.4815C21.2917 14.3147 21.6641 14.0458 21.9548 13.699C22.2375 13.3491 22.4404 12.9417 22.5493 12.5053C22.6745 12.011 22.7356 11.5027 22.731 10.9928C22.7619 10.3906 22.7153 9.78696 22.5923 9.19665C22.4756 8.76214 22.2571 8.36167 21.9548 8.02843C21.7177 7.75935 21.4273 7.54229 21.1022 7.39093C20.8229 7.26171 20.5291 7.16646 20.2272 7.10725C20.1071 7.08741 19.9855 7.07834 19.8638 7.08015M19.5737 13.3547H19.4144V8.4715H19.4351C19.7637 8.43369 20.0961 8.49298 20.3913 8.64203C20.6076 8.81467 20.7837 9.03218 20.9077 9.27953C21.0415 9.53984 21.1187 9.82555 21.134 10.1178C21.1484 10.4685 21.134 10.7553 21.134 10.9928C21.1405 11.2664 21.1229 11.5399 21.0814 11.8104C21.0323 12.0881 20.9415 12.3567 20.8121 12.6073C20.6656 12.8402 20.4677 13.0365 20.2336 13.181C20.0369 13.3082 19.8041 13.3675 19.5706 13.35M27.662 7.11043H23.7892V14.7604H25.4276V11.7259H27.4995V10.3043H25.4276V8.53206H27.6588V7.11043"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">Certificate.pdf</h5>
                                                    <p class="card-text"><small class="text-body-secondary">05-06-2024</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <svg width="51" height="51" viewBox="0 0 51 51" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M38.4089 3.30273L47.2765 12.5465V47.6982H14.1504V47.813H47.3896V12.6628L38.4089 3.30273Z"
                                                        fill="#909090" />
                                                    <path
                                                        d="M38.3007 3.1875H14.0391V47.6977H47.2783V12.5476L38.3007 3.1875Z"
                                                        fill="#F4F4F4" />
                                                    <path d="M13.7895 5.57812H3.60547V16.4587H35.6398V5.57812H13.7895Z"
                                                        fill="#7A7B7C" />
                                                    <path d="M35.8083 16.2725H3.81055V5.384H35.8083V16.2725Z"
                                                        fill="#DD2025" />
                                                    <path
                                                        d="M14.4268 7.22616H12.3438V14.8762H13.9821V12.2959L14.3439 12.3166C14.6954 12.3105 15.0437 12.2476 15.3751 12.1301C15.6656 12.0302 15.9329 11.8724 16.1608 11.6663C16.3927 11.47 16.5755 11.2223 16.6947 10.9428C16.8545 10.4782 16.9116 9.98446 16.862 9.49566C16.8521 9.14648 16.7909 8.80066 16.6803 8.46928C16.5797 8.23007 16.4304 8.01443 16.2419 7.83607C16.0534 7.65772 15.8298 7.52057 15.5854 7.43335C15.3741 7.35684 15.1558 7.30133 14.9336 7.2676C14.7653 7.24163 14.5954 7.22779 14.4252 7.22616M14.124 10.8822H13.9821V8.52347H14.2897C14.4255 8.51368 14.5617 8.53452 14.6883 8.58445C14.8149 8.63438 14.9287 8.71213 15.0213 8.81194C15.213 9.06856 15.3154 9.38091 15.3129 9.70125C15.3129 10.0933 15.3129 10.4487 14.9591 10.6989C14.7042 10.8391 14.4141 10.9038 14.124 10.8822ZM19.9746 7.20544C19.7977 7.20544 19.6256 7.21819 19.5045 7.22297L19.1252 7.23253H17.882V14.8825H19.3451C19.9042 14.8979 20.4609 14.8031 20.9835 14.6036C21.4041 14.4368 21.7765 14.1679 22.0672 13.8211C22.3499 13.4712 22.5528 13.0638 22.6617 12.6274C22.7869 12.1331 22.848 11.6248 22.8434 11.1149C22.8743 10.5127 22.8277 9.90906 22.7047 9.31875C22.588 8.88424 22.3695 8.48377 22.0672 8.15053C21.8301 7.88145 21.5397 7.66439 21.2146 7.51303C20.9353 7.38381 20.6415 7.28856 20.3396 7.22935C20.2195 7.20951 20.0979 7.20044 19.9762 7.20225M19.6862 13.4768H19.5268V8.5936H19.5475C19.8761 8.55579 20.2085 8.61508 20.5037 8.76413C20.72 8.93677 20.8961 9.15428 21.0201 9.40163C21.1539 9.66194 21.2311 9.94765 21.2464 10.2399C21.2608 10.5906 21.2464 10.8774 21.2464 11.1149C21.2529 11.3885 21.2353 11.662 21.1938 11.9325C21.1447 12.2102 21.0539 12.4788 20.9245 12.7294C20.778 12.9623 20.5801 13.1586 20.346 13.3031C20.1493 13.4303 19.9165 13.4896 19.683 13.4721M27.7792 7.23253H23.9064V14.8825H25.5448V11.848H27.6167V10.4264H25.5448V8.65416H27.776V7.23253"
                                                        fill="#464648" />
                                                    <path
                                                        d="M34.7214 32.2808C34.7214 32.2808 39.8023 31.3596 39.8023 33.0952C39.8023 34.8308 36.6546 34.1248 34.7214 32.2808ZM30.9649 32.4131C30.1577 32.5914 29.371 32.8526 28.6173 33.1924L29.2548 31.758C29.8923 30.3237 30.5537 28.3681 30.5537 28.3681C31.3145 29.6485 32.1995 30.8506 33.1962 31.9573C32.4446 32.0693 31.6997 32.2226 30.9649 32.4163V32.4131ZM28.9536 22.0537C28.9536 20.5412 29.4429 20.1285 29.8238 20.1285C30.2047 20.1285 30.6334 20.3117 30.6478 21.625C30.5237 22.9455 30.2472 24.2472 29.8238 25.5042C29.2439 24.4488 28.9437 23.2626 28.952 22.0585L28.9536 22.0537ZM21.5443 38.8136C19.9856 37.8812 24.8131 35.0109 25.688 34.9185C25.6832 34.92 23.1763 39.789 21.5443 38.8136ZM41.2861 33.3008C41.2701 33.1414 41.1267 31.3771 37.987 31.452C36.6783 31.431 35.3703 31.5232 34.0775 31.7278C32.8253 30.4662 31.7469 29.0431 30.8709 27.4964C31.4228 25.9017 31.7568 24.2398 31.8638 22.5557C31.8176 20.6432 31.3602 19.5467 29.8939 19.5627C28.4277 19.5786 28.2141 20.8616 28.407 22.7709C28.5959 24.0539 28.9522 25.3067 29.4668 26.4971C29.4668 26.4971 28.7895 28.6056 27.8938 30.703C26.9981 32.8004 26.3861 33.9 26.3861 33.9C24.8286 34.4071 23.3623 35.1604 22.0431 36.1313C20.7299 37.3537 20.196 38.2924 20.8876 39.2311C21.4837 40.0408 23.5699 40.224 25.4346 37.7808C26.4254 36.5189 27.3305 35.1921 28.144 33.8092C28.144 33.8092 30.9872 33.0299 31.8718 32.8163C32.7563 32.6027 33.8257 32.4338 33.8257 32.4338C33.8257 32.4338 36.4219 35.046 38.9257 34.9535C41.4295 34.8611 41.3084 33.457 41.2924 33.304"
                                                        fill="#DD2025" />
                                                    <path d="M38.1699 3.31055V12.6706H47.1475L38.1699 3.31055Z"
                                                        fill="#909090" />
                                                    <path d="M38.291 3.1875V12.5476H47.2686L38.291 3.1875Z"
                                                        fill="#F4F4F4" />
                                                    <path
                                                        d="M14.3096 7.10406H12.2266V14.7541H13.8713V12.1754L14.2347 12.1961C14.5862 12.19 14.9345 12.1271 15.2658 12.0096C15.5564 11.9096 15.8236 11.7519 16.0516 11.5458C16.2817 11.349 16.4629 11.1013 16.5807 10.8223C16.7405 10.3577 16.7976 9.86395 16.748 9.37515C16.7381 9.02597 16.6769 8.68015 16.5663 8.34878C16.4657 8.10957 16.3164 7.89392 16.1279 7.71557C15.9394 7.53722 15.7158 7.40006 15.4714 7.31284C15.2591 7.23559 15.0397 7.17954 14.8164 7.14549C14.6481 7.11953 14.4782 7.10569 14.308 7.10406M14.0068 10.7601H13.8649V8.40137H14.1741C14.3099 8.39158 14.4461 8.41242 14.5727 8.46235C14.6993 8.51228 14.8131 8.59003 14.9057 8.68984C15.0974 8.94646 15.1999 9.25881 15.1973 9.57915C15.1973 9.97121 15.1973 10.3266 14.8435 10.5768C14.5886 10.717 14.2985 10.7802 14.0084 10.7585M19.8574 7.08334C19.6805 7.08334 19.5084 7.09609 19.3873 7.10087L19.0127 7.11043H17.7696V14.7604H19.2327C19.7918 14.7758 20.3485 14.681 20.8711 14.4815C21.2917 14.3147 21.6641 14.0458 21.9548 13.699C22.2375 13.3491 22.4404 12.9417 22.5493 12.5053C22.6745 12.011 22.7356 11.5027 22.731 10.9928C22.7619 10.3906 22.7153 9.78696 22.5923 9.19665C22.4756 8.76214 22.2571 8.36167 21.9548 8.02843C21.7177 7.75935 21.4273 7.54229 21.1022 7.39093C20.8229 7.26171 20.5291 7.16646 20.2272 7.10725C20.1071 7.08741 19.9855 7.07834 19.8638 7.08015M19.5737 13.3547H19.4144V8.4715H19.4351C19.7637 8.43369 20.0961 8.49298 20.3913 8.64203C20.6076 8.81467 20.7837 9.03218 20.9077 9.27953C21.0415 9.53984 21.1187 9.82555 21.134 10.1178C21.1484 10.4685 21.134 10.7553 21.134 10.9928C21.1405 11.2664 21.1229 11.5399 21.0814 11.8104C21.0323 12.0881 20.9415 12.3567 20.8121 12.6073C20.6656 12.8402 20.4677 13.0365 20.2336 13.181C20.0369 13.3082 19.8041 13.3675 19.5706 13.35M27.662 7.11043H23.7892V14.7604H25.4276V11.7259H27.4995V10.3043H25.4276V8.53206H27.6588V7.11043"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">Cover Letter.pdf</h5>
                                                    <p class="card-text"><small class="text-body-secondary">05-06-2024</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Additional rows of files if needed -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
