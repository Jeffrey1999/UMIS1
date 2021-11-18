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
            <h2 class="card-title"> <b>COMPLAINT LIST</b> <small> UENR ESTATE MANAGEMENT</small></h2>
                
          </div> <!-- /.card-body -->
          <div class="card-body">
          <table id="assettable" class="table  table-bordered " >
                  <thead  class="table table-active">
                  <!-- <table id="assettable" class="table table-responsive table-bordered table-striped" >
                  <thead  class="table table-info"> -->
                      <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Building</th>
                          <th>Complaint</th>
                          <th>location</th>
                          <th>Status</th>
                          <th>Comments</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $select=$pdo->prepare("select * from tbl_complaintuser order by id desc");
                      $select->execute();
                      while ($row=$select->fetch(PDO::FETCH_OBJ)){
                          echo '
                          <tr>
                          <td>'.$row->id.'</td>
                          <td>'.$row->name.'</td>
                          <td>'.$row->contact.'</td>
                          <td>'.$row->building.'</td>
                          <td>'.$row->typeofcomplaint.'</td>
                          <td>'.$row->location.'</td>



                          <td><span class="badge badge-warning">'.$row->status.'</span></td>
                           
                          <td>'.$row->comments.'</td>
            
                          <td>
                          
                          <button class="btn btn-success editbtn" ><span class="fas fa-eye" style="color:#ffffff" data-toggle="tooltip" title="View "></span></button>
                          
                          <button id='.$row->id.' class="btn btn-danger btndelete"><span class="fas fa-trash-alt" style="color:#ffffff" data-toggle="tooltip" title="delete"></span></button>
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




<!--############################################################################ -->
<!-- EDIT POP UP FORM -->


<!-- <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"> -->
<div class="modal fade bd-example-modal-lg" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Approve Complaint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">

<form action="complaintupdate.php" method="post" name="formProduct">
              <div class="row">
                <div class="col-6 col-md-6" > 
                <input type="hidden" name="update_id" id="update_id">
                <div class="form-group">
                  <label> Name</label>
                  <input class="form-control" name="txtname" id="txtname" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label> Contact</label>
                  <input type="text" class="form-control" name="txtcontact" id="txtcontact"  placeholder="Enter Name">
                </div>


                <div class="form-group">
                  <label>Building</label>
                  <input type="text" class="form-control" name="txtbuilding" id="txtbuilding"  placeholder="Enter Name">
                </div>
                
                

                <div class="form-group">
                  <label>Type of Complaint</label>
                  <input type="text" class="form-control" name="txttypeofcomplaint" id="txttypeofcomplaint"  placeholder="Enter Name">
                </div>

                  <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" name="txtlocation" id="txtlocation" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="txtstatus" id="txtstatus" required>
                  <option>Not Approved</option>
                    <option>Approved</option>
                    
                    
                  </select>
                </div>
                 
                </div>
                
                
                <div class="col-6 col-md-6">

                <div class="form-group">
                  <label>Inspection Comments</label>
                  <input type="text" class="form-control" name="txtinspectioncomments" id="txtinspectioncomments"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Date Of Inspection</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtinspectiondate" type="date" id="myID" placeholder="select date">
                      </div>
</div>


                <div class="form-group">
                  <label>Approved By Estate Officer</label>
                  <input type="text" class="form-control" name="txtapproved"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Date of Approval</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtdateofapproval" type="date" id="myID" placeholder="select date">
                      </div>
</div>
 
                
<div class="form-group">
                  <label>Comments</label>
                  <textarea type="text" class="form-control" name="txtcomments" id="txtcomments" rows="3" placeholder="specify complaint here.."></textarea>
                </div>

               
 </div>
          
              </div>
              <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
      </div>
                
            </form>

      </div>


    
    </div>
  </div>

<!--
  ############################################################################ -->
<!-- DELETE POP UP FORM -->


<!-- <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"> -->
<div class="modal fade bd-example-modal-lg" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Approve Complaint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">

<form action="complaintupdate.php" method="post" name="formProduct">
              <div class="row">
                <div class="col-6 col-md-6" > 
                <input type="hidden" name="update_id" id="update_id">
                <div class="form-group">
                  <label> Name</label>
                  <input class="form-control" name="txtname" id="txtname" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label> Contact</label>
                  <input type="text" class="form-control" name="txtcontact" id="txtcontact"  placeholder="Enter Name">
                </div>


                <div class="form-group">
                  <label>Building</label>
                  <input type="text" class="form-control" name="txtbuilding" id="txtbuilding"  placeholder="Enter Name">
                </div>
                
                

                <div class="form-group">
                  <label>Type of Complaint</label>
                  <input type="text" class="form-control" name="txttypeofcomplaint" id="txttypeofcomplaint"  placeholder="Enter Name">
                </div>

                  <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" name="txtlocation" id="txtlocation" placeholder="Enter Name">
                </div>
                </div>
                
                <div class="col-6 col-md-6">

                <div class="form-group">
                  <label>Inspection Comments</label>
                  <input type="text" class="form-control" name="txtinspectioncomments" id="txtinspectioncomments"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Date Of Inspection</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtinspectiondate" type="date" id="myID" placeholder="select date">
                      </div>
</div>


                <div class="form-group">
                  <label>Approved By Estate Officer</label>
                  <input type="text" class="form-control" name="txtapproved"  placeholder="Enter Name"required>
                </div>
                <div class="form-group">
                  <label>Date of Approval</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" name="txtdateofapproval" type="date" id="myID" placeholder="select date">
                      </div>
</div>
 
                
<div class="form-group">
                  <label>Comments</label>
                  <textarea type="text" class="form-control" name="txtcomments" id="txtcomments" rows="3" placeholder="specify complaint here.."></textarea>
                </div>

               
 </div>
          
              </div>
              <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
      </div>
                
            </form>

      </div>


    
    </div>
 
        <div class="card card-primary card-outline">
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

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
        url:'complaintdelete.php',
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

 <script>
flatpickr("#myID", {});
</script>



<script> 

$(document).ready(function(){
    $('.deletebtn').on('click', function() {
    $('#deletemodal').modal('show');
    
    // $tr=$(this).closest('tr');
    // var data=$tr.children("td").map(function(){
    //   return $(this).text();
    // }).get();
    // console.log(data);
    //  $('#update_id').val(data[0]);
    
    });


    });
</script>

<script> 

$(document).ready(function(){
    $('.editbtn').on('click', function() {
    $('#editmodal').modal('show');
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(data);
     $('#update_id').val(data[0]);
     $('#txtname').val(data[1]);
     $('#txtcontact').val(data[2]);
     $('#txtbuilding').val(data[3]);
     $('#txttypeofcomplaint').val(data[4]);
     $('#txtlocation').val(data[5]);
     $('#txtcomments').val(data[6]);
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

 
