<?php
session_start();
include 'scripts/database-connection.php';

if(!isset($_SESSION["sid"]))
{
	header("Location: login.php");
}

$id = $_SESSION["sid"];

$sql = "SELECT * FROM tbl_students WHERE sid = '$id'";
$result = mysqli_query($dbcon, $sql);
$row = mysqli_fetch_assoc($result);

$sql = "SELECT status FROM course_registered WHERE sid = '$id'";
$sresult = mysqli_query($dbcon, $sql);
$row = mysqli_fetch_assoc($sresult);

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
					<a href="home.php" class="navbar-brand">Course Registration Portal</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
						<li><a href="home.php">Dashboard</a></li>
						<li><a href="#">Search</a></li>
						<li><a href="registerCourses.php">Add Course</a></li>
						<li><a href="ViewRegisteredCourses.php">View Registered Courses</a></li>
					</ul>
                    
					<ul class="nav navbar-nav navbar-right">
                        <li><a href="profile.php"> Welcome <?php echo $_SESSION["sid"]; ?></a></li>
						<li><?php echo "<a href='scripts/logout-student.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>"; ?></li>
					</ul>
				</div>
			</div>
		</nav>
        
    <div class="container-fluid"><br>
    <br>
    <br>
      <div class="box box-primary">
            <marquee><div class="text-warning text-center">Important information! If Print Course form button is disabled <button class="btn btn-primary disabled">Print Course Form</button> then you either have not registered or registration hasn't been approved by your HOD</div></marquee>
     <div class="text-center">
     <?php
 if (mysqli_num_rows($sresult) > 0)
 {
         if($row["status"] == 1){
             echo '<span class="text-success">--Course Registration has been approved--</span>';
         }else if($row["status"] == 0){
            echo '<span class="text-danger">--Course Registration has not been approved--</span>';
     }
 }else{
            echo 'Unable to find Registration Status';
        }
     ?></div>
            <div class="box-header with-border">
              <h3 class="box-title">View Registered COURSES</h3>
            </div>
            <!-- /.box-header -->
            <table id='theTable' class="display" style='width:100%;'>
			<thead>
			  <tr>
				<th class='col-6'>Course Code</th>
				<th class='col-6'>Course Title</th>
				<th class='col-6'>Unit</th>
                <th class='col-6'>Course Lecturer</th>
                <th class='col-6'>Course Semester</th>
			  </tr>
			</thead>
            <tfoot>
            <tr>
                <th colspan="2" style="text-align:right">Total Credit Load:</th>
                <th></th>
            </tr>
        </tfoot>
		</table>
        <br>
		<br>
		<button type="button" class="btn btn-danger" onclick="return dropClicked()">Drop Course</button>
        <a class="btn btn-warning" href="registerCarryOverCourses.php">Add Carry Over Courses</a>
        <?php
        $status = mysqli_query($dbcon,"SELECT status FROM course_registered WHERE sid ='$id'");
        $row = mysqli_fetch_assoc($status);
        if($row["status"] == 1){
        echo "<a class='btn btn-primary' href='printCourseForm.php?id=".$id."'>Print Course Form</a>";
        }else{
            echo "<a class='btn btn-primary disabled' href='#'>Print Course Form</a>";
        }
        ?>
    </div>
    </div>
    </div>
          <!---Scripts-->
          <script type="text/javascript">
var table;
$( document ).ready(function() {
	
	table = $('#theTable').DataTable({
	"ajax": {
		url: 'scripts/viewRegisteredCourses.php',
        //data: "",
        type: "GET",
	},
    select: true,
	destroy: true,
		"columns": [
			{"data": "id"},
			{"data": "coursename"},
			{"data": "unit"},
			{"data": "lecturer"},
            {"data": "semester"},
		],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                pageTotal +' ('+ total +' units)'
            );
        }

    });
	
	$('#theTable tbody').on( 'click', 'tr', function () {
		clickedId = $(this).find("td").eq(0).text();
        console.log(clickedId);
	});
});

function dropClicked() {
	console.log(clickedId);

	$.post("scripts/dropCourse.php",
      {
        "course_id" : clickedId
      },
		function(result){
		
		  if($.trim(result) == "success"){
			alert("Course dropped!");
		  } else {
			alert("Course dropped!");//supposed to be failed
		  }
		  document.location="viewRegisteredCourses.php";
      });		
}
//TODO
/* Create a select table for carry over courses
* Courses should be of that semester
* courses should be below your level
* search option
*/
</script>
          </body>
          </html>