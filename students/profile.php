<?php
session_start();
include 'scripts/database-connection.php';
if(!$_SESSION['sid']){
    header("location:login.php");
}
$sid = $_SESSION["sid"];
$result = mysqli_query($dbcon,"SELECT * FROM tbl_students WHERE sid ='$sid'");

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	while ($row = mysqli_fetch_assoc($result))
	{
    $sid = $row['sid'];
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $password = $row['password'];
    $department = $row['department'];
    $email = $row['email'];
    $gpa = $row['gpa'];
    $tce = $row['tce'];
    $level = $row['level'];
    $dob = $row['dob'];
    $phone = $row['phone'];
    $cos = $row['courseofstudy'];
    $entryyr= $row['entryyr'];
    $gradyr = $row['gradyr'];
    $lastlogin = $row['lastlogin'];
    $profileimg = $row['profileimg'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUTECH | Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="css/adminLTE.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/select.dataTables.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>	
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>  
  <script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
  <!--
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login-validation.js"></script>-->

    
</head>
    <body id="#home">
        
        <nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
				        MENU                 
					</button>
					<a href="../index.php" class="navbar-brand"> CRUTECH Course Registration</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
						<li><a href="admin-dashboard.php">Dashboard</a></li>
						<li><a href="#">Search</a></li>
						<li><a href="registerCourses.php">Add Course</a></li>
						<li><a href="ViewRegisteredCourses.php">View Registered Courses</a></li>
					</ul>
                    
					<ul class="nav navbar-nav navbar-right">
                        <li><a href=""> Welcome <?php echo $_SESSION["sid"]; ?></a></li>
						<li><?php echo "<a href='scripts/logout-student.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>"; ?></li>
					</ul>
				</div>
			</div>
		</nav>
        <br>
        <hr>
        <div class="container">
        <div class="row">
        <div class="col-md-6">
    <!-- Profile Image -->
        <div class="box box-success">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../profileimg/<?php echo $profileimg ?>" alt="Student profile picture" width="150" height="150">

              <h3 class="profile-username text-center"><?php echo $fname." ". $lname;?></h3>

              <p class="text-muted text-center"><?php echo $sid;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Department</b> <a class="pull-right"><?php echo $department;?></a>
                </li>
                <li class="list-group-item">
                  <b>Level</b> <a class="pull-right"><?php echo $level;?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo $email;?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone Number</b> <a class="pull-right"><?php echo $phone;?></a>
                </li>
                <li class="list-group-item">
                  <b>Date of Birth</b> <a class="pull-right"><?php echo $dob;?></a>
                </li>
                <li class="list-group-item">
                  <b>Course Of Study</b> <a class="pull-right"><?php echo $cos;?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
</div>
          <!-- About Me Box -->
          <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">School Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>GPA</b> <a class="pull-right"><?php echo $gpa;?></a>
                </li>
                <li class="list-group-item">
                  <b>TCE</b> <a class="pull-right"><?php echo $tce;?></a>
                </li>
                <li class="list-group-item">
                  <b>Entry Year</b> <a class="pull-right"><?php echo $entryyr;?></a>
                </li>
                <li class="list-group-item">
                  <b>Graduation Year</b> <a class="pull-right"><?php echo $gradyr;?></a>
                </li>
                <li class="list-group-item">
                  <b>Last Login</b> <a class="pull-right"><?php echo $lastlogin;?></a>
                </li>
                <li class="list-group-item">
                  <b>Login Password</b> <a class="pull-right"><?php echo $password;?></a>
                </li>
              </ul>
              <a href="change-password.php" class="btn btn-success btn-flat">Change Password</a>
              <a href="change-image.php" class="btn btn-success btn-flat">Change Image</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
</html>