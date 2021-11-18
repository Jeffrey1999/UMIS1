<?php
include 'connectdb.php';
session_start();
$active = 'assetlist';
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';



?>


   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

<section class="content">
      <div class="container-fluid">
        <div class="card card-success card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>ASSET LIST</b> <small> UENR ESTATE MANAGEMENT</small></h2>
            <section class="content-header">
  
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
    <li class="breadcrumb-item active">Asset List</li>
</ol>       
</section>
          </div> <!-- /.card-body -->
          <div class="card-body">
          <table id="assettable" class="table table-responsive table-bordered table-striped width:100%" >
                  <thead  class="table table-bordered">
                      <tr>
                          <th>#</th>
                          <th>Asset Name</th>
                          <th>Office</th>
                          <th>Campus</th>
                          <th>Cost</th>
                          <th>Value</th>
                          <th>Asset Condition</th>
                          <th>Serial_no</th>
                          <th>Year acquired</th>
                          <th>Asset Code</th>
                          <th>Asset description</th>
                          <th>Remarks</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $select=$pdo->prepare("select * from tbl_asset order by assetid desc");
                      $select->execute();
                      
                      while ($row=$select->fetch(PDO::FETCH_OBJ)){

                        // $db = mysqli_connect("localhost", "root", "", "pos_db");
                        // $i = 0;
                        // $sql = "SELECT * FROM tbl_asset";
                        // $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    
                        //     while($row = mysqli_fetch_array($query))
                        //     {
                          echo '
                          <tr>
                          <td>'.$row->assetid.'</td>
                          <td>'.$row->assetname.'</td>
                          <td>'.$row->office.'</td>
                          <td>'.$row->campus.'</td>
                          <td>'.$row->cost.'</td>
                          <td>'.$row->value.'</td>
                          <td>'.$row->assetcondition.'</td>
                          <td>'.$row->serialnumber.'</td>
                          <td>'.$row->yearacquired.'</td>
                          <td>'.$row->code.'</td>
                          <td>'.$row->assetdescription.'</td>
                          <td>'.$row->remarks.'</td>

                          <td>
                          <button id='.$row->assetid.' class="btn btn-danger btndelete"><span class="fas fa-trash-alt" style="color:#ffffff" data-toggle="tooltip" title="delete asset"></span></button>
                          </td>
                          
                          </tr>

                          ';
                      }
                      
                      ?>
                  </tbody>


</table>


<!-- <td>
                          <a href="deleteproduct.php?id='.$row->assetid.'" class="btn btn-danger"  role="button"><span class="fas fa-trash-alt" style="color:#ffffff" data-toggle="tooltip" title="delete asset"></span></a>
                          </td>
                          
                          </tr> -->


          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
    <!-- /.content -->
  </div>
  


<script>
$(document).ready(function (){
$('[data-toggle="tooltip"]').tooltip();
});

</script>

  <script>
  
$(document).ready(function(){
   
    $('.btndelete').click(function(){
      
      var tdh = $(this);
      var id=$(this).attr("id");
      // alert(id);
      swal({
  title: "Do you want to delete?",
  text: "Once asset is deleted, you will not be able to recover this asset!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    $.ajax({
        url:'assetdelete.php',
        type:'post',
        data:{
        assetidd:id

        },
        success:function(data){
          tdh.parents('tr').hide();
        }
      });




    swal("Your Asset has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your Asset is safe.!");
  }
});


     
    });
});

  </script>



<!-- <script>
$(document).ready(function(){
   
   $('.btndelete').click(function(){
     
     var tdh = $(this);
     var id=$(this).attr("id");

     $.ajax({
        url:'assetdelete.php',
        type:'post',
        data:{
        assetidd:id

        },
        success:function(data){
          tdh.parents('tr').hide();
        }
      });
    });
  });

</script> -->









  <?php
include 'include/footer.php';
  ?>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

 
