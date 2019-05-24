<?php
session_start();

if(!isset($_SESSION['sid'])) {
    header("location: ../login.php");
    exit();
}

$sid= $_SESSION['sid'];
$course_id = $_POST['course_id'];


//Create connection
include "database-connection.php";

$result = mysqli_query($dbcon,"SELECT sessionid from sessions where status = 1");

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		$sessionid = $row["sessionid"];
	}
}


$result = mysqli_query($dbcon,"DELETE from course_registered where course_id='$course_id' and sid = '$sid' and sessionid = '$sessionid'");

if($result)	{
	$result = mysqli_query($dbcon,"UPDATE courses_offered SET students_registered = students_registered - 1 WHERE course_id = '$course_id' and sessionid = '$sessionid'");
} else {
	$result = false;
}

if($result)	{
	echo "success";
} else {
	echo "Error";
}

?>