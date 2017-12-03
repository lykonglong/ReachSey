<?php
session_start();
include 'includes/db.php';
include 'pages/include/function.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in/Sign Up</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Reachsey</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Enter Username & Password</p>
      <?php
      if(isset($_POST['btnlogin']))
      {
          $user_name=mysqli_real_escape_string($connection,$_POST['user_name']);
          $user_password=mysqli_real_escape_string($connection,$_POST['user_password']);
          $select_user="SELECT * FROM users";
          $run_user=mysqli_query($connection,$select_user);
          $row_count=mysqli_num_rows($run_user);
          if($row_count > 0)
          {
              while($row_user=mysqli_fetch_array($run_user))
              {
                  $dbuser_id=$row_user['user_id'];
                  $dbuser_name=$row_user['user_name'];
                  $dbuser_pass=$row_user['user_password'];
//                  $decrypted = decryptIt($dbuser_pass);
                  $dbuser_role = $row_user['user_role'];
                  if($user_name==$dbuser_name) {
                      if ($user_password == $dbuser_pass) {
                          $_SESSION['user_id'] = $dbuser_id;
                          $_SESSION['user_name'] = $dbuser_name;
                          $_SESSION['user_role'] = $dbuser_role;
                          //header('location:pages/movie.php');
                          echo "<script language=\"javascript\">window.location.href = \"pages/dashboard.php\"</script>";
                      }
                      else{
                          //echo "<p class=\"login-box-msg text-red\">Password you entered is incorrect!</p>";
                      }
                  }
                  else{
                      //echo "<p class=\"login-box-msg text-red\">Username and password you entered are incorrect!</p>";
                  }
              }
              echo "<p class=\"login-box-msg text-red\">Username and password you entered are incorrect!</p>";
          }
      }
      ?>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="user_name" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="user_password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 col-xs-offset-4">
          <button type="submit" name="btnlogin" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
