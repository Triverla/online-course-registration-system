<?php
//create connection to database
include "database-connection.php";

  $courseid = mysqli_real_escape_string($dbcon, $_POST['course_id']);
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'update':      
		    $coursetitle = mysqli_real_escape_string($dbcon, $_POST['title']);
			$unit = mysqli_real_escape_string($dbcon, $_POST['unit']);
			$class_level = mysqli_real_escape_string($dbcon, $_POST['class_level']);
			$department = mysqli_real_escape_string($dbcon, $_POST['department']);
			$courselecturer = mysqli_real_escape_string($dbcon, $_POST['course_lecturer']);
			$semester = mysqli_real_escape_string($dbcon, $_POST['semester']);
			$descr = mysqli_real_escape_string($dbcon, $_POST['descr']);
         
            update($dbcon,$courseid,$coursetitle,$unit,$class_level,$department,$courselecturer,$semester,$descr);
			break;
    }
}

if(mysqli_connect_errno()){
	echo "Failed";
}	

function update($dbcon,$courseid,$coursetitle,$unit,$class_level,$department,$courselecturer,$semester,$descr)
{
	
	$sql = "UPDATE courses set course_id ='$courseid',title = '$coursetitle',unit = '$unit',class_level = '$class_level',department = '$department',course_lecturer = '$course_lecturer',semester = '$semester',descr = '$descr' WHERE course_id = '$courseid')";
	$result = mysqli_query($dbcon, $sql);
	//echo $sql;
	
	$sql1 = "UPDATE course_lecturer set lecturer_name = '$course_lecturer', course_id = '$courseid' WHERE course_id = '$courseid')";
	$result1 = mysqli_query($dbcon,$sql1);
	//echo $sql1;
	/*
	$sql2 = "INSERT INTO pre_req(c_id,prereq) VALUES ('$courseid','$prereq')";
	$result2= mysqli_query($conn,$sql2);
	echo $sql2;*/
	exit;
}	

mysqli_close($dbcon);

?>