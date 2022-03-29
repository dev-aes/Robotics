<?php
session_start();
 require_once "connect.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
$email = htmlspecialchars($_SESSION["email"]);
$q = $conn->query("SELECT * FROM `user_account` WHERE `email` = '$email'") or die(msqli_error());
$f = $q->fetch_array();
$u_id =$f['u_id'];
$student_section =$f['student_section'];
$name = "".$f['fname']." ".$f['mname']." ".$f['lname']."";
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
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="icon-bell mx-0"></i>
                    <?php
                    $q1 = $conn->query("SELECT * FROM `section_adviser` WHERE `section_adviser_u_id` = '$student_section'") or die(msqli_error());
                    $f1 = $q1->fetch_array();

                    $section_adviser_s_id = $f1['section_adviser_s_id'];

                    $q_e = $conn->query("SELECT * FROM `user_account` WHERE `position`='Teacher' AND `u_id`='$section_adviser_s_id'") or die(mysqli_error());
                    while($f_e=$q_e->fetch_array()){

                        $sqlc="SELECT count(*) AS totalc FROM `chat` WHERE `chat_user_id` = '$section_adviser_s_id' AND `chat_user` = '$u_id' AND `chat_to`='$section_adviser_s_id' AND `view`=''";
                        $resultc=mysqli_query($conn,$sqlc);
                        $datac=mysqli_fetch_assoc($resultc);
                        $total = $datac['totalc'];

                    }

                    if($total>=1){
                        echo '
              <span class="count"></span>';
                    }
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                    <a class="dropdown-item preview-item" href="chat.php">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="ti-email mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">New Message</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                <?php echo $total;?>
                            </p>
                        </div>
                    </a>
                </div>
            </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="images/profile/<?php echo $f['profile'];?>" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
               <a class="dropdown-item" style="text-transform:capitalize;">
                <i class="ti-user text-primary"></i>
                   <?php

                   echo $name;

                   $position = $f['position'];

                   if($position!="Student"){
                       ?>
                       <script>
                           setTimeout(function(){
                               window.location.reload(1);
                               window.location.href='logout.php';
                           }, 100);
                       </script>
                       <?php
                   }
                   ?>
              </a>
                <a class="dropdown-item" href="profile.php">
                    <i class="ti-settings text-primary"></i>
                    Settings
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
             <li class="nav-item active">
                 <a class="nav-link" href="supplementary.php">
                     <i class="icon-clipboard menu-icon"></i>
                     <span class="menu-title">Supplementary</span>
                 </a>
             </li>
             <li class="nav-item active">
                 <a class="nav-link" href="laboratory.php">
                     <i class="icon-sun menu-icon"></i>
                     <span class="menu-title">Laboratory</span>
                 </a>
             </li>
          <li class="nav-item active">
            <a class="nav-link" href="syllabus.php">
              <i class="icon-cloud menu-icon"></i>
              <span class="menu-title">Syllabus</span>
            </a>
          </li>
             <li class="nav-item active">
                 <a class="nav-link" href="chat.php">
                     <i class="icon-reply menu-icon"></i>
                     <span class="menu-title">Queries</span>
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
                  <h6 class="font-weight-normal mb-0">This is the topic for <span class="text-primary"><b>Week 7 - Keypad</b></span></h6>
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
                      <h4 class="card-title">Keypad</h4>
                      <p>
					<!-- Content Left Description -->
                        <b>Introduction</b><br>
                          The 12 keys keypad is widely used in many applications, some of those are: telephones and ATM machines.
                          There are many different types of keypads and the keypad whish would be explained here would a matrix method in order to find which key is pushed.
                          This keypad does not have pins for Vdd or Vgnd, which means it does not require a direct connection to a voltage source to perform its task.
                          Also this keypad has 7-pins and each pin would represent a row or a column.
                          As this keypad has 12 key, it has 3 columns and for rows. the mount of the keypad is as seen in figure 1, which shows the dimension and pins location.
                          <center><img src="images/img-11.jpg" style="width: 70%; "></center>
                          <center><b>Figure 1</b></center><br>
                      </p>
                      <p>
                          Moreover, the matrix of the keys related to pins is shown in figure 2.
                          Those Figures are important in order to understand how the keypad is built, and how it would be used.
                          Also, they shows important information that is needed to understand the pin layout and the calibration between each key and its two pins.
                        <center><img src="images/img-12.jpg" style="width: 50%; "></center>
                        <center><b>Figure 2</b></center><br>
                      </p>
					<!-- Content Left Dark Description -->
                      <p> 
						<b>Properties</b><br>
                          The keypad has a 3-columns and 4-rows matrix orientation as seen in figure 2. If a key is pushed then the circuit would be shorted for those specific key pins.
                          The short circuit would always be between a row pin and a column pin. For this specific 96AB2-152-F keypad the rows 1-4 are represented by pins 1-4 and columns 1-3 are represented by pins 5-7.
                          For example button 1 would be represented by pins 1 and 5, so if a voltage is applied to one of the pins and a voltammeter is connected to the other pin, when the button is pushed the voltammeter would read the input voltage.
                          From Figure 2 it would be easy to construct a table that would show each button represents what character, and which pins are shorted if that button is pressed, which is provided in Table 1
                          <center><img src="images/img-13.jpg" style="width: 50%; "></center>
                          <center><b>Table 1</b></center><br>
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
                            <source src="video/topic-6.mp4" type="video/mp4"></video>
                        </center>
                        </p>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-description">
                        <center> <!-- Content 2 Right PDF -->
                            <a href="pdf/Topic-6.pdf" target="_blank">View this PDF</a><br><br>
                            <b>Reference: </b>https://www.egr.msu.edu/classes/ece480/capstone/spring12/group07/ECE480/Documents_files/Ali_Behbehani_Application_Notes.pdf
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