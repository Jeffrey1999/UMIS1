<?php
$active = 'registration';
include_once 'connectdb.php';
session_start();

if($_SESSION['useremail']==""OR $_SESSION['role']=="user"){
    header('location:index.php');
  }
include_once 'include/header.php';
 


error_reporting(0);
$id=$_GET['id'];
$delete=$pdo->prepare("delete from tbl_user where userid=".$id);
if($delete->execute()){

    echo'<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Good Job!",
        text: "Account is deleted Now ",
        icon: "success",
        button: "OK",
      });
    });
</script>';
}


if (isset($_POST['btnsave'])){

$username=$_POST['txtname'];
$useremail=$_POST['txtemail'];
$password=$_POST['txtpassword'];
$userrole=$_POST['txtselect_option'];

//echo $username."-".$useremail."-".$password."-".$userrole;

if(isset($_POST['txtemail'])){

$select=$pdo->prepare("select useremail from tbl_user where useremail='$useremail'");
$select->execute();

if($select->rowCount() > 0){
    //echo 'Email-----Email already Exists';
    echo'<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Warning!",
        text: "Email already exist; Please use a diferent Email",
        icon: "warning",
        button: "OK",
      });
    });
</script>';
}
else{
    $insert=$pdo->prepare("insert into tbl_user(username,useremail,password,role) values (:name,:email,:pass,:role)");
    $insert->bindParam(':name',$username);
    $insert->bindParam(':email',$useremail);
    $insert->bindParam(':pass',$password);
    $insert->bindParam(':role',$userrole);
    
    
    if( $insert->execute()){
     //echo'registration successful';
     echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Good Job!",
        text: " Your Registration is successful",
        icon: "success",
        button: "OK",
      });



    });
</script>';
    }
    else{
   // echo'registration Failed';
   echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Error!",
        text: "Registration Failed!!!",
        icon: "error",
        button: "OK",
      });



    });
</script>';
    } 

}
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
            <h1 class="m-0">REGISTRATION FORM</h1>
            <section class="content-header">
  
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
    <li class="breadcrumb-item active">Complaint-list</li>
</ol>       
</section>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>
    
    <!-- Main content -->
    <div class="content">
      
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-4">
          <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">REGISTRATION</h3>

                  </div>
                  <!-- /.card-header -->
                  
                  <!-- form start -->
                  <form role="form" action="" method="post">
                    <div class="card-body">
                      <div class="form-group">
                      <label>Name</label>
                  <input type="text" class="form-control" name="txtname"  placeholder="Enter Name"required>
                </div>
                  
                  <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" name="txtemail" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="txtpassword" placeholder="Password"required>
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="txtselect_option"required>
                  <option value="" disabled selected>Select Role</option>
                    <option>Admin</option>
                    <option>user</option>
                    
                    
                  </select>
                </div>
                <button type="submit" class="btn btn-info"name="btnsave">Save</button>
                    </div>
                  
      
              
                </div>
                </div>

                <div class="col-md-8"> 
                  
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>NAME</th>
                              <th>EMAIL</th>
                              <th>PASSWORD</th>
                              <th>ROLE</th>
                              <th>DELETE</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $select=$pdo->prepare("select * from tbl_user order by userid desc");
                          $select->execute();
                          while ($row=$select->fetch(PDO::FETCH_OBJ)){
                              echo '
                              <tr>
                              <td>'.$row->userid.'</td>
                              <td>'.$row->username.'</td>
                              <td>'.$row->useremail.'</td>
                              <td>'.$row->password.'</td>
                              <td>'.$row->role.'</td>
                              <td>
                              <a href="registration.php?id='.$row->userid.'" class="btn btn-danger" role="button"><span class="fas fa-trash-alt" title="delete"></span></a>
                              </td>
                              
                              </tr>

                              ';
                          }
                          
                          ?>
                      </tbody>
               </table>
               </div> 

               
          </div>
          <!-- /.col-md-8 -->
        </div>
        </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <?php
include 'include/footer.php';
  ?>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->

 
