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

	//SQL command to get Students and registered courses from Database
    $result = mysqli_query($dbcon,"SELECT DISTINCT(r.sid) AS sid, COUNT(r.course_id) as num, r.type as type, r.sessionid as session, s.level as level,s.department as department, p.semester as semester FROM course_registered r, tbl_students s,sessions p WHERE r.sid = s.sid and r.status = 0 GROUP BY r.sid");
    $json = array();
//}

//Converts MYSQL records to JSON format
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
       