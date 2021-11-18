<?php
include_once 'include/connect.php';
$active = 'campus';
session_start();
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';






if(isset($_POST['btnsave'])){

    $category=$_POST['txtcategory'];

    //echo $category;
    if(empty($category)){

$error='<script type="text/javascript">
jQuery(function validation(){

  swal({
    title: "Field is Empty",
    text: "Please fill the Field!!!",
    icon: "error",
    button: "OK",
  });



});
</script>';

echo $error;

    }
    if(!isset($error)){

        $insert=$pdo->prepare("insert into tbl_category(category) values(:category)");
        $insert->bindParam(':category',$category);
        if($insert->execute()){

            echo'<script type="text/javascript">
            jQuery(function validation(){
        
              swal({
                title: "Added!",
                text: "Add successful!!!",
                icon: "success",
                button: "OK",
              });
        
          });
        </script>';

        }
        else{
            echo'<script type="text/javascript">
            jQuery(function validation(){
        
              swal({
                title: "Error!",
                text: "Query Failed!!!",
                icon: "error",
                button: "OK",
              });
        
        
        
            });
        </script>';

        }
    }
} 

if(isset($_POST['btnupdate']))
{
    $category=$_POST['txtcategory'];
    $id=$_POST['txtid'];

    if(empty($category)){

        $errorupdate='<script type="text/javascript">
        jQuery(function validation(){
    
          swal({
            title: "Error!",
            text: "Field is Empty!!!",
            icon: "error",
            button: "OK",
          });
    
    
    
        });
    </script>';

    echo $errorupdate;
    }
if(!isset($errorupdate)){

  $update=$pdo->prepare("update tbl_category set category='$category' where catid=".$id);
  $update->bindParam(':category',$category);
  if($update->execute()){

    echo'<script type="text/javascript">
            jQuery(function validation(){
        
              swal({
                title: "Updated!",
                text: "Your Category is Updated!!!",
                icon: "success",
                button: "OK",
              });
        
        
        
            });
        </script>';
  }
  else{
    echo'<script type="text/javascript">
            jQuery(function validation(){
        
              swal({
                title: "Error!",
                text: "Your Category is not Updated!!!",
                icon: "error",
                button: "OK",
              });
        
        
        
            });
        </script>';

  }
}

    
}
if(isset($_POST['btndelete'])){
  $delete=$pdo->prepare("delete from tbl_category where catid=".$_POST['btndelete']);
  
  if($delete->execute()){
    echo'<script type="text/javascript">
            jQuery(function validation(){
        
              swal({
                title: "Deleted!",
                text: "Your Category is Deleted!!!",
                icon: "success",
                button: "OK",
              });
        
        
        
            });
        </script>';


  }
  else{
    echo'<script type="text/javascript">
            jQuery(function validation(){
        
              swal({
                title: "Error!",
                text: "Your Category did not delete!!!",
                icon: "error",
                button: "OK",
              });
        
        
        
            });
        </script>';


  }
}

?>


   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">REGISTRATION FORM</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-4">
          <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">REGISTRATION</h3>

                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  
                    <div class="card-body">
                    <form role="form" action="" method="post">
                        
                    <?php
                  
                  if (isset($_POST['btnedit'])){
                      $select=$pdo->prepare("select * from tbl_category where catid=".$_POST['btnedit']);
                      $select->execute();
                      if($select){
                          $row=$select->fetch(PDO::FETCH_OBJ);
                        echo'

                        <div class="form-group">
                            <label>Category</label>
                            <input type="hidden" class="form-control" value="'.$row->catid.'"name="txtid"  placeholder="Enter Category">
                            <input type="text" class="form-control" value="'.$row->category.'"name="txtcategory"  placeholder="Enter Category">
                          </div>
                            
                            
                          <button type="submit" class="btn btn-info"name="btnupdate">Update</button>
                      </div>';
                      }

                  }
                  else{
                      echo'
                      <div class="form-group">
                          <label>Category</label>
                          <input type="text" class="form-control" name="txtcategory"  placeholder="Enter Category">
                        </div>
                          
                          
                        <button type="submit" class="btn btn-warning"name="btnsave">Save</button>
                    </div>';
                  }
                  
                  ?>

                 
                </div>
                </div>

                <div class="col-md-8"> 
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>CATEGORY</th>
                              <th>EDIT</th>
                              <th>DELETE</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                          $select=$pdo->prepare("select * from tbl_category order by catid desc");
                          $select->execute();
                          while($row=$select->fetch(PDO::FETCH_OBJ)){
                              echo ' <tr>
                              
                              <td>'.$row->catid.'</td>
                              <td>'.$row->category.'</td>
                              <td> <button type="submit" value="'.$row->catid.'"class="btn btn-success"name="btnedit">Edit</button></td>
                              <td> <button type="submit" value="'.$row->catid.'"class="btn btn-danger"name="btndelete">Delete</button></td>
                              </tr>';

                          }
  ?> 
                          
                             
                              <tr>
                              
                              
                              </tr>

                      </tbody>
               </table>
               </div> 

               
          </div>
          </form>
          <!-- /.col-md-8 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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

 
