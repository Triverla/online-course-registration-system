<?php


//$param1 = $_GET['param1'];

// Create connection
include "database-connection.php";
/*
$result = mysqli_query($dbcon,"SELECT class_level from courses where semester = 'FIRST'");

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		$class_level = $row["class_level"];
	}
}*/


/*if($param1 != "" && $param1 != "All"){
	$result = mysqli_query($dbcon,"SELECT * FROM courses");
} else {*/
    $result = mysqli_query($dbcon,"SELECT c.course_id as id, c.title as coursename, c.unit as unit, c.class_level as courselevel, c.department as department, c.course_lecturer as lecturer, c.semester as semester, c.descr as descr FROM courses c");
    $json = array();
//}


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
       