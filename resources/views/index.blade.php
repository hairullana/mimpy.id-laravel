<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Job Vacancies Website">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Mimpy.ID</title>

  <link rel="shortcut icon" href="/assets/favicon.ico" type="image/png">

  <link rel="stylesheet" href="/css/magnific-popup.css">
  <link rel="stylesheet" href="/css/slick.css">
  <link rel="stylesheet" href="/css/LineIcons.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/default.css">
  <link rel="stylesheet" href="/css/landing-page.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="/css/style1.css">

</head>

<body>

  {{-- preload --}}
  <div class="preloader">
    <div class="loader">
      <div class="ytp-spinner">
        <div class="ytp-spinner-container">
          <div class="ytp-spinner-rotator">
            <div class="ytp-spinner-left">
              <div class="ytp-spinner-circle"></div>
            </div>
            <div class="ytp-spinner-right">
              <div class="ytp-spinner-circle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- navbar --}}
  <section class="navbar-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav navbar-brand">
              <li class="nav-item active"><a class="page-scroll" href="#home">Mimpy.ID</a></li>
            </ul>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
              <ul class="navbar-nav m-auto">
                <li class="nav-item active"><a class="page-scroll" href="#home">home</a></li>
                <li class="nav-item"><a class="page-scroll" href="#services">Services</a></li>
                <li class="nav-item"><a class="page-scroll" href="#job">Job</a></li>
                <li class="nav-item"><a class="page-scroll" href="#about">About</a></li>
              </ul>
            </div>
            
            <div class="navbar-btn d-none d-sm-inline-block">
              <ul>
                <li><a class="solid" href="/register">Register</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </section>

  {{-- home --}}
  <section id="home" class="slider_area">
    <div id="carouselThree" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselThree" data-slide-to="0" class="active"></li>
        <li data-target="#carouselThree" data-slide-to="1"></li>
        <li data-target="#carouselThree" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="slider-content">
                  <h1 class="title">Offer Job Vacancy</h1>
                  <ul class="slider-btn rounded-buttons">
                    <li><a class="main-btn rounded-one" href="/home">GET STARTED</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="slider-image-box d-none d-lg-flex align-items-end">
            <div class="slider-image">
              <img src="/images/landing-page/slider/1.png" alt="Hero">
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="slider-content">
                  <h1 class="title">Find Spesific Job</h1>
                  <ul class="slider-btn rounded-buttons">
                    <li><a class="main-btn rounded-one" href="/register">GET STARTED</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="slider-image-box d-none d-lg-flex align-items-end">
            <div class="slider-image">
              <img src="/images/landing-page/slider/3.png" alt="Hero">
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="slider-content">
                  <h1 class="title">Recruit Best Employees</h1>
                  <ul class="slider-btn rounded-buttons">
                    <li><a class="main-btn rounded-one" href="/register">GET STARTED</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="slider-image-box d-none d-lg-flex align-items-end">
            <div class="slider-image">
              <img src="/images/landing-page/slider/2.png" alt="Hero">
            </div>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#carouselThree" role="button" data-slide="prev">
        <i class="lni lni-arrow-left"></i>
      </a>
      <a class="carousel-control-next" href="#carouselThree" role="button" data-slide="next">
        <i class="lni lni-arrow-right"></i>
      </a>
    </div>
  </section>

  {{-- services --}}
  <section id="services" class="features-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10">
          <div class="section-title text-center pb-10">
            <h3 class="title">Our Services</h3>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-7 col-sm-9">
          <div class="single-features mt-40">
            <div class="features-title-icon d-flex justify-content-between">
              <h4 class="features-title"><a href="#">Find Spesific Job</a></h4>
              <div class="features-icon">
                <i class="lni lni-briefcase"></i>
                <img class="shape" src="/images/landing-page/f-shape-1.svg" alt="Shape">
              </div>
            </div>
            <div class="features-content">
              <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit deserunt possimus ab maxime ratione, nam pariatur libero tempora sapiente repudiandae, repellat impedit exercitationem, qui nobis!</p>
              <a class="features-btn" href="/home">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-7 col-sm-9">
          <div class="single-features mt-40">
            <div class="features-title-icon d-flex justify-content-between">
              <h4 class="features-title"><a href="#">Application Letter</a></h4>
              <div class="features-icon">
                <i class="lni lni-book"></i>
                <img class="shape" src="/images/landing-page/f-shape-1.svg" alt="Shape">
              </div>
            </div>
            <div class="features-content">
              <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit deserunt possimus ab maxime ratione, nam pariatur libero tempora sapiente repudiandae, repellat impedit exercitationem, qui nobis!</p>
              <a class="features-btn" href="/home">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-7 col-sm-9">
          <div class="single-features mt-40">
            <div class="features-title-icon d-flex justify-content-between">
              <h4 class="features-title"><a href="#">Company Letter</a></h4>
              <div class="features-icon">
                <i class="lni lni-apartment"></i>
                <img class="shape" src="/images/landing-page/f-shape-1.svg" alt="Shape">
              </div>
            </div>
            <div class="features-content">
              <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit deserunt possimus ab maxime ratione, nam pariatur libero tempora sapiente repudiandae, repellat impedit exercitationem, qui nobis!</p>
              <a class="features-btn" href="/home">Get Started</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- job --}}
  <section id="job" class="pricing-area ">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10">
          <div class="section-title text-center pb-25">
            <h3 class="title">Job For You</h3>
            {{-- <p class="text">There is job for you</p> --}}
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        @foreach ($jobs as $job)
          <div class="col-lg-4 col-md-7 col-sm-9">
            <div class="pricing-style mt-30">
              <div class="pricing-icon text-center">
                <img src="/storage/{{ $job->company->photo }}" alt="">
              </div>
              <div class="pricing-header text-center">
                <h5 class="sub-title">{{ $job->position . ' at ' . $job->company->name }}</h5>
              </div>
              <div class="pricing-list">
                <ul>
                  <li><i class="lni lni-check-mark-circle"></i> {{ $job->jobdesk }}</li>
                </ul>
              </div>
              <div class="pricing-btn rounded-buttons text-center">
                <a class="main-btn rounded-one" href="/jobs/{{ $job->id }}">GET STARTED</a>
              </div>    
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- About --}}
  <section id="about" class="about-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="faq-content mt-45">
            <div class="about-title">
              <h6 class="sub-title">A Little More About Us</h6>
              <h4 class="title">Frequently Asked Questions <br> About Mimpy.ID</h4>
            </div>
            <div class="about-accordion">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is Mimpy.ID?</a>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="text">Mimpy.ID (Minimize Unemployment) is a website as a third party for people who want to find work and companies that want to find employees.</p>
                    </div>
                  </div> 
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Why and when was Mimpy.ID created?</a>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="text">Mimpy.ID was created for the end of semester project for Website-Based Programming in 2020 with PHP Native. Then I rebuilt it with Laravel 8 Framework at the end of 2021 with a few improvisations.</p>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Does Mimpy.ID really exist and operate?</a>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="text">Mimpy.ID is just a website project for me to learn about Web Development and it doesn't really operate.</p>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingFore">
                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseFore" aria-expanded="false" aria-controls="collapseFore">Can I get the Mimpy.ID source code?</a>
                  </div>
                  <div id="collapseFore" class="collapse" aria-labelledby="headingFore" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="text">Of course, you can find them on my github (<a href="https://github.com/hairullana">github.com/hairullana</a>) for both PHP Native version of Mimpy.ID and Laravel 8 version of Mimpy.id. You can also contribute to my repository.</p>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingFive">
                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Can I reuse the Mimpy.ID source code?</a>
                  </div>
                  <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="text">It can be used for learning but not for use as an operating website because Mimpy.ID has been registered with the Copyright in my name.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          {{-- <div class="about-image mt-50">
            <img src="public\images\landing-page\logo-2.svg" alt="about">
          </div> --}}

          <div class="container mt-50">
            <div class="row justify-content-center">
              <div class="col-lg-12">
                <div class="wrapper">
                  <div class="row no-gutters">
                    <div class="col-md-6 d-flex align-items-stretch">
                      <div class="contact-wrap w-100 p-md-3 p-2 py-5">
                        <h3 class="mb-4">Contact us</h3>
                        <div id="form-message-warning" class="mb-4"></div> 
                        <div id="form-message-success" class="mb-4">
                          Your message was sent, thank you!
                        </div>
                        <form action="" method="" id="contactForm" name="contactForm" class="contactForm">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                              </div>
                            </div>
                            <div class="col-md-12"> 
                              <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="6" placeholder="Message"></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="submit" value="Send Message" class="btn text-white" style="background-color: #0067f4">
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch">
                      <div class="info-wrap w-100 p-md-2 p-2 py-5 img">
                        <h3>Contact information</h3>
                        <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                        <div class="dbox w-100 d-flex align-items-start">
                          <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                          </div>
                          <div class="text pl-1">
                            <p><span>Address:</span> <a href="#">Denpasar, Bali, Indonesia</a></p>
                          </div>
                        </div>
                        <div class="dbox w-100 d-flex align-items-center">
                          <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                          </div>
                          <div class="text pl-1">
                            <p><span>Phone:</span> <a href="#">+ 62 822 1521 5399</a></p>
                          </div>
                        </div>
                        <div class="dbox w-100 d-flex align-items-center">
                          <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                          </div>
                          <div class="text pl-1">
                            <p><span>Email:</span> <a href="#">hairullana99@gmail.com</a></p>
                          </div>
                        </div>
                        <div class="dbox w-100 d-flex align-items-center">
                          <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-globe"></span>
                          </div>
                          <div class="text pl-1">
                            <p><span>Website</span> <a href="#">https://hairullana.github.io/</a></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  {{-- footer --}}
  <section class="footer-area footer-dark">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <ul class="social text-center">
            <li><a href="https://github.com/hairullana"><i class="lni lni-github-original"></i></a></li>
            <li><a href="https://lindkedin.com/in/hairullana"><i class="lni lni-linkedin-original"></i></a></li>
            <li><a href="https://facebook.com/hairullana99"><i class="lni lni-facebook-filled"></i></a></li>
            <li><a href="https://instagram.com/hairullana_"><i class="lni lni-instagram-original"></i></a></li>
            <li><a href="https://hairullana.github.io"><i class="lni lni-world"></i></a></li>
          </ul>
          <div class="link text-center mt-3">
            <a href="/">Mimpy.ID - Minimize Unemployment</a> &copy; Copyright <?= date('Y') ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  {{-- back to top --}}
  <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

  <script src="/js/vendor/jquery-1.12.4.min.js"></script>
  <script src="/js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/slick.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/ajax-contact.js"></script>
  <script src="/js/images/landing-pageloaded.pkgd.min.js"></script>
  <script src="/js/isotope.pkgd.min.js"></script>
  <script src="/js/jquery.easing.min.js"></script>
  <script src="/js/scrolling-nav.js"></script>
  <script src="/js/main.js"></script>
  <script src="/js/jquery.min.js"></script>
  <script src="/js/jquery.validate.min.js"></script>

</body>

</html>