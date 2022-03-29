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
							$result=$conn->query("UPDATE `user_account` SET `status_1`='Offline' WHERE `u_id`='$u_id'");
							if ($result) { }
	
	session_destroy();
	header('location:index.php');