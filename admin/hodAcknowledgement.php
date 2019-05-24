<?php
session_start();
include 'scripts/database-connection.php';

if(!isset($_SESSION["id"]))
{
	header("Location: login.php");
}

$id = $_SESSION["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUTECH | Course Registration Approval</title>
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
	<br>
	<br>
        <div class="box box-primary">
            <br>
            <div class="box-header with-border">
              <h3 class="box-title">Approve Students Registrations By HOD</h3>
            </div>
            <!-- /.box-header -->
		<br>
		<br>
            <table id='theTable' class="display" style='width:100%;'>
			<thead>
			  <tr>
				<th class='col-6'>Student Id</th>
                <th class='col-6'>Number of Registered Courses</th>
				<th class='col-6'>Course Type</th>
				<th class='col-6'>Level</th>
				<th class='col-6'>Department</th>
				<th class='col-6'>Semester</th>
                <th class='col-6'>Session</th>
			  </tr>
			</thead>
		</table>
        <br>
		<br>
		<button type="button" class="btn btn-success" onclick="return approveClicked()">Approve Registration</button>
		<button type="button" class="btn btn-success" onclick="return buttonClicked()">View Registered Courses</button>       	
    </div>
    </div>
    </div>
          <!---Scripts-->
          <script type="text/javascript">
		  //Ajax to view courses per Level
var table;
    $( document ).ready(function() {
    $('#class_level').change(function(){
    
       $('#theTable').DataTable({
       "ajax": {
           url: 'scripts/hodAcknowlegdement.php',
           data: { param1: $(this).val()},
           type: "GET",
           context: document.body
       },
       
       "columns": [
            {"data": "sid"},
            {"data": "num"},
			{"data": "type"},
			{"data": "level"},
			{"data": "department"},
			{"data": "semester"},
			{"data": "session"},
       ],
     });
   })
	//Ajax to view Students and number of courses registered
	table = $('#theTable').DataTable({
	"ajax": {
		url: 'scripts/hodAcknowlegdement.php',
	},
	select: true,
	destroy: true,
		"columns": [
      {"data": "sid"},
      {"data": "num"},
			{"data": "type"},
			{"data": "level"},
			{"data": "department"},
			{"data": "semester"},
			{"data": "session"},
		/*	{
                data: null,
                className: "center",
                defaultContent: '<a href="" class="btn btn-success" onclick="return approveClicked()">Approve</a>  <a href="" class="btn btn-default view" onclick="return buttonClicked()">View</a>'
            }*/
		]
    });
	$('#theTable tbody').on( 'click', 'tr', function () {
		clickedId = $(this).find("td").eq(0).text();
	});

});
//Javascript function to view registered courses
function buttonClicked() {
console.log(clickedId);
$sid = clickedId;
window.location.href='viewStudentRegisteredCourses.php?sid='+ $sid;
}
//Javascript function to approve courses
function approveClicked() {
	
	$('#theTable tbody').on( 'click', 'tr', function () {
		sid = $(this).find("td").eq(0).text();
		console.log(sid);
	});
	  
	  $.post("scripts/approveStudentRegistration.php",
      {
        "sid" : sid
      },
		function(result){
			console.log(sid);
		  if($.trim(result) == "success"){
			alert("Courses Approved Successfully!");
		  } else {
			alert("Error Encountered!");
		  }
		  document.location="hodAcknowledgement.php";
      });
}
</script>
          </body>
          </html>