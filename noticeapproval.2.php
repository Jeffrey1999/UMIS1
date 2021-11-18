<?php
include 'connectdb.php';
session_start();
$active = 'noticeapproval';
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
        <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button>

<!-- Modal -->




<!-- <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"> -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Doctor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
      <form>
  <div class="form-row">
  
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">First name</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Last name</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="Otto" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefaultUsername">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">@</span>
        </div>
        <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">City</label>
      <input type="text" class="form-control" id="validationDefault03" placeholder="City" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">State</label>
      <input type="text" class="form-control" id="validationDefault04" placeholder="State" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05">Zip</label>
      <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" required>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <div class="card card-primary card-outline">
          
          <div class="card-header">
            
            <h2 class="card-title"> <b>NOTICE APPROVAL MANAGEMENT</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          <table id="assettable" class="table  table-bordered " >
                  <thead  class="table table-active">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>CONTACT</th>
              <th>Facility</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Comments</th>
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