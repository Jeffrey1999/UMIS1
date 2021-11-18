<?php
session_start();
include 'connectdb.php';


$active = 'addland';
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';

if (isset($_POST['btnaddland'])){

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"pos_db");
mysqli_query($link,"insert into tbl_land values('','$_POST[txtlandloc]','$_POST[txtplotnumber]','$_POST[txtdistrict]','$_POST[txtterm]',
'$_POST[txtexpiry]','$_POST[txtrent]','$_POST[txtcost]','$_POST[txtmarket]','$_POST[txtvaldate]')");


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
            <h2 class="card-title"> <b>PROPERTY</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->


          
          <div class="card-body">

          <div class="box-header with-border">
              <h3 class="box-title"><a href="landlist.php" class="btn btn-warning" role="button">Back to Land List
              </a></h3>
            </div>
            <form action="" method="post" name="formProduct">
              <div class="row">
                <div class="col-6 col-md-6"> 
                  <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" name="txtlandloc"  placeholder="Enter Name"required>
                </div>
                
                <div class="form-group">
                  <label>Plot Number</label>
                  <input type="text" class="form-control" name="txtplotnumber"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>District</label>
                  <input type="text" class="form-control" name="txtdistrict"  placeholder="Enter..."required>
                </div>
                
                <div class="form-group">
                  <label>Term</label>
                  <input type="number" class="form-control" name="txtdistrict"  placeholder="Enter..."required>
                </div>
                
                 </div>
                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>Expiry</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtexpiry" type="date" id="myID" placeholder="select date">
                      </div>
                <div class="form-group">
                  <label>Rent</label>
                  <select class="form-control" name="txtcomplaint"required>
                  <option value="" disabled selected>Select complaint type</option>
                  <option value="">Rented</option>
                  <option value="">Bought</option>
                  </select>
                </div>
                  <div class="form-group">
                  <label>Cost</label>
                  <input type="text" class="form-control" name="txtcost"  placeholder="Enter"required>
                </div>
              <div class="form-group">
                  <label>Market Value</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtmarket" placeholder="Enter ...." required>
                </div>
                <div class="form-group">
                  <label>Validation Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtvaldate" type="date" id="myID" placeholder="select date">
                      </div>
                      </div>
               
                
 </div>
          
              </div>

          <hr>
              <div class="text-center">
              
              <button type="submit" class="btn btn-warning"name="btnaddland">Add Land</button>
                </div>
            </form>
     </div>
            

            
</div>
</div>

          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- /.content -->
  </div>

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

<script>
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

 
