<?php
include_once 'connectdb.php';

session_start();
if($_SESSION['useremail']==""){
  header('location:index.php');
}
include_once 'include/header.php';


//when we click on update button we get out values from user into variables
if (isset($_POST['btnupdate'])){
    $oldpassword_txt=$_POST['txtoldpass'];
    $newpassword_txt=$_POST['txtnewpass'];
    $confpassword_txt=$_POST["txtconfpass"];

    //echo $oldpassword_txt. "-" .$newpassword_txt."-".$confpassword_txt;

//using select query to get our database record according to useremail
$email=$_SESSION['useremail'];
$select=$pdo->prepare("select * from tbl_user where useremail='$email'");
$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

//echo $row['useremail'];
//echo $row['username'];
$usernemail_db =$row['useremail'];
$password_db=$row['password'];


//we compare userinput and database values
if($oldpassword_txt==$password_db){
//echo'Password Matched';
if($newpassword_txt==$confpassword_txt){
    $update =$pdo->prepare("update tbl_user set password=:pass where useremail=:email");
    $update->bindParam(':pass',$confpassword_txt);
    $update->bindParam(':email',$email);

    if($update->execute()){
        //echo'password Updated';
        echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Good Job!",
        text: "Passwod successfully Updated ",
        icon: "success",
        button: "OK",
      });



    });
</script>';
    }
    else{
        //echo'password is not Updated';
        echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Error!!",
        text: "Query Failed ",
        icon: "error",
        button: "OK",
      });



    });
    </script>';

    }
    //echo'New and Confirmed Password Matched';
}
else{ 
    //echo'New and Confirmed Password does not match';
    echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Oops!",
        text: "Your New Password and Confirmed Password does not match",
        icon: "warning",
        button: "OK",
      });



    });
    </script>';

}
}
else{
    //echo'Password do not Match';
    echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Warning!!",
        text: "Your Password is wrong, Please Enter Right Password ",
        icon: "warning",
        button: "OK",
      });



    });
    </script>';

}

}
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">CHANGE PASSSWORD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post">
                <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Old Password</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password"name="txtoldpass">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"name="txtnewpass">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"name="txtconfpass">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary"name="btnupdate">update</button>
              </div>
              </form>
            </div>
           
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include 'include/footer.php';
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

 
