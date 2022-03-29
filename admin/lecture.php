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
</head>
<body>
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
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background:#ef4747;">
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
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
				  <a href="topic-1.php" style="text-decoration:none;">
                    <div class="card-body">
                      <p class="mb-4">Lecture</p>
                      <p class="fs-30 mb-2">Week 1</p>
                      <p>&nbsp;</p>
                    </div>
				  </a>
                  </div>
				
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
			
                  <div class="card card-tale">	
				  <a href="topic-2.php" style="text-decoration:none;">
                    <div class="card-body">
                      <p class="mb-4">Lecture</p>
                      <p class="fs-30 mb-2">Week 2</p>
                      <p>&nbsp;</p>
                    </div>
				  </a>
                  </div>
				
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
				  <a href="topic-3.php" style="text-decoration:none;">
                    <div class="card-body">
                      <p class="mb-4">Lecture</p>
                      <p class="fs-30 mb-2">Week 3</p>
                      <p>&nbsp;</p>
                    </div>
				  </a>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
				  <a href="topic-4.php" style="text-decoration:none;">
                    <div class="card-body">
                      <p class="mb-4">Lecture</p>
                      <p class="fs-30 mb-2">Week 4</p>
                      <p>&nbsp;</p>
                    </div>
				  </a>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
				  <a href="topic-5.php" style="text-decoration:none;">
                    <div class="card-body">
                      <p class="mb-4">Lecture</p>
                      <p class="fs-30 mb-2">Week 5</p>
                      <p>&nbsp;</p>
                    </div>
				  </a>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
				  <a href="topic-6.php" style="text-decoration:none;">
                    <div class="card-body">
                      <p class="mb-4">Lecture</p>
                      <p class="fs-30 mb-2">Week 6</p>
                      <p>&nbsp;</p>
                    </div>
				  </a>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
				  <a href="topic-7.php" style="text-decoration:none;">
                    <div class="card-body">
                      <p class="mb-4">Lecture</p>
                      <p class="fs-30 mb-2">Week 7</p>
                      <p>&nbsp;</p>
                    </div>
				  </a>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
				  <a href="topic-8.php" style="text-decoration:none;">
                    <div class="card-body">
                      <p class="mb-4">Lecture</p>
                      <p class="fs-30 mb-2">Week 8</p>
                      <p>&nbsp;</p>
                    </div>
				  </a>
                  </div>
                </div>
                  <div class="col-md-3 mb-4 stretch-card transparent">
                      <div class="card card-tale">
                          <a href="topic-9.php" style="text-decoration:none;">
                              <div class="card-body">
                                  <p class="mb-4">Lecture</p>
                                  <p class="fs-30 mb-2">Week 9</p>
                                  <p>&nbsp;</p>
                              </div>
                          </a>
                      </div>
                  </div>
                  <div class="col-md-3 mb-4 stretch-card transparent">
                      <div class="card card-tale">
                          <a href="topic-10.php" style="text-decoration:none;">
                              <div class="card-body">
                                  <p class="mb-4">Lecture</p>
                                  <p class="fs-30 mb-2">Week 10 - Week 14</p>
                                  <p>&nbsp;</p>
                              </div>
                          </a>
                      </div>
                  </div>
              </div>
            </div>
			<!-- right side ---></div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
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
  <!-- End custom js for this page-->
</body>

</html>

