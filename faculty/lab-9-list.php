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
$u_id=$f['u_id'];
$lname=$f['lname'];
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
                  <h6 class="font-weight-normal mb-0">This is the Laboratory for <span class="text-primary"><b>Week 10</b></span></h6>
                </div>
              </div>
            </div>
          </div>	
		  
          <div class="row">
		  <!-- Content Left -->
			<!-- Content Right -->
            <div class="col-md-12 grid-margin transparent">
                <?php
                $section_name = $_GET['section_name'];
                $sql1="SELECT count(*) AS total1 FROM `enable_history_lab` WHERE `enable_history_id` = '10' AND `enable_history_fac`='$u_id' AND `enable_history_sec`='$section_name'";

                $result1=mysqli_query($conn,$sql1);
                $data1=mysqli_fetch_assoc($result1);
                $count1= $data1["total1"];
                if($count1>='1'){
                    ?>
                    <a href="lab-9-list.php?disabled=1&week=10&section_name=<?php echo $_GET['section_name']?>&disable" class="btn btn-primary btn-sm" >Disable this Week</a>
                <?php }else{
                    ?>
                    <a href="lab-9-list.php?disabled=0&week=6&section_name=<?php echo $_GET['section_name']?>&disable" class="btn btn-primary btn-sm" >Enable this Week</a>
                    <?php
                }
                if(isset($_GET['disable'])){
                    $disabled=$_GET['disabled'];
                    $week	 =$_GET['week'];
                    $section_name	 =$_GET['section_name'];
                    if($disabled==1){
                        $result=$conn->query("DELETE FROM `enable_history_lab` WHERE `enable_history_id`='10' AND `enable_history_fac`='$u_id' AND `enable_history_sec`='$section_name'");
                        if($result){
                            echo
                                '<script>
					                function myFunction(){
						            swal({
						            title: "Success!",
						            text: "Successfully Updated",
						            icon: "success",
						            type: "success"
						            }).then(function(){
						            window.location = "lab-9-list.php?section_name='.$section_name.'";
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
                        }
                    }else{
                        $sql ="INSERT INTO enable_history_lab VALUES(null,'10','$u_id','$section_name')";
                        if (mysqli_query($conn,$sql)) {
                            echo'
			                    <script>
					                function myFunction(){
						                swal({
						                title: "Success!",
						                text: "Successfully Updated",
						                icon: "success",
						                type: "success"
						                }).then(function() {
						                window.location = "lab-9-list.php?section_name='.$section_name.'";
						                });}
		                        </script>';

                        }else{
                            echo'
			                    <script>
					                function myFunction() {
						            swal({
						            title: "Failed!",
						            text: "Please Try Again",
						            icon: "error",
						            button: "Ok",
						            });}
						        </script>';
                        }
                    }
                }
                ?>
		<a href="excel.php" class="btn-success btn-sm btn" style="text-transform:capitalize;color:white;text-stroke:2px solid black;">
			<i class="nav-icon fas fa-file" ></i> Export Excel
		</a>
                <a href="word/weekly.docx" class="btn-dark btn-sm btn" download="Weekly-Accomplishment-Report-1.docx" style="text-transform:capitalize;color:white;text-stroke:2px solid black;">
                    <i class="nav-icon fas fa-file" ></i> Download Lab Work
                </a>
                  <div class="card">
					<div class="card-body table-responsive">
					
		<table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Student Number</th>
                <th>Score</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody><?php 
					$section_name = $_GET['section_name'];
					$q_e = $conn->query("SELECT * FROM `user_account` WHERE `student_section`='$section_name'") or die(mysqli_error());
					while($f_e=$q_e->fetch_array()){ 
						$u_id1 = $f_e['u_id'];
						$q = $conn->query("SELECT * FROM `student_file` WHERE `student_lab_num`='9' AND `student_file_user`='$u_id1'") or die(msqli_error());
						$f = $q->fetch_array();
				?>
            <tr>
                <td style="text-transform:capitalize;"><?php echo $f_e['lname'].", ".$f_e['fname']." ".$f_e['mname']?></td>
                <td><?php echo $f_e['user_id_number'];?></td>
                <td><?php if(empty($f['student_lab_score'])){ echo "Pending";}else{ echo $f['student_lab_score'];}?></td>
                <td><?php if(empty($f['student_lab_status'])){ echo "Pending";}else{ echo $f['student_lab_status'];}?></td>
                <td><?php if(empty($f['student_lab_date'])){ echo "Pending";}else{ echo $f['student_lab_date'];}?></td>
                <td>
                    <?php if(!empty($f['student_lab_date'])){ ?>
                        <a href="view-update.php?user_id=<?php echo $u_id1?>&student_file_id=<?php echo $f['student_file_id']?>&section_name=<?php echo $_GET['section_name']?>&student_lab_num=9" class="btn bg-danger btn-sm">Update</a>
                    <?php }else{
                        ?>
                        <a href="#" class="btn bg-danger btn-sm">Pending</a>
                        <?php
                    }?>
                </td>
            </tr>	
				<?php
					}
				?>
		</table>		
                    </div>
                  </div>
            </div>
          </div> <!-- main-panel ends -->
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

