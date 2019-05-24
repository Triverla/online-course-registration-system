<?php
//create connection to database
include "scripts/database-connection.php";

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
		case 'Insert':	
			$courseid = mysqli_real_escape_string($dbcon, $_POST['course_id']);
		    $coursetitle = mysqli_real_escape_string($dbcon, $_POST['title']);
			$unit = mysqli_real_escape_string($dbcon, $_POST['unit']);
			$class_level = mysqli_real_escape_string($dbcon, $_POST['class_level']);
			$department = mysqli_real_escape_string($dbcon, $_POST['department']);
			$courselecturer = mysqli_real_escape_string($dbcon, $_POST['course_lecturer']);
			$semester = mysqli_real_escape_string($dbcon, $_POST['semester']);
			$descr = mysqli_real_escape_string($dbcon, $_POST['descr']);
			       
            insert($dbcon,$courseid,$coursetitle,$unit,$class_level,$department,$courselecturer,$semester,$descr);
			break;
    }
}
if(mysqli_connect_errno()){
	echo "Failed";
}	

function insert($dbcon,$courseid,$coursetitle,$unit,$class_level,$department,$courselecturer,$semester,$descr)
{
	
	$sql = "INSERT INTO `courses` (`course_id`,`title`,`unit`,`class_level`,`department`,`course_lecturer`,`semester`,`descr`) VALUES ('$courseid','$coursetitle','$unit','$class_level','$department','$courselecturer','$semester','$descr')";
	$result = mysqli_query($dbcon, $sql);
	echo $sql;
	
	$sql1 = "INSERT INTO course_lecturer(lecturer_name, course_id) VALUES ('$courselecturer','$courseid')";
	$result1 = mysqli_query($dbcon,$sql1);
	echo $sql1;
	exit;
	/*
	$sql2 = "INSERT INTO pre_req(c_id,prereq) VALUES ('$courseid','$prereq')";
	$result2= mysqli_query($conn,$sql2);
	echo $sql2;*/
	if(($sql) && ($sql1)){
		echo json_encode("Data Inserted Successfully");
		}
	else {
		echo json_encode('problem');
		}
	exit;
}	

mysqli_close($dbcon);

?>