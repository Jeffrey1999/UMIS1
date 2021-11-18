<?php
include 'connectdb.php';
session_start();
$active = 'assetlist';
if($_SESSION['useremail']==""){

  header('location:index.php');
}


include_once 'include/header.php';



?>


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
                <h3 class="card-title"> COMPLAINT REPORT </h3>
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
                   $db = mysqli_connect("localhost", "root", "", "pos_db");
                   $i = 0;
                   $sql = "SELECT * FROM univ_info_tbl";
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
                    <b><?php echo "Complaint Report "; ?></b> 
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

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

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
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
  <!-- /.content-wrapper -->
  

</body>
</html>
<?php
include 'include/footer.php';
  ?>