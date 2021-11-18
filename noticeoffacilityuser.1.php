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
    

<section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>NOTICE OF FACILTY </b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          
            <form action="" method="post" name="form Product">
<div class="row">
                <div class="col-6 col-md-6"> <div class="form-group">
                  
                  <label>Applicant</label>
                  <input type="text" class="form-control" name="txtassetname"  placeholder=" <?php echo $_SESSION['username'];?>" disabled >
                  
                </div>
                <div class="form-group">
                  <label>Facility</label>
                  <select class="form-control" name="txtoffice"required>
                  <option value="" disabled selected>Select Facilty</option>
                  <option value="" >Finance Office</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Date of use</label>
                  <select class="form-control" name="txtcampus"required>
                  <option value="" disabled selected>Select Campus</option>
                    <option>Dormaa</option>
                    <option>Kenyasi</option>
                    
                  </select>
                </div>
                  <div class="form-group">
                  <label>Period</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtcost" placeholder="Enter ...." required>
                </div>

                
                <div class="form-group">
                  <label>Payment Type</label>
                  <select class="form-control" name="txtcampus"required>
                  <option value="" disabled selected>Select Campus</option>
                    <option>cash</option>
                    <option>Mobile Money</option>
                    <option>Vodafone Cash</option>

                    
                  </select>
                </div>
                <div class="form-group">
                  <label>Amount(GHS)</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtvalue" placeholder="Enter ...." required>
                </div>

                </div>
                <div class="col-6 col-md-6">
                  <div class="form-group">
                  <label>Approved By</label>
                  <input type="text" class="form-control" name="txtserialnumber"  placeholder="Enter Name"required>
                </div>
              <div class="form-group">
                  <label>Approval Date</label>
                  <input type="number" min="2000" step="1" class="form-control" name="txtyearacquired" placeholder="Enter ...." required>
                </div>
                <div class="form-group">
                  <label>Condition</label>
                  <input type="text" class="form-control" name="txtcode"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Secuirity Officer</label>
                  <input type="text" class="form-control" name="txtcode"  placeholder="Enter Officer name"required>
                </div>
                <div class="form-group">
                  <label>Comment</label>
                  <textarea class="form-control"  name="txtremarks" placeholder="Enter ...." rows="3"></textarea>
                </div>
                <div class="col-6 col-md-5">
                <div class="form-group">
                  <label>Approval Date</label>
                  <input type="number" min="2000" step="1" class="form-control" name="txtyearacquired" placeholder="Enter ...." required>
                </div>
                
</div>

 </div>
         
              <div class="box-footer">
              
              <button type="submit" class="btn btn-info"name="btnaddasset">Submit</button>
                </div>
            </form>
          </div><!-- /.card-body -->
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

 
