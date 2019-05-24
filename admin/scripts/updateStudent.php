<?php
//create connection to database
include "database-connection.php";

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'update':     
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
         
        update($dbcon,$sid,$fname,$lname,$password,$department,$email,$gpa,$tce,$level,$dob,$phone,$cos,$entryyr,$gradyr);
        break;
    }
}

if(mysqli_connect_errno()){
	echo "Failed";
}	

function update($dbcon,$sid,$fname,$lname,$password,$department,$email,$gpa,$tce,$level,$dob,$phone,$cos,$entryyr,$gradyr)
			
{
	
	$sql = "UPDATE tbl_students SET sid ='$sid',first_name = '$fname',last_name = '$lname',password = '$password',department = '$department',email = '$email',gpa = '$gpa',tce = '$tce',level ='$level',dob = '$dob',phone = '$phone,courseofstudy='$cos',entryyr='$entryyr',gradyr='$gradyr' WHERE sid = '$sid')";
	$result = mysqli_query($dbcon, $sql);
	echo $sql;
	
	//$sql1 = "UPDATE course_lecturer set lecturer_name = '$course_lecturer', course_id = '$courseid' WHERE course_id = '$courseid')";
	//$result1 = mysqli_query($dbcon,$sql1);
	//echo $sql1;
	/*
	$sql2 = "INSERT INTO pre_req(c_id,prereq) VALUES ('$courseid','$prereq')";
	$result2= mysqli_query($conn,$sql2);
	echo $sql2;*/
	exit;
}	
//echo $result1;
mysqli_close($dbcon);

?>