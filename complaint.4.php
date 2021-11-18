<?php

$active = 'complaint';
include 'connectdb.php';
session_start();
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';

if (isset($_POST['btnsubmit'])){
  

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"pos_db");
mysqli_query($link,"insert into tbl_complaint values('','$_POST[txtname]','$_POST[txtcontact]','$_POST[txtbuilding]','$_POST[txtcomplaint]',
'$_POST[txtloc]','$_POST[txtinspectioncomments]','$_POST[txtinspectiondate]','$_POST[txtapproved]','$_POST[txtdateofapproval]','$_POST[txtcomments]')");

echo '<script type="text/javascript">
    jQuery(function validation(){

      swal({
        title: "Application",
        text: "Submitted Successfully!",
        icon: "success",
        button: "OK..",
      });



    });
    </script>';
}

?>
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    

<br>
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
          <div class="box-header with-border">
              <h3 class="box-title"><a href="complaintlist.php" class="btn btn-success" role="button">Back to Complaint list
              </a></h3>
            </div>
            <form action="" method="post" name="formProduct">
              <div class="row">
                <div class="col-6 col-md-6"> 
                <div class="form-group">
                  <label> Name</label>
                  <input type="text" class="form-control" name="txtname"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label> Contact</label>
                  <input type="text" class="form-control" name="txtcontact"  placeholder="Enter Name"required>
                </div>


                <div class="form-group">
                  <label>Building</label>
                  
                  <select class="form-control" name="txtbuilding">
                  <option value="" disabled selected>Select Building</option>
                  <?php
                   $select=$pdo->prepare("select * from tbl_building order by bid desc");
                   $select->execute();
                   while($row=$select->fetch(PDO::FETCH_ASSOC)){
                   extract($row)
                   ?>
                   <option> <?php echo $row['bname'];?></option>
                   <?php
                           }
                   ?>
                    
                  </select>
                </div>
                
                

                <div class="form-group">
                  <label>Type of Complaint</label>
                  <select class="form-control" name="txtcomplaint"required>
                  <option value="" disabled selected>Select complaint type</option>
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
                  <input type="text" class="form-control" name="txtloc"  placeholder="Enter Name"required>
                </div>
                </div>
                
                <div class="col-6 col-md-6">

                <div class="form-group">
                  <label>Inspection Comments</label>
                  <input type="text" class="form-control" name="txtinspectioncomments"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Date Of Inspection</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtinspectiondate" type="date" id="myID" placeholder="select date">
                      </div>
</div>


                <div class="form-group">
                  <label>Approved By Estate Officer</label>
                  <input type="text" class="form-control" name="txtapproved"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Date of Approval</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtdateofapproval" type="date" id="myID" placeholder="select date">
                      </div>
</div>
 
                
<div class="form-group">
                  <label>Comments</label>
                  <textarea type="text" class="form-control" name="txtcomments" rows="3" placeholder="specify complaint here.."></textarea>
                </div>

               
 </div>
          
              </div>
              <div class="box-footer">
              
              <button type="submit" class="btn btn-success"name="btnsubmit">Submit Complaint</button>
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
  $(document).ready(function () {
//your code here
$('.yearpicker').yearpicker({

// Initial Year
year:null,
// Start Year
startYear:null,
// End Year
endYear:null,
// Element tag
itemTag:'li',

// Default CSS classes
selectedClass:'selected',
disabledClass:'disabled',
hideClass:'hide',
});
});



  </script>


  <script>
flatpickr("#myID", {});
</script>

<script>$('.yearpicker').yearpicker({
 
 onShow:null,
 onHide:null,
   onChange:function(value){}

});
});

</script>


  <script>
  $(document).ready( function (){
    $('#assettable').DataTable();
    
  });


  

 
});

  </script>


              <script src="plugins/yearpicker/jquery.min.js"></script>
              <script src="plugins/yearpicker/core.js"></script>
              <link rel="stylesheet" href="plugins/yearpicker/yearpicker.css" />
              <script src="plugins/yearpicker/yearpicker.js"></script>
              
              <script>
                $(document).ready(function () {
                  $(".yearpicker").yearpicker({
                    startYear: new Date().getFullYear() - 10,
                    endYear: new Date().getFullYear() + 10,
                  });
                  $("#example2").yearpicker({
                    startYear: new Date().getFullYear() - 10,
                    endYear: new Date().getFullYear() + 10,
                    onChange: function (value) {
                      $('#OutputContainer').html(value);
                    }
                  });
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

 
