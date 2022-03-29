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

                    $sqlc="SELECT count(*) AS totalc FROM `chat` WHERE `chat_to`='$u_id' AND `chat_user_id`!='$u_id' AND `view`=''";
                    $resultc=mysqli_query($conn,$sqlc);
                    $datac=mysqli_fetch_assoc($resultc);

                    $total = $datac['totalc'];
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

                   if($position!="Teacher"){
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
                <a class="nav-link" href="sup.php">
                    <i class="icon-clipboard menu-icon"></i>
                    <span class="menu-title">Supplementary</span>
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
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                  <img src="images/dashboard/robotics.jpg" alt="people">
                  <div class="weather-info">
                      <div class="d-flex">
                          <?php
                          $jsonfile = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=Taguig,PH&units=metric&appid=6b7494671b455147c765fe1e02b9d592");
                          $jsondata = json_decode($jsonfile);
                          $temp = $jsondata->main->temp;
                          $loc = $jsondata->name;
                          $country = $jsondata->sys->country;
                          $icn = $jsondata->weather[0]->icon;
                          ?>
                          <div><img src="https://openweathermap.org/img/wn/<?php echo $icn?>.png"></div>
                          <div>
                              <h2 class="mb-0 font-weight-normal"></i><?php echo $temp?><sup>°C</sup></h2>
                          </div>
                          <div class="ml-2">
                              <h4 class="location font-weight-normal"><?php echo $loc?></h4>
                              <h6 class="font-weight-normal"><?php echo $country?></h6>
                          </div>
                      </div>
                      <div class="float-lg-right text-right">
                          <div class="ml-2">
                              <?php
                              function week($date) {
                                  $ddate = date("W", $date);
                                  return $ddate-3;
                              }
                              $mydate=getdate(date("U"));
                              $date = "$mydate[year]-$mydate[mon]-$mydate[mday]";
                              $days = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]"
                              ?>
                              <h4 class="location font-weight-normal"><?php echo $days?></h4><br>
                              <h4 class="location font-weight-normal">Week <?php echo week(strtotime($date))?></h4>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <?php

				$sqlc="SELECT count(*) AS totalc FROM `user_account` WHERE `status_1`='Active' AND `position`='Student'";
				$resultc=mysqli_query($conn,$sqlc);
				$datac=mysqli_fetch_assoc($resultc);
				$countc= $datac["totalc"];

				$sql="SELECT count(*) AS total FROM `user_account` WHERE `status_1`='Active' AND `position`='Student'";
				$result=mysqli_query($conn,$sql);
				$data=mysqli_fetch_assoc($result);
				$count= $data["total"];

				$sql1="SELECT count(*) AS total1 FROM `weeks` WHERE `weeks_status` = '1'";
				$result1=mysqli_query($conn,$sql1);
				$data1=mysqli_fetch_assoc($result1);
				$count1= $data1["total1"];

                $q1 = $conn->query("SELECT * FROM `weeks` WHERE `weeks_status` = '1' ORDER BY `weeks_id` DESC") or die(msqli_error());
                $f1 = $q1->fetch_array();

                $q2 = $conn->query("SELECT * FROM `laboratories` WHERE `lab_status` = '1' ORDER BY `lab_id` DESC") or die(msqli_error());
                $f2 = $q2->fetch_array();
			?>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card bg-gradient-success">
                    <div class="card-body">
                      <p class="mb-4">Number of Student Active</p>
                      <p class="fs-30 mb-2"><?php echo $count?></p>
                      <p>out of (<?php echo $countc?>)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card bg-gradient-info">
                    <div class="card-body">
                      <p class="mb-4">Lecture</p>
                      <p class="fs-30 mb-2"><?php echo $f1['weeks_name']?> is now Active</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card bg-gradient-primary">
                    <div class="card-body">
                      <p class="mb-4">Laboratories</p>
                      <p class="fs-30 mb-2"><?php echo $f2['lab_title']?> is Now Active</p>
                      <p><br></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="row card bg-gradient-danger">
                <div class="row">
                    <div class="col-md-12 grid-margin transparent justify-content-center">
                        <div class="row"><br/></div>
                        <div class="row justify-content-center">
                            <center><img src="images/tup_logo.png" alt="TUP logo" style="height: 380px; width: 380px;"></center>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 grid-margin transparent"></div>
                    <div class="col-md-6 grid-margin transparent justify-content-center">
                        <div class="row justify-content-center">
                            <p class="mb-2"><center><h4><b>TUP Mission</b></h4></center></p>
                        </div>
                        <div class="row"><br/></div>
                        <div class="row justify-content-center">
                            <p class="mb-4">The University shall provide higher and advanced vocational, technical, industrial,
                                technological and professional education and training in industries and technology, and in practical arts leading to certificates,
                                diplomas and degrees. It shall provide progressive leadership in applied research, developmental studies in technical, industrial,
                                and technological fields and production using indigenous materials; effect technology transfer in the countryside;
                                and assist in the development of small-and-medium scale industries in identified growth centers.</p><br/>
                        </div>
                        <div class="row justify-content-center">
                            <p class="mb-2"><center><h4><b>TUP Vision</b></h4></center></p><br/>
                        </div>
                        <div class="row"><br/></div>
                        <div class="row justify-content-center">
                            <p class="mb-4">A premier state university with recognized excellence in engineering and technology education at par with leading universities in the ASEAN region.</p><br/>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin transparent"></div>
                </div>
            </div>
      </div>
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

