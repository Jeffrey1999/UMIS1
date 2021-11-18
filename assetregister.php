<?php
include 'connectdb.php';
session_start();
$active = 'assetregister';
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';





if (isset($_POST['btnaddasset'])){
  

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"pos_db");
mysqli_query($link,"insert into tbl_asset values('','$_POST[txtassetname]','$_POST[txtoffice]','$_POST[txtcampus]','$_POST[txtcost]',
'$_POST[txtvalue]','$_POST[txtassetcondition]','$_POST[txtserialnumber]','$_POST[txtyearacquired]','$_POST[txtcode]','$_POST[txtassetdescription]','$_POST[txtremarks]')");

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
            <h2 class="card-title"> <b>ASSET RESTER</b> <small> UENR ESTATE MANAGEMENT</small></h2>
            <section class="content-header">
  
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
    <li class="breadcrumb-item active">Asset Register</li>
</ol>       
</section>
          </div> <!-- /.card-body -->
          <div class="card-body">
          <div class="box-header with-border">
              <h3 class="box-title"><a href="assetlist.php" class="btn btn-success" role="button">Back to Asset List
              </a></h3>
            </div>
            <form action="" method="post" name="formProduct">
              <div class="row">
                <div class="col-6 col-md-6"> 
                <div class="form-group">
                  <label>Asset Name</label>
                  <input type="text" class="form-control" name="txtassetname"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Office</label>
                  <select class="form-control" name="txtoffice"required>
                  <?php
                   $select=$pdo->prepare("select * from tbl_office order by office_id desc");
                   $select->execute();
                   while($row=$select->fetch(PDO::FETCH_ASSOC)){
                   extract($row)
                   ?>
                   <option> <?php echo $row['office_name'];?></option>
                   <?php
                           }
                   ?>
                    
                  </select>
                </div>
                
                

                <div class="form-group">
                  <label>Campus</label>
                  <select class="form-control" name="txtcampus"required>
                  <option value="" disabled selected>Select Campus</option>
                  <?php
                   $select=$pdo->prepare("select * from tbl_campus order by campusid desc");
                   $select->execute();
                   while($row=$select->fetch(PDO::FETCH_ASSOC)){
                   extract($row)
                   ?>
                   <option> <?php echo $row['campus'];?></option>
                   <?php
                           }
                   ?>
                    
                  </select>
                </div>

                  <div class="form-group">
                  <label>Cost Price(GHS)</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtcost" placeholder="Enter ...." required>
                </div>
                
                <div class="form-group">
                  <label>Value(GHS)</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtvalue" placeholder="Enter ...." required>
                </div>
                <div class="form-group">
                  <label>Condition</label>
                  <input type="text" class="form-control" name="txtassetcondition"  placeholder="Enter Name"required>
                </div> </div>
                <div class="col-6 col-md-6">
                  <div class="form-group">
                  <label>Serial Number</label>
                  <input type="text" class="form-control" name="txtserialnumber"  placeholder="Enter Name"required>
                </div>
             <div class="form-group">
                  <label>Year acquired</label>
                  <input type="number" min="2000" step="1" class="form-control" name="txtyearacquired" placeholder="Enter ...." required>
                </div> 
                


                <div class="form-group">
                  <label>Code</label>
                  <input type="text" class="form-control" name="txtcode"  placeholder="Enter Name"required>
                </div>
                
                
                <div class="form-group">
                  <label>Asset Description</label>
                  <textarea class="form-control"  name="txtassetdescription" placeholder="Enter ...." rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Remarks</label>
                  <textarea class="form-control"  name="txtremarks" placeholder="Enter ...." rows="3"></textarea>
                </div>
 </div>
          
              </div>
              <div class="box-footer">
              
              <button type="submit" class="btn btn-success"name="btnaddasset">Add an asset</button>
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

 
