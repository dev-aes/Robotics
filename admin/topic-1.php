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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
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
                  <h6 class="font-weight-normal mb-0">This is the topic for <span class="text-primary"><b>Week 1 - Introduction to Robotics</b></span></h6>
                </div>
              </div>
            </div>
          </div>	
          <div class="row">
		  <!-- Content Left -->
            <div class="col-md-6 grid-margin transparent">
             
                  <div class="card">
                    <div class="card-body">
					<!-- Content Left Title -->
                      <h4 class="card-title">Introduction to Robotics</h4>
                      <p>
					<!-- Content Left Description -->
                        <b>What is Robotics?</b><br>
						Many definitions have been suggested for what we call a robot. The word may conjure up various
						levels of technological sophistication, ranging from a simple material handling device to a
						humanoid. The image of robots varies widely with researchers, engineers, and robot
						manufacturers. However, it is widely accepted that today’s robots used in industries originated in
						the invention of a programmed material handling device by George C. Devol. In 1954, Devol
						filed a U.S. patent for a new machine for part transfer, and he claimed the basic concept of teach-in/playback to control the device. 
						This scheme is now extensively used in most of today's industrial robots.
                      </p>
					<!-- Content Left Dark Description -->
                      <p> 
						Devol's industrial robots have their origins in two preceding technologies: numerical control for
						machine tools, and remote manipulation. Numerical control is a scheme to generate control
						actions based on stored data. Stored data may include coordinate data of points to which the
						machine is to be moved, clock signals to start and stop operations, and logical statements for
						branching control sequences. The whole sequence of operations and its variations are prescribed
						and stored in a form of memory, so that different tasks can be performed without requiring major
						hardware changes. Modern manufacturing systems must produce a variety of products in small
						batches, rather than a large number of the same products for an extended period of time, and
						frequent changes of product models and production schedules require flexibility in the
						manufacturing system.
                      </p>
					  <p>
					    In the video, it teaches you how to setup your TinkerCAD account, and how to use the software/simulator. You can also download the full lecture in PDF form right below of the video.
					  </p>
                    </div>
                  </div>
            </div>
			<!-- Content Right -->
            <div class="col-md-6 grid-margin transparent">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-description">
                        <center>
                            <!-- Content Right Video -->
                            <video id="someID" width="100%" height="480" controls onseeking="myFunction(this.currentTime)">
                                <source src="video/intro.mp4" type="video/mp4"></video>
                        </center>
                        </p>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-description">
                        <center> <!-- Content 2 Right PDF -->
                            <a href="pdf/Intro.pdf" target="_blank">View this PDF</a><br><br>
                            <b>Reference: </b>https://ocw.mit.edu/courses/mechanical-engineering/2-12-introduction-to-robotics-fall-2005/lecture-notes/
                        </center>
                        </p>
                    </div>
                </div>
            </div>
          </div>

          <div class="row">
		  <!-- Content 2 Left -->
            <div class="col-md-6 grid-margin transparent">
            </div>
			<div class="col-md-6 grid-margin transparent">
            </div>
			<!-- Content 2 Right -->
          </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
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

