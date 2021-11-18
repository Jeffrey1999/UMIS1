<?php
include 'connectdb.php';
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
              <th>Image</th>
              <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
                          $select=$pdo->prepare("select * from tbl_product order by pid desc");
                          $select->execute();
                          while ($row=$select->fetch(PDO::FETCH_OBJ)){
                              echo '
                              <tr>
                              <td>'.$row->pid.'</td>
                              <td>'.$row->pname.'</td>
                              <td>'.$row->pcategory.'</td>
                              <td>'.$row->purchaseprice.'</td>
                              <td>'.$row->saleprice.'</td>
                              <td>'.$row->pstock.'</td>
                              <td>'.$row->pdescription.'</td>
                              <td><img src="productimages/'.$row->pimage.'" class="rounded-circle" width="40px" height="40px"></td>
                              
                              <td>
                              <a href="productview.php?id='.$row->pid.'" class="btn btn-success" role="button"><span class="fas fa-eye" style="color:#ffffff" data-toggle="tooltip" title="View Product"></span></a>
                             
                              <a href="productedit.php?id='.$row->pid.'" class="btn btn-info" role="button"><span class="fas fa-edit" style="color:#ffffff" data-toggle="tooltip" title="Edit Product"></span></a>
                              
                              <a href="deleteproduct.php?id='.$row->pid.'" class="btn btn-danger" role="button"><span class="fas fa-trash-alt" style="color:#ffffff" data-toggle="tooltip" title="Delete product"></span></a>
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