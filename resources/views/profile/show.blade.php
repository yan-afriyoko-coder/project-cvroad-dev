@extends('layouts.main')
@section('content')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$profile->name}} {{$profile->surname}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('cv/cv/assets/css/style.css')}}">
  </head>

  <br>  <br>  <br>  <br>
  <body>

  
    
      </div>
    </nav>
    <main class="page cv-page">
      <section class="cv-block block-intro border-bottom">
        <div class="container">
          <div class="avatar">
            <img  class="img-fluid rounded-circle" src="{{asset('uploads/avatar')}}/{{$profile->avatar}}">
          </div>
          <p>Hello! I am <strong>{{$profile->name}} {{$profile->surname}}</strong>. I work as a {{$profile->title}}. I am currently {{$profile->employment_status}}, live in {{$profile->province}} and I have around {{$profile->notice_period}} notice
        .
      <br><br>

      
      </p>

      {{Storage::url('test')}}

      @if(!empty($profile->cv))
 
      <a href="{{ Storage::url('files/'.$profile->cv) }}" class="btn btn-outline-primary">View my CV</a>
 @else
                    <p>  </p>
                  @endif


          @if(!empty($profile->cover_letter))
                            <p><a href="{{Storage::url($profile->cover_letter)}}" class="btn btn-outline-primary"> Cover Letter </a> </p>
                            @else
                             <p>  </p>
                           @endif

                           @if(!empty($profile->payslips))
                            <p><a href="{{Storage::url($profile->payslips)}}" class="btn btn-outline-primary"> Payslips </a> </p>
                            @else
                             <p> </p>
                           @endif

                           @if(!empty($profile->other_documents))
                            <p><a href="{{Storage::url($profile->other_documents)}}" class="btn btn-outline-primary"> Other Documents </a> </p>
                            @else
                             <p></p>
                           @endif


        
        </div>
      </section>
      <section class="cv-block info">
        <div class="container">
          <div class="work-experience group" id="work-experience">
            <h2 class="text-center">Work Experience</h2>
            <div class="item">
              <div class="row">
                <div class="col-md-6">
                  <h3>{{$profile->title_job1}}</h3>
                  <h4 class="organization">{{$profile->employer_job1}}</h4>
                </div>
                <div class="col-md-6">
                  <time class="period">{{$profile->date_job1}}</time>
                </div>
              </div>
             <p class="text-muted">This is where I am currently or most recently worked.</p>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-md-6">
                  <h3>{{$profile->title_job2}}</h3>
                  <h4 class="organization">{{$profile->employer_job2}}</h4>
                </div>
                <div class="col-md-6">
                  <time class="period">{{$profile->date_job2}}</time>
                </div>
              </div>
              <p class="text-muted">This was my previous position I worked in, please have a look at 
                my CV should you need more info about more of my duties and previous positions. 
              </p>
            </div>
           
          <div class="education group" id="education">
            <h2 class="text-center">Knowledge</h2>
            <div class="item">
              <div class="row">
                <div class="col-md-6">
                  <h3>Education and training:</h3>
                  <h4 class="organization">General</h4>
                </div>
                <div class="col-md-6">
                  
                </div>
              </div>
              <p class="text-muted">{!!$profile->education !!}</p>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-md-6">
                  <h3>Software Knowledge:</h3>
                  <h4 class="organization">Motor Industry and other</h4>
                </div>
                <div class="col-md-6">
                
                </div>
              </div>
              <p class="text-muted">{{$profile->software}}</p>
            </div>
          </div>
          <div class="group" id="skills">
            <div class="row">
              <div class="col-md-6">
                <div class="skills info-card">
                  <h2>Languages</h2>
                  <h3>{{$profile->first_language}}</h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$profile->fl1}}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{$profile->fl1}}%">
                    </div>
                  </div>
                  <h3>{{$profile->second_language}}</h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$profile->fl2}}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{$profile->fl2}}%">
                    </div>
                  </div>
                  <h3>{{$profile->third_language}}</h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$profile->fl3}}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{$profile->fl3}}%">
                    </div>
                  </div>

                  <h3>{{$profile->fourth_language}}</h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$profile->fl4}}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{$profile->fl4}}%">
                    </div>
                  </div>

                </div>
              </div>
            {{-- <div class="col-md-6">
                <div class="contact-info info-card">
                  <h2>Contact Info</h2>
                
                  <div class="row">
                    <div class="col-1">
                      <i class="ion-ios-telephone icon"></i>
                    </div>
                    <div class="col-9">
                      <span>+235 3217 424</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      <i class="ion-at icon"></i>
                    </div>
                    <div class="col-9">
                      <span>lorem@email.com</span>
                    </div>
                  </div>

                  --}} 
                </div>
              </div>
            </div>
          </div>
          <div class="hobbies group" id="hobbies">
            <h2 class="text-center">More about me:</h2>
            <p class="text-center text-muted">{{$profile->bio}}</p>
          </div>
        </div>
      </section>
    
    </main>
  </body>
  @endsection
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="{{asset('cv/cv/assets/js/script.js')}}"></script>
</html>

