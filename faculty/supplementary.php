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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
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
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-12 grid-margin transparent">
                  <div class="row">
                      <div class="btn-toolbar">
                          <div class="btn-group ">
                              <a href="#" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#myModal">Add New Topic</a>
                          </div>
                          <div class="btn-group">
                              <a href="#" class="btn btn-dark btn-sm" type="button" data-toggle="modal" data-target="#modal2">Delete Topic</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            <div class="row">
                <?php
                $section_id=$_GET['section_name'];
                $q_e = $conn->query("SELECT * FROM `supplementary` WHERE `sec_id`='$section_id'") or die(mysqli_error());
                while($f_e=$q_e->fetch_array()){

                    ?>
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-light-danger">
                            <a href="sup-topic.php?id=<?php echo $f_e['id']?>&section_id=<?php echo $section_id?>" style="text-decoration:none;">
                                <div class="card-body">
                                    <p class="mb-4">Supplementary</p>
                                    <p class="fs-30 mb-2"><?php echo $f_e['topic_name']?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div><!-- main-panel ends -->
      </div><!-- page-body-wrapper ends -->
    </div>
  <!-- container-scroller -->
      <div class="modal fade" id="myModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" >Add New Topic</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form class="pt-2"method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data" autocomplete="off">
                      <div class="modal-body">
                          <label>Topic name:</label>
                          <input type="text" class="form-control" name="topic_name"><br/>
                          <label>Topic content:</label>
                          <textarea name="topic_content" id="editor">Type the topic content here.</textarea><br/>
                          <label>Upload Video:</label>
                          <input id="upload" type="file" onchange="readURL(this);" name="file1" class="form-control form-control-lg">
                          <input type="hidden" value="<?php echo $f['u_id']?>" name="faculty_id">
                          <input type="hidden" value="<?php echo $section_id?>" name="sec_id">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="save_file">Save </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <div class="modal fade" id="modal2" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" >Delete Topic</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form class="pt-2"method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data" autocomplete="off">
                      <div class="modal-body">
                          <select class="form-control" required name="topic_id">
                              <option value="">Select Topic</option>
                              <?php
                              $q_e1 = $conn->query("SELECT * FROM `supplementary` WHERE `sec_id`='$section_id'") or die(mysqli_error());
                              while($f_e1=$q_e1->fetch_array()){
                                  ?>
                                  <option value="<?php echo $f_e1['id']?>"><?php echo $f_e1['topic_name']?><input type="hidden" value="<?php echo $f_e1['video_name']?>" name="vid_name"></option>
                              <?php }?>
                          </select>
                          <input type="hidden" value="<?php echo $section_id?>" name="sec_id2">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name="delete">Delete</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <?php
      if(isset($_POST['save_file'])){
          $faculty_id = $_POST['faculty_id'];
          $topic_name = $_POST['topic_name'];
          $sec_id = $_POST['sec_id'];
          $topic_content = $_POST['topic_content'];
          $name1 = $topic_name."-supplementary.mp4";
          $tmp1=$_FILES["file1"]["tmp_name"];
          move_uploaded_file($tmp1, "video/sup/" . $name1);
          $sql ="INSERT INTO supplementary VALUES(null,'$faculty_id','$sec_id','$topic_name', '$topic_content', '$name1')";
          if (mysqli_query($conn,$sql)) {
              echo '<script>
									function myFunction() {
										swal({
										title: "Success!",
										text: "Successfully Added New Topic",
									    icon: "success",
										type: "successs"
										}).then(function() {
										window.location = "supplementary.php?&section_name='.$sec_id.'";
									  });}
									</script>';
          }
      }
      if(isset($_POST['delete'])){
          $topic_id = $_POST['topic_id'];
          $sec_id2 = $_POST['sec_id2'];
          $vid_name = $_POST['vid_name'];
          $result = $conn->query("DELETE FROM supplementary WHERE id='$topic_id'");
          if ($result) {
              unlink('video/sup/'.$vid_name);
              echo '<script>
									function myFunction() {
										swal({
										title: "Success!",
										text: "Successfully Deleted Topic",
									    icon: "success",
										type: "successs"
										}).then(function() {
										window.location = "supplementary.php?&section_name='.$sec_id2.'";
									  });}
									</script>';
          }
      }
      ?>
  </div>

<div class="float-sm-left">Float left on viewports sized SM (small) or wider</div><br>
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
  <script type="text/javascript">
      let theEditor;

      ClassicEditor
          .create(document.querySelector('#editor'), {

              toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote']
          })
          .then(editor => {
              theEditor = editor;

          })
          .catch(error => {
              console.error(error);
          });


      /* function getDataFromTheEditor() {
        return theEditor.getData();
      }

      document.getElementById('getdata').addEventListener('click', () => {
        alert(getDataFromTheEditor());
      }); */

      $.magnificPopup.instance._onFocusIn = function(e) {
          if ($(e.target).hasClass('ck-input')) {
              return true;
          }
          $.magnificPopup.proto._onFocusIn.call(this, e);
      };

  </script>
  <!-- End custom js for this page-->
</body>

</html>

