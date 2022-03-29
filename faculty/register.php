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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body onload="myFunction()">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-8 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo-wide.png" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light" >Signing up is easy. It only takes a few steps</h6>
           
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
					<label>TUP Email Address</label>
					<input type="email" class="form-control form-control-lg" name="email2" placeholder="Enter Email Address" id="email2" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" title="Hey, you are missing domain part in the email !!!">
					 <div id="status2"><br></div>
					</div>
					<div class="col-lg-6">
					<label>TUP-T UID #</label>
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
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" required>
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="register">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="index.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
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
require_once "connect.php";
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
        $sql = "INSERT INTO user_account (user_id_number,email,password,fname,mname,lname,suffix,position,status,status_1) VALUES (?,?,?,'$fname','$mname','$lname','$suffix','Student','Decline','Pending')";
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
										text: "Your Account Successfully Recorded",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "index.php";
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
</body>

</html>
