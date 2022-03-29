<?php
session_start();
require_once "connect.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}	
	date_default_timezone_set('Asia/Manila');
		$time =  date("h:i:m A", time());
		$date =  date("F d,Y h:i:m A", time());
							$email = htmlspecialchars($_SESSION["email"]);
							$q = $conn->query("SELECT * FROM `user_account` WHERE `email` = '$email'") or die(msqli_error());
							$f = $q->fetch_array();
							$position 	= $f['position'];
							$status 	= $f['status'];
							$status_1 	= $f['status_1'];
							$u_id 		= $f['u_id'];
	?>
<html>
	<head>
		<title>Redirecting</title>
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
		@media only screen and (min-width: 200px) {
			.image{
				margin-top:5%;width:300px;
			}
		}
		</style>
	</head>
	<body  onload="myFunction()">
		<center>
		
		<image src="https://i.pinimg.com/originals/ec/d6/bc/ecd6bc09da634e4e2efa16b571618a22.gif" class="image">
		<?php
		if($f['position']=="Student"){
		if($f['status_2']=="For Approval"){
		?>
				<script>
									function myFunction() {
										swal({
										title: "Failed!",
										text: "Sorry but your account are Still For Approval",
									    icon: "error",
										type: "error"
										}).then(function() {
										window.location = "out.php";
									  });}
				</script>
		<?php	
			
		}elseif($f['status_2']=='Decline'){
		?>
				<center>
					<h3>The Section Adviser you Enter Upon Registration is Decline your Approval<h3>
					<form class="pt-3"method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype ="multipart/form-data" autocomplete="off">
					<div class="col-lg-4">
					<select class="form-control form-control-lg" name="section" id="exampleInputUsername1" required>
						<option>Select Section</option>
						<?php  
							$q_e1 = $conn->query("SELECT * FROM `section` ") or die(mysqli_error());
							while($f_e1=$q_e1->fetch_array()){
						?>
						<option value="<?php echo $f_e1['section_id']?>" style="black"><?php echo $f_e1['section_name'];?></option>
						<?php } ?>
					</select>
					<input type="hidden" value="<?php echo $u_id?>" name="u_id">
					</div><br>
					<div class="col-lg-4">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="student_status">Update Section</button>
				  </div>
				</form>	
				<?php
					
					if(isset($_POST['student_status'])){
						$section 	= $_POST['section'];
						$u_id 			= $_POST['u_id'];
						$result=$conn->query("UPDATE `user_account` SET `student_section`='$section',`status_2`='For Approval' WHERE `u_id`='$u_id'");
						if ($result) { 
									echo '<script>
									function myFunction() {
										swal({
										title: "Success! ",
										text: "Successfully Update Status",
									    icon: "success",
										type: "success"
										}).then(function(){
										window.location = "out.php";
									  });}
								  </script>';			
						}else{
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
				?>
				</center>
		<?php		
		}elseif($f['status_2']=='Accept'){
			if($status_1=='Active'){
		?>
				<script>
									function myFunction() {
										swal({
										title: "Failed!",
										text: "This User is already logged in from another device",
									    icon: "error",
										type: "error"
										}).then(function() {
										window.location = "out.php";
									  });}
				</script>
		<?php	
			}else{
				$result=$conn->query("UPDATE `user_account` SET `status_1`='Active' WHERE `u_id`='$u_id'");
				if ($result) { }
		?>
		<script>
				setTimeout(function(){
				window.location.reload(1);
				window.location.href='home.php';
				}, 2000);
		</script>
		<?php 
				}
		}
		}else{
		?>
				<script>
									function myFunction() {
										swal({
										title: "Failed!",
										text: "Sorry but You Cant Access this Module",
									    icon: "error",
										type: "error"
										}).then(function() {
										window.location = "out.php";
									  });}
				</script>
		<?php		
		}
		?>
		</center>
	</body>
</html>