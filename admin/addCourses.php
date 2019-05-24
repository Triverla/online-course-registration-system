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
    <title>CRUTECH | Add Courses</title>
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
						<li><a href="addCourses.php">Add Course</a></li>
						<li><a href="viewAllCourses.php">View Courses</a></li>
					</ul>
                    
					<ul class="nav navbar-nav navbar-right">
                        <li><a href=""> Welcome <?php echo $_SESSION["id"]; ?></a></li>
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
        </div>
        <div class = "col-md-8">
        <div class="box box-primary">
<br>
            <div class="box-header with-border">
              <h3 class="box-title">ADD COURSES</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="addCourses">
              <div class="box-body">
                <div class="form-group">
                  <label for="course_id">Course ID</label>
                  <input type="text" class="form-control" id="courseid" name="course_id" placeholder="Course ID" required>
                </div>
                <div class="form-group">
                  <label for="coursetitle">Course Title</label>
                  <input type="text" class="form-control" id="coursetitle" name="title" placeholder="Course Title">
                </div>
                <div class="form-group">
                  <label for="courseunit">Course Unit</label>
                  <input type="text" class="form-control" id="courseunit" name="unit" placeholder="Course Unit">
                </div>
                <div class="form-group">
                  <label for="classlevel">Class Level</label>
                  <input type="text" class="form-control" id="class_level" name="class_level" placeholder="Course level">
                </div>
                <div class="form-group">
                  <label for="department">Department</label>
                  <input type="text" class="form-control" id="department" name="department" placeholder="Department ID">
                </div>
                <div class="form-group">
                  <label for="courselecturer">Course Lecturer</label>
                  <input type="text" class="form-control" id="courselecturer" name="course_lecturer" placeholder="Course Lecturer">
                </div>
                <div class="form-group">
                  <label for="coursesemester">Course Semester</label>
                  <input type="text" class="form-control" id="semester" name="semester" placeholder="Course Semester">
                </div>
                <div class="form-group">
                  <label for="descr">Course Description</label>
                  <input type="text" class="form-control" id="descr" name="descr" placeholder="Course Description">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input id="buttons" type="button" class="button" style="width: 100px;" name="insert" value="Insert">
              </div>
            </form>
          </div>
          </div>
          <!-- /.box -->
          </div>

          <!---Scripts-->
          <script type="text/javascript">
$(document).ready(function(){
  //$("#addCourses").submit(function() {
  $(document).on("click",".button",function(){
    var clickBtnValue = $(this).val();
		var courseid=$("#courseid").val();
		var coursetitle=$("#coursetitle").val();
		var courseunit=$("#courseunit").val();
		var class_level=$("#class_level").val();
		var department=$("#department").val();
		var courselecturer=$("#courselecturer").val();
		var semester=$("#semester").val();
		var descr=$("#descr").val();
			
       data =  {'action': clickBtnValue,'course_id':courseid,
	            'title':coursetitle,'unit':courseunit,
				'class_level':class_level,'department':department,
				'course_lecturer':courselecturer,'semester':semester,'descr':descr};
	  
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
					url: "addCourse.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(response){
						
						if(response){
						//$('#result').html(response);
        
						alert("Course added successfully");
						document.location="addCourses.php";
						//document.getElementById("result").innerHTML="Course added successfully!";
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