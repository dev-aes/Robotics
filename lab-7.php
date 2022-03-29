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
                  <h6 class="font-weight-normal mb-0">This is the Laboratory for <span class="text-primary"><b>Week 7</b></span></h6>
                </div>
              </div>
            </div>
          </div>	
		  
          <div class="row">
		  <!-- Content Left -->
			<!-- Content Right -->
            <div class="col-md-12 grid-margin transparent">
                  <div class="card">
                    <div class="card-body">
					<?php
						$q = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id' AND `student_lab_num`='6'") or die(msqli_error());
						$f = $q->fetch_array();
					?>
                      <h4 class="card-title">Week 7 - Laboratory Work 6 - Keypad<text style="float:right;"> <b style="color:red;">Score:</b>
					  <?php 
					  if(empty($f['student_lab_score'])){  
						echo "Pending"; 
						} else { 
						echo $f['student_lab_score']." Pts"; 
					  }
					  
					  ?></text></h4>
					  <a href="word/lab-6.docx" download="Laboratory-Work-No.-1-Keypad.docx">Download this activity for Laboratory 6 for Week 7</a>
					  
                    </div>
					<div class="card-body">
					<br>
                        <?php
                        $qw = $conn->query("SELECT * FROM `multiple_file` WHERE `multiple_file_u_id` = '$u_id' AND `multiple_file_week`='6'") or die(mysqli_error());
                        while($fw=$qw->fetch_array()){

                            if(empty($f['student_lab_status'])){ ?>
                                <?php
                            } else {
                                ?>  <?php
                                if($f['student_lab_status']=='Check'){
                                    ?>
                                    Answer: <a href="word/<?php echo $fw['multiple_file_name'];?>" target="_blank" download="<?php echo $fw['multiple_file_name'];?>"><?php echo $fw['multiple_file_name'];?></a><br><br>
                                <?php }else{
                                    $sql1="SELECT count(*) AS total1 FROM `multiple_file` WHERE `multiple_file_week` = '6' AND `multiple_file_u_id`='$u_id'";
                                    $result1=mysqli_query($conn,$sql1);
                                    $data1=mysqli_fetch_assoc($result1);
                                    ?>
                                    Answer: <a href="word/<?php echo $fw['multiple_file_name'];?>" target="_blank" download="<?php echo $fw['multiple_file_name'];?>"><?php echo $fw['multiple_file_name'];?></a><br><br>
                                    <?php
                                    if($data1['total1']<=1){
                                        ?>
                                        <a href="lab-7.php?action=delete&student_file_id=<?php echo $fw['multiple_file_id'] ?>&student_file_user=<?php echo $f['student_file_user'] ?>" class="btn btn-primary btn-sm font-weight-medium auth-form-btn" >Delete</a><br><br>
                                    <?php }else{?>
                                        <a href="lab-7.php?action=delete&student_file_id=<?php echo $fw['multiple_file_id'] ?>" class="btn btn-primary btn-sm font-weight-medium auth-form-btn" >Delete</a><br><br>
                                        <?php
                                    }
                                }?>

                                <?php
                            }
                        } ?>
                        <form class="pt-3"method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data" autocomplete="off">
                            <label>Upload your answer file here</label>
                            <?php
                            if($f['student_lab_status']=='Check'){
                                ?>
                                <input type="file" class="form-control form-control-lg"  name="file1" disabled required>
                            <?php }else{
                                ?>
                                <input type="file" class="form-control form-control-lg"  name="file1" required>
                                <?php
                            }?><br>
                            <button class="btn btn-primary btn-m font-weight-medium auth-form-btn" name="upload_file" style="float:right;">Upload</button><br>

                        </form>
                        <?php
                        if(isset($_GET['action'])){
                            $student_file_id=$_GET['student_file_id'];
                            $student_file_user=$_GET['student_file_user'];
                            $result=$conn->query("DELETE FROM multiple_file WHERE multiple_file_id='$student_file_id'");
                            $result1=$conn->query("DELETE FROM student_file WHERE student_file_user='$student_file_user' AND `student_lab_num`='6'");
                            if($result1){}
                            if($result){
                                date_default_timezone_set('Asia/Manila');
                                $date23 = date('m/d/Y h:i:s a', time());
                                echo '	
									<script>
									  function myFunction() {
										swal({
										title: "Success!",
										text: "Successful Deleted",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "lab-7.php";
									  });}
									</script>
									';

                            }else{
                                echo '	
									<script>
									function myFunction() {
									swal({
									title: "Failed!",
									text: "Please Try Again",
									icon: "error",
									button: "Ok",
									});}
									</script>
								';
                            }
                        }
                        if(isset($_POST['upload_file'])){
                            $u_id 		= $u_id;
                            $date = date('F d,Y - H:i:s A',time());
                            $uRefNo1 = $lname." - ".date('ymdhs',time());
                            $file_name =  $_FILES['file1']['name'];
                            $tmp1=$_FILES["file1"]["tmp_name"];
                            $extension1 = explode("/", $_FILES["file1"]["type"]);
                            $name1=$uRefNo1.".docx";
                            $date = date('F d,Y - H:i:s A',time());
                            move_uploaded_file($tmp1, "word/" . $file_name);

                            $sql="SELECT count(*) AS total FROM `multiple_file` WHERE `multiple_file_week` = '6' AND `multiple_file_u_id`='$u_id'";
                            $result=mysqli_query($conn,$sql);
                            $data=mysqli_fetch_assoc($result);
                            if($data['total']>='1'){
                                $sql ="INSERT INTO multiple_file VALUES(null,'6','$u_id','$file_name')";
                                if (mysqli_query($conn,$sql)) {
                                    echo '<script>
									function myFunction() {
										swal({
										title: "Success!",
										text: "Successfully Submitted Laboratory 6",
									    icon: "success",
										type: "successs"
										}).then(function() {
										window.location = "lab-7.php";
									  });}
									</script>';
                                }
                            }else{
                                $sql ="INSERT INTO multiple_file VALUES(null,'6','$u_id','$file_name')";
                                if (mysqli_query($conn,$sql)) {}
                                $sql1 ="INSERT INTO student_file VALUES(null,'$u_id','','','6','$date','0','Pending')";
                                if (mysqli_query($conn,$sql1)) {
                                    echo '<script>
									function myFunction() {
										swal({
										title: "Success!",
										text: "Successfully Submitted Laboratory 6",
									    icon: "success",
										type: "successs"
										}).then(function() {
										window.location = "lab-7.php";
									  });}
									</script>';
                                }
                            }

                        }
                        ?>
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
  <!-- End custom js for this page-->
</body>

</html>

