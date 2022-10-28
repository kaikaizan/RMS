<x-main>
    <div class="home-content">
        <div class="text">Manage Users</div>
    </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-open-tab" data-bs-toggle="tab" data-bs-target="#nav-open" type="button" role="tab" aria-controls="nav-open" aria-selected="true">Create User</button>
                <button class="nav-link" id="nav-view-tab" data-bs-toggle="tab" data-bs-target="#nav-view" type="button" role="tab" aria-controls="nav-view" aria-selected="true">View Users</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-open" role="tabpanel" aria-labelledby="nav-open-tab">
            <div class="row">
                <div class="card" style="height: 100%; overflow-y: auto;">
                  <form class="form-horizontal" action="/job-management/open-job" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row my-2">
                        <label
                          for="job_title"
                          class="col-sm-3 control-label col-form-label"
                          >Name</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            name="job_title"
                            id="job_title"
                            placeholder="Name Here"
                            required
                          />
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label
                          for="job_title"
                          class="col-sm-3 control-label col-form-label"
                          >Email</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            name="job_title"
                            id="job_title"
                            placeholder="Email Here"
                            required
                          />
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label
                          for="job_title"
                          class="col-sm-3 control-label col-form-label"
                          >Position</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            name="job_title"
                            id="job_title"
                            placeholder="Position Here"
                            required
                          />
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label
                          for="job_title"
                          class="col-sm-3 control-label col-form-label"
                          >Password</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            name="job_title"
                            id="job_title"
                            placeholder="Password Here"
                            required
                          />
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                          <button type="submit" class="btn btn-primary" id="openJobBtn">
                            Create User
                          </button>
                        </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            {{-- TAB FOR VIEW ACTIVE JOBS --}}
            <div class="tab-pane fade" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
            <div class="row">
                <div class="container" style="height: 100%px; overflow-y: auto;">
                  <table class="table table-striped ">
                  <thead>
                    <tr>
                      <th style="font-weight: bold;">Name</th>
                      <th style="font-weight: bold;">Email</th>
                      <th style="font-weight: bold;">Position</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    
                  
                  </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
            
        </div> <!-- tab-content -->

<!-- Edit Job Modal -->
<div class="modal fade" id="updateJob" role="dialog" >
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Applicant Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/job-management/update-job" method="POST">
          @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">

                  
                
                </div>
                
              </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="updateBtn" class="btn btn-primary updateBtn">Save Changes</button>      
          </form>
          </div>
      </div>
  </div>
</div>

</x-main>


