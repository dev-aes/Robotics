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
  <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .image-area {
            border: 2px dashed rgba(117, 117, 117, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Profile Picture Preview';
            color: #757575;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }
    </style>
</head>
<body  onload="myFunction()">
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
               <a class="dropdown-item" style="text-transform:capitalize;" href="profile.php">
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
                  <h6 class="font-weight-normal mb-0">This is your Profile Settings you can change any details you want</span></h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
		    <form class="pt-3"method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data" autocomplete="off">
                <div class="form-group row">
					<div class="col-lg-4">
					<label>Last Name</label>
					<input type="text" class="form-control form-control-lg" style="text-transform:capitalize;" name="lname" id="exampleInputUsername1" required value="<?php echo $f['lname']?>">
					</div>
					<div class="col-lg-3">
					<label>First Name</label>
					<input type="text" class="form-control form-control-lg" style="text-transform:capitalize;"  name="fname" id="exampleInputUsername1" required value="<?php echo $f['fname']?>">
					</div>
					<div class="col-lg-3">
					<label>Middle Name</label>
					<input type="text" class="form-control form-control-lg" style="text-transform:capitalize;"  name="mname" id="exampleInputUsername1" value="<?php echo $f['mname']?>">
					</div>
					<div class="col-lg-2">
					<label>Suffix</label>
					<input type="text" class="form-control form-control-lg" style="text-transform:capitalize;"  name="suffix" id="exampleInputUsername1" value="<?php echo $f['suffix']?>">
					</div>
                </div>
                <div class="form-group row">
					<div class="col-lg-6">
					<label>TUP Email Address</label>
					<input type="email" class="form-control form-control-lg" name="email" placeholder="Enter Email Address" id="email2" value="<?php echo $f['email']?>" required pattern="[a-z0-9._%+-]+@tup.edu.ph" title="Domain part must be @tup.edu.ph !!!">
					 <div id="status2"><br></div>
					</div>
					<div class="col-lg-6">
					<label>TUP-T UID #</label>
					<input type="text" class="form-control form-control-lg" name="user_id_number" id="exampleInputUsername1" placeholder="Enter ID Number" value="<?php echo $f['user_id_number']?>" required>
					 <div id="status"><br></div>
					 </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Upload Profile Picture</label>
                        <input id="upload" type="file" onchange="readURL(this);" name="file1" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="form-group row">
					<div class="col-lg-4">
					<label>New Password</label>
					<input type="password" class="form-control form-control-lg"  name="password" placeholder="Enter Your Passwords" id="password2" onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
					</div>
					<div class="col-lg-4">
					<label>Confirm Password</label>
					<input type="password" class="form-control form-control-lg"  name="confirm_password"id="confirm_password" placeholder="Confirm Your Password" onkeyup='check();' >
					</div>
					<div class="col-lg-4">
					<label>Old Password</label>
					<input type="password" class="form-control form-control-lg"  name="old_password2" placeholder="Last Password" required>
					</div>
                </div>
                <div class="form-group row">
					<div class="col-lg-12">
						<div id="err2"><br></div>
					</div>
                </div>
                    <input type="hidden" class="form-control"	  name = "u_id" required value="<?php echo $f['u_id']?>">
                    <input type="hidden" class="form-control"	 name = "old_password1"  value="<?php echo $f['password']?>">
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="register" type="submit">Update</button>
                </div>
              </form>
				<?php
				if(isset($_POST['register'])){
					$u_id 		= $_POST['u_id'];
					$lname 		= $_POST['lname'];
					$mname 		= $_POST['mname'];
					$fname 		= $_POST['fname'];
					$suffix 		= $_POST['suffix'];
					$email 		= $_POST['email'];
					$user_id_number 		= $_POST['user_id_number'];
					$old_password1 		= $_POST['old_password1'];
					$old_password2 		= $_POST['old_password2'];
					$password 	    	= $_POST['password'];
					$confirm_password 	= $_POST['confirm_password'];
                    $name1 = $lname."-".$user_id_number.".jpg";
                    $tmp1=$_FILES["file1"]["tmp_name"];
                    move_uploaded_file($tmp1, "images/profile/" . $name1);
					
					if(password_verify($old_password2, $old_password1)){
					if($password == $confirm_password){
						if($_POST['password']==""){
							$ps2 = $_POST['old_password2'];
						}else{
							$ps2 = $_POST['password'];
						}
				    $pass = password_hash($ps2, PASSWORD_DEFAULT);
					
				    $result=$conn->query("UPDATE `user_account` SET `user_id_number`='$user_id_number',`suffix`='$suffix',`lname`='$lname',
					`fname`='$fname',`mname`='$mname',`email`='$email',`password`='$pass' , `profile`='$name1' WHERE `u_id`='$u_id' ");
					if($result){
					echo '<script>
									function myFunction() {
										swal({
										title: "Success!",
										text: "Successfully Updated Your Profile",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "profile.php";
									  });}
									</script>';
						}
					    
					}else{
					    echo '<script>
									function myFunction() {
									swal({
									title: "Failed!",
									text: "Oops! Sorry Please Try Again",
									icon: "error",
									button: "Ok",
									});}
									</script>';
					}
				}else{
				      echo '<script>
									function myFunction() {
									swal({
									title: "Failed!",
									text: "Oops! Wrong Password Please Try Again",
									icon: "error",
									button: "Ok",
									});}
									</script>';
				}
					
				}
					?>
           </div>
              <div class="col-md-4">
                  <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
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
  <script src="js/script.js"></script>
  <script src="js/script2.js"></script>
  <script>
var check = function() {
  if (document.getElementById('password2').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('password2').style.border = 'green 2px solid';
    document.getElementById('confirm_password').style.border = 'green 2px solid';
    document.getElementById('err2').innerHTML = '<span style="color:green;" > </span> Password confirm';
  } else {
    document.getElementById('password2').style.border = 'red 2px solid';
    document.getElementById('confirm_password').style.border = 'red 2px solid';
    document.getElementById('err2').innerHTML = '<span style="color:red;" > </span> Password and confirm password is not match';
  }
}
</script>
      <script>
          function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      $('#imageResult')
                          .attr('src', e.target.result);
                  };
                  reader.readAsDataURL(input.files[0]);
              }
          }

          $(function () {
              $('#upload').on('change', function () {
                  readURL(input);
              });
          });

          /*  ==========================================
              SHOW UPLOADED IMAGE NAME
          * ========================================== */
          var input = document.getElementById( 'upload' );

          input.addEventListener( 'change', showFileName );
          function showFileName( event ) {
              var input = event.srcElement;
              var fileName = input.files[0].name;
              infoArea.textContent = 'File name: ' + fileName;
          }
      </script>
  <!-- End custom js for this page-->
</body>

</html>

