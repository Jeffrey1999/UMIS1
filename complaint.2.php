<?php
include 'connectdb.php';
session_start();
if($_SESSION['useremail']==""){

  header('location:index.php');
}

include_once 'include/header.php';

if (isset($_POST['btnsubmit1'])){
  

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"pos_db");
mysqli_query($link,"insert into tbl_complaint values('','$_POST[txtname]','$_POST[txtcontact]','$_POST[txtdepartment]','$_POST[txtcomplaint]',
'$_POST[txtlocation]','$_POST[txtinspectioncomments]','$_POST[txtdateofinspection]','$_POST[txtapprovedby]','$_POST[txtdateofapproval]')");

echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Application",
        text: "submitted Successfully!",
        icon: "success",
        button: "OK...",
      });



    });
    </script>';
    

 }



?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    
<br>

<section class="content">
      <div class="container-fluid">

      <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="card dr-pro-pic">

        <div class="card card-warning card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>COMPLAINT</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          
            <form action="" method="post" name="complaintform">
<div class="row">
                <div class="col-6 col-md-6"> 
                  <div class="form-group">
                  <label>Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-user"></i>
                          </span>
                        </div>
                  <input type="text" class="form-control" name="txtname"  placeholder="Enter Name"required> </div>
                </div>

                <div class="form-group">
                  <label>Contact</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </span>
                          
                        </div>
                  <input type="text" class="form-control" name="txtcontact" maxlength="10"  required/> 
                  
                </div></div>
                
                <div class="form-group">
                  <label>Building</label>
                  <select class="form-control" name="txtdepartment"required>
                  <option value="" disabled selected>Select Building</option>
                  <?php
                   $select=$pdo->prepare("select * from tbl_department order by dept_id desc");
                   $select->execute();
                   while($row=$select->fetch(PDO::FETCH_ASSOC)){
                   extract($row)
                   ?>
                   <option> <?php echo $row['dept_name'];?></option>
                   <?php
                           }
                   ?>
                    
                  </select>
                </div>

                <div class="form-group">
                  <label>Type of Complaint</label>
                  <select class="form-control" name="txtcomplaint" required>
                <option value="" disabled selected>Select type of complaint</option>
                  <?php
                   $select=$pdo->prepare("select * from tbl_typeofcomplaint order by typeofcomplaint_id desc");
                   $select->execute();
                   while($row=$select->fetch(PDO::FETCH_ASSOC)){
                   extract($row)
                   ?>
                   <option> <?php echo $row['typeofcomplaint_name'];?></option>
                   <?php
                           }
                   ?>
                    
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Location</label>
                  <input type="text"  class="form-control" name="txtlocation" placeholder="Enter ...." required>
                </div>
               </div>
                <div class="col-6 col-md-6">
                  <div class="form-group">
                  <label>Inspection Officer's Comments</label>
                  <textarea class="form-control"  name="txtinspectioncomments" placeholder="Enter ...." rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Date of Inspection</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtdateofinspection" type="date" id="myID" placeholder="select date">
                      </div>
               
               </div>
                <div class="form-group">
                  <label>Approved by Estate Officer</label>
                  <textarea class="form-control"  name="txtapprovedby" placeholder="Enter ...." rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label> Date of Approval</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtdateofapproval" type="date" id="myID" placeholder="select date">
                      </div>
               
               </div>
          
              </div>
              <div class="box-footer">
              
              <button type="submit" class="btn btn-danger"name="btnsubmit1">Make a Complain</button>
                </div>
            </form>
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
      </section>

<!-- Main content -->
<!-- /.content -->
</div>
  <script>
  $(document).ready( function (){
    $('#assettable').DataTable();
    
  });

  
flatpickr("#myID", {});
</script>
  
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

 
