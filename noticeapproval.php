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
        <div class="card card-success card-outline">
          <div class="card-header">
            <h2 class="card-title"> <b>APPROVE ALL NOTICES</b> <small> UENR ESTATE MANAGEMENT</small></h2>
            <section class="content-header">
  
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
    <li class="breadcrumb-item active">Notice Approval</li>
</ol>       
</section>
          </div> <!-- /.card-body -->
          <div class="card-body">

        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
                  <table id="assettable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Facility</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <th>Commment</th>
                  <th class="no-print">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      $db = mysqli_connect("localhost", "root", "", "pos_db");
                    $i = 0;
                    $sql = "SELECT * FROM tbl_noticeapproval";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

                        while($row = mysqli_fetch_array($query))
                        {

                          $id           = $row['id']  ?? null;
                          $name         = $row['applicant']  ?? null;
                          $contact      = $row['contact']  ?? null;
                          $facility     = $row['facility'] ?? null;
                          $startdate       = $row['start_date'] ?? null;
                          $enddate      = $row['end_date'] ?? null;
                          $comment     = $row['comment'] ?? null;
                          $status       = $row['status'] ?? null;

                          $i++;
                        

                  ?>
                    <tr>
                      <td><?php echo $i;             ?></td>
                      <td><?php echo $name;      ?></td>
                      <td><?php echo $contact;  ?></td>          
                      <td><?php echo $facility;     ?></td>
                      <td><?php echo $startdate;         ?></td>
                      <td><?php echo $enddate;         ?></td>  
                      <td>
                        <?php
                              if($status == 'Approved')
                              {
                                echo "<span class='badge bg-green'>Approved</span>";
                              }
                              else
                              {
                                 echo "<span class='badge bg-red'>Not-Approved</span>";
                              }
                        ?>
                    </td>
                    <td><?php echo $comment; ?></td>
              
                       <td class="no-print">
                        <a href="#update<?php echo $id;?>" data-target="#update<?php echo $id; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                            <i class="fa fa-edit text-blue"></i>
                        </a>

                        <!-- <a href="#delete<?php echo $id; ?>" data-target="#delete<?php echo $id ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                          <i class="fa fa-trash text-red"></i>
                       </a>  -->
                      </td>
                    </tr>

                     <!-- Update Modal -->
          <div id="update<?php echo $id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
          <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <h4 class="modal-title">Approve Notice</h4>
              </div>
              <div class="modal-body">

            <form class="form-horizontal" method="post" action="noticeupdate.php" enctype='multipart/form-data'>



            <div class="row">
                <div class="col-6 col-md-6" > 


            <div class="form-group">
              <label class="control-label ">Name</label>
              <div >
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>  
                <input type="text"  class="form-control" name="name" value="<?php echo $name; ?>">  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label ">Contact</label>
              <div >
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>  
                <input type="text"  class="form-control"  name="contact" value="<?php echo $contact; ?>">  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label">Facility </label>
              <div >
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>  
                <input type="text" class="form-control" name="building" value="<?php echo $facility; ?>">  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label ">Start Date </label>
              <div >
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required> 
                <input type="text" class="form-control" name="c_type" value="<?php echo $startdate; ?>"> 
              </div>
            </div>


            <div class="form-group">
              <label class="control-label">End Date</label>
              <div>
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>  
                 <input type="text" class="form-control" name="location" value="<?php echo $enddate; ?>">     
              </div>
            </div>
            <div class="form-group">
              <label class="control-label"> Comment </label>
              <div >
                <input type="hidden" value="<?php echo $id; ?> class="form-control" name="id"  required>  
                <textarea class="textarea form-control" name="comment">
                 <?php echo $comment; ?>   
               </textarea>
              </div>
            </div>
</div>
                


                <div class="col-6 col-md-6">

<div class="form-group">
  <label>Payment</label>
  <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id"  placeholder="Enter Name"required>
  <input type="number" class="form-control" name="txtpayment" id="txtpayment"  placeholder="Enter Payment"required>
  </diV>
<div>
<div class="form-group">
  <label>Amount</label>
  <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id"  placeholder="Enter Name"required>
  <input type="number" class="form-control" name="txtamount" id="txtamount"  placeholder="Enter amount"required>
</div>
<div>
<div class="form-group">
  <label>Approved By</label>
  <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id"  placeholder="Enter Name"required>
  <input type="text" class="form-control" name="txtapprovedby" id="txtapprovedby"  placeholder="eg: Mr.Asamoah"required>
  </diV>
<div>
<div class="form-group">
  <label> Approval Date</label>
  <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="far fa-calendar-alt"></i>
          </span>
        </div>
        <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id"  placeholder="Enter Name"required>
        <input class="form-control" name="txtapprovaldate" type="date" id="myID" placeholder="select date">
      </div>
</div>

<div class="form-group">
  <label>Condition</label>
  <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id"  placeholder="Enter Name"required>
  <input type="text" class="form-control" name="txtcondition" id="txtcondition"  placeholder="eg: "required>
  </diV>
<div>

<div class="form-group">
  <label>Security Officer</label>
  <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id"  placeholder="Mr. Jeffrey"required>
  <input type="text" class="form-control" name="txtsecurityofficer"  placeholder="Mr. Jeffrey"required>
</div>



          

             <div class="form-group">
              <label class="control-label"> Status </label>
              <div class="">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>  
                <select name="status" class="form-control">
                  <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                  <option value="Approved">Approved</option>
                  <option value="Not-Approved">Not-Approved</option>
                </select>  
              </div>
            </div>

            
            </div><br>
            
            <div class="modal-footer">
            <button type="submit" name="btn-update" class="btn btn-primary"> Update Details </button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
            </div>
            </form>
            </div>
            </div>
            </div>
          <!--end of modal-->   


        <!-- Delete Modal -->         
       <div id="delete<?php echo $id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="modal-content" style="height:auto">
         <div class="modal-header">
             <h4 class="modal-title">Delete Complaint Details</h4>
         </div>

         <div class="modal-body">
          <form class="form-horizontal" method="post" action="student-del.php">
             
            <input type="hidden" class="form-control" name="student_id" value="<?php echo $id; ?>" required> 
                      
            <p>Are you sure you want to <b>Delete</b> this Complaint?</p>
              
         </div>
         <div class="modal-footer">
          <button type="submit" name="delete" class="btn btn-danger"> 
           Delete
          </button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">
           Close
          </button>
          </div>
         </form>
        </div>
        </div>
      </div>  

                  
      
                  <?php }  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Building</th>
                  <th>Complaint Type</th>
                  <th>Location</th>
                  <th>Status</th>
                  <th>Commment</th>
                  <th class="no-print">Action</th>
                  </tr>
                  </tfoot>
                </table>    
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          

          </div>
        </div>
     

        </div>
      </div>
    </section>

</div>

<?php
include 'include/footer.php';
  ?>