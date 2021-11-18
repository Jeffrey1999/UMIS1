<?php 
  
  session_start();
  include("includes/db_conn.php");
  //include("record-script.php");

  if(!isset($_SESSION['lectName']))
  {
     echo "<script>document.location='login.php'</script>";
  }
  else
  {
    //echo "<script>document.location='index.php'</script>";
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Attachment Manager | Lecturer Profile </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-collapse layout-top-nav">

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <i style="font-size: 22px;" class="fas fa-user-graduate text-blue"></i>
         <?php 

              $username = $_SESSION['lectName'];

              $select_mem = "SELECT * FROM tbl_lecturers WHERE username = '$username'";
              $run_mem    = mysqli_query($db, $select_mem);
              $row_mem    = mysqli_fetch_array($run_mem);
              $name       = $row_mem['lecturer_name'];
         ?>
        <span style="padding-left: 10px; font-weight: 700; color: #007bff"><?php echo $name;  ?></span>
      </a>
       <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="logout.php">
            <i class="fa fa-power-off text-red"></i>
            Logout 
          </a>
        </li>
        <!-- Notifications Dropdown Menu -->
     
     
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->


  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Lecturer Profile </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php"> Lecturer Profile</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!--  content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
            </h3>
          </div>
          <div class="card-body">
            <h4>Menus</h4>
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  
                <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">
                Home
                </a>

                <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false"> 
                 Add Details
                </a>

                <a class="nav-link" id="vert-tabs-pledge-tab" data-toggle="pill" href="#vert-tabs-pledge" role="tab" aria-controls="vert-tabs-pledge" aria-selected="false">
                 View Student Daily Report
                </a>

                 <a class="nav-link" id="vert-tabs-weekly-tab" data-toggle="pill" href="#vert-tabs-weekly" role="tab" aria-controls="vert-tabs-weekly" aria-selected="false">
                 View Student Weekly Report
                </a>

                <a class="nav-link" id="vert-tabs-donation-tab" data-toggle="pill" href="#vert-tabs-donation" role="tab" aria-controls="vert-tabs-donation" aria-selected="false">
                 Assessment
                </a>

                <a class="nav-link" id="vert-tabs-assess-tab" data-toggle="pill" href="#vert-tabs-assess" role="tab" aria-controls="vert-tabs-assses" aria-selected="false">
                 View Assessments
                </a> 

                <a class="nav-link" id="vert-tabs-industy-tab" data-toggle="pill" href="#vert-tabs-industry" role="tab" aria-controls="vert-tabs-industry" aria-selected="false">
                Industry Assessment
                </a> 

                <a class="nav-link" id="vert-tabs-in-assess-tab" data-toggle="pill" href="#vert-tabs-in-assess" role="tab" aria-controls="vert-tabs-in-assess" aria-selected="false"> 
                  View Industry Assessment
                </a>
          
                <a class="nav-link" id="vert-tabs-event-tab" data-toggle="pill" href="#vert-tabs-event" role="tab" aria-controls="vert-tabs-event" aria-selected="false">
                 View Slots
                </a>

                <a class="nav-link" id="vert-tabs-sermon-tab" data-toggle="pill" href="#vert-tabs-sermon" role="tab" aria-controls="vert-tabs-sermon" aria-selected="false">
                 Assigned Student
                </a>

                <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">
                Settings
                </a>

                
               
                
                <!--
                <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Settings
                </a> -->

                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  
                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                    <div class="row">
                      <div class="col-md-6" style="position: relative; left: 15%">
                        <img src="../images/uenr.png" alt="UENR Image" width="250" height="230">
                      </div>

                      <div class="col-md-6">
                      <h4 style="color: #007bff; font-weight: 700; text-align: center;">University of Energy and Natural Resources</h4>
                      <h5 style="color: #007bff; font-weight: 700; text-align: center;">Department of Computer Science and Informatics</h5>
                      <hr>
                      <h6 style="color: #007bff; font-weight: 700; text-align: center;">Industrial Attachment Lecturer Portal</h6>
                      </div>
                    </div>
                  </div>

                  <!-- Profile Start -->
                  <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                    <h3>Lecturer Information: </h3>
                    <hr>
                    <?php    

                        $username = $_SESSION['lectName'];

                        $select_lect = "SELECT * FROM tbl_lecturers WHERE username = '$username'";
                        $run_lect    = mysqli_query($db, $select_lect);
                        $row_lect    = mysqli_fetch_array($run_lect);
                        $lect_id     = $row_lect['lecturer_id'];
                        $lect_name   = $row_lect['lecturer_name'];
                        $staff_id    = $row_lect['staff_id']; 
                        $email       = $row_lect['lecturer_email'];

                    ?>
                   <form action="lecturer-update.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                       <label for="StudentName">Lecturer Name</label>
                      <input type="hidden" name="lect_id" value="<?php echo $lect_id; ?>" class="form-control" required>
                       <input type="text" name="lect_name" value="<?php echo $lect_name; ?>" class="form-control" required>
                      </div>

                       <div class="form-group">
                       <label for="GroupName">Staff Id</label>
                        <input type="hidden" name="lect_id" value="<?php echo $lect_id; ?>" class="form-control" required>
                       <input type="text" name="staff_id" value="<?php echo $staff_id; ?>" class="form-control" required>
                      </div>

                       <div class="form-group">
                       <label for="Volunteer"> Email </label>
                        <input type="hidden" name="lect_id" value="<?php echo $lect_id; ?>" class="form-control" required>
                       <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" required>
                      </div>


                      <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit_btn">
                          Submit Details
                        </button>
                         <button type="submit" class="btn btn-primary" name="btn_update">
                          Update Details
                        </button>
                      </div>
                  </form>
                  </div>
                  <!-- Profile End -->

                   <!-- Report Start -->
                  <div class="tab-pane fade" id="vert-tabs-pledge" role="tabpanel" aria-labelledby="vert-tabs-pledge-tab">
                    <h3>Trainee's Daily Report:</h3><hr>
                  <div class="container">
                  <div class="row">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Student Name</th>
                  <th>Index Number</th>
                  <th>Programme</th>
                  <th>Level</th>
                  <th>Day</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                    $username = $_SESSION['lectName'];
                    $i = 0;

                    // Get Lecturer
                    $select_std  = "SELECT * FROM tbl_lecturers WHERE username = '$username'";
                    $run_std     = mysqli_query($db, $select_std);
                    $row_std     = mysqli_fetch_array($run_std);
                    $lecturer_id = $row_std['lecturer_id'];

                    // Get Student
                    $get_std = "SELECT * FROM tbl_students WHERE lecturer_id = '$lecturer_id'";
                    $run_get = mysqli_query($db, $get_std);
                    $row_get = mysqli_fetch_array($run_get);
                    $student_name = $row_get['fullname'];

                   
                    $sqll = "SELECT * FROM tbl_report WHERE student_name = '$student_name'";
                    $query = mysqli_query($db, $sqll) or die(mysqli_error($db));

                    while($row = mysqli_fetch_array($query))
                    {  
                      
                           $report_id     = $row['report_id'];
                           $student_name  = $row['student_name'];
                           $index_number  = $row['index_number'];
                           $programme     = $row['programme'];
                           $level         = $row['level'];
                           $day           = $row['day'];
                           $job_done      = $row['job_done_desc'];
                           $new_skill     = $row['new_skills'];
                           $report_date   = $row['report_date'];
                    
                           $i++;
                  ?>
                    <tr>                      
                        <td><?php echo $student_name;       ?></td>
                        <td><?php echo $index_number;       ?></td>
                        <td><?php echo $programme;          ?></td>
                        <td><?php echo $level;              ?></td>
                        <td><?php echo $day;                ?></td>                    
                        <td><?php echo date("M d, Y",strtotime($report_date)); ?></td> 
                       <td>
                       <a href="#update<?php echo $report_id; ?>" data-target="#update<?php echo $report_id; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                          <i class="fa fa-eye text-blue"></i>
                        </a>

                       <a href="#delete<?php echo $report_id; ?>" data-target="#delete<?php echo $report_id; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                        <i class="fa fa-trash text-red"></i>
                       </a> 
                      </td>
                    </tr>

        
        <!-- Update Modal -->  
      <div id="update<?php echo $report_id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
          <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <h4 class="modal-title">Report Details</h4>
              </div>
              <div class="modal-body">

            <form class="form-horizontal" method="post" action="report-update.php" enctype='multipart/form-data'>
                    
            <div class="form-group">
              <label class="control-label col-lg-3">Student Name</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="report_id" value="<?php echo $report_id; ?>" required>  
                <input type="text" class="form-control" name="student_name" value="<?php echo $student_name; ?>" required>  
              </div>
            </div> 

             <div class="form-group">
              <label class="control-label col-lg-3">Index Number</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="report_id" value="<?php echo $report_id; ?>" required>  
                <input type="text" class="form-control" name="index_number" value="<?php echo $index_number; ?>" required>  
              </div>
            </div> 

            <div class="form-group">
              <label class="control-label col-lg-3">Programme</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="report_id" value="<?php echo $report_id; ?>" required>  
                <input type="text" class="form-control" name="programme" value="<?php echo $programme; ?>" required>  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-lg-3">Level</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="report_id" value="<?php echo $report_id; ?>" required>  
                <input type="text" class="form-control" name="level" value="<?php echo $level; ?>">  
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-lg-3">Day</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="report_id" value="<?php echo $report_id; ?>" required>  
                <input type="text" class="form-control" name="day" value="<?php echo $day; ?>">  
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-lg-3">Date</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="report_id" value="<?php echo $report_id; ?>" required>  
                <input type="text" class="form-control" name="report_date" value="<?php echo date("M d, Y",strtotime($report_date)); ?>">  
              </div>
            </div>


               <div class="form-group">
                <label class="control-label col-lg-3">Description of Work Done</label>
                <div class="col-lg-9">
                  <input type="hidden" class="form-control" name="report_id" value="<?php echo $report_id; ?>" required>  
                  <textarea class="textarea form-control" name="job_done">
                    <?php echo $job_done; ?>
                  </textarea>
                </div>
              </div>   


               <div class="form-group">
                <label class="control-label col-lg-3">New Skills/Knowledge Learnt</label>
                <div class="col-lg-9">
                  <input type="hidden" class="form-control" name="report_id" value="<?php echo $report_id; ?>" required>  
                  <textarea class="textarea form-control" name="new_skill">
                    <?php echo $new_skill; ?>
                  </textarea>
                </div>
              </div>   
               
                  </div><br>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   <!-- <button type="submit" class="btn btn-primary"> Details</button> -->
                  </div>
                 </form>
                  </div>
              </div><!--end of modal-dialog-->
           </div>


            <!-- Delete  Modal -->
          <div id="delete<?php echo $report_id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <h4 class="modal-title">Delete Report Details</h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" method="post" action="report-del.php">
             
                  <input type="hidden" class="form-control" name="report_id" value="<?php echo $report_id; ?>" required> 
                      
                    <p>Are you sure you want to remove this report?</p>
              
                    </div>
                    <div class="modal-footer">
                     
                      <a href="delete<?php echo $report_id; ?>" style="color: #ffffff;">
                         <button type="submit" name="delete" class="btn btn-primary">
                          Yes </button>
                      </a>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                    </form>
                    </div>
                    </div><!--end of modal-dialog-->
                    </div>             
                        
      
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                 <th>Student Name</th>
                  <th>Index Number</th>
                  <th>Programme</th>
                  <th>Level</th>
                  <th>Day</th>
                  <th>Date</th>
                  <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>

                  </div>
                  <!-- Report End -->



                   <!-- Report Start -->
                  <div class="tab-pane fade" id="vert-tabs-weekly" role="tabpanel" aria-labelledby="vert-tabs-weekly-tab">
                    <h3>Trainee's Weekly Report:</h3><hr>
                  <div class="container">
                  <div class="row">
                  <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Student Name</th>
                  <th>Index Number</th>
                  <th>Level</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                    $username = $_SESSION['lectName'];
                    $i = 0;

                    // Get Lecturer
                    $select_std  = "SELECT * FROM tbl_lecturers WHERE username = '$username'";
                    $run_std     = mysqli_query($db, $select_std);
                    $row_std     = mysqli_fetch_array($run_std);
                    $lecturer_id = $row_std['lecturer_id'];

                    // Get Student
                    $get_std = "SELECT * FROM tbl_students WHERE lecturer_id = '$lecturer_id'";
                    $run_get = mysqli_query($db, $get_std);
                    $row_get = mysqli_fetch_array($run_get);
                    $studen_name = $row_get['fullname'];

                   
                    $sql_wk = "SELECT * FROM tbl_weekly_report WHERE student_name = '$studen_name'";
                    $query_wk = mysqli_query($db, $sql_wk) or die(mysqli_error($db));

                    while($row_wk = mysqli_fetch_array($query_wk))
                    {  
                      
                           $weekly_id     = $row_wk['weekly_id'];
                           $student_name  = $row_wk['student_name'];
                           $index_number  = $row_wk['index_number'];
                           $level         = $row_wk['level'];
                           $report_desc   = $row_wk['report_desc'];
                           $report_date   = $row_wk['report_date'];
                    
                           $i++;
                  ?>
                    <tr>                      
                        <td><?php echo $student_name;       ?></td>
                        <td><?php echo $index_number;       ?></td>
                        <td><?php echo $level;              ?></td>  
                        <td><?php echo substr($report_desc,0,200).".....";?></td>                  
                        <td><?php echo date("M d, Y",strtotime($report_date)); ?></td> 
                       <td>
                       <a href="#update<?php echo $weekly_id; ?>" data-target="#update<?php echo $weekly_id; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                          <i class="fa fa-eye text-blue"></i>
                        </a>

                       <a href="#delete<?php echo $weekly_id; ?>" data-target="#delete<?php echo $weekly_id; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                        <i class="fa fa-trash text-red"></i>
                       </a> 
                      </td>
                    </tr>

        
        <!-- Update Modal -->  
      <div id="update<?php echo $weekly_id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
          <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <h4 class="modal-title">View Weekly Report Details</h4>
              </div>
              <div class="modal-body">

            <form class="form-horizontal" method="post" action="index.php" enctype='multipart/form-data'>
                    
            <div class="form-group">
              <label class="control-label col-lg-3">Student Name</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="report_id" value="<?php echo $weekly_id; ?>" required>  
                <input type="text" disabled="disabled" class="form-control" name="student_name" value="<?php echo $student_name; ?>" required>  
              </div>
            </div> 

             <div class="form-group">
              <label class="control-label col-lg-3">Index Number</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="report_id" value="<?php echo $weekly_id; ?>" required>  
                <input type="text" disabled="disabled" class="form-control" name="index_number" value="<?php echo $index_number; ?>" required>  
              </div>
            </div> 

            <div class="form-group">
              <label class="control-label col-lg-3">Level</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="weekly_id" value="<?php echo $weekly_id; ?>" required>  
                <input type="text" disabled="disabled"  class="form-control" name="level" value="<?php echo $level; ?>">  
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-lg-3"> Report Date</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="weekly_id" value="<?php echo $weekly_id; ?>" required>  
                <input type="text" disabled="disabled" class="form-control" name="report_date" value="<?php echo date("M d, Y",strtotime($report_date)); ?>">  
              </div>
            </div>


               <div class="form-group">
                <label class="control-label col-lg-3">Trainee's weekly report</label>
                <div class="col-lg-9">
                  <input type="hidden" class="form-control" name="weekly_id" value="<?php echo $weekly_id; ?>" required>  
                  <textarea class="textarea form-control" name="report_desc">
                    <?php echo $report_desc; ?>
                  </textarea>
                </div>
              </div>   
               
                  </div><br>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   <!-- <button type="submit" class="btn btn-primary"> Details</button> -->
                  </div>
                 </form>
                  </div>
              </div><!--end of modal-dialog-->
           </div>


            <!-- Delete  Modal -->
          <div id="delete<?php echo $weekly_id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <h4 class="modal-title">Delete Weekly Report Details</h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" method="post" action="weekly-del.php">
             
                  <input type="hidden" class="form-control" name="weekly_id" value="<?php echo $weekly_id; ?>" required> 
                      
                    <p>Are you sure you want to remove this report?</p>
              
                    </div>
                    <div class="modal-footer">
                     
                      <a href="delete<?php echo $weekly_id; ?>" style="color: #ffffff;">
                         <button type="submit" name="delete" class="btn btn-danger">
                          Yes </button>
                      </a>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    </div>
                    </form>
                    </div>
                    </div><!--end of modal-dialog-->
                    </div>             
                        
      
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Student Name</th>
                  <th>Index Number</th>
                  <th>Level</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>View</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>

                  </div>
                  <!-- Report End -->





                <!--Add Report Start -->
                <div class="tab-pane fade" id="vert-tabs-donation" role="tabpanel" aria-labelledby="vert-tabs-donation-tab">
                  <h3>Overall Student Assessment Report:</h3> <br><hr>
                <form action="add-report.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                 <div class="row">
                
                <div class="col-md-6">
                <div class="form-group">
                <label class="col-md-12 control-label">Student Name</label>
                <div class="col-md-12">
                <input type="text" name="student_name" class="form-control" required>  
                </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                <label class="col-md-12 control-label">Index Number</label>
                <div class="col-md-12">
                <input type="text" name="index_number" class="form-control" required>  
                </div>
                </div>
              </div>

            </div>

                <div class="form-group">
                <label class="col-md-12 control-label">Name & Address of Institution</label>
                <div class="col-md-12">
                <input type="text" name="comp_name" class="form-control" required>
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-3 control-label">Email/Telephone</label>
                <div class="col-md-12">
                <input type="text" name="email" class="form-control" required>  
                </div>
                </div>
              
               <br>
               <h4>Period of Attachment: </h4>
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <label class="col-md-12 control-label">From</label>
                <div class="col-md-12">
                <input type="text" class="form-control" name="attach_from" required>  
                </div>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label class="col-md-3 control-label">To</label>
                <div class="col-md-12">
                <input type="text" name="attach_to" class="form-control" required>  
                </div>
                </div>
                </div>
                </div>

                <br>
               <h4>Evaluation: </h4>
                <div class="row">
                
                <!-- Attendance -->
                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-12 control-label">Assessment On</label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="Attendance" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-12 control-label">Marks(%)</label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="20" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-12 control-label">Score(%)</label>
                <div class="col-md-12">
                <input type="text" name="attend_score" class="form-control" required>
                </div>
                </div>
                </div>
                <!--Attendance End -->


                <!--Punctuality -->
                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-12 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="Punctuality" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="15" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" name="punct_score" class="form-control" required>
                </div>
                </div>
                </div>
                <!-- Punctuality End -->

                <!--Co-operation -->
                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-12 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="Co-operation" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="10" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" name="coop_score" class="form-control" required>
                </div>
                </div>
                </div>
                <!-- Co-operation End -->


                <!-- Aptitude  -->
                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-12 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="aptitude" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="15" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" name="apt_score" class="form-control" required>
                </div>
                </div>
                </div>
                <!-- Aptitude End -->


                <!-- UFL -->
                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-12 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="Understanding for learning" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="10" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" name="ufl_score" class="form-control" required>
                </div>
                </div>
                </div>
                <!-- UFL End -->


                <!-- CTI -->
                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-12 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="Contribution to industry" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="10" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" name="cti_score" class="form-control" required>
                </div>
                </div>
                </div>
                <!-- CTI End -->


                <!-- ASER -->
                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-12 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="Safety & environmental rules" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="10" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" name="aser_score" class="form-control" required>
                </div>
                </div>
                </div>
                <!-- ASER End -->


                <!-- Little Supervision work -->
                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-12 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="Little supervision ability" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="10" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" name="lcw_score" class="form-control" required>
                </div>
                </div>
                </div>
                <!-- Little Supervision work End -->


                <!-- ASER -->
                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-12 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="Total" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" disabled="disabled" name="marks" value="100" class="form-control" required>
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                <input type="text" name="total_score" class="form-control" required>
                </div>
                </div>
                </div>
                <!-- ASER End -->
                </div>
                <br>

                <div class="form-group">
                <label class="col-md-12 control-label">Additional comments/suggestions</label>
                <div class="col-md-12">
                 <textarea class="textarea form-control" name="comment"></textarea>  
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-12 control-label">Name of reporting officer</label>
                <div class="col-md-12">
                <input type="text" name="report_officer" class="form-control" required>
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-12 control-label">Designation/Rank</label>
                <div class="col-md-12">
                <input type="text" name="rank" class="form-control" required>
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-12 control-label">Date</label>
                <div class="col-md-12">
                <input type="date" name="assess_date" class="form-control" required>
                </div>
                </div>

                  <div class="form-group">
                  <label class="col-md-3 control-label"></label>
                  <div class="col-md-9">
                  <button type="submit" class="btn btn-primary" name="report_btn">
                   Submit Assessment
                  </button> 
                  </div>
                  </div>

                   
                  </form>
                  </div>
                  <!-- Add Report End -->


                  <!-- View Assess Start -->
                <div class="tab-pane fade" id="vert-tabs-assess" role="tabpanel" aria-labelledby="vert-tabs-assess-tab">
                   <h3>View Student Assessment Report:</h3> <br><hr>
                     <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>No.</th>
                  <th>Student Name</th>
                  <th>Index Number</th>
                  <th>Institution</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                    $username = $_SESSION['lectName'];
                    $i = 0;

                    // Get Lecturer
                    $select_std    = "SELECT * FROM tbl_lecturers WHERE username = '$username'";
                    $run_std       = mysqli_query($db, $select_std);
                    $row_std       = mysqli_fetch_array($run_std);
                    $lecturer_id   = $row_std['lecturer_id'];
                    $lec_name      = $row_std['lecturer_name'];
                   
                    $sql = "SELECT * FROM tbl_assess WHERE report_officer = '$lec_name'";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

                    while($row = mysqli_fetch_array($query))
                    {  
                      
                       $assess_id        = $row['assess_id'];
                       $student_name     = $row['student_name'];
                       $index_number     = $row['index_number'];
                       $comp_name        = $row['comp_name'];
                       $email            = $row['email'];
                       $attach_from      = $row['attach_from'];
                       $attach_to        = $row['attach_to'];
                       $attend_score     = $row['attend_score'];
                       $punct_score      = $row['punct_score'];
                       $apt_score        = $row['apt_score'];
                       $coop_score       = $row['coop_score'];
                       $ufl_score        = $row['ufl_score'];
                       $cti_score        = $row['cti_score'];
                       $aser_score       = $row['aser_score'];
                       $lcw_score        = $row['lcw_score'];
                       $total_score      = $row['total_score'];
                       $comment          = $row['comment'];
                       $report_officer   = $row['report_officer'];
                       $rank             = $row['rank'];
                       $assess_date      = $row['assess_date'];
                    
                       $i++;
                  ?>
                    <tr>
                      <td><?php echo $i;                ?></td>
                      <td><?php echo $student_name;     ?></td>
                      <td><?php echo $index_number;     ?></td>
                      <td><?php echo $comp_name;        ?></td>
                      <td><?php echo date("M d, Y",strtotime($assess_date)); ?></td>
                       <td>
                    <a href="view-assess.php?assess_id=<?php echo $assess_id; ?>" style="color:#fff;" class="small-box-footer">
                          <button class="btn btn-primary btn-sm"><i class="fa fa-eye text-white"></i> View</button>
                        </a>

                      <!-- <a href="#delete<?php echo $assess_id; ?>" data-target="#delete<?php echo $assess_id; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                        <i class="fa fa-trash text-red"></i>
                       </a>  -->

                      </td>
                    </tr>

                      
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th> 
                  <th>Student Name</th>
                  <th>Index Number</th>
                  <th>Institution</th>
                  <th>Date</th>
                  <th>Action</th>
                  </tr>
                  </tfoot>
                  </table>
                  </div>
                  <!-- View Assess End -->


                  <!-- Industry Report Start -->
                <div class="tab-pane fade" id="vert-tabs-industry" role="tabpanel" aria-labelledby="vert-tabs-industry-tab">
                  <h3>Weekly Industry Supervisor's Comments:</h3> <br><hr>
                <form action="industry-report.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                 <div class="row">
                
                <div class="col-md-6">
                <div class="form-group">
                <label class="col-md-12 control-label">Student Name</label>
                <div class="col-md-12">
                <input type="text" name="student_name" class="form-control" required>  
                </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                <label class="col-md-12 control-label">Index Number</label>
                <div class="col-md-12">
                <input type="text" name="index_number" class="form-control" required>  
                </div>
                </div>
              </div>

            </div>

                <div class="form-group">
                <label class="col-md-12 control-label">Name & Address of Institution</label>
                <div class="col-md-12">
                <input type="text" name="comp_name" class="form-control" required>
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-12 control-label"> Comments </label>
                <div class="col-md-12">
                 <textarea class="textarea form-control" name="comp_comment"></textarea>  
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-12 control-label">Name of the Supervisor</label>
                <div class="col-md-12">
                <input type="text" name="comp_supername" class="form-control" required>
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-12 control-label">Department/Unit</label>
                <div class="col-md-12">
                <input type="text" name="comp_unit" class="form-control" required>
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-12 control-label">Date</label>
                <div class="col-md-12">
                <input type="date" name="comp_date" class="form-control" required>
                </div>
                </div>

                <br><br>
                <h4>UENR Supervisor's Comments</h4>
                <hr>

                <div class="form-group">
                <label class="col-md-12 control-label"> Comments </label>
                <div class="col-md-12">
                 <textarea class="textarea form-control" name="uenr_comment"></textarea>  
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-12 control-label">Name of the UENR Supervisor</label>
                <div class="col-md-12">
                <input type="text" name="uenr_supername" class="form-control" required>
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-12 control-label">Department/Unit</label>
                <div class="col-md-12">
                <input type="text" name="uenr_unit" class="form-control" required>
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-12 control-label">Visitation Date</label>
                <div class="col-md-12">
                <input type="date" name="uenr_date" class="form-control" required>
                </div>
                </div>

                  <div class="form-group">
                  <label class="col-md-3 control-label"></label>
                  <div class="col-md-9">
                  <button type="submit" class="btn btn-primary" name="industry_btn">
                   Submit Assessment
                  </button> 
                  </div>
                  </div>                   
                  </form>
                  </div>
                  <!-- Industry Report End -->


                  <div class="tab-pane fade" id="vert-tabs-in-assess" role="tabpanel" arial-labelledby="vert-tabs-in-assess-tab">     
                    <h4>View Industry Assessments </h4><hr><br>
                  <table id="example4" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Student Name</th>
                        <th>Index Number</th>
                        <th>Institution</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php     

                        $username = $_SESSION['lectName'];
                        $i = 0;

                        // Get Lecturer
                        $select_std    = "SELECT * FROM tbl_lecturers WHERE username = '$username'";
                        $run_std       = mysqli_query($db, $select_std);
                        $row_std       = mysqli_fetch_array($run_std);
                        $lecturer_id   = $row_std['lecturer_id'];
                        $lec_name      = $row_std['lecturer_name'];
                   
                        $sql = "SELECT * FROM tbl_industry_assess WHERE uenr_supername = '$lec_name'";
                        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

                        while($row = mysqli_fetch_array($query))
                        {  

                            $industry_id    = $row['industry_id'];
                            $student_name   = $row['student_name'];
                            $index_number   = $row['index_number'];
                            $comp_name      = $row['comp_name'];
                            $comp_comment   = $row['comp_comment'];
                            $comp_supername = $row['comp_supername'];
                            $comp_unit      = $row['comp_unit'];
                            $comp_date      = $row['comp_date'];
                            $uenr_comment   = $row['uenr_comment'];
                            $uenr_supername = $row['uenr_supername'];
                            $uenr_unit      = $row['uenr_unit'];
                            $uenr_date      = $row['uenr_date'];

                            $i++;

                      ?>

                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $student_name; ?></td>
                          <td><?php echo $index_number; ?></td>
                          <td><?php echo $comp_name;    ?></td>
                          <td><?php echo date("M d, Y",strtotime($uenr_date));  ?></td>
                          <td>
                          <a href="#update<?php echo $industry_id; ?>" data-target="#update<?php echo $industry_id; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                          <i class="fa fa-eye text-blue"></i>
                          </a>

                          <a href="#delete<?php echo $industry_id; ?>" data-target="#delete<?php echo $industry_id; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                          <i class="fa fa-trash text-red"></i>
                         </a>
                          </td>
                        </tr>


        
        <!-- Update Modal -->  
      <div id="update<?php echo $industry_id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
          <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <h4 class="modal-title">Industry Assessment Details</h4>
              </div>
              <div class="modal-body">

            <form class="form-horizontal" method="post" action="industry-update.php" enctype='multipart/form-data'>
                    
            <div class="form-group">
              <label class="control-label col-lg-3">Student Name</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required>  
                <input type="text" class="form-control" name="student_name" value="<?php echo $student_name; ?>" required>  
              </div>
            </div> 

             <div class="form-group">
              <label class="control-label col-lg-3">Index Number</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required>  
                <input type="text" class="form-control" name="index_number" value="<?php echo $index_number; ?>" required>  
              </div>
            </div> 

            <div class="form-group">
              <label class="control-label col-lg-3">Institution</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required>  
                <input type="text" class="form-control" name="comp_name" value="<?php echo $comp_name; ?>" required>  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-lg-3">Industry Supervisor's Comment</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required>  
                <textarea class="textarea form-control" name="comp_comment">
                  <?php echo $comp_comment;  ?>
                </textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-lg-3">Name of the supervisor </label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required>  
                <input type="text" class="form-control" name="comp_supername" value="<?php echo $comp_supername; ?>">  
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-lg-3">Department/Unit</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required>  
                <input type="text" class="form-control" name="comp_unit" value="<?php echo $comp_unit; ?>">  
              </div>
            </div>


               <div class="form-group">
                <label class="control-label col-lg-3">Date</label>
                <div class="col-lg-9">
                  <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required>  
                  <input type="date" name="comp_date" class="form-control" value="<?php echo $comp_date; ?>">
                </div>
              </div>   

              <br>
              <h4>UENR Supervisor's Comment</h4>
              <hr>

               <div class="form-group">
                <label class="control-label col-lg-3">Comment</label>
                <div class="col-lg-9">
                  <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required>  
                  <textarea class="textarea form-control" name="uenr_comment">
                    <?php echo $uenr_comment; ?>
                  </textarea>
                </div>
              </div>


            <div class="form-group">
              <label class="control-label col-lg-3">Name of the supervisor </label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required>  
                <input type="text" class="form-control" name="uenr_supername" value="<?php echo $uenr_supername; ?>">  
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-lg-3">Department/Unit</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required>  
                <input type="text" class="form-control" name="uenr_unit" value="<?php echo $uenr_unit; ?>">  
              </div>
            </div>


               <div class="form-group">
                <label class="control-label col-lg-3">Date</label>
                <div class="col-lg-9">
                  <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required>  
                  <input type="date" name="uenr_date" class="form-control" value="<?php echo $uenr_date; ?>">
                </div>
              </div>      
               
                  </div><br>
                  <div class="modal-footer">
                   <button type="submit" class="btn btn-primary"> Update Details </button> 
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  
                  </div>
                 </form>
                  </div>
              </div><!--end of modal-dialog-->
           </div>


            <!-- Delete  Modal -->
          <div id="delete<?php echo $industry_id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <h4 class="modal-title">Delete Industry Assessment Details</h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" method="post" action="industry-del.php">
             
                  <input type="hidden" class="form-control" name="industry_id" value="<?php echo $industry_id; ?>" required> 
                      
                    <p>Are you sure you want to remove this Assessment?</p>
              
                    </div>
                    <div class="modal-footer">
                     
                      <a href="delete<?php echo $industry_id; ?>" style="color: #ffffff;">
                         <button type="submit" name="delete" class="btn btn-primary">
                          Yes 
                         </button>
                      </a>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                    </form>
                    </div>
                    </div><!--end of modal-dialog-->
                    </div>             
                      

                    <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Student Name</th>
                        <th>Index Number</th>
                        <th>Institution</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>       
                  </div>
                 

                  <!-- View Slot Start -->
                    <div class="tab-pane fade" id="vert-tabs-event" role="tabpanel" aria-labelledby="vert-tabs-event-tab">
                      <h3>Slots:</h3> <hr> <br>
                     <div class="row">
                      <div class="col-12">
                        <div class="card card-primary card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Slot Details</h3>
                            <div class="card-tools">
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-0" style="height: 300px;">
                              <table class="table table-head-fixed text-nowrap">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Slot Name</th>
                                  <th>Slot Location</th>
                                  <th>Phone Number</th>
                                  <th>Email</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php 

                              $i = 0;

                              $sql = "SELECT * FROM tbl_slots";
                              $query = mysqli_query($db, $sql) or die(mysqli_error($db));
                              
                              while($row = mysqli_fetch_array($query))
                              {
                                  $slot_id       = $row['slot_id'];
                                  $slot_name     = $row['slot_name'];
                                  $slot_address  = $row['slot_address'];
                                  $slot_number   = $row['slot_number'];
                                  $slot_email    = $row['slot_email'];
                                  
                                  $i++;

                            ?>
                              <tr>
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $slot_name; ?></td>
                                <td><?php echo $slot_address; ?></td>
                                <td><?php echo $slot_number; ?></td>
                                <td><?php echo $slot_email; ?></td>
                              </tr>

                              <?php }  ?>
                              </tbody>
                            </table>      
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
                    </div>
                  <!-- View Slot End -->


                  <!-- View Assign Start -->
                  <div class="tab-pane fade" id="vert-tabs-sermon" role="tabpanel" aria-labelledby="vert-tabs-sermon-tab">
                      <h3>Assigned Details:</h3> <hr> <br>
                     <div class="row">
                      <div class="col-12">
                        <div class="card card-primary card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Assigned Details</h3>
                          </div>
                          <!-- /.card-header -->

                          <div class="card-body table-responsive p-0" style="height: 300px;">
                           <table class="table table-head-fixed text-nowrap">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Student Name</th>
                                  <th>Slot</th>
                                  <th>Supervisor</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php 

                              $username = $_SESSION['lectName'];

                              $select_std   = "SELECT * FROM tbl_lecturers WHERE username = '$username'";
                              $run_std      = mysqli_query($db, $select_std);
                              $row_std      = mysqli_fetch_array($run_std);
                              $lecturer_id  = $row_std['lecturer_id'];


                              $i = 0;
                              $sql = "SELECT * FROM tbl_students WHERE lecturer_id = '$lecturer_id'";
                              $query = mysqli_query($db, $sql) or die(mysqli_error($db));
                          
                              while($row = mysqli_fetch_array($query))
                              {
                                 $student_id       = $row['student_id'];
                                 $student_name     = $row['fullname'];
                                 $slot_id          = $row['slot_id'];
                                 $lecturer_id      = $row['lecturer_id'];
                                 $comp_name        = $row['company_name'];
                                 $status           = $row['assign_status'];

                                 //get slot
                                 $get_slot = "SELECT * FROM tbl_slots WHERE slot_id = '$slot_id'";
                                 $run_slot = mysqli_query($db, $get_slot);
                                 $row      = mysqli_fetch_array($run_slot);
                                 $slot_name = $row['slot_name'] ?? null;

                                  //get Lect
                                 $get_lect = "SELECT * FROM tbl_lecturers WHERE lecturer_id = '$lecturer_id'";
                                 $run_lect = mysqli_query($db, $get_lect);
                                 $row      = mysqli_fetch_array($run_lect);
                                 $lect_name = $row['lecturer_name'] ?? null;
                                 
                                 $i++;

                           ?>
                          <tr>
                            <td><?php echo $i;  ?></td>
                            <td><?php echo $student_name; ?></td>
                            <td>
                              <?php
                                  if($slot_name == 'Self Slot')
                                  {
                                    echo $comp_name;
                                  }
                                  else
                                  {
                                    echo $slot_name;
                                  }
                              ?>
                            </td>
                            <td><?php echo $lect_name; ?></td>
                            <td>
                               
                             <?php
                              if($status == 'Assigned')
                              {
                                echo "<span class='badge bg-green'>Assigned</span>";
                              }
                              else
                              {
                                 echo "<span class='badge bg-red'>Unassigned</span>";
                              }
                            ?>
                    
                            </td>
                          </tr>

                              <?php }  ?>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
                    </div>
                  <!-- View Sermon End -->


                                    <!-- Settings Start -->
                    <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                      <h3>Change Details:</h3> <hr> <br>
                     <div class="row">
                      <div class="col-12">
                          <form action="update-details.php" method="post">
                             <?php 

                               $username = $_SESSION['lectName'];

                               $select_user = "SELECT * FROM tbl_lecturers WHERE username = '$username'";
                               $run_user    = mysqli_query($db, $select_user);
                               $row_user    = mysqli_fetch_array($run_user);
                               $lectu_id    = $row_user['lecturer_id'];
                               $lect_user   = $row_user['username'];


                            ?>
                            <div class="form-group col-md-6">
                              <label>Username</label>
                              <input type="hidden" name="lectu_id" value="<?php echo $lectu_id; ?>" class="form-control" required>
                              <input type="text" name="username" value="<?php echo $lect_user; ?>" class="form-control" required>
                            </div>

                            <div class="form-group col-md-6">
                              <label>Password</label>
                              <input type="hidden" name="lectu_id" value="<?php echo $lectu_id; ?>" class="form-control" required>
                              <input type="text" name="password" value="****************" class="form-control" required>
                            </div>

                            <div class="form-group col-md-6">
                              <button type="submit" name="change_details" class="btn btn-primary">Update Details</button>
                            </div>
                          </form>
                      </div>
                    </div>
                    </div>

                  <!-- Settings End -->


                 

                

                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div><br>  


      </div>
    </div>
  </div>
  <!-- Content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="index.php">Industrial Attachment Manager | UENR - CSITSA </a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->



<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,

    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php  } ?>