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
    <title>CRUTECH | Students Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="css/adminLTE.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>	
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  
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
						<li><a href="admin-start.php">Dashboard</a></li>
						<li><a href="#">Search</a></li>
						<li><a href="registerStudents.php">Add Student</a></li>
						<li><a href="viewAllStudents.php">View Students</a></li>
					</ul>
                    
					<ul class="nav navbar-nav navbar-right">
                        <li><a href=""> Welcome <?php echo $_SESSION["id"]; ?></a></li>
                        <li><a href="viewAllCourses.php"><span class="glyphicon glyphicon-envelope"></span> Courses</a></li>
                        <li><a href="../login.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
						<li><?php echo "<a href='scripts/logout-admin.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>"; ?></li>
					</ul>
				</div>
			</div>
		</nav>
        
        <div class="container-fluid">
        <hr>
        <hr>
        <div class="col-md-3">
       <?php include 'adminprofile.php' ?>
        </div>>
        <div class = "col-md-8">
        <div class="box box-primary">
<br>
            <div class="box-header with-border">
              <h3 class="box-title">Register New Student</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="regStudent" action="registerStudents.php" method="post">
              <div class="box-body">
             
                <div class="form-group">
                  <label for="studentid">STUDENT ID</label>
                  <input type="text" class="form-control" id="sid" name="sid" placeholder="Student ID" required>
                </div>
                <div class="form-group">
                  <label for="fname">First Name</label>
                  <input type="text" class="form-control" id="fname" name="first_name" placeholder="First Name">
                </div>
                <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control" id="lname" name="last_name" placeholder="Last Name">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="tel" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="department">Department</label>
                  <input type="text" class="form-control" id="department" name="department" placeholder="Department Name">
                </div>
                <div class="form-group">
                  <label for="gpa">GPA</label>
                  <input type="text" class="form-control" id="gpa" name="gpa" placeholder="GPA/CGPA">
                </div>
                <div class="form-group">
                  <label for="tce">TCE</label>
                  <input type="text" class="form-control" id="tce" name="tce" placeholder="TCE">
                </div>
                <div class="form-group">
                  <label for="level">Level</label>
                  <input type="text" class="form-control" id="level" name="level" placeholder="Level">
                </div>
                <div class="form-group">
                  <label for="dob">DOB</label>
                  <input type="date" class="form-control" id="dob" name="dob">
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                </div>
                <div class="form-group">
                  <label for="cos">Course of Study</label>
                  <input type="text" class="form-control" id="cos" name="courseofstudy" placeholder="Course of Study">
                </div>
                <div class="form-group">
                  <label for="cos">Entry Year</label>
                  <input type="text" class="form-control" id="entryyr" name="entryyr" placeholder="Entry Year">
                </div>
                <div class="form-group">
                  <label for="cos">Graduation Year</label>
                  <input type="text" class="form-control" id="gradyr" name="gradyr" placeholder="Graduation Year">
                </div>
                
              </div>
              <!-- /.box-body -->

             <div class="box-footer">
              <input id="buttons" type="button" class="button" style="width: 100px;" name="insert" value="Insert">
              </div>
              <div id="result"></div>
            </form>
          </div>
          </div>
          <!-- /.box -->
          </div>

<script type="text/javascript">
$(document).ready(function(){
  $('#sid').change(function(){
		$.ajax({
				url: "scripts/checkUser.php", 
				data: { sid: $('#sid').val() },
				type: "GET",
				context: document.body,
				success: function(result){
					if($.trim(result) == "1"){
						alert("Record for this Student already exists");
					}
				}
		});
    }); 
  //$("#addCourses").submit(function() {
  $(document).on("click",".button",function(){
    var clickBtnValue = $(this).val();
		var sid=$("#sid").val();
		var fname=$("#fname").val();
		var lname=$("#lname").val();
		var email=$("#email").val();
        var password=$("#password").val();
		var department=$("#department").val();
		var gpa=$("#gpa").val();
		var tce=$("#tce").val();
		var level=$("#level").val();
        var dob=$("#dob").val();
        var phone=$("#phone").val();
        var cos=$("#cos").val();
        var entryyr=$("#entryyr").val();
        var gradyr=$("#gradyr").val();
			
       data =  {'action': clickBtnValue,'sid':sid,
	            'first_name':fname,'last_name':lname,
				'email':email,'password':password,'department':department,
        'gpa':gpa,'tce':tce,'level':level,'dob':dob,'phone':phone,'courseofstudy':cos,
      'entryyr': entryyr,'gradyr':gradyr};
	  
	   if(clickBtnValue == 'Insert')
	   {
            insert(data); 
	   }
    }); 

});
function insert(data)
{
	 $.ajax(
				{
					url: "scripts/registerStudent.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(response){
						
						if(response){
					//	$('#result').html(response);
        
						alert("Student Registered successfully");
						document.location="registerStudents.php";
					//	document.getElementById("result").innerHTML="Course added successfully!";
					}
					else{
						alert(" Exists!! ");
					}
				    },
					error: function(error)
					{
					alert(error);
					}
				});
}
</script>
          </body>
          </html>