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
	   <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-8 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo-wide.png" alt="logo">
              </div>
           
              <form class="pt-3"method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data" autocomplete="off">
                <div class="form-group row">
					<div class="col-lg-4">
					<label>Last Name</label>
					<input type="text" class="form-control form-control-lg" style="text-transform:capitalize;" name="lname" id="exampleInputUsername1" placeholder="Enter Lastname" required>
					</div>
					<div class="col-lg-3">
					<label>First Name</label>
					<input type="text" class="form-control form-control-lg" style="text-transform:capitalize;"  name="fname" id="exampleInputUsername1" placeholder="Enter Firstname" required>
					</div>
					<div class="col-lg-3">
					<label>Middle Name</label>
					<input type="text" class="form-control form-control-lg" style="text-transform:capitalize;"  name="mname" id="exampleInputUsername1" placeholder="Enter Middlename" >
					</div>
					<div class="col-lg-2">
					<label>Suffix</label>
					<input type="text" class="form-control form-control-lg" style="text-transform:capitalize;"  name="suffix" id="exampleInputUsername1" placeholder="Enter Suffix">
					</div>
                </div>
                <div class="form-group row">
					<div class="col-lg-6">
					<label>Faculty Email Address</label>
					<input type="email" class="form-control form-control-lg" name="email2" placeholder="Enter Email Address" id="email2" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" title="Hey, you are missing domain part in the email !!!">
					 <div id="status2"><br></div>
					</div>
					<div class="col-lg-6">
					<label>Faculty Number </label>
					<input type="text" class="form-control form-control-lg" name="user_number" id="exampleInputUsername1" placeholder="Enter ID Number" required>
					<div id="status"><br></div>
					</div>
                </div>
                <div class="form-group row">
					<div class="col-lg-6">
					<label>Password</label>
					<input type="password" class="form-control form-control-lg"  name="password2" placeholder="Enter Your Passwords" id="password2" onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
					</div>
					<div class="col-lg-6">
					<label>Confirm Password</label>
					<input type="password" class="form-control form-control-lg"  name="confirm_password"id="confirm_password" placeholder="Confirm Your Password" onkeyup='check();' required>
					</div>
                </div>
                <div class="form-group row">
					<div class="col-lg-12">
						<div id="err2"><br></div>
					</div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="register">SIGN UP</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
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
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>  
  <script src="js/script.js"></script>
  <script src="js/script2.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
  </script> 
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
<?php
// Include config file
// Define variables and initialize with empty values
$username = $email =$fname=$mname=$lname = $password = $confirm_password = "";
$username_err = $email_err =$fname_err =$mname_err =$lname_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if(isset($_POST['register'])){
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $suffix = $_POST['suffix'];
    // Validate username
    if(empty(trim($_POST["user_number"]))){
        $username_err = "Please enter a TUP-T UID Numbers.";
    } else{
        // Prepare a select statement
        $sql = "SELECT u_id FROM user_account WHERE user_id_number = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["user_number"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This TUP-T UID Numbers is already taken.";
                } else{
                    $username = trim($_POST["user_number"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
	if(empty(trim($_POST["email2"]))){
        $email_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT u_id FROM user_account WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email2"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email2"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Validate password
    if(empty(trim($_POST["password2"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password2"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password2"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user_account (user_id_number,email,password,fname,mname,lname,suffix,position,status,status_1,student_section,profile) VALUES (?,?,?,'$fname','$mname','$lname','$suffix','Teacher','Decline','Pending','Teacher','face28.jpg')";
        $date23 = date('m/d/Y h:i:s a', time());
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username,$param_email, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
               echo '<script>
									function myFunction() {
										swal({
										title: "Success!",
										text: "This Account Successfully Recorded",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "faculty.php";
									  });}
									
									</script>';
            } else{
                echo '<script>
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
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
  <!-- End custom js for this page-->
</body>

</html>

