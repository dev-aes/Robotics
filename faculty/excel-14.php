<?php
	
    date_default_timezone_set('Asia/Manila'); 
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=Student_Report_All.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	require_once "connect.php";	
	$output = "";
	$output .="
		<table>
			<thead>
				<tr>
					<th>Student Name</th>
					<th>Lab 1</th>
					<th>Lab 2</th>
					<th>Lab 3</th>
					<th>Lab 4</th>
					<th>Lab 5</th>
					<th>Lab 6</th>
					<th>Lab 7</th>
					<th>Lab 8</th>
					<th>Lab 9</th>
					<th>Lab 10</th>
					<th>Lab 11</th>
					<th>Lab 12</th>
					<th>Lab 13</th>
					<th>Lab 14</th>
				</tr>
			<tbody>
	";
	$email=	$_GET['email'];
	$q = $conn->query("SELECT * FROM `user_account` WHERE `email` = '$email'") or die(msqli_error());
	$f = $q->fetch_array();
	$u_id=$f['u_id'];
	$q1 = $conn->query("SELECT * FROM `section_adviser` WHERE `section_adviser_s_id`='$u_id'") or die(msqli_error());
	$f1 = $q1->fetch_array();
	$section_adviser_u_id = $f1['section_adviser_u_id'];	
	
	$query = $conn->query("SELECT * FROM `user_account` WHERE `student_section` = '$section_adviser_u_id'") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
		$u_id_student = $fetch['u_id'];
		
		$q2 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='1' ") or die(msqli_error());
		$f2 = $q2->fetch_array();
		
		$q3 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='2' ") or die(msqli_error());
		$f3 = $q3->fetch_array();
		
		$q4 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='3' ") or die(msqli_error());
		$f4 = $q4->fetch_array();
		
		$q5 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='4' ") or die(msqli_error());
		$f5 = $q5->fetch_array();
		
		$q6 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='5' ") or die(msqli_error());
		$f6 = $q6->fetch_array();
		
		$q7 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='6' ") or die(msqli_error());
		$f7 = $q7->fetch_array();
		
		$q8 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='7' ") or die(msqli_error());
		$f8 = $q8->fetch_array();
		
		$q9 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='8' ") or die(msqli_error());
		$f9 = $q9->fetch_array();
		
		$q10 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='9' ") or die(msqli_error());
		$f10 = $q10->fetch_array();
		
		$q11 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='10' ") or die(msqli_error());
		$f11 = $q11->fetch_array();
		
		$q12 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='11' ") or die(msqli_error());
		$f12 = $q12->fetch_array();
		
		$q13 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='12' ") or die(msqli_error());
		$f13 = $q13->fetch_array();
		
		$q14 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='13' ") or die(msqli_error());
		$f14 = $q14->fetch_array();
		
		$q15 = $conn->query("SELECT * FROM `student_file` WHERE `student_file_user` = '$u_id_student' AND `student_lab_num`='14' ") or die(msqli_error());
		$f15 = $q15->fetch_array();
		
	$output .= "
				<tr>
					<td>".$fetch['lname']." ,".$fetch['fname']." ".$fetch['mname']." </td>
					<td>".$f2['student_lab_score']." </td>
					<td>".$f3['student_lab_score']." </td>
					<td>".$f4['student_lab_score']." </td>
					<td>".$f5['student_lab_score']." </td>
					<td>".$f6['student_lab_score']." </td>
					<td>".$f7['student_lab_score']." </td>
					<td>".$f8['student_lab_score']." </td>
					<td>".$f9['student_lab_score']." </td>
					<td>".$f10['student_lab_score']." </td>
					<td>".$f11['student_lab_score']." </td>
					<td>".$f12['student_lab_score']." </td>
					<td>".$f13['student_lab_score']." </td>
					<td>".$f14['student_lab_score']." </td>
					<td>".$f15['student_lab_score']." </td>
				</tr>
	";
	}
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 
 
?>