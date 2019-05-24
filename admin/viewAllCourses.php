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
    <title>CRUTECH | View All Courses</title>
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
            <div class="box-header with-border">
              <h3 class="box-title">VIEW ALL COURSES</h3>
            </div>
            <!-- /.box-header -->
            <div class="field-wrap">
                <label>
                Level:<span class=""></span>
                </label>
                 <input id="class_level" list="class_level" autocomplete="off" name="class_level">
					<datalist id="class_level">
					<option value="All">All Levels</option>
					<option value=100>100</option>
					<option value=200>200</option>
					<option value=300>300</option>
					<option value=400>400</option>
					<option value=500>500</option>
					</datalist>
		    </div>
		<br>
		<br>
            <table id='theTable' class="display" style='width:100%;'>
			<thead>
			  <tr>
				<th class='col-6'>Course Id</th>
				<th class='col-6'>Course Title</th>
				<th class='col-6'>Unit</th>
				<th class='col-6'>Course Level</th>
                <th class='col-6'>Department Name</th>
                <th class='col-6'>Course Lecturer</th>
                <th class='col-6'>Course Semester</th>
				<th class='col-6'>Description</th>
			  </tr>
			</thead>
		</table>
        <br>
		<br>
		<button type="button" class="btn btn-success" onclick="return buttonClicked()">Update the course</button>	
        <button type="button" class="btn btn-danger" onclick="alert('coming soon!')">Delete course</button>	
    </div>
    </div>
    </div>
          <!---Scripts-->
          <script type="text/javascript">

    $( document ).ready(function() {
	
    $('#class_level').change(function(){
    
       $('#theTable').dataTable({
       "ajax": {
           url: 'scripts/viewAllCourses.php',
           data: { param1: $(this).val()},
           type: "GET",
           context: document.body
       },
       
       "columns": [
            {"data": "course_id"},
			{"data": "title"},
			{"data": "unit"},
			{"data": "class_level"},
			{"data": "department"},
			{"data": "course_lecturer"},
            {"data": "semester"},
            {"data": "descr"}
       ],
     });
   })
	
	var table = $('#theTable').dataTable({
	"ajax": {
		url: 'scripts/viewAllCourses.php',
	},
	select: {
            style: 'multi'
        },
	destroy: true,
		"columns": [
			{"data": "id"},
			{"data": "coursename"},
			{"data": "unit"},
			{"data": "courselevel"},
			{"data": "department"},
			{"data": "lecturer"},
            {"data": "semester"},
            {"data": "descr"},
		]
    });
	
	$('#theTable tbody').on( 'click', 'tr', function () {
		clickedId = $(this).find("td").eq(0).text();
	});
});

function buttonClicked() {

	console.log(clickedId);
	$course_id=clickedId;
	window.location.href='updateCourses.php?course_id='+clickedId;
}

</script>
          </body>
          </html>