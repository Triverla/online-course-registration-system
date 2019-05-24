<?php
//create connection to database
include "database-connection.php";

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
		case 'Insert':
		$sid = mysqli_real_escape_string($dbcon, $_POST['sid']);
		    $fname = mysqli_real_escape_string($dbcon, $_POST['first_name']);
			$lname = mysqli_real_escape_string($dbcon, $_POST['last_name']);
			$password = mysqli_real_escape_string($dbcon, $_POST['password']);
            $department = mysqli_real_escape_string($dbcon, $_POST['department']);
            $email = mysqli_real_escape_string($dbcon, $_POST['email']);
			$gpa = mysqli_real_escape_string($dbcon, $_POST['gpa']);
			$tce = mysqli_real_escape_string($dbcon, $_POST['tce']);
            $level = mysqli_real_escape_string($dbcon, $_POST['level']);
            $dob = mysqli_real_escape_string($dbcon, $_POST['dob']);
            $phone = mysqli_real_escape_string($dbcon, $_POST['phone']);
			$cos = mysqli_real_escape_string($dbcon, $_POST['courseofstudy']);
			$entryyr = mysqli_real_escape_string($dbcon, $_POST['entryyr']);
            $gradyr = mysqli_real_escape_string($dbcon, $_POST['gradyr']);
         
            insert($dbcon,$sid,$fname,$lname,$password,$department,$email,$gpa,$tce,$level,$dob,$phone,$cos,$entryyr,$gradyr);
			break;
	}
			
}

function insert($dbcon,$sid,$fname,$lname,$password,$department,$email,$gpa,$tce,$level,$dob,$phone,$cos,$entryyr,$gradyr)
{
	$sql = "INSERT INTO tbl_students (sid,first_name,last_name,password,department,email,gpa,tce,level,dob,phone,courseofstudy,entryyr,gradyr) 
			VALUES ('$sid','$fname','$lname','$password','$department','$email','$gpa','$tce','$level','$dob','$phone','$cos','$entryyr','$gradyr')";
	$result = mysqli_query($dbcon, $sql);
	
	if($result)
	{
		header("Location: viewAllStudents.php");
	}
	else
	{
		echo mysqli_error($dbcon);
		echo $result;
	}
	
}	

mysqli_close($dbcon);

?>