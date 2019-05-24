<?php
session_start();
include "database-connection.php";

if(isset($_POST["email"]))
{
	$id = $_POST["email"];
    $id = stripslashes($id);
	$id = mysqli_real_escape_string($dbcon, $id);
}

if(isset($_POST["password"]))
{
	$password = $_POST["password"];
    $password = stripslashes($password);
	$password = mysqli_real_escape_string($dbcon, $password);
}

$sql = "SELECT * FROM student WHERE email = '$id' AND password = '$password'";

$result = mysqli_query($dbcon, $sql);

if(mysqli_num_rows($result) == 1)
{
	$_SESSION["id"] = $id;
    
    //mysqli_query($dbcon, "UPDATE admin SET last_activity = now() WHERE id = '$id' AND password = '$password'");
    
    //mysqli_query($dbcon, "INSERT INTO activities (student, activity) VALUES ('$student', '$student has just logged in now')");
    
    //mysqli_query($dbcon, "UPDATE tbl_student SET engagement = engagement + 1 WHERE student = '$student'");
    
	header("Location: ../home.php");
}
else
{
	header("Location: ../login.php");
}
?>