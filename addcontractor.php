<?php
include 'connectdb.php';
$active = 'addcontractor';
session_start();
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';

if (isset($_POST['btnaddland'])){

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"pos_db");
mysqli_query($link,"insert into tbl_land values('','$_POST[txtassetname]','$_POST[txtoffice]','$_POST[txtcampus]','$_POST[txtcost]',
'$_POST[txtvalue]','$_POST[txtassetcondition]','$_POST[txtserialnumber]','$_POST[txtyearacquired]','$_POST[txtcode]','$_POST[txtassetdescription]','$_POST[txtremarks]')");


}

?>
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

<section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b> REGISTER NEW CONTRACTOR</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          <div class="box-header with-border">
              <h3 class="box-title"><a href="contractor2.php" class="btn btn-info" role="button">Back to Contractor List
              </a></h3>
            </div>
            <form action="" method="post" name="formProduct">
              <div class="row">
                <div class="col-6 col-md-6"> <div class="form-group">
                  <label>Contractor's name</label>
                  <input type="text" class="form-control" name="txtlandloc"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Contact</label>
                  <input type="number"   class="form-control" name="txtcontact" placeholder="Enter ...." required>
                  
                </div>
                <div class="form-group">
                  <label>Address </label>
                  <input type="text" class="form-control" name="txtassetcondition"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Company's Name</label>
                  <input type="text"   class="form-control" name="txtcontact" placeholder="Enter ...." required>
              
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control"  name="txtassetdescription" placeholder="Enter ...." >
                </div>
                
                 </div>
                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>Private/Company</label>
                  <select class="form-control" name="txtcompany"required>
                  <option value="" disabled selected>Select ...</option>
                    <option>Private</option>
                    <option>Government</option>
                    
                    

                  </select>
                </div>
                <div class="form-group">
                  <label>Rent</label>
                  <input type="text" class="form-control" name="txtassetcondition"  placeholder="Enter ..."required>
                </div>
                  <div class="form-group">
                  <label>Cost</label>
                  <input type="text" class="form-control" name="txtserialnumber"  placeholder="Enter ..."required>
                </div>
              <div class="form-group">
                  <label>Market Value</label>
                  <input type="number" min="2000" step="1" class="form-control" name="txtyearacquired" placeholder="Enter ...." required>
                </div>
                <div class="form-group">
                  <label>Validation Period(Years)</label>
                  <input type="number" class="form-control" name="txtcode"  placeholder="Valid for..."required>
                </div>
               
                
 </div>
          
              </div>
              <div class="box-footer">
              
              <button type="submit" class="btn btn-info"name="btnaddland">Submit</button>
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

 
