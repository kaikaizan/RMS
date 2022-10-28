<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BSU-HR | Online Application</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/bsu_logo.png')}}"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('partials.applicant-link')

</head>

<body>
    <x-flash-message/>
    @include('partials.top-nav')
   
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


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

    <!--                        Navbar Start                        -->
    @include('partials._navbar')
    <!--                        Navbar End                      -->
    @include('components.login')

    @include('components.sample_training_format')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-2 mb-2">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Online Application</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="/job-offers">Job Offers</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Online Application</li>

                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Job Application Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 0rem 0;" >
        <div class="container contact px-lg-0">
           <!--  <div class="row g-0 mx-lg-0"> -->
            @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                <p>Submit application failed! Please check and fill the required input below and reupload your documents.</p>
                                
                            </div>
                        @endif
                <div class="col-lg-11 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-2 ps-lg-0">
                        <form name="jobForm" id="applicationForm" method="POST" action="/applicant/submit-application/{{$userId}}" enctype="multipart/form-data">
                            @csrf
                        
                        <div class="section-title text-center">
                            <h1 class="display-5 mb-5">Online Job Application</h1>
                            <p>Applying for</p>
                            <h3><input type="text" name="applying_for" value="{{$openedJob->job_title}}" style="background: transparent; border: none; text-align:center;" readonly/></h3>
                            {{-- <p class="mt-4">
                                Interested and qualified applicants regardless of age, sex, sexual orientation, gender identity
                                civil status, disability(PWD), <br> ethnicity or political affiliation should dignify their interest
                                by attaching the following documents.
                            </p> --}}
                        </div>
                        <p class="mb-5">
                            <h4>Please enter the required information to complete job application and for us to perform tasks to help reach your opportunity.</h4>
                            <p>Enter full information and avoid using abbreviation.</p>
                        </p>
                            <div class="row g-3">
                                <fieldset class="row g-2">
                                    <legend>Personal Information:</legend>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{old('last_name')}}" required/>
                                            <label for="last_name"><b>Last Name:</b></label>
                                            @error('last_name')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{old('first_name')}}" required/>
                                            <label for="first_name"><b>First Name:</b></label>
                                            @error('first_name')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name" value="{{old('middle_name')}}">
                                            <label for="middle_name"><b>Middle Name</b> (Optional): </label>
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="{{old('email')}}" required/>
                                            <label for="email"><b>Email Address:</b></label>
                                            @error('email')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    
                                    <!-- Break Down to Lot/House Number-block-street-barangay-municipality/city-region-country -->
                                     <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="Address" class="form-control" name="address" id="address" placeholder="Present Address" value="{{old('address')}}" required/>
                                            <label for="address"><b>Present Address</b> (Brgy, Municipality, City)</label>
                                            @error('address')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Mobile NUmber should be at +63 dialing format of xxxx-xxx-xxxx -->
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number" value="{{old('mobile_number')}}" required/>
                                            <label for="mobile_number"><b>Mobile Number:</b></label>
                                            @error('mobile_number')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- ADD RESTRICTIONS USING ANOTHER PHP -->
                                     <div class="col-md-4">
                                        <div class="form-floating">
                                            <!-- <p><b>Birthday:</b></p> -->
                                            <input type="text" class="form-control" name="birthday" id="birthday" value="{{old('birthday')}}" readonly="true" required/>
                                            <label for="name"><b>Birth Date</b> (Choose Month First)</label>
                                            @error('birthday')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                     <div class="col-md-4">
                                        <div class="form-floating">
                                            <select class="form-control" name="sex" id="sex" required>
                                                <option value="" >-Select Sex-</option>
                                                <option value="Male" {{ old('sex') == "Male" ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('sex') == "Female" ? 'selected' : '' }}>Female</option>
                                            </select>
                                            <label for="Sex"><b>Sex</b></label>
                                            @error('sex')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </fieldset>
                                
                                <fieldset class="row g-2">
                                    <legend>Personal Job Information:</legend>
                                    <div>
                                        <p>Put N/A on Course if educational attainment is <i>Elementary</i> or <i>Highschool</i> </p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <select class="form-control" name="educational_attainment" id="educational_attainment" required>
                                                <option value="">-Select Choices-</option>
                                                <option value="Associate's Degree" {{ old('educational_attainment') == "Associate's Degree" ? 'selected' : '' }}>
                                                    Doctorate Degree Graduate</option>
                                                <option value="Completed Requirements for Doctorate Degree" {{ old('educational_attainment') == "Completed Requirements for Doctorate Degree" ? 'selected' : '' }}>
                                                    Completed Academic Requirements for Doctorate Degree</option>
                                                <option value="Master's Degree" {{ old('educational_attainment') == "Master's Degree" ? 'selected' : '' }}>
                                                    Masters Degree Graduate</option>
                                                <option value="Completed Requirements for Masters Degree" {{ old('educational_attainment') == "Completed Requirements for Masters Degree" ? 'selected' : '' }}>
                                                    Completed Academic requirements for Master's Degree</option>
                                                <option value="With 50% Requirements or more for Master's Degree" {{ old('educational_attainment') == "With 50% Requirements or more for Master's Degree" ? 'selected' : '' }}>
                                                    With 50% or more requirements for Master's Degree</option>
                                                <option value="Bachelor's Degree" {{ old('educational_attainment') == "Bachelor's Degree" ? 'selected' : '' }}>
                                                    Bachelor's Degree</option>
                                                <option value="Highschool/Vocational" {{ old('educational_attainment') == "Highschool/Vocational" ? 'selected' : '' }}>
                                                    Senior High School Graduate or Vocational/Trade Course</option>
                                                <option value="Elementary Graduate" {{ old('educational_attainment') == "Elementary Graduate" ? 'selected' : '' }}>
                                                    Elementary Graduate</option>
                                            </select>
                                            <label for="educational_attainment"><b>Educational Attainment:</b></label>
                                            @error('educational_attainment')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="college_course" id="college_course" placeholder="College Course Taken" value="{{old('college_course')}}" required/>
                                            <label for="college_course"><b>Course:</b></label>
                                            @error('college_course')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="school_graduated" id="school_graduated" placeholder="School Graduated" value="{{old('school_graduated')}}" required/>
                                            <label for="school_graduated"><b>School Graduated:</b></label>
                                            @error('school_graduated')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="year_last_attended" id="year_last_attended" value="{{old('year_last_attended')}}" required/>
                                            <label for="year_last_attended"><b>Year Last Attended</b></label>
                                            @error('year_last_attended')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <select class="form-control" name="previously_applied" id="previously_applied" value="{{old('previously_applied')}}" required>
                                                <option value="">-Select Choices-</option>
                                                <option value="Yes" {{ old('previously_applied') == "Yes" ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ old('previously_applied') == "No" ? 'selected' : '' }}>No</option>
                                            </select>
                                            <label for="previously_applied"><b>Previously applied at BSU?</b></label>
                                            @error('previously_applied')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>                    
                                    </div>

                                    <div class="col-md-4 checkbox-group">
                                        <div class="form-floating">
                                            <select class="form-control" name="job_discovery" id="job_discovery" value="{{old('job_discovery')}}" required>
                                                <option value="">-Select Choices-</option>
                                                <option value="CSC" {{ old('job_discovery') == "CSC" ? 'selected' : '' }}>Civil Service Commission (CSC)</option>
                                                <option value="BSU HR" {{ old('job_discovery') == "BSU HR" ? 'selected' : '' }}>BSU Human Resources (Official Facebook Page)</option>
                                                <option value="BSU Bulletin" {{ old('job_discovery') == "BSU Bulletin" ? 'selected' : '' }}>BSU Bulletin Boards</option>
                                                <option value="BSU Website" {{ old('job_discovery') == "BSU Website" ? 'selected' : '' }}>BSU Official Website</option>
                                                <option value="Colleague" {{ old('job_discovery') == "Colleague" ? 'selected' : '' }}>Colleague</option>
                                                <option value="Job Fair" {{ old('job_discovery') == "Job Fair" ? 'selected' : '' }}>Job Fair</option>
                                            </select>
                                            <label for="job_discovery"><b>Discovery of job opening?</b></label>
                                            @error('job_discovery')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>   
                                    </div>
                                </fieldset>
                                
                                <!--                    required DOCUMENTS                   -->
                               <div class="section-title text-start">
                                <br><br><br><br>
                                    <h1 class="display-5 mb-4">Applicant Documents</h1>
                                </div>
                                <p class="mb-3">
                                    <h4 class="text-uppercase">please arrange your documents following the list below in a single pdf format  
                                    </h4>
                                    <p>Interested and qualified applicants regardless of race, color, origin, religion, age, sex, sexual orientation, gender identity, civil status,  political affiliation, disability (PWD), or ethnicity should signify their interest by submitting the following documents: </p>
                                </p>
                            
                                <fieldset class="row">
                                    <legend >Required Documents:</legend>
                                    <div class="col-md-4 mt-2">
                                            <label for="application_letter"><b>Application Letter:</b></label>
                                            <input type="file" id="application_letter" name="application_letter" class="form-control" accept="application/pdf" value="{{old('application_letter')}}" required/>
                                            <button type="button" class="btn-sm" style="background-color: #0D6EFD; color:white; float: right;" onclick="document.getElementById('application_letter').value = ''">Remove file</button>
                                            @error('application_letter')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                            <br>
                                    </div>

                                   <div class="col-md-4 mt-2">
                                            <label for="pds"><b>Personal Data Sheets:</b></label>
                                            <input type="file" id="pds" name="pds" class="form-control" accept="application/pdf" value="{{old('pds')}}" required/>
                                            <button type="button" class="btn-sm" style="background-color: #0D6EFD; color:white; float:right;" onclick="document.getElementById('pds').value = ''">Remove file</button>
                                            @error('pds')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                            <br>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                            <label for="work_experience"><b>Work Experience:</b></label>
                                            <input type="file" id="work_experience" name="work_experience" class="form-control" accept="application/pdf" >
                                            <button type="button" class="btn-sm" style="background-color: #0D6EFD; color:white; float:right;" onclick="document.getElementById('work_experience').value = ''">Remove file</button>

                                            <br>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                            <label for="otr"><b>Official Transcript of Records/Cert. of Grades:</b></label>
                                            <input type="file" id="otr" name="otr" class="form-control" accept="application/pdf" >
                                            <button type="button" class="btn-sm" style="background-color: #0D6EFD; color:white; float:right;" onclick="document.getElementById('otr').value = ''">Remove file</button>

                                            <br>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="employment_certificates"><b>Employment Certificates:</b></label>
                                        <input type="file" id="employment_certificates" name="employment_certificates" class="form-control" accept="application/pdf">
                                        <button type="button" class="btn-sm" style="background-color: #0D6EFD; color:white; float:right;" onclick="document.getElementById('employment_certificates').value = ''">Remove file</button>
                                        <br>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="eligibility"><b>Eligibility / Professional License:</b></label>
                                        
                                        <input type="file" id="eligibility" name="eligibility" class="form-control" accept="application/pdf">
                                        <button type="button" class="btn-sm" style="background-color: #0D6EFD; color:white; float:right;" onclick="document.getElementById('eligibility').value = ''">Remove file</button>

                                        <br>
                                </div>

                                </fieldset>

                                <fieldset class="row mt-2">  
                                    <div class="col-md-4">
                                            <label for="performance_evaluation"><b>Performance Evaluation Rating last period:</b></label>
                                            <input type="file" id="performance_evaluation" name="performance_evaluation" class="form-control" accept="application/pdf">
                                            <button type="button" class="btn-sm" style="background-color: #0D6EFD; color:white; float:right;" onclick="document.getElementById('performance_evaluation').value = ''">Remove file</button>
                                            <br>
                                    </div>

                                    <div class="col-md-4">
                                            <label for="commendation"><b>Commendation or Awards Certificate:</b></label>
                                            <input type="file" id="commendation" name="commendation" class="form-control" accept="application/pdf">
                                            <button type="button" class="btn-sm" style="background-color: #0D6EFD; color:white; float:right;" onclick="document.getElementById('commendation').value = ''">Remove file</button>
                                            <br>
                                    </div>
                                </fieldset>
                                <fieldset class="row mt-2">
                                    <div class="col-md-12">
                                        <label for="training_certificates"><b>Training Certificates After Graduation (Within last 5 years):</b></label>
                                        <p>Kindly include <i>Title of Training</i>, <i>Inclusive Dates</i>, <i>Number of Hours</i>, <i>Sponsor/Training Provider</i> associated with your certificates.</p>
                                        <a href="" class="text-primary" data-bs-toggle="modal" data-bs-target="#sampleDocumentFormat">Sample Document Format</a>
                                    </div>    
                                        <div class="col-md-4">
                                            <input type="file" id="training_certificates" name="training_certificates" class="form-control" accept="application/pdf">
                                            <button type="button" class="btn-sm" style="background-color: #0D6EFD; color:white; float:right;" onclick="document.getElementById('training_certificates').value = ''">Remove file</button>
                                        </div>
                                </fieldset>

                                <fieldset class="row g-2">
                                    <div class="col-12 form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="certify" id="certify" required>
                                        <label class="form-check-label" for="certify">
                                            I certify that i have submitted the above information and documents as well as to freely give my consent for the use and processing of the data contained therein to support my application. I also understand that in case I am not selected for the position, I have the right to claim my documents within 3 months from receipt of the Job Application Feed Back Form and that if unclaimed within the period,the documents shall be disposed accordingly.
                                        </label>
                                        @error('certify')
                                            <p class="text-danger mt-1">{{$message}}</p>
                                        @enderror
                                    </div>

                                <!-- END OF JOB REQUIREMENTS -->

                                <div class="col-12">
                                    {{-- <input name="_method" type="hidden" value="submitApplication"> --}}
                                    <button id="jobApplicationSubmit" class="btn btn-success w-100 py-3 submitApplication" type="submit" name="jobApplicationSubmit">Submit Application</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
