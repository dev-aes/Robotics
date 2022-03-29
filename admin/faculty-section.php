<?php
session_start();
 require_once "connect.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Courseware</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body onload="myFunction()">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="home.php" style="margin-left:50px;"><img src="images/logo-wide.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="home.php"><img src="images/logo-mini.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
               <a class="dropdown-item" style="text-transform:capitalize;">
                <i class="ti-user text-primary"></i>
                   <?php
                   $username = htmlspecialchars($_SESSION["username"]);
                   $q = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username'") or die(msqli_error());
                   $f = $q->fetch_array();
                   $u_id =$f['admin_id'];
                   $name = "".$f['fname']." ".$f['mname']." ".$f['lname']."";
                   echo $name;


                   $position = $f['position'];

                   if($position!="Admin"){
                       ?>
                       <script>
                           setTimeout(function(){
                               window.location.reload(1);
                               window.location.href='../out.php';
                           }, 100);
                       </script>
                       <?php
                   }
                   ?>
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->  <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background:#ef4747;">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="lecture.php">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Lecture</span>
            </a>
          </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="collapse" href="#ui-lab" aria-expanded="false" aria-controls="ui-lab" >
                    <i class="icon-sun menu-icon " style="color:white;"></i>
                    <span class="menu-title" style="color:white;">Laboratories</span>
                    <i class="menu-arrow" style="color:white;"></i>
                </a>
                <div class="collapse" id="ui-lab">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="lab.php" style="text-transform:capitalize;">Week 1</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-1.php" style="text-transform:capitalize;">Week 2</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-2.php" style="text-transform:capitalize;">Week 3</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-3.php" style="text-transform:capitalize;">Week 4</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-4.php" style="text-transform:capitalize;">Week 5</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-5.php" style="text-transform:capitalize;">Week 6</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-6.php" style="text-transform:capitalize;">Week 7</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-7.php" style="text-transform:capitalize;">Week 8</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-8.php" style="text-transform:capitalize;">Week 9</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-9.php" style="text-transform:capitalize;">Week 10</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-10.php" style="text-transform:capitalize;">Week 11</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-11.php" style="text-transform:capitalize;">Week 12</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-12.php" style="text-transform:capitalize;">Week 13</a></li>
                        <li class="nav-item"> <a class="nav-link" href="lab-13.php" style="text-transform:capitalize;">Week 14</a></li>
                    </ul>
                </div>
            </li>
          <li class="nav-item active">
            <a class="nav-link" href="student.php">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Student List</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="faculty.php">
              <i class="ti-apple menu-icon"></i>
              <span class="menu-title">Faculty List</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="section.php">
              <i class="ti-map menu-icon"></i>
              <span class="menu-title">Section List</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="syllabus.php">
              <i class="icon-cloud menu-icon"></i>
              <span class="menu-title">Syllabus</span>
            </a>
          </li>
            <li class="nav-item active">
                <a class="nav-link" href="https://www.tinkercad.com/" target="_blank">
                    <i class="icon-anchor menu-icon"></i>
                    <span class="menu-title">Simulator</span>
                </a>
            </li>
        </ul>
      </nav>
     <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0"> 
                  <h3 class="font-weight-bold" style="text-transform:capitalize;">Welcome <?php echo $f['fname'];?></h3>
                  <h6 class="font-weight-normal mb-0">This is the Advisory List </h6>
                </div>
              </div>
            </div>
          </div>	
		  
          <div class="row">
		  <!-- Content Left -->
			<!-- Content Right -->
            <div class="col-md-12 grid-margin transparent">
						<a href="#" class="btn btn-primary btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Advisory</a>
                  <div class="card">
					<div class="card-body table-responsive">
					
              <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Faculty Name</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody><?php
        $faculty_id = $_GET['faculty_id'];
        $q_e = $conn->query("SELECT * FROM `section_adviser` WHERE `section_adviser_s_id`='$faculty_id'") or die(mysqli_error());
        while($f_e=$q_e->fetch_array()){
            $section_adviser_s_id = $f_e['section_adviser_s_id'];
            $q = $conn->query("SELECT * FROM `user_account` WHERE `u_id` = '$section_adviser_s_id'") or die(msqli_error());
            $f = $q->fetch_array();

            $section_adviser_u_id = $f_e['section_adviser_u_id'];
            $q1 = $conn->query("SELECT * FROM `section` WHERE `section_id` = '$section_adviser_u_id'") or die(msqli_error());
            $f1 = $q1->fetch_array();
            ?>
            <tr>
                <td style="text-transform:capitalize;"><?php echo $f['lname'].", ".$f['fname']." ".$f['mname']?></td>
                <td><?php echo $f1['section_name'];?></td>
                <td><a href="faculty-section.php?section_id=<?php echo $f1['section_id']?>&faculty_id=<?php echo $f_e['section_adviser_id'];?>&delete=<?php echo $faculty_id;?>" class="btn btn-primary btn-lg" >Delete</a></td>
            </tr>
            <?php
        }
        if(isset($_GET['delete'])){
            $faculty_id = $_GET['faculty_id'];
            $delete = $_GET['delete'];
            $section_id = $_GET['section_id'];
            $result1=$conn->query("DELETE FROM `section_adviser` WHERE `section_adviser_id`='$faculty_id'");
            if($result1){

                $update1 = $conn->query("UPDATE section SET `section_status`='0' WHERE `section_id`='$section_id'");
                if ($update1){}
                echo
                    '<script>
					function myFunction(){
						swal({
						title: "Success!",
						text: "Successfully Updated",
						icon: "success",
						type: "success"
						}).then(function(){
						window.location = "faculty-section.php?faculty_id='.$delete.'";
					});}
				</script>';
            }else{
                echo'
				<script>
					function myFunction(){
						swal({
						title: "Failed!",
						text: "Please Try Again",
						icon: "error",
						button: "Ok",
						});}
						</script>';
            }}
        ?>
        </tbody>
		</table>		
                    </div>
                  </div>
            </div>
          </div> <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Advisory</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form class="pt-3"method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data" autocomplete="off">
                      <div class="modal-body">
                          <select class="form-control" required name="section_adviser">
                              <option value="">Select Section</option>
                              <?php
                              $q_e1 = $conn->query("SELECT * FROM `section` WHERE `section_status`='0'") or die(mysqli_error());
                              while($f_e1=$q_e1->fetch_array()){
                                  ?>
                                  <option value="<?php echo $f_e1['section_id']?>"><?php echo $f_e1['section_name']?></option>
                              <?php }?>
                          </select>
                          <input type="hidden" value="<?php echo $_GET['faculty_id']?>" name="faculty_id">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="save_file">Save </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <?php
      if(isset($_POST['save_file'])){
          $faculty_id = $_POST['faculty_id'];
          $section_adviser = $_POST['section_adviser'];
          $sql ="INSERT INTO section_adviser VALUES(null,'$section_adviser','$faculty_id')";
          if (mysqli_query($conn,$sql)) {
              $update = $conn->query("UPDATE section SET `section_status`='1' WHERE `section_id`='$section_adviser'");
              if ($update){}
              echo '<script>
									function myFunction() {
										swal({
										title: "Success!",
										text: "Successfully Added New Advisory",
									    icon: "success",
										type: "successs"
										}).then(function() {
										window.location = "faculty-section.php?faculty_id='.$faculty_id.'";
									  });}
									</script>';
          }
      }
      ?>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
  </script>
  <!-- End custom js for this page-->
</body>

</html>

