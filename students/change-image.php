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
    <title>Settings Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="css/staff-style.css">
    
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</head>
    <body>
        
        <nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
						MENU                        
					</button>
					<a href="../index.php" class="navbar-brand"> CRUTECH COURSE REGISTRATION PORTAL </a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav">
						<li><?php echo "<a href=profile.php?sid=" . $srow["sid"] . "><span class='glyphicon glyphicon-user'></span> Profile</a>"; ?></li>
                        
					</ul>
					<ul class="nav navbar-nav navbar-right">
                      <li><a href="account.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                        <li><?php echo "<a href='scripts/logout-student.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>"; ?></li>
					</ul>
				</div>
			</div>
		</nav><br>
        <br>
        
        <div class="container">
            <div id="settings-section"><br />
            <h1>Change Profile Pic</h1>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="well">
                            <div id="menu">
                                <ul>
                                    <li><a href="change-image.php">Change Profile Pic</a></li>
                                    <li><a href="change-password.php">Change Password</a></li>
                                </ul>
                            </div>
                        </div> 
                    </div>
                    
                    
                    <div class="col-sm-9">
                        <div class="well">
                            <div class="settings">
                                <h2 id="white" style="text-decoration:underline;"><?php echo $srow["first_name"]; ?>'s Pic</h2>
                                <div class="row" style="text-align:center;">
                                        <?php echo "<img src=../profileimg/" . $srow["profileimg"] . " class='img-circle' width=120 height=120 alt='Profile Picture'>"; ?>
                                        <br /><br />
                                        <button type="button" class="update-button btn btn-success" data-toggle="modal" data-target="#myModal">Upload Image</button>
                                            <!-- Modal -->
                                            <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Upload Profile Image</h4>
                                            </div>
                                            <div class="modal-body">

                                            <form action="scripts/upload-student-img.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                            <input type="hidden" class="form-control" name="sid" value="<?php echo $_SESSION["sid"]; ?>">
                                            </div>
                                            <img src="../profileimg/avatar.png" class="img-circle" alt="user" width="120px" height="120px">
                                            <div class="form-group">
                                            <input type="file" name="img_file" id="fileToUpload">
                                            <input type="submit" value="Upload Image" name="upload" class="update-button btn btn-primary">
                                            </div>
                                            </form>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>

                                            </div>
                                            </div>
                                        <h3 id="white">STUDENT ID</h3>
                                        <p><strong><?php echo $srow["sid"]; ?></strong></p>
                                </div>
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