<!--                        Footer Start                         -->
@include('partials._footer')
    <!--                        Footer End                      -->


    <!-- Back to Top -->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    
    <!-- Template Javascript -->

    <script src="{{ asset('js/main.js') }}"></script> <!-- working -->
    <script
			  src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
			  integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0="
			  crossorigin="anonymous"></script>
    
    <script>
        $(function() {
            
           $( "#birthday" ).datepicker({
            dateFormat: "yy-mm-dd",
           changeMonth: true,
           changeYear: true,
           yearRange: "1940:2022",
           maxDate: "-18y",

            });
        
        });
     </script>
     <script>
        $(function() {
            
           $( "#school_last_attended" ).datepicker({
            dateFormat: "yy-mm-dd",
           changeMonth: true,
           changeYear: true,
            
            });
        
        });
     </script>

        <script>
            $('.submitApplication').on('click', function(e){

                if($(this).closest('form')[0].checkValidity()){
                    e.preventDefault();

                    var form = $(this).parents('form');                    

                    if(emptyFileField !=0){
                        Swal.fire({
                        title: 'Submit Application?',
                        icon: 'question',
                        html:
                            '<p> Some files are empty, would you like to continue?</p> '+
                        
                            '<ul id="myList" style="text-align:left; margin-left:45px; font-size:0.9em;"></ul> ',
                        
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Submit!'
                        }).then(function(isConfirm) {
                        if (isConfirm.value) {
                            form.submit();
                        }
                        })

                        //********
                        var emptyFileField = [];

                        if( document.getElementById("work_experience").files.length == 0 ){
                        emptyFileField.push("Work Experience is Empty");
                        }
                        if( document.getElementById("otr").files.length == 0 ){
                            emptyFileField.push("OTR is Empty");
                        }
                        if( document.getElementById("employment_certificates").files.length == 0 ){
                            emptyFileField.push("Employment certificates is Empty");
                        }
                        if( document.getElementById("eligibility").files.length == 0 ){
                            emptyFileField.push("Eligibility/Professional License is Empty");
                        }
                        if( document.getElementById("performance_evaluation").files.length == 0 ){
                            emptyFileField.push("Performance Evaluation is Empty");
                        }
                        if( document.getElementById("commendation").files.length == 0 ){
                            emptyFileField.push("Commendation certificates is Empty");
                        }
                        if( document.getElementById("training_certificates").files.length == 0 ){
                            emptyFileField.push("Training certificates is Empty");
                        }

                        let list = document.getElementById("myList");

                        

                        emptyFileField.forEach((item)=>{
                        let li = document.createElement("li");
                        li.innerText = item;
                        list.appendChild(li);
                        })
                    }
                    if(emptyFileField == 0){
                        Swal.fire({
                        title: 'Submit Application?',
                        text: "You won't be able to edit after submitting!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Submit!'
                        }).then(function(isConfirm) {
                        if (isConfirm.value) {
                            form.submit();
                        }
                        })
                    }
                    
                return false;
                    }
            });
        </script>    
</body>

</html>