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
        <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post" name="formProduct">
              <div class="row">
                <div class="col-6 col-md-6"> 
                <div class="form-group">
                  <label>Applicant</label>
                  <input type="text" class="form-control" name="txtapplicant"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Building</label>
                  <select class="form-control" name="txtbuilding"required>
                  <?php
                   $select=$pdo->prepare("select * from tbl_building order by bid desc");
                   $select->execute();
                   while($row=$select->fetch(PDO::FETCH_ASSOC)){
                   extract($row)
                   ?>
                   <option> <?php echo $row['bname'];?></option>
                   <?php
                           }
                   ?>
                    
                  </select>
                </div>
                
                

                <div class="form-group">
                  <label>Date From</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtdatefrom" type="date" id="myID" placeholder="select date">
                      </div>
</div>



                  <!-- <input type="number" min="1" step="1" class="form-control" name="txtdatefrom" placeholder="Enter ...." required>
                </div> -->

                  <div class="form-group">
                  <label>Date To)</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtdateto" type="date" id="myID" placeholder="select date">
                      </div>
</div>
                  <!-- <input type="number" min="1" step="1" class="form-control" name="txtdateto" placeholder="Enter ...." required>
                </div> -->
                
                <div class="form-group">
                  <label>PAyment(GHS)</label>
                  <input type="number" min="1" step="1" class="form-control" name="txtpayment" placeholder="Enter ...." required>
                </div>
                <div class="form-group">
                  <label>Amount</label>
                  <input type="text" class="form-control" name="txtamount"  placeholder="Enter Name"required>
                </div> </div>
                <div class="col-6 col-md-6">
                  <div class="form-group">
                  <label>Approved BY</label>
                  <input type="text" class="form-control" name="txtapprovedby"  placeholder="Enter Name"required>
                </div>
             <div class="form-group">
                  <label>Approval Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtapprovaldate" type="date" id="myID" placeholder="select date">
                      </div>
</div>
                  <!-- <input type="number" min="2000" step="1" class="form-control" name="txtapprovaldate" placeholder="Enter ...." required>
                </div> 
                 -->


                <div class="form-group">
                  <label>Condition</label>
                  <input type="text" class="form-control" name="txtcondition"  placeholder="Enter Name"required>
                </div>
                
                <div class="form-group">
                  <label>Security Officer</label>
                  <textarea class="form-control"  name="txtsecurityofficer" placeholder="Enter ...." rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Comments</label>
                  <textarea class="form-control"  name="txtcomments" placeholder="Enter ...." rows="3"></textarea>
                </div>
 </div>
          
              </div>
              <div class="box-footer">
              
              <button type="submit" class="btn btn-success" name="btnsubmit">Submit</button>
                </div>
                
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