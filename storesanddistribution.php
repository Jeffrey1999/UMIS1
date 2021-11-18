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
            <h2 class="card-title"> <b>STORES AND DISTRIBUTION</b> <small> UENR ESTATE MANAGEMENT</small></h2>
          </div> <!-- /.card-body -->

          <div class="card-body"> 

<div class="row">
          <div class="col-6 md-6">
             <div class="form-group">
             
                        
                  <label>Customer's Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-user"></i>
                          </span>
                        </div>
                  <input type="text" class="form-control" name="txtcustomer"  placeholder="Enter Name"required> </div>
                </div>
                
            </div>
            <div class="col-6 col-md-6">
            
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
          </div>
          </div>
          <!-- /.CUSTOMER AND DATE -->
          <div class="card-body"> 
          <div class="col md-12">
          
          <table id="producttable" class="table table-bordered ">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Search Product</th>
                              <th>Stock</th>
                              <th>Price</th>
                              <th>Enter Quantity</th>
                              <th>Total</th>
                              <th>description</th>
                              <th>  <button type="button" name="add" class="btn btn-success btn-sm btnadd"><span class="fa fa-plus" style="color:#ffffff" data-toggle="tooltip" title="delete row"></span></button></th>
                          </tr>
                      </thead>
                      </table>
          </div>
           </div><!-- /.THIS IS FOR TABLE -->
          <div class="card-body"> 
          <div class="row">
                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>SubTotal</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-coins"></i>
                          </span>
                        </div>
                  <input type="text" class="form-control" name="txtsubtotal"  required>
                </div></div>
                </div>
                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>Paid</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-money-bill-alt"></i>
                          </span>
                        </div>
                  <input type="text" class="form-control" name="txtpaid"  required>
                </div></div>
                </div>
                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>Due</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-money-bill"></i>
                          </span>
                        </div>
                  <input type="text" class="form-control" name="txtdue"  required>
                </div></div>
                
                </div><!-- /.TEXT, DISCOUNT -->

                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>Total</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-money-bill-wave-alt"></i>
                          </span>
                        </div>
                  <input type="text" class="form-control" name="txttotal" required>
                </div></div>
                </div>
                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>Paid</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-money-bill-wave"></i>
                          </span>
                        </div>
                  <input type="text" class="form-control" name="txtpaid"required>
                </div></div>
                </div>
                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label>Due</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-money-bill-alt"></i>
                          </span>
                        </div>
                  <input type="text" class="form-control" name="txtdue"  required>
                </div></div>
                <br>
<div class="col-6 col-md-6">
    <label> Payment method</label>
                        <!-- radio -->
                        <div class="form-group clearfix">
                          <div class="icheck-primary d-inline">
                            <input type="radio" id="radioPrimary1" name="r1" checked>
                            <label for="radioPrimary1">CASH
                            </label>
                          </div>
                          <div class="icheck-primary d-inline">
                            <input type="radio" id="radioPrimary2" name="r1">
                            <label for="radioPrimary2">MOBILE MONEY
                            </label>
                            
                          </div>
                          <div class="icheck-primary d-inline">
                            <input type="radio" id="radioPrimary3" name="r1">
                            <label for="radioPrimary3"> BANK  </label>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <hr>
     

                </div>
                <div class="text-center">
              
              <button type="submit" class="btn btn-success"name="submit">Add an asset</button>
                </div>
      </div><!-- /.container-fluid -->

      </div>
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include 'include/footer.php';
  ?>
<script>
flatpickr("#myID", {});

  //Red color scheme for iCheck
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
</script>
<script>
 $(document).ready(functio(){

$(document).on('click','.btnadd',function(){
var html='';
html+='<tr>';
html+='<td><input type="text" class="form-control pname" name="productname[]" required></td>'
$('#producttable').append(html);

})

 });
</script>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
