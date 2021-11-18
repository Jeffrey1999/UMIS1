<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User | SYSTEM</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
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

<script src="plugins/sweetalert/sweetalert.js"></script>
<!-- Flatpickr -->
<link rel="stylesheet" href="plugins/flatpickr/flatpickr.min.css">
    <script src="plugins/flatpickr/flatpickr.js"></script>
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
    <div> UNIVERSITY OF ENERGY AND NATURAL RESOURCES (UENR)</div>
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
            <p><?php echo $_SESSION['username'];?><small>UENR STAFF </small>
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="images/uenrlogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UENR ESTATE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['username'];?></a>
          </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
          
          
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Property information
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> -->
             
          <li class="nav-item">
            <a href="noticeoffacilityuser.php" class="nav-link">
              <i class="nav-icon fas fa-city"></i>
              <p>
                Notice Of Facility use
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="offcampusallowanceuser.php" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>Off Campus Allowance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="complaintuser.php" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Complaints
              </p>
            </a>
          </li>
         
     
          <!-- <li class="nav-item">
            <a href="complaintuser.php" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Notice Approval
              </p>
            </a>
          </li> -->
          
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  </head>