<?php
session_start();
include 'scripts/database-connection.php';

if(!isset($_SESSION["sid"]))
{
	header("Location: login.php");
}

$sid = $_SESSION["sid"];

$sql = "SELECT * FROM tbl_students WHERE sid = '$sid'";
$sresult = mysqli_query($dbcon, $sql);
$srow = mysqli_fetch_assoc($sresult);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Settings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="css/staff-style.css">
    
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/password-validation.js"></script>
    
</head>
    <body>
        
        <nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
						MENU                        
					</button>
					<a href="../index.php" class="navbar-brand"> CRUTECH </a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav">
						
                        <li><?php echo "<a href=../profile.php?sid=" . $srow["sid"] . "><span class='glyphicon glyphicon-user'></span> Profile</a>"; ?></li>
				        
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><?php echo "<a href='scripts/logout-student.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>"; ?></li>
					</ul>
				</div>
			</div>
		</nav>
        
        <div class="container">
        <br>
        <br>
            <div id="settings-section"><br />
                <div class="row">
                    <div class="col-sm-3">
                        <div class="panel">
                            <div class="panel-heading">Menu</div>
                            <div class="panel-body">   
                                    <li><a href="change-image.php">Change Profile Pic</a></li>
                                    <li><a href="change-password.php">Change Password</a></li>
                                    <li><a href="../help.php">Help</a></li>  
                            </div>
                        </div> 
                    </div>
                    
                    <div class="col-sm-9">
                        <div class="well">
                            <div class="settings">
                                <h2 id="white" style="text-decoration:underline;"><?php echo $srow["first_name"]; ?>'s Password</h2>
                                    <form action="scripts/update-student-password.php" name="newpassform" onsubmit="return CheckPasswordStudent()" method="POST">
                                    <div class="form-group">
                                    <input type="hidden" class="form-control" name="student" value="<?php echo $_SESSION["sid"]; ?>">
                                    </div>

                                    <div class="form-group">
                                    <label for="oldpassword">Old Password</label>
                                    <input type="password" class="form-control" name="oldpass" placeholder="Old Password">
                                    <p id="opval" style="color: #FFFFFF;"></p>
                                    </div>

                                    <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control" name="newpass" placeholder="New Password">
                                    <p id="npval" style="color: #FFFFFF;"></p>
                                    </div>
                                        
                                     <div class="form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" class="form-control" name="cpass" placeholder="Confirm Password">
                                    <p id="cpval" style="color: #FFFFFF;"></p>
                                    <p id="pmval" style="color: #FFFFFF;"></p>
                                    </div>
                                        
                                    <br />
                                    <button type="submit" class="update-button btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Update</button>
                                    </form>
                            </div>
                        </div> 
                    </div>
                    
                </div>
            </div>
        </div>
        <footer>
            <p>Developed by Jeremy Olu</p>
            <p>N0589165</p>
        </footer>
        
	</body>
</html>