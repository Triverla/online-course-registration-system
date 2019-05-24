<?php
session_start();
//checks if user is admin
if(!isset($_SESSION['id'])) {
    header("location: ../login.php");
    exit();
}
//Gets student id via HTTP POST request
$sid= $_POST['sid'];

//Create connection
include "database-connection.php";

//Retrieve Current Session
$result1 = mysqli_query($dbcon,"SELECT sessionid from sessions where status = 1");

if (mysqli_num_rows($result1) > 0) {
	while($row = mysqli_fetch_assoc($result1)){
		$sessionid = $row["sessionid"];
	}
}
//changes student registration status from 0 - 1 for approval
$sql = "UPDATE course_registered SET status = 1 WHERE sessionid = '$sessionid' and sid = '$sid' and status = 0";
$result =  mysqli_query($dbcon,$sql);

if ($dbcon->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error updating record: " . $dbcon->error;
}

$dbcon->close();
/*
if($result)	{
	echo "success";
} else {
	echo "Error";
}*/

?>