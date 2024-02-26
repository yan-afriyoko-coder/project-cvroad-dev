<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <title>Name of company</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    
</head>
<body>
      <nav class="navbar navbar-expand-xl fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index.html"><img claass="w-100" src="img/icon/company-logo.svg" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-card-item">
                <a class="nav-link  active" href="index.html">Home</a>
              </li>
              <li class="nav-card-item">
                <a class="nav-link" href="aboutus.html">About</a>
              </li>
              <li class="nav-card-item">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>
              <li class="nav-card-item">
                <a class="nav-link" href="blog.html">Blog</a>
              </li>         
            </ul>
            <ul class="right navbar-nav ms-auto">
              <li class="nav-card-item-right">
                <a class="nav-link" href="#">Sign in</a>
              </li>
              <li class="nav-card-item-right create-account">
                <a class="nav-link" href="#">Create account</a>
              </li>       
            </ul>
          </div>
        </div>
      </nav>
      <main>
        <!-- Intro -->
        <div class="intro">
          <div class="container">
            <div class="intro-text">
              <h1>Looking for a job?<br><span class="green">we will help you</span></h1>
              <div class="check-out">
                <p>Check out our offers</p>
                <div class="form">
                  <div class="job-search">
                    <img style="width: 20px; margin-right: 30px;" src="img/icon/search-icon.svg" alt="">
                    <input type="text" placeholder="Type in your job search">
                  </div>
                  <div class="location">
                    <label for="lname">location:</label>
                    <select name="location" id="location">
                      <option value="0">Wroclaw</option>
                      <option value="1">Kraków</option>
                      <option value="2">Warszawa</option>
                      <option value="3">Gdańsk</option>
                    </select>
                    <input class="search main-btn" type="submit" value="Search">
                  </div>
                </div>
                <div class="follow">
                  <span>Fallow Us</span>
                  <a href=""><img src="img/icon/facebook-icon.svg" alt=""></a>
                  <a href=""><img src="img/icon/twitter-icon.svg" alt=""></a>
                  <a href=""><img src="img/icon/linkedin-icon.svg" alt=""></a>
                </div>
              </div>
            </div>
            <div class="intro-img">
              <img src="img/intro.png" alt="">
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
                  <div class="carousel-item active">
                    <div class="card-item">
                      <div class="photo">
                        <img class="main-state" src="img/icon/business-development.svg" alt="">
                        <img class="hover" src="img/icon/business-development-hover.svg" alt="">
                      </div>
                      <p>Business<br>
                        Development</p>
                    </div> 
                    <div class="card-item">
                      <div class="photo">
                        <img class="main-state" src="img/icon/graphic.svg" alt="">
                        <img class="hover" src="img/icon/graphic-hover.svg" alt="">
                      </div>
                      <p>Graphic<br>
                        Designer</p>
                    </div>
                    <div class="card-item">
                      <div class="photo">
                        <img class="main-state" src="img/icon/pm.svg" alt="">
                        <img class="hover" src="img/icon/pm-hover.svg" alt="">
                      </div>
                      <p>Project<br>
                        Management</p>
                    </div>
                    <div class="card-item">
                      <div class="photo">
                        <img class="main-state"src="img/icon/marketing.svg" alt="">
                        <img class="hover" src="img/icon/marketing-active.svg" alt="">
                      </div>
                      <p>Marketing &<br>
                        Communication</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card-item">
                      <div class="photo">
                        <img class="main-state" src="img/icon/business-development.svg" alt="">
                        <img class="hover" src="img/icon/business-development-hover.svg" alt="">
                      </div>
                      <p>Another<br>
                        Category</p>
                    </div> 
                    <div class="card-item">
                      <div class="photo">
                        <img class="main-state" src="img/icon/business-development.svg" alt="">
                        <img class="hover" src="img/icon/business-development-hover.svg" alt="">
                      </div>
                      <p>Another<br>
                        Category</p>
                    </div>
                    <div class="card-item">
                      <div class="photo">
                        <img class="main-state"src="img/icon/business-development.svg" alt="">
                        <img class="hover" src="img/icon/business-development-hover.svg" alt="">
                      </div>
                      <p>Another<br>
                        Category</p>
                    </div>
                    <div class="card-item">
                      <div class="photo">
                        <img class="main-state"src="img/icon/business-development.svg" alt="">
                        <img class="hover" src="img/icon/business-development-hover.svg" alt="">
                      </div>
                      <p>Another<br>
                        Category</p>
                    </div>
                  </div>
               </div>
               <div class="carousel-nav">
                <a class="nav-item" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"><img src="img/icon/prew-arrow.svg" alt=""></a>
                <a class="nav-item" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"><img src="img/icon/next-arrow.svg" alt=""></a>
               </div>
            </div>
        </div>
         <!--job offers-->
          <div class="job-offers">
            <h1>Job <span class="green">offers</span></h1>
            <a href="">All offers <img style="width: 20px; margin-left: 20px;" src="/img/icon/arrow-right-icon.svg" alt=""></a>
            <div class="row pt-5">
              <div class="image col-md-4">
                <img src="img/job-offers.png" alt="">
              </div>
              <div class="col-md-4">
                <div class="offert-wrapper">
                  <div class="offert">
                    <div>
                      <div class="offert-description">
                        <div class="company-logo">
                          <img src="img/icon/go-icon.svg" alt="">
                        </div>
                        <div class="description">
                          <p class="company-name">Go! SM</p>
                          <p class="description">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
                      </div>
                      <div class="offert-meta">
                        <p class="location">location: <span class="city">Stuttgart</span></p>
                        <p class="offert-counter">Jobs: <span class="green"><strong>3</strong></span></p>
                      </div>
                    </div>
                  </div>
                  <a href="" class="main-btn">See details</a>
                </div>
                <div class="offert-wrapper">
                  <div class="offert">
                    <div>
                      <div class="offert-description">
                        <div class="company-logo">
                          <img src="img/icon/create-paper-icon.svg" alt="">
                        </div>
                        <div class="description">
                          <p class="company-name">Create Paper</p>
                          <p class="description">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
                      </div>
                      <div class="offert-meta">
                        <p class="location">location: <span class="city">Pekin</span></p>
                        <p class="offert-counter">Jobs: <span class="green"><strong>5</strong></span></p>
                      </div>
                    </div>
                  </div>
                  <a href="" class="main-btn">See details</a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="offert-wrapper">
                  <div class="offert">
                    <div>
                      <div class="offert-description">
                        <div class="company-logo">
                          <img src="img/icon/social-road-icon.svg" alt="">
                        </div>
                        <div class="description">
                          <p class="company-name">Social Road</p>
                          <p class="description">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
                      </div>
                      <div class="offert-meta">
                        <p class="location">location: <span class="city">San Francisco</span></p>
                        <p class="offert-counter">Jobs: <span class="green"><strong>2</strong></span></p>
                      </div>
                    </div>
                  </div>
                  <a href="" class="main-btn">See details</a>
                </div>
                <div class="offert-wrapper">
                  <div class="offert">
                    <div>
                      <div class="offert-description">
                        <div class="company-logo">
                          <img src="img/icon/point-design-icon.svg" alt="">
                        </div>
                        <div class="description">
                          <p class="company-name">Point Design</p>
                          <p class="description">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
                      </div>
                      <div class="offert-meta">
                        <p class="location">location: <span class="city">Tempe</span></p>
                        <p class="offert-counter">Jobs: <span class="green"><strong>8</strong></span></p>
                      </div>
                    </div>
                  </div>
                  <a href="" class="main-btn">See details</a>
                </div>
              </div>  
            </div>
          </div>
          <!--Top Notch Service-->
          <div class="service text-center">
            <h1>Top Notch <span class="green">Service</span></h1>
            <div class="service-items">
              <div class="item">
                <img src="img/icon/cv-icon.svg" alt="">
                <span class="counter">2 331</span>
                <span>Job offers</span>
              </div>
              <div class="item">
                <img src="img/icon/customers.svg" alt="">
                <span class="counter">1 148</span>
                <span>Satisfied customers</span>
              </div>
              <div class="item">
                <img src="img/icon/applications.svg" alt="">
                <span class="counter">5 364</span>
                <span>Applications sent</span>
              </div>
              <div class="item">
                <img src="img/icon/projects.svg" alt="">
                <span class="counter">1 764</span>
                <span>Realized projects</span>
              </div>
            </div>
          </div>
          <!-- Newsletter -->
          <div class="update-news">
            <div class="row">
              <div class="col-md-5 news-text">
                <h2>Get your update news</h2>
                <p>If you going to use a passage of Lotem Ipsum, you need to be sure there  isn’t anything embarrassing.</p>
              </div>
              <div class="col-md-7 news-form">
                <input type="email" name="email" placeholder="Enter your email" id="">
                <button type="submit">Send</button>
              </div>
            </div>
          </div>
          <div class="find-jobs text-center">
            <h1><span class="green">Find jobs</span> around<br>the world</h1>
          </div>
        </div> 
    </main>
      <!-- Footer -->
      <footer>
          <div class="container text-center text-md-start">
            <div class="footer-wrap">
              <div class="about">
                <img src="img/icon/company-logo.svg" alt="">
                <p class="text-muted py-4">
                  Start working with Firmbee which can provide you with all the tools needed to run an effcieint business remotely.
                </p>
                <div class="social-media">
                  <a href="" class="me-2 text-reset"><img src="img/icon/facebook-icon.svg" alt=""></a>
                  <a href="" class="me-2 text-reset"><img src="img/icon/twitter-icon.svg" alt=""></a>
                  <a href="" class="me-2 text-reset"><img src="img/icon/linkedin-icon.svg" alt=""></a>
                  <a href="" class="me-2 text-reset"><img src="img/icon/instagram-icon.svg" alt=""></a>
                </div>
              </div>
              <div class="company">
                <h6 class="fw-bold">Company</h6>
                <p><a href="">About us</a></p>
                <p><a href="">Services</a></p>
                <p><a href="">Team</a></p>
                <p><a href="">Pricing</a></p>
                <p><a href="">Project</a></p>
                <p><a href="">Careers</a></p>
                <p><a href="">Blog</a></p>
                <p><a href="">Login</a></p>
              </div>
              <div class="useful-links">
                <h6 class="fw-bold">Useful links</h6>
                <p><a href="">Terms of </a></p>
                <p><a href="">Services</a></p>
                <p><a href="">Privacy Policy</a></p>
                <p><a href="">Documentation</a></p>
                <p><a href="">Changelog</a></p>
                <p><a href="">Components</a></p>
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
            <div class="copyright">
              <p>&copy; 2022 YOUR-DOMAIN | Created by <a href="https://firmbee.com/solutions/project-management/" title="Firmbee - Free Project Management System" target="_blank">Firmbee.com</a></p>
              <!--
              This template is licenced under Attribution 3.0 (CC BY 3.0 PL),
              You are free to: Share and Adapt. You must give appropriate credit, you may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.
              --> 
            </div>
          </div>
      </footer>
    <div class="fb2022-copy">Fbee 2022 copyright</div>
    <script src="js/nav-bg.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>