<!-- Footer -->
<footer>
  <div class="container text-center text-md-start">
    @if(Auth::user()->isSeeker())
    <div class="footer-wrap">
      <div class="about">
        <img src="img/icon/company-logo.svg" alt="">
        @if(Auth::user()->isSeeker())
        <p class="text-muted py-4">
          Join us on the road to success and accelerate your career with CVRoad. Shift into high gear and drive your future forward today!
        </p>
        @elseif (Auth::user()->isEmployer())
        <p class="text-muted py-4">
        Take the wheel of opportunity and drive your dealership forward today!
        </p>
        @endif
        <div class="social-media">
          <a href="" class="me-2 text-reset"><img src="img/icon/facebook-icon.svg" alt=""></a>
          <a href="" class="me-2 text-reset"><img src="img/icon/twitter-icon.svg" alt=""></a>
          <a href="" class="me-2 text-reset"><img src="img/icon/linkedin-icon.svg" alt=""></a>
          <a href="" class="me-2 text-reset"><img src="img/icon/instagram-icon.svg" alt=""></a>
        </div>
      </div>
      <div class="company">
        @if(Auth::user()->isSeeker())
        <h6 class="fw-bold">Candidate</h6>
        <p><a href="">Home</a></p>
        <p><a href="">Jobs</a></p>        
        <p><a href="">Profile</a></p>
        @elseif(Auth::user()->isEmployer())
        @else   
        @endif
        
        
      </div>
      <div class="useful-links">
        @if(Auth::user()->isSeeker())
        <h6 class="fw-bold">Useful links</h6>
        <p><a href="{{route('privacy')}}">Privacy Policy</a></p>
        <p><a href="{{route('terms')}}">Terms of </a></p>
        @elseif(Auth::user()->isEmployer())
        @endif        
        
      </div>
      <div class="newsletter">
        <h6 class="fw-bold">Newsletter</h6>
        <p class="text-muted">Sign up and receive the latest tips
          via email.</p>
          <form id="subscribe" action="">
            <label for="email">Youre e-mail:</label>
            <input type="email" placeholder="e-mail:" name="email" required>
            <button type="submit" class="main-btn">Subscribe</button>
          </form>
      </div> 
    </div>
    @endif
    <div class="copyright">
      <p>&copy; {{date('Y')}} VR-ROAD | Development by <a href="https://mightyman.co.za/" title="Mightyman Technologies" target="_blank">Mightyman Technologies</a></p>      
    </div>
  </div>
</footer>