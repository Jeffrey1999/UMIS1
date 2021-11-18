<?php
include 'connectdb.php';
session_start();
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';

if (isset($_POST['btnapply'])){
  

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"pos_db");
mysqli_query($link,"insert into tbl_approval values('','$_POST[txtapplicant]','$_POST[txtcontact]','$_POST[txtfacility]','$_POST[txtstartdate]',
'$_POST[txtenddate]','$_POST[txtcomment]')");

echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Asset",
        text: "Added Successfully!",
        icon: "success",
        button: "OK..",
      });



    });
    </script>';
}

?>

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

        <div class="card card-success card-outline">
          <div class="card-header">


            <h2 class="card-title"> <b>NOTICE OF FACILTY </b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          
            <form action="" method="post" name="form Product">
<div class="row">
                <div class="col-6 col-md-6"> <div class="form-group">
                  
                  <label>Applicant</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-user"></i>
                          </span>
                        </div>
                  <input type="text" class="form-control" name="txtapplicant"   >
                  </div>
                </div>
                <div class="form-group">
             
                        
             <label>Contact</label>
             <div class="input-group">
                   <div class="input-group-prepend">
                     <span class="input-group-text">
                       <i class="fas fa-phone"></i>
                     </span>
                   </div>
             <input type="number" class="form-control" name="txtcontact"  placeholder="Enter contact"required> </div>
           </div>
           
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Facility</label>
                  <select class="form-control" name="txtfacility"required>
                  <option value="" disabled selected>Select Facility</option>
                   <?php
                   $select=$pdo->prepare("select * from tbl_facility order by id desc");
                   $select->execute();
                   while($row=$select->fetch(PDO::FETCH_ASSOC)){
                   extract($row)
                   ?>
                   <option> <?php echo $row['facility'];?></option>
                   <?php
                           }
                   ?>
                    
                  </select>
                </div>
                <!-- <div class="form-group">
                  <label>Date of use</label>
                  <select class="form-control" name="txtcampus"required>
                  <option value="" disabled selected>Select Campus</option>
                    <option>Dormaa</option>
                    <option>Kenyasi</option>
                    
                  </select>
                </div> -->
                  
                <div class="form-group">
                      <label> Start Date (Date of Commencement)</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtstartdate" type="date" id="myID" placeholder="select date">
                      </div>
                      <div class="form-group">
                      <label> End Date</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtenddate" type="date" id="myID" placeholder="select date">
                      </div>
               
               </div>
               </div>
                
                <!-- <div class="form-group">
                  <label>Payment Type</label>
                  <select class="form-control" name="txtcampus"required>
                  <option value="" disabled selected>Select Campus</option>
                    <option>cash</option>
                    <option>Mobile Money</option>
                    <option>Vodafone Cash</option>

                    
                  </select>
                </div> -->
                <!-- <div class="form-group">
                  <label>Amount(GHS)</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtvalue" placeholder="Enter ...." required>
                </div> -->

                </div>
                <div class="col-6 col-md-6">
               
                  <!-- <div class="form-group">
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
                </div> -->
                <div class="form-group">
                  <label>Comment</label>
                  <textarea class="form-control"  name="txtcomment" placeholder="Enter ...." rows="10"></textarea>
                </div>
                <div class="col-6 col-md-5">
                
                
</div>

 </div>
         
              <div class="box-footer">
              
              <button type="submit" class="btn btn-info"name="btnapply">Apply</button>
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

 
