<?php
session_start();

include 'scripts/database-connection.php';
$course_id = $_GET['course_id'];
if(!isset($_SESSION["id"]))
{
	header("Location: login.php");
}

$id = $_SESSION["id"];

$sql = "SELECT * FROM tbl_admin WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
$row = mysqli_fetch_assoc($result);


$result = mysqli_query($dbcon,"SELECT DISTINCT(r.sid) as id, s.first_name as firstname, s.last_name as lastname, s.level as level, s.department as department, r.type as type FROM course_registered r, tbl_students s WHERE r.sid = s.sid AND r.course_id = '$course_id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUTECH | <?php echo $course_id ?> Registration</title>
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
  
  <script src="js/jquery.min.js"></script>
		<script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>   

    
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
						<li><a href="admin-start.php">Dashboard</a></li>
						<li><a href="#">Search</a></li>
						<li><a href="addCourses.php">Add Course</a></li>
						<li><a href="ViewAllCourses.php">View Courses</a></li>
					</ul>
                    
					<ul class="nav navbar-nav navbar-right">
                        <li><a href=""> Welcome <?php echo $_SESSION["id"]; ?></a></li>
						<li><?php echo "<a href='scripts/logout-admin.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>"; ?></li>
					</ul>
				</div>
			</div>
		</nav>
        
    <div class="container-fluid">
        <div class="box box-primary">
            <br>
            <hr>
            <div class="box-header with-border">
              <h3 class="box-title">Students that Registered For <strong><?php echo $course_id ?></strong></h3>
            </div>
		<br>
            <table class="table table-responsive table-striped" style='width:100%;'>
			<thead>
			  <tr>
				<th class='col-4'>Student ID</th>
				<th class='col-4'>First Name</th>
				<th class='col-4'>Last Name</th>
                <th class='col-4'>Department</th>
                <th class='col-4'>Level</th>
                <th class='col-4'>Reg. Type</th>
			  </tr>
			</thead>
            <tbody>
            <?php
            
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	while ($row = mysqli_fetch_assoc($result))
	{
		$id = $row['id'];
		$firstname = $row['firstname'];
        $lastname =  $row['lastname'];
        $department =  $row['department'];
        $level =  $row['level'];
        $type =  $row['type'];

echo "<tr>";
            echo " <td>" . $id. "</td>";
            echo "<td>" . $firstname . "</td>";
            echo "<td>" . $lastname . "</td>";
            echo "<td>" . $department . "</td>";
            echo "<td>" . $level . "</td>";
            echo "<td>" . $type . "</td>";

            echo "</tr>";
    }}else{
       echo "<tr>";
            echo " <td colspan='5' class='text-danger text-center'> No Student Registered</td>";
    }
            ?>

            </tbody>
		</table>
        <div class="text-center"><a href="javascript:print();">[ Click to Print ]</a> [ <a onclick="window.close();">Close</a> ] </div>
        </div>
        </div>
        </body>
        </html>