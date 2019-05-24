<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";

// Create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword,'coursereg');

$sid = $_GET["sid"];

$result = mysqli_query($conn,"SELECT sid from tbl_students where sid = '$sid'");

if (mysqli_num_rows($result) > 0) {
	echo "1";
} else {
	echo "0";
}

?>