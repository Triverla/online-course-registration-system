<?php
session_start();

if(!isset($_SESSION['sid'])) {
  header("location: ../login.php");
  exit();
}

$param1 = $_GET['param1'];
$id = $_SESSION["sid"];
// Create connection
include "database-connection.php";

$result = mysqli_query($dbcon,"SELECT level from tbl_students where sid = '$id'");

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		$level = $row["level"];
	}
}


if($param1 != "" && $param1 != "All"){
	$result = mysqli_query($dbcon,"SELECT c.course_id as id, c.title as coursename, c.unit as unit, c.course_lecturer as lecturer, d.dept_name as department, c.semester as semester FROM courses c, department d WHERE c.department = d.dept_id AND c.semester = 'FIRST' AND c.class_level < '$level'");
} else {
    $result = mysqli_query($dbcon,"SELECT c.course_id as id, c.title as coursename, c.unit as unit, c.course_lecturer as lecturer, d.dept_name as department, c.semester as semester FROM courses c, department d WHERE c.department = d.dept_id AND c.semester = 'FIRST' AND c.class_level < '$level' ");
    $json = array();
}


if (mysqli_num_rows($result) > 0) {
	$json = array();
	 while ($row = mysqli_fetch_assoc($result))
        {
		 $json[] = $row; 
        }
	$response = array(
		"data" => $json
	);

	echo json_encode($response);
} else {
    $json = array();
	$response = array(
		"data" => $json
	);
	echo json_encode($response);
}

mysqli_close($dbcon);

?>
       