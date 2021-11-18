<?php
include 'connectdb.php';
$active = 'building';
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
            <h2 class="card-title"> <b>BUILDING LIST</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          <table id="buildingtable" class="table table-responsive table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Building Name</th>
                              <th>Location</th>
                              <th>floor area</th>
                              <th>no of occupants</th>
                              <th>space utilization</th>
                              <th>description</th>
                              <th>yearofconst</th>
                              <th>contractor</th>
                              <th>mrktvalue(GHS)</th>
                              <th>valdate</th>
                              <th>repairs&maintenance</th>
                              <th>date(repair)</th>
                              <th>nature</th>
                              <th>costofrepair(GHS)</th>
                              <th>Delete</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $select=$pdo->prepare("select * from tbl_building order by bid desc");
                          $select->execute();
                          while ($row=$select->fetch(PDO::FETCH_OBJ)){
                              echo '
                              <tr>
                              <td>'.$row->bid.'</td>
                              <td>'.$row->bname.'</td>
                              <td>'.$row->location.'</td>
                              <td>'.$row->totalfloorarea.'</td>
                              <td>'.$row->numberofoccupants.'</td>
                              <td>'.$row->spaceutilization.'</td>
                              <td>'.$row->description.'</td>
                              <td>'.$row->yearofconstruction.'</td>
                              <td>'.$row->nameofcontractor.'</td>
                              <td>'.$row->marketvalue.'</td>
                              <td>'.$row->validationdate.'</td>
                              <td>'.$row->repairsandmaintenace.'</td>
                              <td>'.$row->dateofrepair.'</td>
                              <td>'.$row->natureofrepair.'</td>
                              <td>'.$row->costofrepair.'</td>
                              
                              <td>
                          <button id='.$row->bid.' class="btn btn-danger btndelete"><span class="fas fa-trash-alt" style="color:#ffffff" data-toggle="tooltip" title="delete asset"></span></button>
                          </td>
                          
                          </tr>

                              
                              </tr>

                              ';
                          }
                          
                          ?>
                      </tbody> </table>
            
          </div><!-- /.card-body -->
        </div>
        <div class="box-header with-border">
              <h3 class="box-title"><a href="addbuilding.php" class="btn btn-info" role="button">Back to Building Form
              </a></h3>
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
    $('#buildingtable').DataTable();
    
  });
  </script>

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
  text: "Once building is deleted, you will not be able to recover this Building info!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    $.ajax({
        url:'buildingdelete.php',
        type:'post',
        data:{
        bidd:id

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

 
