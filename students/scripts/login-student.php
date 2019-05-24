<?php
session_start();
//Database Connection
include "database-connection.php";
$errors = array();

if(isset($_POST["sid"]))
{
	$student = $_POST["sid"];
    $student = stripslashes($student);
	$student = mysqli_real_escape_string($dbcon, $student);
}

if(isset($_POST["password"]))
{
	$password = $_POST["password"];
    $password = stripslashes($password);
	$password = mysqli_real_escape_string($dbcon, $password);
}
//Errors
if(empty($student)) {
	array_push($errors, "Student ID is Required");
}
if(empty($password)) {
	array_push($errors, "Password is Required");
}

$sql = "SELECT * FROM tbl_students WHERE sid = '$student' AND password = '$password'";

$result = mysqli_query($dbcon, $sql);

if(mysqli_num_rows($result) == 1)
{
	$_SESSION["sid"] = $student;
    
    mysqli_query($dbcon, "UPDATE tbl_students SET lastlogin = now() WHERE sid = '$student' AND password = '$password'");
    
	header("Location: ../home.php");
}
else
{
	echo "Error";
	header("Location: ../login.php");
}
if($result)	{
	echo "success";
} else {
	echo "Error";
}

?>