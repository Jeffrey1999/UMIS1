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

        <div class="card card-info card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>OFF CAMPUS COMMUTATION ALLOWANCE FORM</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          
            <form action="" method="post" name="form Product">
<div class="row">
                <div class="col-6 col-md-6"> <div class="form-group">
                  <label>Name Of Applicant</label>
                  <input type="text" class="form-control" name="txtname"  placeholder="Enter Name of inspector"required>
                </div>
                
                <!-- <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="txttitleofi"  placeholder="Title of Inspection"required>
                </div> -->
                <div class="form-group">
                  <label>Introduction</label>
                  <input type="text" class="form-control" name="txtintroduction"  placeholder="Enter Intro  "required>
                </div>
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" name="txtaddress"  placeholder="example. Fiapre"required>
                </div>
                <!-- <div class="form-group">
                  <label>Date of Inspection</label>
                  <input type="text" class="form-control" name="txtdate"  placeholder="Date of Inspection"required>
                </div>
                <div class="form-group">
                  <label>Purpose Of Inspection</label>
                  <input type="text" class="form-control" name="txtpurpose"  placeholder="Enter Purpose of Inspection..."required>
                </div>
                
                <div class="form-group">
                  <label>Locaion Of Inspection</label>
                  <input type="text" class="form-control" name="txtlocation"  placeholder="Enter location of Inspection..."required>
                </div> -->
                <div class="form-group">
                  <label> Description</label>
                  <textarea class="form-control"  name="txtdescription" placeholder="Enter description of property" rows="3"></textarea>
                </div> </div>


                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="txtaddress"  placeholder="egs. Plot 64 Blk D"required>
                </div>
                
                
                  <div class="form-group">
                  <label>Total Floor Area (m)</label>
                  <input type="text" class="form-control" name="txttotalfloor"  placeholder="Enter Name"required>
                </div>
              <div class="form-group">
                  <label>Distance From Campus(km)</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtdistance" placeholder="Enter distance" required>
                </div>
                <div class="form-group">
                  <label>Rent Per month(GH₵)</label>
                  <input type="text" class="form-control" name="txtrentpermonth"  placeholder="Enter Rent"required>
                </div>
                <div class="form-group">
                  <label>Rent Per Annum (GH₵)</label>
                  <input type="text" class="form-control" name="txtrentperannum"  placeholder="Enter Rent"required>
                </div>
                
                <!-- <div class="form-group">
                  <label>Recommendation</label>
                  <textarea class="form-control"  name="txtrecommendation" placeholder="Enter ...." rows="4"></textarea>
                </div> -->
               
                <!-- <div class="form-group">
                  <label>Approval Date</label>
                  <input type="text" class="form-control" name="txtapprovaldate"  placeholder="Enter approval Date..."required>
                </div> -->
 </div>
          
              </div>
              <div class="box-footer">
              
              <button type="submit" class="btn btn-info"name="btnaddasset">Apply</button>
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

 
