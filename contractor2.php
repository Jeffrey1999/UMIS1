<?php
include 'connectdb.php';
$active = 'contractor';
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
            <h2 class="card-title"> <b>CONTRACTOR'S INFO</b> <small> UENR ESTATE MANAGEMENT</small></h2>
            
          </div> <!-- /.card-body -->

          
          <div class="card-body">
         
         
              <br>
          <!-- <table id="assettable" class="table  table-bordered " >
                  <thead  class="table table-active"> -->


                  <table id="assettable" class="table table-responsive table-bordered table-striped" >
                  <thead  class="table table-info">
                      <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>email</th>
                          <th>gender</th>
                          <th>campus</th>
                          <th>contact</th>
                          <th>company'sname</th>
                          <th>company's contact</th>
                          <th>company's email</th>
                          <th>company's address</th>
                         <th>contracts</th>
                          <th>Remarks</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $select=$pdo->prepare("select * from tbl_contractor order by contractor_id desc");
                      $select->execute();
                      while ($row=$select->fetch(PDO::FETCH_OBJ)){
                          echo '
                          <tr>
                          <td>'.$row->contractor_id.'</td>
                          <td>'.$row->name.'</td>
                          <td>'.$row->email.'</td>
                          <td>'.$row->gender.'</td>
                          <td>'.$row->campus.'</td>
                          <td>'.$row->contact.'</td>
                          <td>'.$row->company_name.'</td>
                          <td>'.$row->company_contact.'</td>
                          <td>'.$row->company_email.'</td>
                          <td>'.$row->company_address.'</td>
                          <td>'.$row->contracts.'</td>
                          <td>'.$row->remarks.'</td>
                          <td>
                          <button id='.$row->contractor_id.' class="btn btn-danger btndelete"><span class="fas fa-trash-alt fa-spin fa-1x" style="color:#ffffff" data-toggle="tooltip" title="delete row"></span></button>
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
    <a href="addcontractor.php" class="btn btn-success" role="button">Back to Contractor List
              </a>
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

 
