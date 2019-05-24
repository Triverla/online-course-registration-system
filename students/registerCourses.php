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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUTECH | Register Course</title>
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
					<a href="../index.php" class="navbar-brand">Course Registration Portal</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
						<li><a href="home.php">Dashboard</a></li>
						<li><a href="#">Search</a></li>
						<li><a href="registerCourses.php">Add Course</a></li>
						<li><a href="ViewRegisteredCourses.php">View Registered Courses</a></li>
					</ul>
                    
					<ul class="nav navbar-nav navbar-right">
                        <li><a href="profile.php"> Welcome <?php echo $_SESSION["sid"];?></a></li>
                        <li><?php echo "<a href='scripts/logout-student.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>"; ?></li>
					</ul>
				</div>
			</div>
		</nav>
        
    <div class="container-fluid">
        <div class="box box-primary">
            <br>
            <div class="box-header with-border">
              <h3 class="box-title">ADD LEVEL COURSES</h3>
            </div>
            <!-- /.box-header -->
            <div class="field-wrap">
                <label>
                Level:<span class=""></span>
                </label>
                 <input id="level" list="level" autocomplete="off" name="class_level">
					<datalist id="level">
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
				<th class='col-6'>Course Code</th>
				<th class='col-6'>Course Title</th>
				<th class='col-6'>Unit</th>
                <th class='col-6'>Department Name</th>
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
		<button type="button" class="btn btn-success" onclick="return registerClicked()">Register</button>
        <a class="btn btn-primary" href="registerCarryOverCourses.php">Add Carry Over Courses</a>	
    </div>
    </div>
    </div>
          <!---Scripts-->
          <script type="text/javascript">
var table;
$( document ).ready(function() {
	
    $('#level').change(function(){
    
       $('#theTable').dataTable({
       "ajax": {
           url: 'scripts/RegisterCourses.php',
           data: { param1: $(this).val()},
           type: "GET",
           context: document.body
       },
       
       "columns": [
            {"data": "course_id"},
			{"data": "title"},
			{"data": "unit"},
			{"data": "department"},
			{"data": "course_lecturer"},
            {"data": "semester"}
       ],
     });
   })
	
	table = $('#theTable').DataTable({
	"ajax": {
		url: 'scripts/RegisterCourses.php',
        data: { param1: ""},
        type: "GET",
	},
	select: {
            style: 'multi'
        },
	destroy: true,
		"columns": [
			{"data": "id"},
			{"data": "coursename"},
			{"data": "unit"},
			{"data": "department"},
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

function registerClicked() {
	
	var count = table.rows( { selected: true } ).data();
	var size = count.count();
	if(size > 10){
		alert("You cannot register more than 10 courses");
		document.location="registerCourses.php";
	}
	var ids = [];
	$.each(count, function (index, value) {
		console.log(value.id);
		ids.push(value.id);
	});
	  
	  $.post("scripts/addCourse.php",
      {
        "course_id" : ids
      },
		function(result){
			
		  if($.trim(result) == "success"){
			alert("...");
		  } else {
			alert("Courses Registered Successfully!");
		  }
		  document.location="viewRegisteredCourses.php";
      });
}

</script>
          </body>
          </html>