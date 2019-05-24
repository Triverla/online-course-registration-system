
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CRUTECH | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<h1 class="text-center"><a href="../../index2.html">DEPARTMENT OF <b> COMPUTER SCIENCE</b></a></h1>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>CRU</b>TECH</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form id="loginform" action="scripts/login-student.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="sid" id="studentid" class="form-control" placeholder="ID number">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p id="uval"></p>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p id="pval"></p>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="#">I forgot my password</a><br>
    <a href="../login.php" class="text-center">Not a student?</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="js/jquery-1.12.4.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="js/login-validation.js"></script>
<script type="text/javascript">
function do_login()
{
 var id=$("#studentid").val();
 var pass=$("#password").val();
 if(id!="" && pass!="")
 {
  //$("#loading_spinner").css({"display":"block"});
  //$('#loginform').submit(function(e){
   // e.preventDefault();
  $.ajax({
  type:'post',
  url:'scripts/login-student.php',
  data: $(this).serialize(),
  success:function(data) {
  if(data === 'success')
  {
    window.location.href="home.php";
  }
  else
  {
    //$("#loading_spinner").css({"display":"none"});
    alert("Wrong Details");
  }
  }
//})
  });
 }

 else
 {
  alert("Please Fill All The Details");
 }

 return false;
}
</script>
</head>
<body>
</body>
</html>
