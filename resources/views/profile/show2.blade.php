

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="external/css/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
  <link rel="stylesheet" href="{{asset('external/css/style.css')}}">
</head>


<body>
  <div class="profile-card">
    
    <div class="card-header">
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <div class="pic">
        
        <img src="{{asset('uploads/avatar')}}/{{$profile->avatar}}" alt="">
      </div>
 
      <div class="name">{{$profile->name}} {{$profile->surname}}</div>
      <div class="desc">{{$profile->title}}</div>
      <div class="address">{{$profile->address}},</div>
      <div class="address">{{$profile->province}},</div>
      <div class="employ_title">{{$profile->employment_status}}</div>

      <br>
<div class="card-body">

<hr    class="one">

<br>
      <div class="bio_title">Summary:</div>

      <div class="bio_desc">{{$profile->bio}}</div>

      <br>

      <div class="edu_title">Experience:</div>

      <div class="edu_desc">
 <p>

 <strong> Current or Last employer:</strong> {{$profile->employer_job1}}:<br><br>
{{$profile->title_job1}}-{{$profile->date_job1}}

<br><br>

<strong> Previous employer:</strong>  {{$profile->employer_job2}}:<br><br>
{{$profile->title_job2}}-{{$profile->date_job2}}
    
</p>


      <br>

      <div  class="edu_title"> <i class="fad fa-apple-alt"></i></i>Education:</div>

    <div class="edu_desc"> {!!$profile->education !!}</div>

    <br>

<div class="edu_title">Software:</div>

<div class="edu_desc">{{$profile->software}}</div>
<br>

<div class="edu_title">Languages:</div>

<div class="edu_desc">{{$profile->first_language}}</div>
<div class="edu_desc">{{$profile->second_language}}</div>
<div class="edu_desc">{{$profile->third_language}}</div>
<div class="edu_desc">{{$profile->fourth_language}}</div>






      </div>


      <div class="sm">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-github"></a>
        <a href="#" class="fab fa-youtube"></a>
      </div>
      <a href="{{Storage::url($profile->cv)}}" class="contact-btn">View CV</a>
    </div>
    <div class="card-footer">
      <div class="numbers">
        <div class="item">
          <span>{{$profile->salary_range}}</span>
         Salary
        </div>
        <div class="border"></div>
        <div class="item">
          <span>{{$profile->employment_status}}</span>
          Status
        </div>
        <div class="border"></div>
        <div class="item">
          <span>{{$profile->notice_period}}</span>
          Notice
        </div>
      </div>
    </div>
  </div>
</body>


</html>