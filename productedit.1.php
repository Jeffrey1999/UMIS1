<?php
include 'connectdb.php';
session_start();
if($_SESSION['useremail']==""){

  header('location:index.php');
}

include_once 'include/header.php';
 
          $id=$_GET['id'];
          $select=$pdo->prepare("select * from tbl_product where pid=$id");
          $select->execute();
          $row=$select->fetch(PDO::FETCH_ASSOC);
          $id_db=$row['pid'];
        //   echo "------------".$id_db;
          $productname_db=$row['pname'];
          $category_db=$row['pcategory'];
          $purchaseprice_db=$row['purchaseprice'];
          $saleprice_db=$row['saleprice'];
          $stock_db=$row['pstock'];
          $description_db=$row['pdescription'];
          $productimage_db=$row['pimage'];
        //   print_r($row);

        if(isset($_POST['btnupdate'])){

            $productname_txt=$_POST['txtpname'];
            $category_txt=$_POST['txtselect_option'];
            $purchaseprice_txt=$_POST['txtpprice'];
            $saleprice_txt = $_POST['txtsaleprice']; 
            $stock_txt =$_POST['txtstock'];
            $description_txt=$_POST['txtdescription'];
            
            $f_name= $_FILES['myfile']['name'];
        
        if(!empty($f_name)){

    
            if(!isset($error)){
            
                $update=$pdo->prepare("update tbl_product set pname=:pname , pcategory=:pcategory, purchaseprice=:pprice,saleprice=:saleprice, pstock=:pstock,pdescription=:pdescription,pimage=:pimage where pid=$id;");
                $update->bindParam(':pname',$productname_txt);
                $update->bindParam(':pcategory',$category_txt);
                $update->bindParam(':pprice',$purchaseprice_txt);
                $update->bindParam(':saleprice', $saleprice_txt);
                $update->bindParam(':pstock', $stock_txt);
                $update->bindParam(':pdescription',$description_txt);
                $update->bindParam(':pimage',$productimage_db);
            
              if($updatet->execute()){
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
            

            
        }else{
            $update=$pdo->prepare("update tbl_product set pname=:pname , pcategory=:pcategory, purchaseprice=:pprice,saleprice=:saleprice, pstock=:pstock,pdescription=:pdescription,pimage=:pimage where pid=$id;");
            $update->bindParam(':pname',$productname_txt);
            $update->bindParam(':pcategory',$category_txt);
            $update->bindParam(':pprice',$purchaseprice_txt);
            $update->bindParam(':saleprice', $saleprice_txt);
            $update->bindParam(':pstock', $stock_txt);
            $update->bindParam(':pdescription',$description_txt);
            $update->bindParam(':pimage',$productimage_db);

         if($update->execute()){
            $error= '<script type="text/javascript">
            jQuery(function validation(){
            
              swal({
                title: "Product updated successfully",
                text: "Updated",
                icon: "success",
                button: "OK",
              });
            
            
            
            });
            </script>';
    
            echo $error;

         }else{

            $error= '<script type="text/javascript">
        jQuery(function validation(){
        
          swal({
            title: "Field is Empty",
            text: "Update failed",
            icon: "error",
            button: "OK",
          });
        
        
        
        });
        </script>';

        echo $error;
         }

        }
        }


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>UPDTATE PRODUCT</b> <small> UENR ESTATE MANAGEMENT</small></h2>
          </div> <!-- /.card-body -->
          <div class="card-body">
          <div class="box-header with-border">
              <h3 class="box-title"><a href="productlist.php" class="btn btn-info" role="button">Back to Product List
              </a></h3>
            </div>


            <form action="" method="post" name="formproduct" enctype="multipart/form-data">
              <div class="row">
                <div class="col-6 col-md-6">
                 <div class="form-group">
                  <label>Product</label>
                  <input type="text" class="form-control" value="<?php echo $productname_db; ?>" name="txtpname"  placeholder="Enter Name"required>
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
                   <option <?php if($row['category']== $category_db) {?> 
                    selected="selected"
                   <?php } ?> >
                   <?php echo $row['category'];?></option>
                   <?php
                           }
                   ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Purchase Price</label>
                  <input value="<?php echo $purchaseprice_db; ?>" type="number" min="1" step="1" class="form-control" name="txtpprice"  placeholder="Enter "required>
                </div>
                <div class="form-group">
                  <label>Sales Price</label>
                  <input  value="<?php echo $saleprice_db; ?>" type="number" min="1" step="1" class="form-control" name="txtsaleprice"  placeholder="Enter "required>
                </div>

                 </div>
                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>Stock</label>
                  <input value="<?php echo $stock_db; ?>"  type="number" min="1" step="1" class="form-control" name="txtstock" placeholder="Enter ...." required>
                </div> 
                <div class="form-group">
                  <label>Comment</label>
                  <textarea value="<?php echo $description_db; ?>" class="form-control"  name="txtdescription" placeholder="Enter ...." rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Product Image</label>
                  <img src="productimages/<?php echo $productimage_db; ?>" class="rounded-circle" width="40px" height="40px">
                  <input  type="file" class="input-group" name="myfile">
                  <p>Upload Image</p>
                </div>
              </div>
 </div>
 <div class="box-footer">
              
              <button type="submit" class="btn btn-warning"name="btnupdate">Update</button>
                </div>
            </form>
                </div>

                
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
