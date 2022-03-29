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
                  <h6 class="font-weight-normal mb-0">This is the topic for <span class="text-primary"><b>Week 4 - Vibration Motor</b></span></h6>
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
                      <h4 class="card-title">Vibration Motor</h4>
                      <p>
					<!-- Content Left Description -->
                        <b>What is Vibration Motor?</b><br>
                          What is a vibration motor? Vibration motor is a compact size coreless DC motor used to informs the users of receiving the signal by vibrating, no sound.
                          Vibration motors are widely used in a variety of applications including cell phones, handsets, pagers, and so on.
                          The main features of vibration motor is the magnet coreless DC motor are permanent,
                          which means it will always have its magnetic properties (unlike an electromagnet, which only behaves like a magnet when an electric current runs through it);
                          another main feature is the size of the motor itself is small, and thus light weight.
                          Moreover, the noise and the power consumption that the motor produce while using are low. Based on those features, the performance of the motor is highly reliable.<br>
                          The vibration motors are configured in two basic varieties: coin (or flat) and cylinder (or bar).<br>
                        <center><img src="images/img-6.jpg" style="width: 40%; "><img src="images/img-7.jpg" style="width: 40%; "></center><br>
                        <center><b>Figure 1:</b> Vibration Motors: cylinder(left), coin(right)</center><br><br>
                      </p>
					<!-- Content Left Dark Description -->
                      <p>
                          <b>Parts of the Vibration Motor</b>
                          <center><img src="images/img-8.jpg" style="width: 50%; "></center><br>
                          <center><b>Figure 2:</b> Parts of Vibration Motor</center><br>
                          <ul>
                            <li><b>Rotor:</b> The rotor is the non-stationary part of a rotary electric motor. The wires and magnetic field of the motor are arranged so that a torque is developed about the rotor's axis. In some designs, the rotor can act to serve as the motor's armature, across which the input voltage is supplied. </li>
                            <li><b>Stator:</b> The stator is the stationary part of a rotary electric motor. It could be worked as the magnet field and interact with the armature to create motion. Another function of the stator is it could act as the armature, which receives its influence from moving field coils on the rotor.</li>
                            <li><b>Commutator: </b>A commutator is a rotary electrical switch in certain types of electric motors or electrical generators that periodically reverses the current direction between the rotor and the external circuit. In a motor, it applies power to the best location on the rotor, and in a generator, picks off power similarly.</li>
                            <li><b>Armature: </b> The armature in this motor is a set of thin metal plates stacked together, with thin copper wire coiled around each of the three poles of the armature. The main function of the armature is to convert the magnetic energy into the kinetic energy.</li>
                            <li><b>Windings: </b> Windings are consisted with some turns of coils. These coils are assembled to generate a magnetic field once electricity goes through them.</li>
                            <li><b>Weight: </b> In order to make a vibrating alert, a weight mass need to be attached to the shaft. Through the high speed displacement of weight, the vibration can be achieved.</li>
                            <li><b>Brushes: </b> In motor’s shaft, the brushes conduct the current between stator and coils. The life of the motor depends on when the brushes will be worn out.</li>
                        </ul>

                      </p>
					  <p>
                          The video on the left shows some more information about this topic, and how to implement this onto the simulator, Autodesk TinkerCAD. You can also download the full lecture in PDF form right below of the video.
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
                            <source src="video/topic-3.mp4" type="video/mp4"></video>
                        </center>
                        </p>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-description">
                        <center> <!-- Content 2 Right PDF -->
                            <a href="pdf/Topic-3.pdf" target="_blank">View this PDF</a><br><br>
                            <b>Reference: </b>https://www.egr.msu.edu/classes/ece480/capstone/spring13/group05/downloads/Application%20Note-yangyi.pdf
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