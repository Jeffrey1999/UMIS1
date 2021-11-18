<?php
include 'connectdb.php';

$active = 'allnotice';
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
        <div class="card card-success card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>NOTICE LIST</b> <small> UENR ESTATE MANAGEMENT</small></h2>
            <section class="content-header">
  
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
    <li class="breadcrumb-item active">Notice List</li>
</ol>       
</section>
          </div> <!-- /.card-body -->
          <div class="card-body">
          <table id="example1" class="table table-responsive table-bordered table-striped" >
                  <thead  class="table table-bordered">
                      <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>facility</th>
                          <th>Date from</th>
                          <th>To Date</th>
                          <th>Payment</th>
                          <th>Amount</th>
                          <th>Approved BY</th>
                          <th>Approval Date</th>
                          <th>Notice COndition</th>
                          <th>Security Officer</th>
                          <th>Comments</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $select=$pdo->prepare("select * from tbl_noticeoffacility order by id desc");
                      $select->execute();
                      while ($row=$select->fetch(PDO::FETCH_OBJ)){
                          echo '
                          <tr>
                          <td>'.$row->id.'</td>
                          <td>'.$row->applicant.'</td>
                          <td>'.$row->facility.'</td>
                          <td>'.$row->date_from.'</td>
                          <td>'.$row->date_to.'</td>
                          <td>'.$row->payment.'</td>
                          <td>'.$row->amount.'</td>
                          <td>'.$row->approved_by.'</td>
                          <td>'.$row->approval_date.'</td>
                          <td>'.$row->NOF_condition.'</td>
                          <td>'.$row->security_officer.'</td>
                          <td>'.$row->comments.'</td>
                          
                          
                          
            
                          <td>
                          <button id='.$row->id.' class="btn btn-danger btndelete"><span class="fas fa-trash-alt" style="color:#ffffff" data-toggle="tooltip" title="delete asset"></span></button>
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

 
