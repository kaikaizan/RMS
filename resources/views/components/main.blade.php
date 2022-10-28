<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Dashboard | BSU RMS </title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/bsu_logo.png')}}"/>

    @vite(['resources/js/app.js'])

    <script src="//unpkg.com/alpinejs" defer></script>

    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
   </head>
<body>
  

  <div class="sidebar">
    <div class="logo-details">
      <img src="{{url('/images/bsu_logo.png')}}" alt="logo" class="light-logo icon" width="35"/>
      <span class="logo_name">BSU HRMO RMS</span>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-links">
      <li>
        
      </li>
      <li>
        <a href="{{url('/dashboard')}}">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="dashboard.php">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-user-account'></i>
            <span class="link_name">Applicants</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Tasks</a></li>
          <li><a href="{{url('/initial-assessment') }}">Initial Assessment</a></li>
          <li><a href="{{url('/applicant-tracking') }}">Applicant Tracking</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{url('/job-management') }}">
            <i class='bx bxs-book-open' ></i>
            <span class="link_name">Job Management</span>
          </a>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="job-management.php">Jobs</a></li>
        </ul>
      </li>
      <li>
        <a href="{{url('/masterlist')}}">
          <i class='bx bx-list-ul' ></i>
          <span class="link_name">Master List</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="master-list.php">Master List</a></li>
        </ul>
      </li>
      {{-- <li>
        <a href="{{url('/applicant-tracking')}}">
          <i class='bx bxs-user-account' ></i>
          <span class="link_name">Applicant Tracking</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="applicant-tracking.php">Tracking</a></li>
        </ul>
      </li> --}}
      {{-- IF ADMIN IS LOGGED IN --}}
      @if(auth('admin')->user()->is_admin == 1)
      <li>
        <div class="iocn-link">
          <a href="#">
          <i class="bx bxs-data"></i>
            <span class="link_name">Database</span>
          </a>
          <i class="bx bxs-chevron-down backupArrow" ></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Database</a></li>
            <li><a href="{{url('/backup-database')}}">Backup Database</a></li>
            <li><a href="{{url('/restore-database')}}">Restore Database</a></li>
        </ul>
        {{-- <li>
            <a href="audit-trail.php">
            <i class="bx bxs-file-find"></i>
              <span class="link_name">Audit Trail</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="audit-trail.php">Audit Trail</a></li>
            </ul>
        </li> --}}
        <li>
            <a href="{{url('/manage-users')}}">
            <i class="bx bxs-user-detail"></i>
              <span class="link_name">Manage Users</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="{{url('/manage-users')}}">Manage Users</a></li>
            </ul>
        </li>
        <li>
          <a href="{{url('/??')}}">
            <i class='bx bx-edit-alt'></i>
            <span class="link_name">Web Page Contents</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="home-page-edit.php">Web Page</a></li>
          </ul>
        </li>
        <li>
          <a href="{{url('/')}}">
            <i class='bx bxs-user-circle'></i>
            <span class="link_name">Applicant Accounts</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="home-page-edit.php">Web Page</a></li>
          </ul>
        </li>
      @endif
 
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="{{url('/images/user.png')}}" alt="profileImg">
        <div class="name-job">
          <div class="profile_name">
            {{ auth('admin')->user()->name }}
          </div>
          <div class="job">
            {{ auth('admin')->user()->position }}
          </div>
        </div>
     </div>
        <a href="{{ route('logout') }}" 
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{-- {{ __('Logout') }} --}}
          <i class='bx bx-log-out' id="log_out" ></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
      </li>
    </ul>
  </div>


  <!-- CONTENT SECTION -->
