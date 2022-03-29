<?php 

require_once "connect.php";
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
					<div class="col-lg-4">
					<label>TUP Email Address</label>
					<input type="email" class="form-control form-control-lg" name="email2" placeholder="Enter Email Address" id="email2" required pattern="[a-z0-9._%+-]+@tup.edu.ph" title="Domain part must be @tup.edu.ph !!!">
					 <div id="status2"><br></div>
					</div>
					<div class="col-lg-4">
					<label>TUP-T UID #</label>
					<input type="text" class="form-control form-control-lg" name="user_number" id="exampleInputUsername1" placeholder="Enter ID Number" required>
					 <div id="status"><br></div>
					 </div>
					<div class="col-lg-4">
					<label>Section</label>
					<select class="form-control form-control-lg" name="section" id="exampleInputUsername1" required>
						<option>Select Section</option>
						<?php  
							$q_e1 = $conn->query("SELECT * FROM `section` ") or die(mysqli_error());
							while($f_e1=$q_e1->fetch_array()){
						?>
						<option value="<?php echo $f_e1['section_id']?>" style="black"><?php echo $f_e1['section_name'];?></option>
						<?php } ?>
					</select>
					 </div>
                </div>
                <div class="form-group row">
					<div class="col-lg-6">
					<label>Password</label>
					<input type="password" class="form-control form-control-lg"  name="password2" placeholder="Enter Your Password" id="password2" onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
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
                      <label class="form-check-label" style="display: inline">
                          <input type="checkbox" class="form-check-input visible" required>
                      </label>
                    <label class="form-check-label text-muted">
                         I agree to <a href="#" data-toggle="modal" data-target="#exampleModal">all Terms & Conditions</a>
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
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Terms & Condition</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="pt-3"method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data" autocomplete="off">
                                <div class="modal-body">
                                    <p>
                                        <b>Welcome to Robotics Courseware!</b><br>
                                        These terms and conditions outline the rules and regulations for the use of Robotics Courseware's Website, located at https://tup.edu.ph/robotics.<br><br>
                                        By accessing this website we assume you accept these terms and conditions.
                                        Do not continue to use Robotics Courseware if you do not agree to take all of the terms and conditions stated on this page.<br><br>
                                        The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements:
                                        "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions.
                                        "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves.
                                        All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most
                                        appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services,
                                        in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular,
                                        plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.<br><br>
                                        <b>Cookies</b><br>
                                        We employ the use of cookies. By accessing Robotics Courseware, you agreed to use cookies in agreement with the company's Privacy Policy.<br><br>
                                        Most interactive websites use cookies to let us retrieve the user’s details for each visit.
                                        Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website.
                                        Some of our affiliate/advertising partners may also use cookies.<br><br>
                                        <b>License</b><br>
                                        Unless otherwise stated, the company and/or its licensors own the intellectual property rights for all material on Robotics Courseware.
                                        All intellectual property rights are reserved. You may access this from Robotics Courseware for your own personal use subjected to restrictions set in these terms and conditions.<br><br>
                                        You must not:<br>
                                        <ul>
                                        <li>Republish material from Robotics Courseware</li>
                                        <li>Sell, rent or sub-license material from Robotics Courseware</li>
                                        <li>Reproduce, duplicate or copy material from Robotics Courseware</li>
                                        <li>Redistribute content from Robotics Courseware</li>
                                        </ul>
                                    </p>
                                    <p>
                                        This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the Terms And Conditions Generator.<br><br>

                                        Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website.
                                        The company does not filter, edit, publish or review Comments prior to their presence on the website.
                                        Comments do not reflect the views and opinions of the company,its agents and/or affiliates.
                                        Comments reflect the views and opinions of the person who post their views and opinions.
                                        To the extent permitted by applicable laws, the company shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.<br><br>

                                        The company reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.<br><br>

                                        You warrant and represent that:
                                        <ul>
                                        <li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
                                        <li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
                                        <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
                                        <li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>
                                        </ul>
                                    </p>
                                    <p>
                                        You hereby grant Technological University of the Philippines a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.<br><br>

                                        <b>Hyperlinking to our Content</b><br>
                                        The following organizations may link to our Website without prior written approval:
                                        <ul>
                                        <li>Government agencies;</li>
                                        <li>Search engines;</li>
                                        <li>News organizations;</li>
                                        <li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
                                        <li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
                                        </ul>
                                    </p>
                                    <p>
                                        These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive;
                                        (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.<br><br>

                                        We may consider and approve other link requests from the following types of organizations:
                                        <ul>
                                        <li>commonly-known consumer and/or business information sources;
                                        <li>dot.com community sites;</li>
                                        <li>associations or other groups representing charities;</li>
                                        <li>online directory distributors;</li>
                                        <li>internet portals; </li>
                                        <li>accounting, law and consulting firms; and</li>
                                        <li>educational institutions and trade associations.</li>
                                        </ul>
                                    </p>
                                    <p>
                                        We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses;
                                        (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of the company; and
                                        (d) the link is in the context of general resource information<br><br>
                                        These organizations may link to our home page so long as the link: (a) is not in any way deceptive;
                                        (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.<br><br>
                                        If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to the company.
                                        Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website,
                                        and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.<br><br>
                                        Approved organizations may hyperlink to our Website as follows:
                                        <ul>
                                        <li>By use of our corporate name; or</li>
                                        <li>By use of the uniform resource locator being linked to; or</li>
                                        <li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li>
                                        </ul>
                                    </p>
                                    <p>
                                        No use of Technological University of the Philippines's logo or other artwork will be allowed for linking absent a trademark license agreement.<br><br>

                                        <b>iFrames</b><br>
                                        Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.<br>

                                        <b>Content Liability</b><br>
                                        We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website.
                                        No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates,
                                        or advocates the infringement or other violation of, any third party rights.<br><br>

                                        <b>Your Privacy</b><br>
                                        Please read Privacy Policy<br><br>

                                        <b>Reservation of Rights</b><br>
                                        We reserve the right to request that you remove all links or any particular link to our Website.
                                        You approve to immediately remove all links to our Website upon request.
                                        We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website,
                                        you agree to be bound to and follow these linking terms and conditions.<br><br>

                                        <b>Removal of links from our website</b><br>
                                        If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment.
                                        We will consider requests to remove links but we are not obligated to or so or to respond to you directly.<br><br>

                                        We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy;
                                        nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.<br><br>

                                        <b>Disclaimer</b><br>
                                        To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:
                                        <ul>
                                        <li>limit or exclude our or your liability for death or personal injury;</li>
                                        <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
                                        <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
                                        <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
                                        </ul>
                                    </p>
                                    <p>
                                        The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph;
                                        and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.<br><br>

                                        As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
// Define variables and initialize with empty values
$username = $email =$fname=$mname=$lname = $password = $confirm_password = "";
$username_err = $email_err =$fname_err =$mname_err =$lname_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if(isset($_POST['register'])){
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $suffix = $_POST['suffix'];
  $section = $_POST['section'];
  $email2 = $_POST["email2"];
  $user_name = $_POST["user_number"];
    // Validate username
	
$sql="SELECT count(*) AS total FROM `user_account` WHERE `email`='$email2'";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
$count= $data["total"];

$sql1="SELECT count(*) AS total1 FROM `user_account` WHERE `user_id_number`='$user_name'";
$result1=mysqli_query($conn,$sql1);
$data1=mysqli_fetch_assoc($result1);
$count1= $data1["total1"];

	if($count<=0){
		
	if($count1<=0){
		
		
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
        $sql = "INSERT INTO user_account (user_id_number,email,password,fname,mname,lname,suffix,position,status,status_1,status_2,student_section,profile) VALUES (?,?,?,'$fname','$mname','$lname','$suffix','Student','Decline','Pending','For Approval','$section','face28.jpg')";
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
	
		}else{
			
					echo '<script>
							function myFunction() {
							swal({
							title: "Failed!",
							text: "TUP-T UID is already Used",
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
							text: "Email is already Used",
							icon: "error",
							button: "Ok",
							});}
						   </script>';
	}
}


?>
</body>

</html>
