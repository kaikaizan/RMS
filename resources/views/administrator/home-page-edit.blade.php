<x-main>
  <div class="home-content">
    <div class="text">Dashboard</div>
  </div>

  <div class="row">
    <div class="col-sm-4">
      <div class="stat-card">
        <div class="stat-card__content">
          <p class="text-uppercase mb-1 text-muted">Applicants</p>
          <h2>{{$countApplicants}}</h2>
          <div>
             
            <span class="text-muted">Today</span>
          </div>
        </div>
        <div class="stat-card__icon stat-card__icon--primary">
          <div class="stat-card__icon-circle">
            <i class='bx bxs-user-detail'></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="stat-card">
        <div class="stat-card__content">
          <p class="text-uppercase mb-1 text-muted">Jobs</p>
          <h2><i class="fa fa-dollar"></i> {{$countJobs}}</h2>
          <div>
            
            <span class="text-muted">Opened</span>
          </div>
        </div>
        <div class="stat-card__icon stat-card__icon--success">
          <div class="stat-card__icon-circle">
            <i class='bx bx-window-open' ></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="stat-card">
        <div class="stat-card__content">
          <p class="text-uppercase mb-1 text-muted">Jobs</p>
          <h2>11</h2>
          <div>
             
            <span class="text-muted">Closed</span>
          </div>
        </div>
        <div class="stat-card__icon stat-card__icon--warning">
          <div class="stat-card__icon-circle">
            <i class='bx bx-window-close' ></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row"  >
    <div class="col-md-5  dashboardApplicantTbl " >  
      <div class="card shadow " style="height: 720px;  text-align:center;"> {{--overflow-y: auto;--}}
        <div class="card-body d-flex flex-column">
          <h4 style="color:#11101D;">Recent Applicants</h4>
          <table class="table" style="text-align:center;">
                <thead class="bg-light">
                  <tr>
                   
                    <th>Name</th>
                    <th>Applying for</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($applicants as $applicant)
                    @if($applicant->status == "new")
                      <tr>
                        <td >                     
                            <div>
                              <p class="fw-bold mb-1"> {{$applicant['first_name'] . ' ' . $applicant['last_name']}}</p>
                              <p class="text-muted mb-0">{{$applicant['email']}}</p>
                            </div>
                        </td>
                        <td>{{$applicant['applying_for']}}</td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
            </table>
            
            <div class="mt-auto">
              <hr>
              <a href="/initial-assessment">View All</a>
            </div>
        </div>
      </div>
        
    </div>
    <div class="col-md-7">
      <div class="row">
        <div class="card container myTable shadow" style="height: 720px; text-align:center;">
          <div class="card-body d-flex flex-column">
            <h4 style="float:left; color:#11101D;">Active Job Positions</h4>
            <table class="table table-lg" id="example">
              <thead >
                <tr>
                  <th> Position Title</th>
                  <th> Place of Assignment </th>
                  <th> Opening Date </th>
                  <th> Closing Date </th>
                  <!-- <th> View Applicant List </th> -->
                </tr>
              </thead>
              <tbody> 
                @foreach($jobs as $job)
                @if($job['to_close']==0)
                  <tr>
                    <td class="p-3" style="color:#24A0ED; font-weight:bold;">{{$job['job_title']}}</td>
                    <td class="p-3">{{$job['place_of_assignment']}}</td>
                    <td class="p-3">{{$job['opening_date']}}</td>
                    <td class="p-3">{{$job['closing_date']}}</td>
                  </tr>
                @endif
                @endforeach
                
              </tbody>
              
            </table>
            <div class="mt-auto">
              <hr>
              <a href="/job-management">View All</a>
            </div>
          
          </div>
        </div>
      </div>
    </div> <!--col-md-7-->
                      
        
  
      
    
    <!-- <div class="col-md-4 hey">

    </div> -->
  </div>
</x-main>