<div class="home-section">    
    <div class="container-fluid">
      <div class="con">
        
      <!-- PUT CODE HERE-->
         
      {{$slot}}
                
      </div>
    </div>
    <footer class="sticky-footer">
        <ul>
          <li><a href="{{url('/dashboard')}}">Home</a></li>
          <li><a href="{{url('/pdf/20-DPPolicy-May-06-2021.pdf')}}">BSU Data Privacy Policy</a></li>
        </ul>
        <p>Copyright 2022</p>
    </footer>
    
</div>
{{-- <x-applicant-side.flash-message/> --}}



  <!-- SCRIPTS -->
  <script>
  let arrow = document.querySelectorAll(".arrow, .backupArrow, .usersArrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function(){
    var requiredCheckboxes = $('.options :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>


<script>
  $(document).ready( function () {
    
    $('#closedJobs').DataTable({
        pagingType: 'full_numbers',
    });
    $('#openedJobs').DataTable({
        pagingType: 'full_numbers',
    });
    
});

  $(document).ready(function () {
    $('#qualifiedTable').DataTable({
        pagingType: 'full_numbers',
    });
    $('#disqualifiedTable').DataTable({
        pagingType: 'full_numbers',
    });
    
    
    

    $("#qualifiedSearch, #disqualifiedSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#qualifiedSearchTable tr, #disqualifiedSearchTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    

  });
});
    
</script>
<script>
  $(document).ready( function () {
    $('#myTable tfoot th').each( function () {
        var title = $('#myTable tfoot th').eq( $(this).index() ).text();
        if(title!=""){
            $(this).html( '<input type="text" placeholder="Search" style="width: 80%"/>' );
            // $(this).html( '<input type="text" placeholder="Search '+title+'" style="width: 80%"/>' );

      }
    } );
//**********
    
    // DataTable
    var table = $('#myTable').DataTable({
      
    "columnDefs": [
        { "searchable": false, "targets": [5] ,}
    ],
    });
 
    // Apply the search
    table.columns().eq(0).each( function ( colIdx ) { //    table.columns().eq( 0 ).each( function ( colIdx ) {

        if( !table.settings()[0].aoColumns[colIdx].bSearchable ){
        table.column( colIdx ).footer().innerHTML=table.column( colIdx ).header().innerHTML;
    }
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
    $('#myTable tfoot tr').appendTo('#myTable thead');

 //***   
    $("#initialSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tableSearch tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
} );
</script>
<script>
  $(function() {
    var dateToday = new Date();
     $( "#opening_date" ).datepicker({
      dateFormat: "yy-mm-dd",
      minDate: '-1M',
      maxDate: '+1M'
      });

      $( "#closing_date" ).datepicker({
      dateFormat: "yy-mm-dd",
      minDate: '-1M',
      maxDate: '+2M'
      });
  
  });
</script>

<script>
  $('.openJobBtn').on('click', function(e){

if($(this).closest('form')[0].checkValidity()){
    e.preventDefault();

    var form = $(this).parents('form');
        
    Swal.fire({
    title: 'Confirm Action',
    text: "Proceed opening job.",
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
return false;
    }
});
</script>


<script>
  // $('#jobDescription').modal('hide');
  $(document).ready(function(){
      $('.view_applicant').click(function(){
          var id = $(this).attr('data-id');               

          $.ajaxSetup({
              headers:{
                  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
          url: 'view-applicant/'+id,
          type: 'GET',
          data: {
              
              "applicant_id": id
          },
          success: function(data){
            // $('#competency').html(data.competency)
              $('#fname').val(data.first_name)
              $('#lname').val(data.last_name)
              $('#pnumber').val(data.mobile_number)
              $('#address').val(data.address)
              $('#birthdate').val(data.birhtday)
              $('#sex').val(data.sex)
              // $('#bloodtype').val(data.blood_type)
              $('#jobinterest').val(data.applying_for)
              $('#education').val(data.college_degree)
              $('#jobdiscovery').val(data.job_discovery)


          }, 
          error:function(xhr){
              console.log(xhr.responseText);
          }
      });
          
      });
  });
</script>


</body>
</html>
