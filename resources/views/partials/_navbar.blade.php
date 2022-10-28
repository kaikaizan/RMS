<!--                     Navbar Start                   -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0">
    <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary">Benguet State University</h2>
    </a>
    
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link">Home</a>
            {{-- <a href="/job-offers" class="nav-item nav-link">Job Offers</a>   --}}
            
            
            @if(auth()->check())
            <a href="/applicant/my-application" class="nav-item nav-link">My Application</a>
            <a href="{{route('applicant.logout')}}" class="nav-item nav-link">Logout</a>
            @else
            <a href="" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#applicantLogin">Login</a>
            <a href="" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#applicantRegister">Sign up</a>
            @endif
            <a href="/contact-us" class="nav-item nav-link">Contact Us</a> 
            {{-- <a href="{{route('admin.login-page')}}" class="admin btn btn-success rounded-10 py-4 px-lg-5 d-none d-lg-block">JOB OFFERS<i class="fa fa-arrow-right ms-3"></i></a>  --}}

            <a href="/job-offers" class="admin btn btn-success rounded-10 py-4 px-lg-5 d-none d-lg-block">JOB OFFERS<i class="fa fa-arrow-right ms-3"></i></a> 
        </div>
    </div>
</nav>
<!--                    Navbar End                  -->