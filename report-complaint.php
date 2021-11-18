<?php
include 'connectdb.php';
$active = 'contractor';
session_start();
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Admin Panel | Attachment Portal </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
  
  </nav>
  <!-- /.navbar -->

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attachment Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"> Attachment Report </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-12 no-print">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> IT Attachment Report </h3>
              </div>
              <div class="card-body">

              
                <!-- Date range -->
                <form method="post"> 
                <div class="form-group col-md-6">
                  <label>Date range:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" name="date" class="form-control float-right" id="reservation">
                  </div>
                </div>
                  <div class="form-group">
                 <button type="submit" class="btn btn-primary" name="display">Display</button>
               </div>
               </form>
                <?php

                 if(isset($_POST['display']))
                 {
                    $date   = $_POST['date'];
                    $date   = explode('-',$date);
                    $start  = date("Y/m/d",strtotime($date[0]));
                    $end    = date("Y/m/d",strtotime($date[1]));

                 ?>
              </div>
            </div>
          </div>




             <div class="col-md-12">
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Attachment Report</h3>
              </div>
              <div class="card-body">
                 
                 <?php
                  
                      $query  = mysqli_query($db,"select * from univ_info_tbl")or die(mysqli_error());  
                      $row    = mysqli_fetch_array($query);
                  ?>

                   <h4 style="font-size: 20px; text-align: center; color: #007bff;">
                    <b><?php echo $row['univ_name'];?></b> 
                  </h4>  
                  <h5 style="font-size: 20px; text-align: center; color: #007bff;">
                     <b><?php echo $row['dept_name'];?> </b>
                  </h5>
                  <h6 style="font-size: 20px; text-align: center; color: #007bff;">
                    <b><?php echo "Management Report "; ?></b> 
                  </h6> 
    

          <h5 style="font-size: 20px; text-align: center; color: #007bff; margin-bottom: 20px; ">
            <b>
              Attachment Report as of <?php echo date("M d, Y",strtotime($start))." to ".date("M d, Y",strtotime($end));?> 
            </b>
          </h5>
          <hr>
    

                    <table id="example1" class="table table-bordered">
                    <thead>
                      <tr>
                      <th>Student Name</th>
                      <th>Programme</th>
                      <th>Level</th>
                      <th>Day</th>
                      <th>Work Done Description</th>
                      <th>New Skills Learnt</th>
                      <th>Date</th>
                      </tr>
                    </thead>
                   <tbody>
                  <?php
                  
                    $query = mysqli_query($db,"SELECT * FROM tbl_report WHERE date(report_date)>='$start' AND date(report_date)<='$end' AND programme = 'IT' ORDER BY report_date")or die(mysqli_error($db));

                      while($row = mysqli_fetch_array($query))
                        {

                           $report_id     = $row['report_id'];
                           $student_name  = $row['student_name'];
                           $programme     = $row['programme'];
                           $level         = $row['level'];
                           $day           = $row['day'];
                           $job_done      = $row['job_done_desc'];
                           $new_skill     = $row['new_skills'];
                           $report_date   = $row['report_date'];

                                               
                  ?>

                      <tr>
                        <td><?php echo $student_name;       ?></td>
                        <td><?php echo $programme;          ?></td>
                        <td><?php echo $level;              ?></td>
                        <td><?php echo $day;                ?></td>  
                        <td><?php echo $job_done;           ?></td> 
                        <td><?php echo $new_skill;          ?></td>                         
                        <td><?php echo date("M d, Y",strtotime($report_date)); ?></td>
                      </tr> 
                 <?php } } ?>
                     </tbody>
                     </table>
                     </div>
                     <div class="no-print" style="margin-top: 20px; margin-bottom: 70px; margin-left: 17px;">
                      
                      <a class = "btn btn-primary" href = "" onclick = "window.print()">
                        <i class ="fas fa-print"></i>
                        Print
                      </a>


                    <!--  <a href="export-pdf.php" style="color:#fff;" class="small-box-footer">
                        <button type="submit" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i>
                          PDF
                        </button>
                      </a>

                      <a href="export-income-csv.php" style="color:#fff;" class="small-box-footer">
                        <button type="submit" class="btn btn-warning">
                        <i class="fas fa-file-csv"></i>
                          CSV
                        </button>
                      </a>


                      <a href="export-it-excel.php" style="color:#fff;" class="small-box-footer">
                        <button type="submit" class="btn btn-success">
                        <i class="fas fa-file-excel"></i>
                          Excel
                        </button>
                      </a> -->


         
                     <!-- <a class = "btn btn-primary" href="finance.php">
                        <i class ="fas fa-arrow-left"></i>
                        Back
                      </a> -->  
                    </div> 
                  </div>
              </div>









        </div>
      </div>
    </section>
  </div>


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Attachment Manager</b> 
    </div>
  <!--  <strong>Copyright &copy; 2021 <a href="#">CodeitSoft Technology</a>.</strong> All rights
    reserved. -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
include 'include/footer.php';
  ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
</body>
</html>
<?php ?>