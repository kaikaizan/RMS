<x-main>
    <div class="home-content">
        <div class="text">Master List</div>
    </div>
    <div class="row">
        <div class="card" style="height: 100%px; overflow-y: auto;">
            <div class="card-body">
                <div class="row" style=" padding:10px";>
                    <div class="col-md-6">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Filter By Year
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">2019</a></li>
                                <li><a class="dropdown-item" href="#">2020</a></li>
                                <li><a class="dropdown-item" href="#">2021</a></li>
                                <li><a class="dropdown-item" href="#">2022</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="searchByName" class="form-control" id="searchByName"
                            placeholder="Search By Name..">
                    </div>



                </div>
                <table class="table table-striped table-bordered table-hover masterListTable" id="myTable">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th> Appying for </th>
                            <th> College Course </th>
                            <th> College Degree </th>
                            <th> Email </th>
                            <th> Mobile Number </th>
                            <th> Action </th>
                            <!-- <th> View Applicant List </th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($serves as $row)
                            <tr>
                                <td>{{ $row['first_name'] . ' ' . $row['last_name'] }}</td>
                                <td>{{ $row['applying_for'] }}</td>
                                <td>{{ $row['college_course'] }}</td>
                                <td>{{ $row['college_degree'] }}</td>
                                <td>{{ $row['email'] }}</td>
                                <td>{{ $row['mobile_number'] }}</td>
                                <td>
                                    <a data-bs-toggle="modal" data-id="{{ $row->applicant_id }}" href="#myModal"
                                        class="view_applicant btn btn-info">View</a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div id="myModal" class="modal fade " role="dialog" aria-hidden="true">

                                <div class="modal-dialog modal-xl">
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <!-- <div class="text-center"> -->
                                            <h3 class="modal-title w-100">Applicant Information</h3>
                                            <i class='bx bx-x ms-auto text-danger' data-bs-dismiss="modal"
                                                style="font-size: 2em;"></i>
                                            <!-- </div>    -->
                                        </div>
                                        <div class="container rounded bg-white">
                                            <div class="row">
                                                <div class="col-md-2 border-right">
                                                    <div
                                                        class="d-flex flex-column align-items-center text-center p-3 py-5">
                                                        <img class="rounded-circle mt-5" width="150px"
                                                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                                            class="font-weight-bold">{{ $row['first_name'] }}</span><span
                                                            class="text-black-50">{{ $row['email'] }}</span><span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 border-right">
                                                    <div class="p-3 py-5">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-3">
                                                            <h4 class="text-right">Profile</h4>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <label class="labels">Name</label>
                                                                <input type="text" class="form-control"
                                                                    class="user_dialog" placeholder="enter name"
                                                                    id="fname" value="{{ $row['first_name'] }}"
                                                                    disabled>
                                                            </div>
                                                            <div class="col-md-6"><label
                                                                    class="labels">Surname</label><input type="text"
                                                                    class="form-control"
                                                                    value="{{ $row['last_name'] }}"
                                                                    placeholder="surname" id="lname" disabled></div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-12"><label class="labels">Mobile
                                                                    Number</label><input type="text"
                                                                    class="form-control"
                                                                    placeholder="enter phone number"
                                                                    value="{{ $row['mobile_number'] }}" id="pnumber"
                                                                    disabled></div>
                                                            <div class="col-md-12"><label
                                                                    class="labels">Address</label><input type="text"
                                                                    class="form-control" placeholder="enter address"
                                                                    value="{{ $row['address'] }}" id="address"
                                                                    disabled></div>
                                                            <div class="col-md-12"><label
                                                                    class="labels">Birthday</label><input type="text"
                                                                    class="form-control" placeholder="enter birthdare"
                                                                    value="{{ $row['birthday'] }}" id="birthdate"
                                                                    disabled></div>
                                                            <div class="col-md-12"><label
                                                                    class="labels">Sex</label><input type="text"
                                                                    class="form-control" value="{{ $row['sex'] }}"
                                                                    id="sex" disabled></div>
                                                            <!-- <div class="col-md-12"><label class="labels">Blood Type</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{ $row['mobile_number'] }}" id="bloodtype" disabled></div> -->
                                                            <div class="col-md-12"><label class="labels">Applying
                                                                    For</label><input type="text"
                                                                    class="form-control"
                                                                    placeholder="enter job interest"
                                                                    value="{{ $row['applying_for'] }}"
                                                                    id="jobinterest" disabled></div>
                                                            <div class="col-md-12"><label class="labels">Highes
                                                                    Educational Attainment</label><input type="text"
                                                                    class="form-control"
                                                                    placeholder="enter highest educational attainment"
                                                                    id="education"
                                                                    value="{{ $row['educational_attainment'] }}"
                                                                    disabled>
                                                            </div>
                                                            <div class="col-md-12"><label class="labels">Job
                                                                    Discovery</label><input type="text"
                                                                    class="form-control"
                                                                    placeholder="Enter Job Discovery"
                                                                    value="{{ $row['job_discovery'] }}"
                                                                    id="jobdiscovery" disabled></div> <br>
                                                        </div>
                                                        <div class="mt-5 text-center"><button
                                                                class="btn btn-primary profile-button"
                                                                type="button">Save Profile</button></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5" style="padding-top: 50px;">
                                                    <h4 class="text-right">Requested Documents</h4>
                                                    <div class="container">
                                                        <div class="row" style="padding-top: 20px">
                                                            <div class="col-sm">
                                                                <label class="labels">Application Letter</label>
                                                            </div>
                                                            <div class="col-sm viewb mb-2">
                                                                @if (empty($row['application_letter']))
                                                                    <a class="btn btn-outline-primary">View
                                                                        <span class="text-danger m-0"> (Empty)</span>
                                                                    </a>
                                                                @else
                                                                    <a href="/assets/{{ $row['application_letter'] }}"
                                                                        class="btn btn-outline-primary"
                                                                        target="_blank">View
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="w-100"></div>
                                                            <div class="col-sm">
                                                                <label class="labels">Work Experience</label>
                                                            </div>
                                                            <div class="col-sm viewb mb-2">
                                                                @if (empty($row['work_experience']))
                                                                    <a class="btn btn-outline-primary">View
                                                                        <span class="text-danger m-0"> (Empty)</span>
                                                                    </a>
                                                                @else
                                                                    <a href="/assets/{{ $row['work_experience'] }}"
                                                                        class="btn btn-outline-primary"
                                                                        target="_blank">View
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="w-100"></div>
                                                            <div class="col-sm">
                                                                <label class="labels">Official Transcript of
                                                                    Records</label>
                                                            </div>
                                                            <div class="col-sm viewb">
                                                                @if (empty($row['otr']))
                                                                    <a class="btn btn-outline-primary">View
                                                                        <span class="text-danger m-0"> (Empty)</span>
                                                                    </a>
                                                                @else
                                                                    <a href="/assets/{{ $row['otr'] }}"
                                                                        class="btn btn-outline-primary"
                                                                        target="_blank">View
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="w-100"></div>
                                                            <div class="col-sm">
                                                                <label class="labels">Employment Certificates</label>
                                                            </div>
                                                            <div class="col-sm viewb">
                                                                @if (empty($row['employment_certificates']))
                                                                    <a class="btn btn-outline-primary">View
                                                                        <span class="text-danger m-0"> (Empty)</span>
                                                                    </a>
                                                                @else
                                                                    <a href="/assets/{{ $row['employment_certificates'] }}"
                                                                        class="btn btn-outline-primary"
                                                                        target="_blank">View
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="w-100"></div>
                                                            <div class="col-sm">
                                                                <label class="labels">Training Certificates</label>
                                                            </div>
                                                            <div class="col-sm viewb mt-2">
                                                                @if (empty($row['training_certificates']))
                                                                    <a class="btn btn-outline-primary">View
                                                                        <span class="text-danger m-0"> (Empty)</span>
                                                                    </a>
                                                                @else
                                                                    <a href="/assets/{{ $row['training_certificates'] }}"
                                                                        class="btn btn-outline-primary"
                                                                        target="_blank">View
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12"><label
                                                            class="labels">Eligibility</label><input type="text"
                                                            class="form-control" placeholder="enter eligibility"
                                                            value="{{ $row['eligibility'] }}"></div>
                                                    <div class="col-md-12"><label class="labels">Performance
                                                            Evaluation</label><input type="text"
                                                            class="form-control" placeholder="enter evaluation"
                                                            value="{{ $row['performance_evaluation'] }}"></div>
                                                    <div class="col-md-12"><label class="labels">Status</label><input
                                                            type="text" class="form-control"
                                                            placeholder="enter status" value="{{ $row['status'] }}">
                                                    </div> <br>
                                                    <label for="remarks">Remarks</label>
                                                    <textarea class="form-control" id="remarks" rows="5"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        /*$(document).on("click", ".user_dialog", function(){
                                                                                                                                                                                                                                                                                                                var fname = $(this).data('id');
                                                                                                                                                                                                                                                                                                                $(".modal-body #name").val(fname);
                                                                                                                                                                                                                                                                                                            });**/

        // When the user clicks on <span> (x), close the modal
        //span.onclick = function() {
        //modal.style.display = "none";
        //}


        // var myTable = document.getElementById('myTable'), rIndex;

        /*for (var i = 0; i < myTable.rows.length; i++)
        {

        myTable.rows[i].onclick = function()
        {
            rIndex = this.rowIndex;
            document.getElementById("fname").value = this.cells[0].innerHTML;
            document.getElementById("education").value = this.cells[1].innerHTML;
            document.getElementById("position").value = this.cells[2].innerHTML;
            document.getElementById("degree").value = this.cells[3].innerHTML;
            document.getElementById("email").value = this.cells[4].innerHTML;
            document.getElementById("cnumber").value = this.cells[5].innerHTML;
        }
        }*/

        function myFunction() {

            var searchBox_3 = document.getElementById("searchByName");
            searchBox_3.addEventListener("keyup", function() {
                var keyword = this.value;
                keyword = keyword.toUpperCase();
                var table_3 = document.getElementById("myTable");
                var all_tr = table_3.getElementsByTagName("tr");
                for (var i = 0; i < all_tr.length; i++) {
                    var all_columns = all_tr[i].getElementsByTagName("td");
                    for (j = 0; j < all_columns.length; j++) {
                        if (all_columns[j]) {
                            var column_value = all_columns[j].textContent || all_columns[j].innerText;

                            column_value = column_value.toUpperCase();
                            if (column_value.indexOf(keyword) > -1) {
                                all_tr[i].style.display = ""; // show
                                break;
                            } else {
                                all_tr[i].style.display = "none"; // hide
                            }
                        }
                    }
                }
            })

        }
    </script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


</x-main>
