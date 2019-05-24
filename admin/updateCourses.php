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


$result = mysqli_query($dbcon,"SELECT * FROM courses WHERE course_id ='$course_id'");

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	while ($row = mysqli_fetch_assoc($result))
	{
		
		$course_id=$row['course_id'];
		$title=$row['title'];
		$unit=$row['unit'];
		$class_level=$row['class_level'];
		$department=$row['department'];
        $course_lecturer=$row['course_lecturer'];
        $semester=$row['semester'];
        $descr=$row['descr'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUTECH | Update Courses</title>
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
        <div class="row content">
    <div class="col-sm-3 sidenav">
      <h2>ID: <?php echo $_SESSION["id"]; ?></h2>
      <ul class="nav nav-pills nav-stacked">
	   <li><a href="welcomeAdmin.html">Home</a></li>
        <li class="active"><a href="AddCourses.html">Add Course</a></li>
		<li><a href="DeleteCourses.html">Remove Course</a></li>
		<li><a href="addUserCourse.html">Add User Course</a></li>
		<li><a href="dropUserCourse.html">Drop User Course</a></li>
		<li><a href="logout.php">Logout</a></li>
      </ul><br>
    </div>
    <div class="col-sm-9">
<div class="box box-primary">
<br>
            <div class="box-header with-border">
              <h3 class="box-title">Update COURSE</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="addCourses">
              <div class="box-body">
                <div class="form-group">
                  <label for="course_id">Course ID</label>
                  <input type="text" class="form-control" id="courseid" name="course_id" value="<?php echo $course_id; ?>" required>
                </div>
                <div class="form-group">
                  <label for="coursetitle">Course Title</label>
                  <input type="text" class="form-control" id="coursetitle" name="title" value="<?php echo $title; ?>">
                </div>
                <div class="form-group">
                  <label for="courseunit">Course Unit</label>
                  <input type="text" class="form-control" id="courseunit" name="unit" value="<?php echo $unit; ?>">
                </div>
                <div class="form-group">
                  <label for="classlevel">Class Level</label>
                  <input type="text" class="form-control" id="class_level" name="class_level"  value="<?php echo $class_level; ?>">
                </div>
                <div class="form-group">
                  <label for="department">Department</label>
                  <input type="text" class="form-control" id="department" name="department" value="<?php echo $department; ?>">
                </div>
                <div class="form-group">
                  <label for="courselecturer">Course Lecturer</label>
                  <input type="text" class="form-control" id="courselecturer" name="course_lecturer" value="<?php echo $course_lecturer; ?>">
                </div>
                <div class="form-group">
                  <label for="coursesemester">Course Semester</label>
                  <input type="text" class="form-control" id="semester" name="semester" value="<?php echo $semester; ?>">
                </div>
                <div class="form-group">
                  <label for="descr">Course Description</label>
                  <input type="text" class="form-control" id="descr" name="descr" value="<?php echo $descr; ?>">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input id="buttons" type="button" class="button" style="width: 100px;" name="update" value="update">
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>
          </div>
          </div>

          <!---Scripts-->
          <script type="text/javascript">
$(document).ready(function(){
    $(document).on("click",".button",function(){
        var clickBtnValue = $(this).val();
		
		var courseid=$("#courseid").val();
		
		
		if(courseid.length<1)
		{
			document.getElementById("result").innerHTML="Course ID is mandatory. Please enter!!";			
		}
		else{			
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
	   
	   //switch(clickBtnValue)
	   if(clickBtnValue=='update')
	   {
            update(data); 
	   }
	   }
    }); 
	

});

function update(data)
{
	 $.ajax(
				{
					url: "scripts/updateCourse.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(response){
						
						if(response){
						alert("Course updated successfully ");
						document.location="viewAllCourses.php";
						} else {
						document.location="updateCourses.php";
						}
				    },
					error: function(error)
					{
					alert(error);
					}
				});
}

</script>

<?php
	}
} else {
	echo "No data found";
}?>

<!--<footer class="container-fluid">
  <p>Copyrights@Utdallas</p>
</footer>-->

    </body>
</html>

<?php
mysqli_close($dbcon);
?>