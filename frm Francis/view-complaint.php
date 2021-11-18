<?php 

$active = 'Complaint';
include("includes/header.php"); 

?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid"> <br>
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"> Complaint User </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Content Begin -->
      <section class="content">
      <div class="container-fluid">

         <div class="card card-primary card-outline">
          <div class="card-header no-print">
          <h3 class="card-title">
          
          <!--<a href="" style="color:#fff;" class="small-box-footer">
            <button class="btn btn-primary">
            <i class="fa fa-print text-white"></i>
              Print
            </button>
          </a>

          <a href="export-pdf.php" style="color:#fff;" class="small-box-footer">
            <button type="submit" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i>
              PDF
            </button>
          </a>

          <a href="export-student-csv.php" style="color:#fff;" class="small-box-footer">
            <button type="submit" class="btn btn-warning">
            <i class="fas fa-file-csv"></i>
              CSV
            </button>
          </a>


          <a href="export-student-excel.php" style="color:#fff;" class="small-box-footer">
            <button type="submit" class="btn btn-success">
            <i class="fas fa-file-excel"></i>
              Excel
            </button>
          </a> -->

            Complaint Details

          </h3>
          </div>
          <div class="card-body"> 

        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
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
                </thead>
                <tbody>
                  <?php

                    $i = 0;
                    $sql = "SELECT * FROM tbl_complaint";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

                        while($row = mysqli_fetch_array($query))
                        {

                          $id           = $row['id']  ?? null;
                          $name         = $row['name']  ?? null;
                          $contact      = $row['contact']  ?? null;
                          $building     = $row['building'] ?? null;
                          $c_type       = $row['typeofcomplaint'] ?? null;
                          $comment      = $row['comments'] ?? null;
                          $location     = $row['location'] ?? null;
                          $status       = $row['status'] ?? null;

                          $i++;
                        

                  ?>
                    <tr>
                      <td><?php echo $i;             ?></td>
                      <td><?php echo $name;      ?></td>
                      <td><?php echo $contact;  ?></td>          
                      <td><?php echo $building;     ?></td>
                      <td><?php echo $c_type;         ?></td>
                      <td><?php echo $location;         ?></td>  
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

                        <a href="#delete<?php echo $id; ?>" data-target="#delete<?php echo $id ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                          <i class="fa fa-trash text-red"></i>
                       </a> 
                      </td>
                    </tr>

                     <!-- Update Modal -->
          <div id="update<?php echo $id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-xl">
          <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <h4 class="modal-title">Approve Compliant Details</h4>
              </div>
              <div class="modal-body">

            <form class="form-horizontal" method="post" action="complaint-update.php" enctype='multipart/form-data'>
                    
            <div class="form-group">
              <label class="control-label col-lg-3">Name</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>  
                <input type="text"  class="form-control" name="name" value="<?php echo $name; ?>">  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-lg-3">Contact</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>  
                <input type="text"  class="form-control"  name="contact" value="<?php echo $contact; ?>">  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-lg-3">Building </label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>  
                <input type="text" class="form-control" name="building" value="<?php echo $building; ?>">  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-lg-3">Complaint Type </label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required> 
                <input type="text" class="form-control" name="c_type" value="<?php echo $c_type; ?>"> 
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-lg-3">Location</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>  
                 <input type="text" class="form-control" name="location" value="<?php echo $location; ?>">     
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-lg-3"> Comment </label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>  
                <textarea class="textarea form-control" name="comment">
                 <?php echo $comment; ?>   
               </textarea>
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-lg-3"> Status </label>
              <div class="col-lg-9">
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

<?php include("includes/footer.php"); ?>
<?php include("includes/footer_links.php"); ?>