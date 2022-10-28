<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BSU | My Application</title>
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

    <!-- Navbar Start -->
    @include('partials._navbar')
    <!-- Navbar End -->
    @include('components.login')
    @include('components.cv-application')
    @include('components.register')

    <div class="container-fluid page-header py-2 mb-2">
        <div class="container py-5">
            <h3 class="display-3 text-white mb-3 animated slideInDown">My Application</h3>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">My Application</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="p-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card myApplicationCard">
                    <div class="card-body">
                        @if ($userData->userApplicant == null)
                            <p>No Application to Show...</p>
                        @else
                            <div class="row">
                                <h2 class="card-title">{{$userData->userApplicant->applying_for}}</h2>
                                <p class="card-text">{{$job->place_of_assignment}}</p>
                            
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <p class="card-text"> <b>Status:</b> {{$job->status}}</p>
                                    <p class="card-text"> <b>Date Applied:</b> {{$userData->userApplicant->created_at->format('d/m/Y')}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text"> <b>Monthly Salary:</b> {{$job->salary}}</p>
                                </div>
                            </div>
                            @if ($userData->userApplicant->status == 'new' || $userData->userApplicant->status == 'qualified')
                                <div class="row">
                                    <p class="text-success">Application Processing...</p>
                                </div>
                            @else
                                <div class="row">
                                    <p class="text-danger">Application Disqualified</p>
                                </div>
                            @endif
                            
                        @endif
                        
                    </div>
                  </div>
            </div>
        </div>
    </div>

    



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
</body>

</html>