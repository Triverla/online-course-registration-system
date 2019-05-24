<?php
session_start();
include 'scripts/database-connection.php';
$sid =  $_GET['sid'];
if(!isset($_SESSION["id"]))
{
	header("Location: login.php");
}
$id = $_SESSION["id"];
$result = mysqli_query($dbcon,"SELECT r.course_id AS id, c.title as title, c.unit as unit, c.course_lecturer as lecturer, c.semester as semester, r.type as type FROM courses c, course_registered r WHERE r.sid = '$sid' AND r.course_id = c.course_id AND r.status = 0");

$sql = "SELECT DISTINCT(r.sid) as id, COUNT(r.course_id) as totalregistered, SUM(c.unit) as total FROM course_registered r, courses c WHERE  r.sid = '$sid' and c.course_id = r.course_id";
$tresult = mysqli_query($dbcon, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUTECH | Register/Drop Course</title>
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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>	
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
					<a href="home.php" class="navbar-brand"> CRUTECH Course Registration</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
						<li><a href="admin-start.php">Dashboard</a></li>
						<li><a href="#">Search</a></li>
						<li><a href="registerCourses.php">Add Course</a></li>
						<li><a href="ViewRegisteredCourses.php">View Registered Courses</a></li>
					</ul>
                    
					<ul class="nav navbar-nav navbar-right">
                        <li><a href=""> Welcome <?php echo $_SESSION["id"]; ?></a></li>
						<li><?php echo "<a href='scripts/logout-student.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>"; ?></li>
					</ul>
				</div>
			</div>
		</nav>
        
    <div class="container-fluid">
        <div class="box box-primary">
            <br>
            <br>
            <div class="box-header with-border">
              <h3 class="box-title">COURSES REGISTERED</h3>
            </div>
            <!-- /.box-header -->
            <table id='theTable' class="table table-responsive table-striped" style='width:100%;'>
			<thead>
			  <tr>
				<th class='col-6'>Course Code</th>
				<th class='col-6'>Course Title</th>
				<th class='col-6'>Unit</th>
                <th class='col-6'>Type</th>
                <th class='col-6'>Course Lecturer</th>
                <th class='col-6'>Course Semester</th>
			  </tr>
			</thead>
            <tbody>
            <?php
            
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	while ($row = mysqli_fetch_assoc($result))
	{
		$id = $row['id'];
		$title = $row['title'];
        $unit =  $row['unit'];
        $type =  $row['type'];
        $lecturer =  $row['lecturer'];
        $semester =  $row['semester'];

echo "<tr>";
            echo " <td>" . $id. "</td>";
            echo "<td>" . $title . "</td>";
            echo "<td>" . $unit. "</td>";
            echo "<td>" . $type. "</td>";
            echo "<td>" . $lecturer . "</td>";
            echo "<td>" . $semester . "</td>";

            echo "</tr>";
    }}else{
       echo "<tr>";
            echo " <td colspan='5' class='text-danger text-center'> No Course Registered</td>";
    }
            ?>

            </tbody>
            <tfoot>
            <tr>
                <th colspan="2" style="text-align:right">Total Credit Load:</th>
                <?php
                 if (mysqli_num_rows($tresult) > 0)
                 {
                     while ($srow = mysqli_fetch_assoc($tresult))
                     {
                echo "<th>".$srow['total']."</th>";
                     }
                    }
                ?>
            </tr>
        </tfoot>
		</table>
    </div>
    </div>
    </div>
          </body>
          </html>