<?php
include 'connectdb.php';


session_start();
$active = 'complaint';

if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';

if (isset($_POST['btnsubmit'])){
  

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"pos_db");

mysqli_query($link,"insert into tbl_complaint values('','$_POST[txtname]','$_POST[txtcontact]','$_POST[txtbuilding]','$_POST[txttypeofcomplaint]',
'$_POST[txtlocation]','$_POST[txtcomments]','$_POST[txtinspectioncomments]','$_POST[txtinspectiondate]','$_POST[txtapprovedby]','$_POST[approvaldate]','$_POST[txtstatus]',NOW())");

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
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    


<section class="content">
      <div class="container-fluid">

      <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="card dr-pro-pic">

        <div class="card card-warning card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>COMPLAINT LIST</b> <small> UENR ESTATE MANAGEMENT</small></h2>
            <section class="content-header">
  
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
    <li class="breadcrumb-item active">Complaint</li>
</ol>       
</section>
          </div> <!-- /.card-body -->
          <div class="card-body">
          <div class="box-header with-border">
              <h3 class="box-title"><a href="complaintlist.php" class="btn btn-success" role="button">Back to List
              </a></h3>
            </div>
            <form action="" method="post" name="formProduct">
              <div class="row">
                <div class="col-6 col-md-6"> 
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="txtname"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Contact</label>
                  <input type="number" class="form-control" name="txtcontact"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Building</label>
                  <select class="form-control" name="txtbuilding"required>
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
                  <label>Type Of Complaint</label>
                  <input type="text" class="form-control" name="txttypeofcomplaint"  placeholder="Enter Name">
               
</div>
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" name="txtlocation"  placeholder="Enter Name">
               
</div>
                  
<div class="form-group">
                  <label>Comments</label>
                  <textarea class="form-control"  name="txtcomments" placeholder="Enter ...." rows="3"></textarea>
                </div>
                 </div>
                <div class="col-6 col-md-6">

                <div class="form-group">
                  <label>Inspection Comments</label>
                  <input type="text" class="form-control" name="txtinspectioncomments"  placeholder="Enter Name"required>
                </div>

                <div class="form-group">
                  <label>Inspection Date </label>
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
                  <input type="text" class="form-control" name="txtapprovedby"  placeholder="Enter Name"required>
                </div>
             
                  <!-- <input type="number" min="2000" step="1" class="form-control" name="txtapprovaldate" placeholder="Enter ...." required>
                </div> 
                 -->
                 <div class="form-group">
                  <label> Approval Date </label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="approvaldate" type="date" id="myID" placeholder="select date">
                      </div>
</div>

                
<div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="txtstatus"required>
                  <option value="" disabled selected>Select Role</option>
                    <option>Approved</option>
                    <option>Not-Approved</option>
                    
                    
                  </select>
                </div>
            </div>

 </div>
          
              </div>
              <div class="box-footer">
              
              <button type="submit" class="btn btn-success" name="btnsubmit">Submit</button>
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
flatpickr("#myID", {});
</script>

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

 
