<?php
include 'connectdb.php';
$active = 'stores';
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
            <h2 class="card-title"> <b>STORES AND DISTRIBUTION MANAGEMENT</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          <table id="assettable" class="table  table-bordered " >
                  <thead  class="table table-active">
            <tr>
              <th>#</th>
              <th>Item</th>
              <th>Specification</th>
              <th>Unit Of Count</th>
              <th>Quantity</th>
              <th>Unit Price (GH₵)</th>
              <th>Total Amount(GH₵)</th>
             
              <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
                          $select=$pdo->prepare("select * from tbl_stores order by id desc");
                          $select->execute();
                          while ($row=$select->fetch(PDO::FETCH_OBJ)){
                              echo '
                              <tr>
                              <td>'.$row->id.'</td>
                              <td>'.$row->item.'</td>
                              <td>'.$row->specification.'</td>
                              <td>'.$row->unitofcount.'</td>
                              <td>'.$row->quantity.'</td>
                              <td>'.$row->unitprice.'</td>
                              <td>'.$row->totalamount.'</td>
                             
                              
                              <td>
                              <a href="productview.php?id='.$row->id.'" class="btn btn-success" role="button"><span class="fas fa-eye" style="color:#ffffff" data-toggle="tooltip" title="View Product"></span></a>
                             
                              <a href="productedit.php?id='.$row->id.'" class="btn btn-info" role="button"><span class="fas fa-edit" style="color:#ffffff" data-toggle="tooltip" title="Edit Product"></span></a>
                              
                              <a href="deleteproduct.php?id='.$row->id.'" class="btn btn-danger" role="button"><span class="fas fa-trash-alt" style="color:#ffffff" data-toggle="tooltip" title="Delete product"></span></a>
                              </td>
                              
                              </tr>

                              ';
                          }
                          
                          ?>
          </tbody>


        </table>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
  $(document).ready(function () {
    $('#producttable').DataTable();

    "order":[[0:"desc"]]
  });
</script>

<script>
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

<?php

include_once 'include/footer.php';
?>