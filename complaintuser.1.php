<?php
include 'connectdb.php';
session_start();
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/headeruser.php';





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
            <h2 class="card-title"> <b>COMPLAINT FORM</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          
            <form action="" method="post" name="form Product">
<div class="row">
                <div class="col-6 col-md-6"> <div class="form-group">
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
</diV>
                <div class="form-group">
                  <label>Contact</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </span>
                          
                        </div>
                  <input type="number" class="form-control" name="txtcontact" maxlength="10"  required/> 
                  
                </div></div>
                <!-- <div class="form-group">
                  <label>Department</label>
                  <select class="form-control" name="txtcampus"required>
                  <option value="" disabled selected>Select Campus</option>
                    <option>Department of Computer Science and Informatics</option>
                    <option>Kenyasi</option>
                    
                  </select>
                </div> -->
                <div class="form-group">
                  <label>Building</label>
                  <select class="form-control" name="txtbuilding"required>
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
                  <select class="form-control" name="txtcampus"required>
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
                  <input type="text"  class="form-control" name="txtvalue" placeholder="Enter ...." required>
                </div>
                 </div>
                <div class="col-6 col-md-6">
                  <div class="form-group">
                  <label> Comments</label>
                  <textarea class="form-control"  name="txtcomments" placeholder="Please Specify exact fault here.... " rows="11"></textarea>
                </div>
              <!-- <div class="form-group">
                  <label>Date of Inspection</label>
                  <input type="number" min="2000" step="1" class="form-control" name="txtyearacquired" placeholder="Enter ...." required>
                </div>
                <div class="form-group">
                  <label>Approved by Estate Officer</label>
                  <textarea class="form-control"  name="txtremarks" placeholder="Enter ...." rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Date of Approval</label>
                  <input type="number" min="2000" step="1" class="form-control" name="txtyearacquired" placeholder="Enter ...." required>
                </div>
               
 </div>
           -->
              </div>
              
            </form>
          </div><!-- /.card-body -->
          <div class="box-footer">
              <div class="text-center">
              
              <button type="submit" class="btn btn-info"name="btnaddasset">Submit</button>
                </div>
                </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="box box-warning">
            
            <!-- /.box-header -->
            <!-- form start -->
            
            <div class="box-body">
              
              </div>
</div>
                      
</section>
    <!-- /.content -->
  </div>
  <script>
  $(document).ready( function (){
    $('#assettable').DataTable();
    
  });
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

 
