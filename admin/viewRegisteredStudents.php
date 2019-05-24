<?php
session_start();
include 'scripts/database-connection.php';

if(!isset($_SESSION["id"]))
{
	header("Location: login.php");
}

$id = $_SESSION["id"];

$sql = "SELECT * FROM tbl_admin WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
$row = mysqli_fetch_assoc($result);

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
  <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.select.min.js"></script>
  
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
						<li><a href="addCourses.php">Add Course</a></li>
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
              <h3 class="box-title">Number Of Registered Student Per Course</h3>
            </div>
            <!-- /.box-header -->
            <table id='theTable' class="display" style='width:100%;'>
			<thead>
			  <tr>
				<th class='col-6'>Course Code</th>
				<th class='col-6'>Course Title</th>
                <th class='col-6'>Course Lecturer</th>
                <th class='col-6'>Session</th>
                <th class='col-6'>Course Semester</th>
                <th class='col-6'>Registered Students</th>
			  </tr>
			</thead>
            <tfoot>
            <tr>
                <th colspan="5" style="text-align:right">Total:</th>
                <th></th>
            </tr>
        </tfoot>
		</table>
        <button type="button" class="btn btn-success" onclick="return buttonClicked()">View Registered Students</button>
    </div>
    </div>
    </div>
          <!---Scripts-->
          <script type="text/javascript">
var table;
$( document ).ready(function() {
	
	table = $('#theTable').DataTable({
	"ajax": {
		url: 'scripts/registeredStudentsNo.php',
        //data: "",
        type: "GET",
	},
    select: true,
	destroy: true,
		"columns": [
			{"data": "course_id"},
			{"data": "title"},
			{"data": "lecturer_id"},
			{"data": "sessionid"},
            {"data": "semester"},
            {"data": "students_registered"},
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
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 5 ).footer() ).html(
                pageTotal +' ('+ total +' Students)'
            );
        }

    });
	
	$('#theTable tbody').on( 'click', 'tr', function () {
		clickedId = $(this).find("td").eq(0).text();
        console.log(clickedId);
	});
});
function buttonClicked() {
console.log(clickedId);
$course_id=clickedId;
window.location.href='student-course.php?course_id='+clickedId;
}
</script>
          </body>
          </html>