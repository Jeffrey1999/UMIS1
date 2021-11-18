<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UENR Estate Management </title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Google fonts: Poppins-->
  <!-- <link rel="stylesheet" href="plugins/summernote/font/Poppins-Medium.ttf"> -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <!-- <script src="../../dist/js/adminlte.min.js"></script> -->


<!-- Flatpickr -->
    <link rel="stylesheet" href="plugins/flatpickr/flatpickr.min.css">
    <script src="plugins/flatpickr/flatpickr.js"></script>

    
    <!-- <meta property="og:site_name" content="yearpicker.js" />
    <link rel="stylesheet" href="style.css" /> -->
<script src="plugins/sweetalert/sweetalert.js"></script>
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">










  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

   <!-- datepicker -->
   <link rel="stylesheet" href="plugins/datepicker/datepicker.min.css">

<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- date-picker -->
    <script src="plugins/datepicker/datepicker.min.js"></script>


    <!-- bootstrap color picker -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- <script src="plugins/myjs.js"></script> -->

    <link rel="stylesheet" href="plugins/yearpicker1/yearpicker.css">
    <script src="plugins/yearpicker1/jquery.slim.min.js"></script>
    <script src="plugins/yearpicker1/yearpicker.js"></script>

</head>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
     
    </ul>
    <div> UNIVERSITY OF ENERGY AND NATURAL RESOURCES (UENR)</div>
    <!-- <div> UNIVERSITY OF ENERGY AND NATURAL RESOURCES (UENR),SUNYANI<br>
      P.O.BOX 214,Sunyani,<br>
      estateoffice@uenr.edu.gh</div> -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- User Account Menu -->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <img src="images/uenrlogo.jpg" class="user-image" alt="User Image">
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
            <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
            <img src="images/uenrlogo.jpg" class="rounded" alt="User Image">
            <p> <?php echo $_SESSION['username'];?> <small>UENR staff </small>
            </p>
          </li>

          <!-- Menu Body -->
          
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="float-left">
              <a href="changepassword.php" class="btn btn-primary">Change Password </a>
            </div>
            <div class="float-right">
              <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->  
    </ul>
      </li>
    </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="images/uenrlogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UENR ESTATE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="images/uenrlogo.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['username'];?></a>
          </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php if($active == 'dashboard') echo 'active';?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="category.php" class="nav-link <?php if($active == 'campus') echo 'active';?>">
            <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Campus
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="registration.php" class="nav-link <?php if($active == 'registration') echo 'active';?>">
            <i class="nav-icon fas fa-registered"></i>
              <p>
                Registration
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
               USERS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="securityofficers.php" class="nav-link <?php if($active == 'securityofficer') echo 'active';?>">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Security Officers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="contractor2.php" class="nav-link <?php if($active == 'contractor') echo 'active';?>">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Contractor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="staffofficers.php" class="nav-link <?php if($active == 'staffmember') echo 'active';?>">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Staff Members</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p></p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               Property Info
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Security Officers</p>
                </a>
              </li>  -->
              <li class="nav-item">
                <a href="landlist.php" class="nav-link <?php if($active == 'land') echo 'active';?>">
                  <i class="fas fa-map-marked nav-icon"></i>
                  <p>Land</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="addland.php" class="nav-link <?php if($active == 'addland') echo 'active';?>">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>Add Land</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="buildinglist.php" class="nav-link <?php if($active == 'building') echo 'active';?>">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Building </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addbuilding.php" class="nav-link <?php if($active == 'addbuilding') echo 'active';?>">
                  <i class="fas fa-landmark nav-icon"></i>
                  <p>Add Building </p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="addland.php" class="nav-link <?php if($active == 'addcampus') echo 'active';?>">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>Add Campus </p>
                </a>
              </li>
              <li class="nav-item">
            <a href="" class="nav-link <?php if($active == 'room') echo 'active';?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Rooms
              </p>
            </a>
          </li> -->
            <!-- </ul> -->
          </li>
          </ul>
          </li>
          <li class="nav-item">
            <a href="assetlist.php" class="nav-link <?php if($active == 'assetlist') echo 'active';?>">
              <i class=" nav-icon fas fa-list"></i>
              <p>
                Asset List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="assetregister.php" class="nav-link <?php if($active == 'assetregister') echo 'active';?>">
              <i class=" nav-icon fas fa-wrench"></i>
              <p>
                Asset Register
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="noticeoffacility.php" class="nav-link <?php if($active == 'noticeoffacility') echo 'active';?>"  >
              <i class="nav-icon fas fa-city"></i>
              <p>
                Notice Of Facility use
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="noticelist.php" class="nav-link <?php if($active == 'allnotice') echo 'active';?>"  >
              <i class="nav-icon fas fa-city"></i>
              <p>
                All Notices
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="noticeapproval.php" class="nav-link <?php if($active == 'noticeapproval') echo 'active';?>">
              <i class="nav-icon fas fa-file-contract"></i>
              <p>
                Notice Approval
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="offcampusallowance.php" class="nav-link <?php if($active == 'offcampusallowance') echo 'active';?>">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>Off Campus Allowance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="complaint.php" class="nav-link <?php if($active == 'complaint') echo 'active';?>">
              <i class="nav-icon fas fa-cogs "></i>
              <p>
                Complaints
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="view-complaint.php" class="nav-link <?php if($active == 'complaintview') echo 'active';?>">
              <i class="nav-icon fas fa-cogs "></i>
              <p>
                Complaints User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="complaintlist.php" class="nav-link <?php if($active == 'complaintlist') echo 'active';?>">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Complaint List
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="productlist.php" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Stores and Distribution
              </p>
            </a>
          </li> -->


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
              Stores & Distribution
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="productlist.php" class="nav-link <?php if($active == 'stores') echo 'active';?>">
                  <i class="nav-icon fas fa-warehouse"></i>
                  <p> Stores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product1.php" class="nav-link <?php if($active == 'additem') echo 'active';?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add An item</p>
                </a>
              </li>
              
             
            </ul>
          </li>


        
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if($active == 'Report') echo "active";?>">
              <i style="font-size: 22px; color: #fff;" class="nav-icon fas fa-edit"></i>
              <p style="font-size: 19px; color: #fff; padding-left: 10px;">
                 Reports
                <i class="fas fa-angle-left"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview"> -->
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link  <?php if($active == 'Report') echo "active";?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">               
                <a href="it-report.php" class="nav-link <?php if($active == 'Report') echo "active";?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IT </p>
                </a>
              </li>
              <li class="nav-item">               
                <a href="compsci-report.php" class="nav-link <?php if($active == 'Report') echo "active";?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Computer Science</p>
                </a>
              </li>
               <li class="nav-item">               
                <a href="dip-compsci-report.php" class="nav-link <?php if($active == 'Report') echo "active";?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dip Computer Science</p>
                </a>
              </li>
               <li class="nav-item">               
                <a href="dip-it-report.php" class="nav-link <?php if($active == 'Report') echo "active";?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dip IT</p>
                </a>
              </li>
          
            </ul>
          </li>

<!-- 
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Repairs & Maintenance
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="" class="nav-link <?php if($active == 'report') echo 'active';?>">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
               Report
              </p>
            </a>


            <li class="nav-item">
            <a href="report-complaint.php" class="nav-link <?php if($active == 'complaintreport') echo 'active';?>">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
               Complaint Report
              </p>
            </a> -->
            <!-- <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Property information
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> -->
       
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  </head>