<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CRUTECH | Course Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="js/iCheck/square/blue.css">
  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>	
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>CRU</b>TECH</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new administrator</p>

    <form action="scripts/register-admin.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="id" name="id" placeholder="ID Number" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <!--<div class="form-group has-feedback">
        <input type="password" class="form-control" name="password2" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>-->
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
        <input id="buttons" type="button" class="button" style="width: 100px;" name="insert" value="Insert">
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="login.php" class="text-center">Already Registered? <b>Login</b></a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  //$("#addCourses").submit(function() {
  $(document).on("click",".button",function(){
    var clickBtnValue = $(this).val();
		var id=$("#id").val();
		var username=$("#username").val();
		var email=$("#email").val();
    var password=$("#password").val();
       data =  {'action': clickBtnValue,'id':id,
	              'username':username, 'email':email,
                'password':password};
	  
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
					url: "scripts/register-admin.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(response){
						
						if(response){
					//	$('#result').html(response);
        
						alert("Admin Registered successfully");
						document.location="admin-start.php";
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
<!-- iCheck 
<script src="js/iCheck/icheck.min.js"></script>
<script>
 $( document ).ready(function() {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

	$('#username').change(function(){
		$.ajax({
				url: "checkUser.php", 
				data: { username: $('#username').val() },
				type: "GET",
				context: document.body,
				success: function(result){
					if($.trim(result) == "1"){
						alert("Record for this username already exists");
					}
				}
		});
    }); 
	
	$('#email').change(function(){
		$.ajax({
				url: "checkEmail.php", 
				data: { email: $('#email').val() },
				type: "GET",
				context: document.body,
				success: function(result){
					if($.trim(result) == "1"){
						alert("Record for this email already exists");
					}
				}
		});
    }); 
	
});

</script>-->

</body>
</html>
