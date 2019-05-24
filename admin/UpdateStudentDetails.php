<?php
session_start();

include 'scripts/database-connection.php';
$sid = $_GET['sid'];
if(!isset($_SESSION["id"]))
{
	header("Location: login.php");
}

$id = $_SESSION["id"];

$sql = "SELECT * FROM tbl_admin WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
$row = mysqli_fetch_assoc($result);


$result = mysqli_query($dbcon,"SELECT * FROM tbl_students WHERE sid ='$sid'");

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	while ($row = mysqli_fetch_assoc($result))
	{
		
		$fname = $row['first_name'];
        $lname =  $row['last_name'];
        $password =  $row['password'];
        $department =  $row['department'];
        $email =  $row['email'];
        $gpa =  $row['gpa'];
        $tce =  $row['tce'];
        $level =  $row['level'];
        $dob =  $row['dob'];
        $phone =  $row['phone'];
        $cos =  $row['courseofstudy'];
        $entryyr = $row['entryyr'];
        $gradyr =  $row['gradyr'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUTECH | Update Student Record</title>
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
						<li><a href="admin-start.php">Dashboard</a></li>
						<li><a href="#">Search</a></li>
						<li><a href="#">Add Course</a></li>
						<li><a href="#">View Courses</a></li>
					</ul>
                    
					<ul class="nav navbar-nav navbar-right">
                        <li><a href=""> Welcome <?php echo $_SESSION["id"]; ?></a></li>
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
              <h3 class="box-title">Update Student Record</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="addCourses">
              <div class="box-body">
                <div class="form-group">
                  <label for="course_id">Student ID</label>
                  <input type="text" class="form-control" id="id" name="sid" value="<?php echo $sid; ?>" required>
                </div>
                <div class="form-group">
                  <label for="coursetitle">First Name</label>
                  <input type="text" class="form-control" id="fname" name="first_name" value="<?php echo $fname; ?>">
                </div>
                <div class="form-group">
                  <label for="courseunit">Last Name</label>
                  <input type="text" class="form-control" id="lname" name="last_name" value="<?php echo $lname; ?>">
                </div>
                <div class="form-group">
                  <label for="classlevel">Password</label>
                  <input type="text" class="form-control" id="password" name="password"  value="<?php echo $password; ?>">
                </div>
                <div class="form-group">
                  <label for="department">Department</label>
                  <input type="text" class="form-control" id="department" name="department" value="<?php echo $department; ?>">
                </div>
                <div class="form-group">
                  <label for="courselecturer">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                  <label for="coursesemester">GPA</label>
                  <input type="text" class="form-control" id="gpa" name="gpa" value="<?php echo $gpa; ?>">
                </div>
                <div class="form-group">
                  <label for="descr">TCE</label>
                  <input type="text" class="form-control" id="tce" name="tce" value="<?php echo $tce; ?>">
                </div>
                <div class="form-group">
                  <label for="descr">Level</label>
                  <input type="text" class="form-control" id="level" name="level" value="<?php echo $level; ?>">
                </div>
                <div class="form-group">
                  <label for="descr">Date of Birth</label>
                  <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>">
                </div>
                <div class="form-group">
                  <label for="descr">Phone Number</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
                </div>
                <div class="form-group">
                  <label for="descr">Course of Study</label>
                  <input type="text" class="form-control" id="cos" name="courseofstudy" value="<?php echo $cos; ?>">
                </div>
                <div class="form-group">
                  <label for="descr">Entry Year</label>
                  <input type="text" class="form-control" id="entryyr" name="entryyr" value="<?php echo $entryyr; ?>">
                </div>
                <div class="form-group">
                  <label for="descr">Graduation Year</label>
                  <input type="text" class="form-control" id="gradyr" name="gradyr" value="<?php echo $gradyr; ?>">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input id="buttons" type="button" class="button" style="width: 100px;" name="update" value="update">
              <div id="result"></div>
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
		
		var sid=$("#sid").val();
		
		
		/*if(sid.Length<1)
		{
			document.getElementById("result").innerHTML="Student ID is mandatory. Please enter!!";			
		}
		else{		*/	
        var sid=$("#sid").val();
		var fname=$("#fname").val();
		var lname=$("#lname").val();
		var password=$("#password").val();
		var department=$("#department").val();
		var email=$("#email").val();
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
				'password':password,'department':department,
				'email':email,'gpa':gpa,'tce':tce,
                'level':level,'dob':dob,'phone':phone,
                'courseofstudy':cos,'entryyr':entryyr,'gradyr':gradyr};
	   
	   //switch(clickBtnValue)
	   if(clickBtnValue=='update')
	   {
            update(data); 
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
						alert("Student Record updated successfully ");
						document.location="viewAllStudents.php";
						} else {
						document.location="updateStudentDetails.php";
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