<?php
include 'connectdb.php';
$active = 'staffmember';
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
            <h2 class="card-title"> <b>STAFF OFFICERS</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          <table id="assettable" class="table  table-bordered " >
                  <thead  class="table table-info">
                  <!-- <table id="assettable" class="table table-responsive table-bordered table-striped" >
                  <thead  class="table table-info"> -->
                      <tr>
                          <th>#</th>
                          <th>firstName</th>
                          <th>LastName</th>
                          <th>Contact1</th>
                          <th>Contact2</th>
                          <th>address</th>
                          <th>dateofbirth</th>
                          <th>Gender</th>
                          <th>schoolid</th>
                         <th>office</th>
                          <!-- <th>comments</th> -->
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $select=$pdo->prepare("select * from tbl_staff order by staffid desc");
                      $select->execute();
                      while ($row=$select->fetch(PDO::FETCH_OBJ)){
                          echo '
                          <tr>
                          <td>'.$row->staffid.'</td>
                          <td>'.$row->firstname.'</td>
                          <td>'.$row->lastname.'</td>
                          <td>'.$row->contact1.'</td>
                          <td>'.$row->contact2.'</td>
                          <td>'.$row->address.'</td>
                          <td>'.$row->dateofbirth.'</td>
                          <td>'.$row->gender.'</td>
                          <td>'.$row->school_id.'</td>
                          <td>'.$row->office.'</td>
                          
                          
                          
                          
            
                          <td>
                          <button id='.$row->staffid.' class="btn btn-info btndelete"><span class="fas fa-edit" style="color:#ffffff" data-toggle="tooltip" title="Edit asset"></span></button>
                          <button id='.$row->staffid.' class="btn btn-danger btndelete"><span class="fas fa-trash-alt fa-spin fa-1x" style="color:#ffffff" data-toggle="tooltip" title="delete asset"></span></button>
                          
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

 
