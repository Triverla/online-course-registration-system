<?php
session_start();
include "database-connection.php";
$sid = $_SESSION['sid'];
if(isset($_POST["sid"]))
{
	$sid = $_POST["sid"];
    $sid = stripslashes($sid);
	$sid = mysqli_real_escape_string($dbcon, $sid);
}

if(isset($_POST["oldpass"]))
{
	$oldpass = $_POST["oldpass"];
    $oldpass = stripslashes($oldpass);
	$oldpass = mysqli_real_escape_string($dbcon, $oldpass);
}

if(isset($_POST["newpass"]))
{
	$newpass = $_POST["newpass"];
    $newpass = stripslashes($newpass);
	$newpass = mysqli_real_escape_string($dbcon, $newpass);
}


$sql = "UPDATE tbl_students SET password = '$newpass' WHERE sid = '$sid' AND password = '$oldpass'";

$result = mysqli_query($dbcon, $sql);


if(mysqli_query($dbcon, $sql))
{
	header("Location: ../profile.php");
}
else
{
	echo mysqli_error($dbcon);
}
?>