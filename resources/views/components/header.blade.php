      <!-- Header Section -->
      <header class="jumbotron jumbotron-fluid text-center mb-5" style="background-image: url({{asset('uploads/coverphoto/'.$dealership->cover_photo)}}); background-size: cover; background-position: center;">
        <div class="header-overlay">
          <div class="container">
            <img src="{{asset('uploads/logo/'.$dealership->logo)}}" class="header-logo" alt="">      
            <p class="lead">{{$dealership->dname}}</p>      
          </div>
        </div>  
      </header>