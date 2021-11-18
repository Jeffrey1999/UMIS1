<?php
include 'connectdb.php';
session_start();
$active = 'offcampusallowance';
if($_SESSION['useremail']==""){

  header('location:index.php');
}

include_once 'include/header.php';

if (isset($_POST['btnsubmit'])){
  

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"pos_db");
mysqli_query($link,"insert into tbl_offcampus values('','$_POST[txtname]','$_POST[txttitleofinspection]','$_POST[txtintroduction]','$_POST[txtdate]',
'$_POST[txtpurpose]','$_POST[txtlocation]','$_POST[txtdescription]','$_POST[txttotalfloor]','$_POST[txtdistance]','$_POST[txtrentpermonth]','$_POST[txtrentperannum]','$_POST[txtrecommendation]','$_POST[txtaddress]','$_POST[txtdate]')");

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
    

<section class="content">
      <div class="container-fluid">
        <div class="card card-info card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>OFF CAMPUS COMMUTATION ALLOWANCE FORM</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          
            <form action="" method="post" name="form Product">
<div class="row">
                <div class="col-6 col-md-6"> <div class="form-group">
                  <label>Name Of Inspector</label>
                  <input type="text" class="form-control" name="txtname"  placeholder="Enter Name of inspector"required>
                </div>
                
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="txttitleofinspection"  placeholder="Eg: Inspection of Residence"required>
                </div>
                <div class="form-group">
                  <label>Introduction</label>
                  <input type="text" class="form-control" name="txtintroduction"  placeholder="Eg: Inspection of Residence to determine off-campus commutation allowance"required>
                </div>

                <div class="form-group">
                  <label>Date of Inspection</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtdate" type="date" id="myID" placeholder="select date">
                      </div>
               
               </div>
                <div class="form-group">
                  <label>Purpose Of Inspection</label>
                  <input type="text" class="form-control" name="txtpurpose"  placeholder="Eg: To determine distance from campus"required>
                </div>
                
                <div class="form-group">
                  <label>Location Of Inspection</label>
                  <input type="text" class="form-control" name="txtlocation"  placeholder="Enter location of Inspection..Eg: Abesim-Dominase"required>
                </div>
                <div class="form-group">
                  <label> Description</label>
                  <textarea class="form-control"  name="txtdescription" placeholder="Enter description, Eg: Inspection of Residence" rows="3"></textarea>
                </div> 
              </div>


                <div class="col-6 col-md-6">
                  <div class="form-group">
                  <label>Total Floor Area</label>
                  <input type="number" class="form-control" name="txttotalfloor"  placeholder="Enter Total floor area..."required>
                </div>
              <div class="form-group">
                  <label>Distance From Campus(km)</label>
                  <input type="number"  class="form-control" name="txtdistance" placeholder="Enter distance from campus" required>
                </div>
                <div class="form-group">
                  <label>Rent Per month(GHS)</label>
                  <input type="number" class="form-control" name="txtrentpermonth"  placeholder="Enter Rent per month..."required>
                </div>
                <div class="form-group">
                  <label>Rent Per Annum(GHS)</label>
                  <input type="number" class="form-control" name="txtrentperannum"  placeholder="Enter Rent per year..."required>
                </div>
                
                <div class="form-group">
                  <label>Recommendation</label>
                  <textarea class="form-control"  name="txtrecommendation" placeholder="Enter ...." rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="txtaddress"  placeholder="Enter Address"required>
                </div>
                <div class="form-group">
                  <label>Approval Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtdate" type="date" id="myID" placeholder="select date">
                      </div>
               
               </div>
          
              </div>
              <div class="box-footer">
              
              <button type="submit" class="btn btn-info"name="btnsubmit">Submit</button>
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

 
