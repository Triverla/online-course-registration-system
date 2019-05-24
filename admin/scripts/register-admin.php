<?php
session_start();
//Database Connection
include 'database-connection.php';
/*
$id = "";
$username = "";
$email = "";
$errors = array();


//$dbcon = new mysqli('localhost', 'root', '', 'coursereg');

//Register User
if(isset($_POST['submit'])){
	$id=mysqli_real_escape_string($dbcon, $_POST["id"]);
	$username=mysqli_real_escape_string($dbcon, $_POST["username"]);
	$email=mysqli_real_escape_string($dbcon, $_POST["email"]);
	$password=mysqli_real_escape_string($dbcon, $_POST["password"]);
	$password2=mysqli_real_escape_string($dbcon, $_POST["password2"]);
}

//form validation
if(empty($id)) {
	array_push($errors, "ID is Required");
}
if(empty($username)) {
	array_push($errors, "Username is Required");
}
if(empty($email)) {
	array_push($errors, "Email is Required");
}
if(empty($password)) {
	array_push($errors, "Password is Required");
}
if(empty($password2)) {
	array_push($errors, "Confirm Password is Required");
}
if($password != $password2) {
	array_push($errors, "passwords do not match");
}
//Checks for an existing id and username
$admin_check = " SELECT * FROM tbl_admin WHERE id = '$id' AND username = '$username'";
$result = mysqli_query($dbcon, $admin_check);
$admin = mysqli_fetch_assoc($result);
if($admin){
	if($admin['id'] === $id){
		array_push($errors, "ID already exist");
	}
	if($admin['username'] === $username){
		array_push($errors, "Username already exist");
	}
}
//register if no errors
if(count($errors) == 0){
	//$password = md5($password);
			//sql command for inserting data into the database
		$sql = "INSERT INTO tbl_admin (id, username, password, email,) VALUES 
		('$id', '$username', $password, '$email')";
		$login = mysqli_query($dbcon,$sql);
			if($login){
				session_regenerate_id();
				$_SESSION['id'] = $id;
				session_write_close();
				header('Location: ../admin-start.php');
			} else {
				echo mysqli_error($dbcon);
				echo $login;
				header('Location: ../register.php');
			}
		}else{
			header('Location: ../register.php');
		}
*/
$id = mysqli_real_escape_string($dbcon, $_POST["id"]);
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
		case 'Insert':
	$username=mysqli_real_escape_string($dbcon, $_POST["username"]);
	$email=mysqli_real_escape_string($dbcon, $_POST["email"]);
	$password = mysqli_real_escape_string($dbcon, $_POST["password"]);
	//$password2=mysqli_real_escape_string($dbcon, $_POST["password2"]);
         
            insert($dbcon,$id,$username,$email,$password);
			break;
	}
			
}

function insert($dbcon,$id,$username,$email,$password)
{
	$sql = "INSERT INTO tbl_admin (id, username, password, email) VALUES 
	('$id', '$username', '$password', '$email')";
	$result = mysqli_query($dbcon, $sql);
	
	if($result)
	{
		session_regenerate_id();
				$_SESSION['id'] = $id;
				session_write_close();
		header("Location: ../admin-start.php");
	}
	else
	{
		echo mysqli_error($dbcon);
		echo $result;
	}
	
}	

mysqli_close($dbcon);

?>