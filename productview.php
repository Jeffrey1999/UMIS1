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
            <h2 class="card-title"> <b>PRODUCT VIEW</b> <small> UENR ESTATE MANAGEMENT</small></h2>
          </div> <!-- /.card-body -->
          <div class="card-body">
          <div class="box-header with-border">
              <h3 class="box-title"><a href="productlist.php" class="btn btn-info" role="button">Back to Product List
              </a></h3>
            </div>

              
          <?php
          $id=$_GET['id'];
          $select=$pdo->prepare("select * from tbl_product where pid=$id");
          $select->execute();
          while($row=$select->fetch(PDO::FETCH_OBJ)){

         echo'
         <div class="row">
         <diV class="col-6 col-md-6">
        <li class="list-group-item list-group-item-success text-center"> Product Details</li>
         <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">ID<span class="badge badge-secondary badge-pill">'.$row->pid.'</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Product Name<span class="badge badge-warning ">'.$row->pname.'</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Product Category<span class="badge badge-warning">'.$row->pcategory.'</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Purchase Price<span class="badge badge-primary ">'.$row->purchaseprice.'</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Sale Price<span class="badge badge-success ">'.$row->saleprice.'</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Product Profit<span class="badge badge-success ">'.($row->saleprice-$row->purchaseprice).'</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Stock <span class="badge badge-danger ">'.$row->pstock.'</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center"><b>Description</b><span class="">'.$row->pdescription.'</span></li>
         
         </ul>
         
         </div>

         <diV class="col-6 col-md-6">
         <li class="list-group-item list-group-item-success text-center"> <b>Product image</b></li>
         <ul class="list-group">

        
        <img src="productimages/'.$row->pimage.'" class="img-fluid">
         </ul>
         
         </div>
         </div>
         ';
         

          }
          
          
          ?>
           
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
