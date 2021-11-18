<?php
include 'connectdb.php';
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

</br>
</br>
    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="card dr-pro-pic">
 
<section class="content">
      <div class="container-fluid">
        <div class="card card-warning card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>PRODUCT</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->


          
          <div class="card-body">
          <div class="box-header with-border">
              <h3 class="box-title"><a href="landlist.php" class="btn btn-warning" role="button">Back to Product List
              </a></h3>
            </div>
            <form action="" method="post" name="formProduct">
              <div class="row">
                <div class="col-6 col-md-6"> <div class="form-group">
                  <label>Product</label>
                  <input type="text" class="form-control" name="txtlandloc"  placeholder="Enter Name"required>
                </div>
                <div class="form-group"> 
                  <label>Category</label>
                  <select class="form-control" name="txtplotnumber"required>
                  <option value="" disabled selected>Select Category</option>
                  <option>District</option>
                    <option>Finance Office</option>
                    <option>SRC office</option>
                    <option>SRC office</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Purchase Price</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtassetcondition"  placeholder="Enter "required>
                </div>
                <div class="form-group">
                  <label>Sales Price</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtassetcondition"  placeholder="Enter "required>
                </div>

               
                
                
                 </div>
                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>Stock</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtvalue" placeholder="Enter ...." required>
                </div>
                
                <div class="form-group">
                  <label>Comment</label>
                  <textarea class="form-control"  name="txtassetdescription" placeholder="Enter ...." rows="3"></textarea>
                </div>
               
                
 </div>

              </div>
              <div class="box-footer">
              
              <button type="submit" class="btn btn-warning"name="btnaddland">Add Product</button>
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

 
