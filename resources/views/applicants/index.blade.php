<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Benguet State University | HR</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/bsu_logo.png')}}"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('partials.applicant-link')
</head>

<body>          
    <x-flash-message/>

    
    
    
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    @include('partials.top-nav')


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">

            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <img class="img-fluid" src="{{url('/images/BSU-Banner.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    @include('partials._navbar')

    @include('components.login')

    @include('components.cv-application')

    @include('components.register')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 ">
        <div class="owl-carousel header-carousel position-relative">

            <!-- 1st Carousel -->
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{url('/images/Home/Home-Hire.png')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Benguet State University</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">WE ARE HIRING!!</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">We are now an International Smart University! We offer various job opportunities that are available for you!</p>
                                <a href="/job-offers" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">View Job Offers</a>
                                <a href="/contact-us" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2nd Carousel -->
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{url('/images/Home/Home-WorkFromHome.png')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Benguet State University</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Work from Home or Work on Site</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Depending on the nature of work, you can work in your home or work inside the university. Find out your desired opportunities here!</p>
                                <a href="/job-offers" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">View Job Offers</a>
                                <a href="/contact-us" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3rd Carousel -->
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{url('/images/Home/Home-Excellence.png')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Benguet State University</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">University of Excellence!</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">We challenge innovations and utilize advanced technologies and facilities for Higher Education. Find out here for available job opportunities!</p>
                                <a href="/job-offers" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">View Job Offers</a>
                                <a href="/contact-us" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

@include('partials._footer')

    <!--                        Back to Top Arrow                         -->
    <a href="#" class="btn btn-lg btn-success btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/easing.min.js') }}"></script> 
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/counterup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script> 
    <script type="javascript" src="{{ asset('js/lightbox.min.js') }}"></script> 
    
    <!-- Template Javascript -->

    <script src="{{ asset('js/main.js') }}"></script> <!-- working -->

    @if (!$errors->loginErrors->isEmpty() ) 
    <script type="text/javascript">
     $( document ).ready(function() {
       
        $('#applicantLogin').modal('show'); 
        
    });  
    </script>
    @endif

    @if (!$errors->isEmpty() )
    <script type="text/javascript">
        $( document ).ready(function() {
          
           $('#applicantRegister').modal('show'); 
           
       });  
       </script>
        
    @endif

    
        
      
</body>

</html>