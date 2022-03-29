<?php
    date_default_timezone_set('Asia/Manila'); 
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=Student_Report .xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	require_once "connect.php";	
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
					<th>Student Name</th>
					<th>Score</th>
					<th>Laboratory #</th>
					<th>Date Checked</th>
				</tr>
			<tbody>
	";
	$query = $conn->query("SELECT * FROM `student_file` WHERE `student_lab_status`='Check'") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
		$student_file_user = $fetch['student_file_user'];
		$q1 = $conn->query("SELECT * FROM `user_account` WHERE `u_id` = '$student_file_user'") or die(msqli_error());
		$f1 = $q1->fetch_array();	
 
	$output .= "
				<tr>
					<td>".$f1['lname']." ,".$f1['fname']." ".$f1['mname']." </td>
					<td>".$fetch['student_lab_score']." </td>
					<td>".$fetch['student_lab_num']." 	  </td>
					<td>".$fetch['student_lab_date']." 	  </td>
				</tr>
	";
	}
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 
 
?>