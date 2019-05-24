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

$result = mysqli_query($dbcon,"SELECT sessionid from sessions where semester = 'FIRST'");

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		$sessionid = $row["sessionid"];
	}
}
/*
$result = mysqli_query($dbcon,"SELECT count(*) as total from course_registered where sid = '$sid' and sessionid = '$sessionid' and semester = 'FIRST'");
$data=mysqli_fetch_assoc($result);
$numRegisteredCourse = $data['total'];

if( count($course_id) + $numRegisteredCourse> 10 ){
	echo "Your cannot have a total of more than ten courses";
} else {*/
	foreach( $course_id as $v ) {
		/*
		$result = mysqli_query($dbcon,"SELECT status,sessionid FROM courses_offered where course_id = $v and sessionid = '$sessionid'");

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)){
				$courseStatus = $row["status"];
			}
		}
		
		if($courseStatus == '1'){
			$result = mysqli_query($dbcon,"SELECT students_registered from courses_offered where course_id = $v");
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)){
					$registered = $row["students_registered"];
				}
			}
			
			if($registered > 0) {*/
				$result = mysqli_query($dbcon,"INSERT INTO course_registered VALUES ('$sid','$v','$sessionid','CO',0)");
				if($result)	{
					$result = mysqli_query($dbcon,"UPDATE courses_offered SET students_registered = students_registered + 1 WHERE course_id = '$v'");
				} else {
					$result = false;
				}/*
			} else {
				$result = false;
			}
			
			if($result == false){
				break;
			}
		} else {
			$result = false;
		}
	}*/
	if($result)	{
		echo "success";
	} else {
		echo "Error";
	}
}

?>