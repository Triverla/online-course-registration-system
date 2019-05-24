<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUTECH|COURSE REGISTRATION PORTAL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="css/main-style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style>
        body
        {
            background-color: #25B99A;
        }
        footer
        {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
    <body id="#home">
        
        <nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
						MENU                        
					</button>
					<a href="index.php" class="navbar-brand">COMPUTER SCIENCE REGISTRATION PORTAL</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav">
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
        
        <div id="login-section">
        
            <h1 id="login-head">I am a . . .</h1>
            <br />
            <div class="form-group">
                <select onchange="javascript:location.href = this.value;">
                    <option value=""><strong>Choose Below:</strong></option>
                    <option value="lecturers/login.php">Lecturer</option>
                    <option value="students/login.php">Student</option>
                    <option value="admin/login.php">Admin</option>
                </select>
            </div>
        </div>
        
        <footer>
            <p>Spint</p>
            <p>SP10001111 &copy;2018</p>
        </footer>
        
	</body>
</html>