<?php
include 'connectdb.php';
$active = 'additem';
session_start();
if($_SESSION['useremail']==""){

  header('location:index.php');
}

include_once 'include/header.php';

if(isset($_POST['btnaddproduct'])){

$productname=$_POST['txtpname'];
$category=$_POST['txtselect_option'];
$purchaseprice=$_POST['txtpprice'];
$saleprice = $_POST['txtsaleprice']; 
$stock =$_POST['txtstock'];
$description=$_POST['txtdescription'];

$f_name= $_FILES['myfile']['name'];
$f_tmp= $_FILES['myfile']['tmp_name'];

$f_size = $_FILES['myfile']['size'];
$f_extension=explode('.',$f_name);
$f_extension=strtolower(end($f_extension));
$f_newfile=uniqid().'.'.$f_extension;
$store="productimages/".$f_newfile;

if($f_extension=='jpg' || $f_extension=='jpeg' || $f_extension=='png' || $f_extension=="gif"){
    if($f_size>=1000000){
       // echo 'Max File should be 1MB';
        $error= '<script type="text/javascript">
        jQuery(function validation(){
        
          swal({
            title: "Field is Empty",
            text: "Max File should be 1MB!!!",
            icon: "warning",
            button: "OK",
          });
        
        
        
        });
        </script>';

        echo $error;
    }
    else{
        if(move_uploaded_file($f_tmp,$store)){
          $productimage = $f_newfile;

            echo 'Upload Successful';
        }
    }
}
else{
    //echo 'only jpeg and gif can be uploaded';
    $error= '<script type="text/javascript">
        jQuery(function validation(){
        
          swal({
            title: "Warning",
            text: "only jpg,jpeg,png and gif can be uploaded!!!",
            icon: "error",
            button: "OK",
          });
        
        
        
        });
        </script>';

        echo $error;
}

if(!isset($error)){

  $insert=$pdo->prepare("insert into tbl_product(pname,pcategory,purchaseprice,saleprice,pstock,pdescription,pimage)values
  (:pname,:pcategory,:purchaseprice,:saleprice,:pstock,:pdescription,:pimage)");
  $insert->bindParam(':pname',$productname);
  $insert->bindParam(':pcategory',$category);
  $insert->bindParam(':purchaseprice',$purchaseprice);
  $insert->bindParam(':saleprice',$saleprice);
  $insert->bindParam(':pstock',$stock);
  $insert->bindParam('pdescription',$description);
  $insert->bindParam(':pimage',$productimage);

  if($insert->execute()){
    echo'<script type="text/javascript">
    jQuery(function validation(){
    
      swal({
        title: "Add product successful",
        text: "Product Added!!!",
        icon: "success",
        button: "OK",
      });
    
    
    
    });
    </script>';

  }else{
    $error= '<script type="text/javascript">
        jQuery(function validation(){
        
          swal({
            title: "ERROR",
            text: "Add Product Failed!!!",
            icon: "error",
            button: "OK",
          });
        
        
        
        });
        </script>';



  }

}

}


?>
  

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->

<br>

<section class="content">
      <div class="container-fluid">

      <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="card dr-pro-pic">

        <div class="card card-warning card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>PRODUCT</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->


          
          <div class="card-body">
          <div class="box-header with-border">
              <h3 class="box-title"><a href="productist.php" class="btn btn-info" role="button">Back to Product List
              </a></h3>
            </div>


            <form action="" method="post" name="formproduct" enctype="multipart/form-data">
              <div class="row">
                <div class="col-6 col-md-6">
                 <div class="form-group">
                  <label>Product</label>
                  <input type="text" class="form-control" name="txtpname"  placeholder="Enter Name"required>
                </div>
                <div class="form-group"> 
                  <label>Category</label>
                  <select class="form-control" name="txtselect_option"required>
                  <option value="" disabled selected>Select Category</option>
                  <?php
                   $select=$pdo->prepare("select * from tbl_category order by catid desc");
                   $select->execute();
                   while($row=$select->fetch(PDO::FETCH_ASSOC)){
                   extract($row)
                   ?>
                   <option> <?php echo $row['category'];?></option>
                   <?php
                           }
                   ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Purchase Price</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtpprice"  placeholder="Enter "required>
                </div>
                <div class="form-group">
                  <label>Sales Price</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtsaleprice"  placeholder="Enter "required>
                </div>

                 </div>
                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>Stock</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtstock" placeholder="Enter ...." required>
                </div> 
                <div class="form-group">
                  <label>Comment</label>
                  <textarea class="form-control"  name="txtdescription" placeholder="Enter ...." rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Product Image</label>
                  
                  <input type="file" class="input-group" name="myfile" required>
                  <p>Upload Image</p>
                </div>
              </div>
 </div>
 <div class="box-footer">
              
              <button type="submit" class="btn btn-success"name="btnaddproduct">Add an asset</button>
                </div>
            </form>
                </div>
            

            
</div>
</div>

          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- /.content -->
  </div>
  <script>
  $(document).ready( function (){
    $('#assettable').DataTable();
    
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

 
