@extends('layouts.user_type.user')

@section('content')
@php 
$new_batch = false;
$index = 0;
$batch_index = 0;
$index_count = 0;
@endphp

<main>
    <!-- Intro -->
    <div class="intro">
      <div class="container">
        <div class="intro-text">
          <h1>Looking for a job?<br><span class="green">we will help you</span></h1>
          <div class="check-out">
  
            <p>Check out our offers</p>          
            <form action="{{route('alljobs')}}" method="GET">
              @csrf
              <div class="form">            
                <div class="job-search">
                  <img style="width: 20px; margin-right: 30px;" src="{{asset('assets/img/icon/search-icon.svg')}}" alt="">
                  <input type="text" name="search" placeholder="Motor industry">
                </div>
                <div class="location">
                  <label for="lname">location:</label>
                  <input type="text" placeholder="location" name="address">
                  <input class="search main-btn" type="submit" value="Search">
                </div>
              </div>
            </form>          
            <div class="follow">
              <span>Follow Us</span>
              <a href=""><img src="{{asset('assets/img/icon/facebook-icon.svg')}}" alt=""></a>
              <a href=""><img src="{{asset('assets/img/icon/twitter-icon.svg')}}" alt=""></a>
              <a href=""><img src="{{asset('assets/img/icon/linkedin-icon.svg')}}" alt=""></a>
            </div>
          </div>
        </div>
        <div class="intro-img">
          <img src="{{asset('assets/img/intro.png')}}" alt="">
        </div>
      </div>
    </div>
     <!--Search by category-->
    <div class="container">
    <div class="search-by">
      <h1>Search by <span class="green">category</span></h1>
      <a href="">All category <img style="width: 20px; margin-left: 20px;" src="/img/icon/arrow-right-icon.svg" alt=""></a>
        <!--Start carousel-->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
          
           <div class="carousel-inner text-center">          
              @for ($count = 0; $count < $cat_loops; $count ++)
                <div class="carousel-item {{$index === 0 ? 'active' : '' }}">                
                  @foreach ($categories as $index => $cat)                  
                    @if($index >= $batch_index)           
                      @php 
                      $batch_index = $index;
                      $index_count++; 
                      @endphp        
                      <div class="card-item">
                        <div class="photo">
                          <img class="main-state" src="{{asset('assets/img/icon/business-development.svg')}}" alt="">
                          <img class="hover" src="{{asset('assets/img/icon/business-development-hover.svg')}}" alt="">
                        </div>
                        <p>{{$cat->name}}</p>
                      </div>
                      @if($index_count >= 4)
                        @break
                      @endif
                    @endif                   
                  @endforeach
                </div>
                
              @endfor
              
           </div>
           <div class="carousel-nav">
            <a class="nav-item" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"><img src="{{asset('assets/img/icon/prew-arrow.svg')}}" alt=""></a>
            <a class="nav-item" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"><img src="{{asset('assets/img/icon/next-arrow.svg')}}" alt=""></a>
           </div>
        </div>
    </div>
     <!--job offers-->
      <div class="job-offers">
        <h1>Top <span class="green">Dealers</span></h1>
        <a href="">All offers <img style="width: 20px; margin-left: 20px;" src="/img/icon/arrow-right-icon.svg" alt=""></a>
        <div class="row pt-5">
          <div class="image col-md-4">
            <img src="{{asset('assets/img/job-offers.png')}}" alt="">
          </div>
          
          <div class="col-md-4">
            @foreach ($dealers as $index => $dealer)
              @if($index == 0 || $index == 1)
              <div class="offert-wrapper">
                <div class="offert">
                  <div>
                    <div class="offert-description">
                      <div class="company-logo">
                        <img src="{{asset('uploads/logo/'.$dealers[0]['logo'])}}" alt="">
                      </div>
                      <div class="description">
                        <p class="company-name">{{$dealer->dname}}</p>
                        <p class="description">{{$dealer->description}}</p>
                      </div>
                    </div>
                    <div class="offert-meta">
                      <p class="location">Group: <span class="city">{{$dealer->group->name ?? 'not set'}}</span></p>
                      <p class="offert-counter">Jobs: <span class="green"><strong>{{count($dealer->jobs)}}</strong></span></p>
                    </div>
                  </div>
                </div>
                <a href="{{route('dealer_jobs',[$dealer->id])}}" class="main-btn">See Jobs </a>
              </div> 
              @endif
            @endforeach
          </div>
          <div class="col-md-4">
            @foreach ($dealers as $index => $dealer)
              @if($index == 2 || $index == 3)
              <div class="offert-wrapper">
                <div class="offert">
                  <div>
                    <div class="offert-description">
                      <div class="company-logo">
                        <img src="{{asset('uploads/logo/'.$dealers[0]['logo'])}}" alt="">
                      </div>
                      <div class="description">
                        <p class="company-name">{{$dealer->dname}}</p>
                        <p class="description">{{$dealer->description}}</p>
                      </div>
                    </div>
                    <div class="offert-meta">
                      <p class="location">Group: <span class="city">{{$dealer->group->name ?? ''}}</span></p>
                      <p class="offert-counter">Jobs: <span class="green"><strong>{{count($dealer->jobs)}}</strong></span></p>
                    </div>
                  </div>
                </div>
                <a href="{{route('dealer_jobs',[$dealer->id])}}" class="main-btn">See Jobs </a>
              </div> 
              @endif
            @endforeach
          </div>
  
        </div>
      </div>
</main>
@endsection
