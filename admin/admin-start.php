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
    <title>CRUTECH | Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="css/admin-style.css">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login-validation.js"></script>
    
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
						<li><a href="#">Search</a></li>
						<li><a href="#">Lecturers</a></li>
						<li><a href="viewAllStudents.php">Students</a></li>
                        <li><a href="viewAllCourses.php">Courses</a></li>
					</ul>
                    
					<ul class="nav navbar-nav navbar-right">
                        <li><a href=""> Welcome <?php echo $_SESSION["id"]; ?></a></li>
                        <li><a href="registerStudents.php">Register Students</a></li>
						<li><?php echo "<a href='scripts/logout-admin.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>"; ?></li>
					</ul>
				</div>
			</div>
		</nav>
        
        <div class="container">
            
            <div id="admin-section">
                <header>
                    <h1>Admin Start Menu</h1>
                    <a href="hodAcknowledgement.php"><button class="button">Approve Students Registration</button></a>
                    <a href="viewRegisteredStudents.php"><button class="button">View Registered Students</button></a>
                    <br /><br />
                    <p>Admin: <?php echo $_SESSION["id"]; ?> -  <?php echo "" . date("d/m/Y") . "<br>"; ?> </p>
                </header>
            
            <div id="manage-section">
            <div class="row">
                <div class="col-sm-6">
                    <a href="register.php">
                        <div class="well">
                            <h1 class="well-heading">Admins</h1>
                            <img src="icons/admin.svg" height="72px" width="72px" alt="admin-icon" />
                            <p>View and manage administrators</p>
                        </div>
                    </a>  
                </div>

                <div class="col-sm-6">
                    <a href="manage-staff.php">
                        <div class="well">
                            <h1 class="well-heading">Lecturers</h1>
                            <img src="icons/staff.svg" height="72px" width="72px" alt="admin-icon" />
                            <p>View and manage staff</p>
                        </div>
                    </a>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-6">
                    <a href="viewAllStudents.php">
                        <div class="well">
                            <h1 class="well-heading">Students</h1>
                            <img src="icons/students.svg" height="72px" width="72px" alt="admin-icon" />
                            <p>View and manage students</p>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6">
                    <a href="viewAllCourses.php">
                        <div class="well">
                            <h1 class="well-heading">Courses</h1>
                            <img src="icons/parents.svg" height="72px" width="72px" alt="admin-icon" />
                            <p>View and manage Courses</p>
                        </div>
                    </a>
                </div>
                
            </div>
                </div>
            </div>
 
        </div> <!-- CONTAINER END -->
        
        <footer>
            <p>Powered by SPINT 2018</p>
            <p>CRUTECH&reg;</p>
        </footer>
        
	</body>
</html>