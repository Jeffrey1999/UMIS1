<?php
include 'connectdb.php';
session_start();
$active = 'complaintlist';
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';


?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

      <div class="container-fluid">
        
        <div class="card card-success card-outline">
          
          <div class="card-header">
            
            <h2 class="card-title"> <b>ALL COMPLAINT LIST</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
            <section class="content-header">
  
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
    <li class="breadcrumb-item active">Complaint-list</li>
</ol>       
</section>

          </div> <!-- /.card-body -->
          
          <div class="card-body font-16">
            
          <table id="example1" class="table table-responsive table-bordered table-striped display nowrap" >
                  <thead  class="table table-bordered">
                      <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Building</th>
                          <th>Complaint</th>
                          <th>Location</th>
                          <th>Comments</th>
                          <th>Inspection Comments</th>
                          <th>Inspection Date</th>
                          <th>Approved By</th>
                          <th>Date Of Approval</th>
                          <th>Status</th>
                          <th>Date</th>
                          
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $select=$pdo->prepare("select * from tbl_complaint order by id desc");
                      $select->execute();
                      while ($row=$select->fetch(PDO::FETCH_OBJ)){
                          echo '
                          <tr>
                          <td>'.$row->id.'</td>
                          <td>'.$row->c_name.'</td>
                          <td>'.$row->contact.'</td>
                          <td>'.$row->building.'</td>
                          <td>'.$row->complaint.'</td>
                          <td>'.$row->c_location.'</td>
                          <td>'.$row->comment.'</td>
                          <td>'.$row->inspectioncomment.'</td>
                          <td>'.$row->inspection_date.'</td>
                          <td>'.$row->approvedby.'</td>
                          <td>'.$row->dateofapproval.'</td>
                          <td>'.$row->c_status.'</td>
                          <td>'.$row->comp_date.'</td>
                          <td>
                          <button id='.$row->id.' class="btn btn-danger btndelete"><span class="fas fa-trash-alt" style="color:#ffffff" data-toggle="tooltip" title="delete asset"></span></button>
                          </td>
                          
                          </tr>

                          ';
                      }
                      
                      ?> <tfoot>
                      <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Building</th>
                          <th>Complaint</th>
                          <th>Location</th>
                          <th>Comments</th>
                          <th>Inspection Comments</th>
                          <th>Inspection Date</th>
                          <th>Approved By</th>
                          <th>Date Of Approval</th>
                          <th>Status</th>
                          <th>Date</th>
                          
                          <th>Delete</th>
                      </tr>
                    </tfoot>

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
     $(function () {
    $("#comp_table").DataTable({
       "lengthChange": false, 
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#comp_table_wrapper .col-md-6:eq(0)');


    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  </script>





<!-- <script>
  $(document).ready(function() {
    var table = $('#comp_table').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#comp_table_wrapper .col-md-6:eq(0)' );
} );
</script> -->



<!-- 
 <script>
  $(document).ready(function() {
    var table = $('#comp_table').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#comp_table_wrapper .col-md-6:eq(0)' );
} );
</script> -->

  <!-- <script>
  $(function () {
    $("#example11").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,"scrollCollapse":true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
     
    }).buttons().container().appendTo('#example11_wrapper .col-md-6:eq(0)');


  });
</script> -->



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

 
