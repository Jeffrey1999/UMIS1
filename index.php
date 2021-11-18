<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <!-- <script src="../../dist/js/adminlte.min.js"></script> -->

<script src="plugins/sweetalert/sweetalert.js"></script>

<?php

include_once 'connectdb.php';
session_start();

if (isset($_POST['btn_login'])){
  $useremail=$_POST['txt_email'];
  $password=$_POST['txt_password'];

  //echo $useremail." - ".$password;
  $select= $pdo->prepare("select * from tbl_user where useremail='$useremail' AND password='$password'");
  $select->execute();
  $row=$select->fetch(PDO::FETCH_ASSOC);


  

  if($row['useremail']==$useremail AND 
  $row['password']==$password AND  $row['role']=="Admin"){


    $_SESSION['userid']=$row['userid'];
    $_SESSION['username']=$row['username'];
    $_SESSION['useremail']=$row['useremail'];
    $_SESSION['role']=$row['role'];


    //echo $success='login Successful';
    echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "WELCOME!'.$_SESSION['username'].'",
        text: "Details Matched!",
        icon: "success",
        button: "Loading...",
      });



    });
    </script>';
    header('refresh:3;dashboard.php');

  }
  else if($row['useremail']==$useremail AND 
  $row['password']==$password AND  $row['role']=="user"){


    $_SESSION['userid']=$row['userid'];
    $_SESSION['username']=$row['username'];
    $_SESSION['useremail']=$row['useremail'];
    $_SESSION['role']=$row['role'];

    //echo $success='login Successful';
    echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Good job!'.$_SESSION['username'].'",
        text: "Details Matched!",
        icon: "success",
        button: "Loading...",
      });



    });
    </script>';
    header('refresh:3;user.php');

  }
  else{
    //echo 'login Failed';
    echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Error",
        text: "Login Failed!",
        icon: "error",
        button: "OK...",
      });



    });
    </script>';
  }


}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  </head>

  <body class="hold-transition login-page">
  <style>
      body {

      background-image: url('images/uenrs.jpg');
      background-position: center;
  background-repeat:no-repeat;
  background-size: cover;
  background-position: center;
      }
    </style>
  <div class="login-logo">
        <!-- <b>UENR ESTATE</b>-MANAGEMENT SYSTEM  -->
      </div>
    <div class="login-box">
      
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <!-- <p class="login-box-msg">Sign in to start your session</p> -->
          <p class="login-box-msg"> <b>UENR ESTATE</b>-MANAGEMENT SYSTEM </p>
          <form action="" method="post">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="txt_email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="txt_password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
              <p class="mb-1">
              <a href="#" onclick="swal('To get Password','Please Contact Admin OR service Provider','error')";>I forgot my password</a>
          </p>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block" name="btn_login">log In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          
         
          
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
    
  </body>

</html>





