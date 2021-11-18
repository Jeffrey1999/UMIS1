<?php
include 'connectdb.php';
$active = 'land';
session_start();
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
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>LAND</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          <table id="landtable" class="table table-responsive table-bordered table-striped" >
                  <thead  class="table table-bordered">
                      <tr>
                          <th>#</th>
                          <th>location</th>
                          <th>Plot Number</th>
                          <th>District</th>
                          <th>Term</th>
                          <th>Comment</th>
                          <th>Expiry</th>
                          <th>Rent</th>
                          <th>Cost</th>
                          <th>Market Value</th>
                          <th>Validation Date</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $select=$pdo->prepare("select * from tbl_land order by id desc");
                      $select->execute();
                      while ($row=$select->fetch(PDO::FETCH_OBJ)){
                          echo '
                          <tr>
                          <td>'.$row->id.'</td>
                          <td>'.$row->location.'</td>
                          <td>'.$row->plotnumber.'</td>
                          <td>'.$row->district.'</td>
                          <td>'.$row->term.'</td>
                          <td>'.$row->comment.'</td>
                          <td>'.$row->expiry.'</td>
                          <td>'.$row->rent.'</td>
                          <td>'.$row->cost.'</td>
                          <td>'.$row->marketvalue.'</td>
                          <td>'.$row->validationdate.'</td>

                          <td>
                          <button id='.$row->id.' class="btn btn-danger btndelete"><span class="fas fa-trash-alt" style="color:#ffffff" data-toggle="tooltip" title="delete asset"></span></button>
                          </td>
                          
                          </tr>
                          </tr>

                          ';
                      }
                      
                      ?>
                  </tbody>


</table>
            
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
  <!-- <script>
  $(document).ready( function (){
    $('#assettable').DataTable();
    
  });
  </script> -->
  <script>
  $(document).ready( function (){
    $('#landtable').DataTable();
    
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
  text: "Once Land info is deleted, you will not be able to recover this Land info!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    $.ajax({
        url:'landdelete.php',
        type:'post',
        data:{
        landidd:id

        },
        success:function(data){
          tdh.parents('tr').hide();
        }
      });
    swal("Your land info has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your Land info is safe.!");
  }
});


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

 
