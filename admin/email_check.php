<?php
if(isset($_POST['email2']))
{
	// include Database connnection file 
	include("connect.php");

	$email2 = mysqli_real_escape_string($conn, $_POST['email2']);
	
	$query = "SELECT email FROM user_account WHERE email = '$email2'";
	if(!$result = mysqli_query($conn, $query))
	{
		exit(mysqli_error($conn));
	}

	if(mysqli_num_rows($result) > 0)
	{
		// email is already exist 
		echo '<span style="color: red;"> Email is already in exist or is invalid.</span><br>';
	}
	else
	{
		// email is avaialable to use.
		echo '<span style="color: green;"> This email is available! </span><br>';
	}
	
}
?>