<?php
// Initialize the session
session_start();
require_once "connect.php";
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: process.php");
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
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body style="bgcolor:#85dcb;">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo-wide.png" alt="logo">
              </div>
              <form class="pt-3"method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data" autocomplete="off" onsubmit="myFunction()">
                  <div class="form-group">
                      <label>TUP Email Address</label>
                      <input type="email" class="form-control form-control-lg" name="email" placeholder="Enter Email Address" id="email"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" title="Hey, you are missing domain part in the email !!!">
                  </div>
                  <div class="form-group">
                      <label>Desired Password</label>
                      <input type="password" class="form-control form-control-lg"  name="password" placeholder="Enter Desired Password" id="password2" onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                  </div>
                  <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" class="form-control form-control-lg"  name="confirm_password" id="confirm_password" placeholder="Confirm Your Password" onkeyup='check();' >
                  </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="change">Change Password</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                      Don't have an account? <a href="register.php" class="text-primary">Create</a>
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
  <!-- endinject -->
  <?php
  if(isset($_POST['change'])){
      $email = $_POST['email'];
      $q = $conn->query("SELECT * FROM `user_account` WHERE `email`='$email' ") or die(msqli_error());
      $f = $q->fetch_array();
      $u_id 	= $f['u_id'];
      $password 	    	= $_POST['password'];
      $confirm_password 	= $_POST['confirm_password'];

          if($password == $confirm_password){
              $pass = password_hash($password, PASSWORD_DEFAULT);

              $result=$conn->query("UPDATE `user_account` SET `password`='$pass'  WHERE `u_id`='$u_id' ");
              if($result){
                  echo '<script>
									function myFunction() {
										swal({
										title: "Success!",
										text: "Successfully changed password",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "index.php";
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

  }
  ?>
</body>

</html>
