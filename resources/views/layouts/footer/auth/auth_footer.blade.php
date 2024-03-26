{{-- <!-- Footer -->
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
</footer> --}}

<!-- Footer -->
{{-- @section('footer') --}}
    <footer class="background-green-footer">
        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <img class="w-25" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                        </div>
                        <div class="description">
                            @if (Auth::user()->isSeeker())
                                <p class="text-black py-3">
                                    Some footer text about the Agency.<br> Just a little description to help<br> people
                                    understand
                                    you better.
                                </p>
                            @elseif (Auth::user()->isEmployer())
                                <p class="text-black py-3">
                                    Take the wheel of opportunity and drive your dealership forward today!
                                </p>
                            @endif
                            <div>
                                <a href="" class="me-2 text-decoration-none">
                                    <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20.4092" cy="20.4092" r="20.4092" fill="white"
                                            fill-opacity="0.3" />
                                        <path
                                            d="M21.4915 29.1857V21.0995H24.2195L24.625 17.9335H21.4915V15.9169C21.4915 15.0033 21.7461 14.3778 23.0573 14.3778H24.7187V11.5552C23.9103 11.4685 23.0978 11.4267 22.2848 11.4299C19.8735 11.4299 18.218 12.9019 18.218 15.6042V17.9276H15.5078V21.0936H18.2239V29.1857H21.4915Z"
                                            fill="#333333" />
                                    </svg>
                                </a>
                                <a href="" class="me-2 text-decoration-none">
                                    <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20.5344" cy="20.4092" r="20.4092" fill="white"
                                            fill-opacity="0.3" />
                                        <path
                                            d="M30.4101 15.5396C29.7768 15.8203 29.0964 16.0099 28.3812 16.0956C29.1192 15.654 29.6713 14.959 29.9346 14.1402C29.2412 14.5521 28.4823 14.842 27.6909 14.9973C27.1588 14.4291 26.4539 14.0525 25.6857 13.9259C24.9176 13.7994 24.1291 13.93 23.4428 14.2974C22.7564 14.6649 22.2106 15.2487 21.8901 15.9581C21.5695 16.6676 21.4922 17.463 21.67 18.2209C20.265 18.1504 18.8906 17.7852 17.6359 17.1491C16.3812 16.513 15.2742 15.6202 14.3869 14.5286C14.0835 15.0519 13.9091 15.6587 13.9091 16.305C13.9087 16.8867 14.052 17.4596 14.3262 17.9727C14.6003 18.4858 14.9969 18.9233 15.4807 19.2464C14.9196 19.2286 14.3709 19.0769 13.8803 18.8042V18.8497C13.8802 19.6657 14.1624 20.4565 14.6791 21.088C15.1957 21.7196 15.915 22.1529 16.7147 22.3145C16.1943 22.4554 15.6486 22.4761 15.1189 22.3752C15.3445 23.0773 15.7841 23.6912 16.376 24.1311C16.9679 24.5709 17.6825 24.8147 18.4198 24.8282C17.1682 25.8107 15.6224 26.3437 14.0312 26.3414C13.7493 26.3414 13.4677 26.325 13.1877 26.2921C14.8029 27.3306 16.6831 27.8817 18.6034 27.8796C25.1037 27.8796 28.6573 22.4958 28.6573 17.8265C28.6573 17.6748 28.6535 17.5216 28.6466 17.3699C29.3378 16.87 29.9345 16.251 30.4086 15.5419L30.4101 15.5396Z"
                                            fill="#333333" />
                                    </svg>
                                </a>
                                <a href="" class="me-2 text-decoration-none">
                                    <svg width="42" height="41" viewBox="0 0 42 41" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20.6597" cy="20.4092" r="20.4092" fill="white"
                                            fill-opacity="0.3" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M28.4391 26.5325H25.3039V21.6273C25.3039 20.4569 25.2842 18.9528 23.6751 18.9528C22.0441 18.9528 21.7949 20.2274 21.7949 21.5428V26.5325H18.6628V16.4443H21.6681V17.8239H21.7119C22.1294 17.031 23.1526 16.1944 24.6779 16.1944C27.8523 16.1944 28.4383 18.283 28.4383 20.9998L28.4391 26.5325ZM15.1281 15.067C14.8892 15.0672 14.6526 15.0203 14.4318 14.929C14.211 14.8376 14.0104 14.7036 13.8414 14.5347C13.6725 14.3657 13.5385 14.1651 13.4471 13.9443C13.3558 13.7235 13.3089 13.4869 13.3091 13.248C13.3091 12.8884 13.4157 12.5369 13.6154 12.2379C13.8151 11.939 14.099 11.7059 14.4312 11.5682C14.7634 11.4306 15.1289 11.3945 15.4815 11.4645C15.8342 11.5346 16.1582 11.7076 16.4126 11.9617C16.6669 12.2159 16.8402 12.5397 16.9105 12.8923C16.9809 13.2449 16.9451 13.6105 16.8077 13.9428C16.6703 14.275 16.4375 14.5591 16.1387 14.7591C15.8398 14.9591 15.4884 15.066 15.1289 15.0663L15.1281 15.067ZM16.6965 26.5325H13.5583V16.4443H16.6965V26.5325Z"
                                            fill="#333333" />
                                    </svg>
                                </a>
                                <a href="" class="me-2 text-decoration-none">
                                    <svg width="42" height="41" viewBox="0 0 42 41" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.375732" width="41.0003" height="41" rx="20.5" fill="white"
                                            fill-opacity="0.3" />
                                        <path
                                            d="M20.8739 17.9989C19.4967 17.9989 18.3728 19.1228 18.3728 20.5C18.3728 21.8772 19.4967 23.0011 20.8739 23.0011C22.251 23.0011 23.3749 21.8772 23.3749 20.5C23.3749 19.1228 22.251 17.9989 20.8739 17.9989ZM28.3752 20.5C28.3752 19.4643 28.3846 18.438 28.3264 17.4042C28.2682 16.2033 27.9943 15.1376 27.1162 14.2595C26.2362 13.3796 25.1724 13.1075 23.9716 13.0493C22.9359 12.9912 21.9096 13.0006 20.8757 13.0006C19.84 13.0006 18.8137 12.9912 17.7799 13.0493C16.5791 13.1075 15.5134 13.3814 14.6353 14.2595C13.7553 15.1395 13.4832 16.2033 13.4251 17.4042C13.3669 18.4399 13.3763 19.4662 13.3763 20.5C13.3763 21.5338 13.3669 22.562 13.4251 23.5958C13.4832 24.7967 13.7572 25.8624 14.6353 26.7405C15.5152 27.6204 16.5791 27.8925 17.7799 27.9507C18.8156 28.0088 19.8419 27.9994 20.8757 27.9994C21.9114 27.9994 22.9378 28.0088 23.9716 27.9507C25.1724 27.8925 26.2381 27.6186 27.1162 26.7405C27.9962 25.8605 28.2682 24.7967 28.3264 23.5958C28.3864 22.562 28.3752 21.5357 28.3752 20.5ZM20.8739 24.3482C18.7443 24.3482 17.0256 22.6296 17.0256 20.5C17.0256 18.3704 18.7443 16.6518 20.8739 16.6518C23.0034 16.6518 24.7221 18.3704 24.7221 20.5C24.7221 22.6296 23.0034 24.3482 20.8739 24.3482ZM24.8797 17.3929C24.3825 17.3929 23.981 16.9914 23.981 16.4942C23.981 15.997 24.3825 15.5954 24.8797 15.5954C25.3769 15.5954 25.7784 15.997 25.7784 16.4942C25.7786 16.6122 25.7554 16.7292 25.7103 16.8383C25.6652 16.9474 25.599 17.0465 25.5155 17.13C25.432 17.2135 25.3329 17.2797 25.2238 17.3248C25.1147 17.3699 24.9978 17.393 24.8797 17.3929Z"
                                            fill="#333333" />
                                    </svg>
                                </a>                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-5">
                        @if (Auth::user()->isSeeker())
                            <h6 class="fw-bold">Quick Links</h6>
                            <p><a href="" class="text-dark text-decoration-none">Service</a></p>
                            <p><a href="" class="text-dark text-decoration-none">Portfolio</a></p>
                            <p><a href="" class="text-dark text-decoration-none">About Us</a></p>
                            <p><a href="" class="text-dark text-decoration-none">Contact Us</a></p>
                        @elseif(Auth::user()->isEmployer())
                            <!-- Additional content for employer -->
                        @endif
                    </div>
                    <div class="col-md-3 mt-5">
                        @if (Auth::user()->isSeeker())
                            <h6 class="fw-bold">Address</h6>
                            <p><a href="" class="text-dark text-decoration-none">2# street abc phase</a></p>
                            <p><a href="" class="text-dark text-decoration-none">North America</a></p>
                        @elseif(Auth::user()->isEmployer())
                            <!-- Additional content for employer -->
                        @endif
                    </div>
                </div>
            <div class="pb-3 mt-5">
                <p class="text-left fw-bold text-black">Copyright {{ date('Y') }}</p>
            </div>
        </div>
    </footer>
{{-- @endsection --}}
