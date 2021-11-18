<?php
session_start();
include 'connectdb.php';


$active = 'addbuilding';
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';

if (isset($_POST['btnaddasset'])){

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"pos_db");
mysqli_query($link,"insert into tbl_asset values('','$_POST[txtassetname]','$_POST[txtoffice]','$_POST[txtcampus]','$_POST[txtcost]',
'$_POST[txtvalue]','$_POST[txtassetcondition]','$_POST[txtserialnumber]','$_POST[txtyearacquired]','$_POST[txtcode]','$_POST[txtassetdescription]','$_POST[txtremarks]')");


}


?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    


<section class="content">
      <div class="container-fluid">

      <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="card dr-pro-pic">

        <div class="card card-warning card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>BUILDING FORM</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          <div class="box-header with-border">
              <h3 class="box-title"><a href="buildinglist.php" class="btn btn-info" role="button">Back to Building List
              </a></h3>
            </div>
            <form action="" method="post" name="formProduct">
              <div class="row">
                <div class="col-6 col-md-6">
                 <div class="form-group">
                  <label>Building Name</label>
                  <input type="text" class="form-control" name="txtbname"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" name="txtlocaion"  placeholder="Enter Location"required>
                </div>
                
                <div class="col-6 col-md-5">
                <div class="form-group">
                  <label>Total Floor Area</label>
                  <input type="number" min="1" step="1" class="form-control" name="txttotalfloorarea" placeholder="Enter ...." required>
                </div>
                 
                  <div class="form-group">
                  <label>Number of Occupants</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtnumberofoccupants" placeholder="Enter ...." required>
                </div>
               
                </div>
                <div class="form-group">
                  <label>Space Utilization (metres square)</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtspaceutilization" placeholder="Enter ...." required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control"  name="txtdescription" placeholder="Enter ...." rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Year of Construction</label>
                  <input type="text" class="form-control" name="txtyearofconstruction"  placeholder="Enter Name"required>
                </div></div>
                <div class="col-6 col-md-6">
                
              <div class="form-group">
                  <label>Name  of Contractor</label>
                  <input type="text" class="form-control" class="form-control" name="txtnameofcontractor" placeholder="Enter ...." required>
                </div>
                <div class="form-group">
                  <label>Market Value (GHS)</label>
                  <input type="number" min="2000" step="1" class="form-control" name="txtmarketvalue"  placeholder="Enter Name"required>
                  
                </div>
                

                <div class="form-group">
                      <label>Validation Date (from) to (to):</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation" name="txtvalidationdate">
                      </div>
</div>
<div class="form-group">
                      <label>Validation Date (from) to (to):</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation1" name="txtvalidationdate">
                      </div>
</div>
<!-- 
                <div class="form-group">
                  <label>Repairs & Maintenance</label>
                  <textarea class="form-control"  name="txtrepairsandmaintenance" placeholder="Enter ...." rows="3"></textarea>
                </div>
                <div class="form-group">
                      <label> Date of Repair</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" type="date" id="myID" placeholder="select date">
                      </div>
               
               </div>>
                <div class="form-group">
                  <label>Nature of Repair</label>
                  <textarea class="form-control"  name="txtnatureofrepair" placeholder="Enter ...." rows="1"></textarea>
                </div>
                <div class="form-group">
                  <label>Cost of Repair</label>
                  <textarea class="form-control"  name="txtcostofrepair" placeholder="Enter ...." rows="1"></textarea>
                </div>
 </div> -->
          
              </div>
              <div class="box-footer">
              
              <button type="submit" class="btn btn-info"name="btnaddbuilding">Add Building</button>
                </div>
            </form>
            <form>
                </div>
            

            
</div>
</div>

          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
</div>
    
<script> 
$(".yearpicker").yearpicker({
  onChange : function(value){
    // YOUR CODE COMES_HERE
  }
});
</script>

  
  <script>
  $(document).ready( function (){
    $('#assettable').DataTable();
    
  });
  </script>



  <script>
//Date range picker
        $('#reservation1').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 10,
          locale: {
            format: 'MM/DD/YYYY hh:mm A'
          }
        })
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

 
