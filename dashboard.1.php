<?php
include 'connectdb.php';
$active = 'dashboard';
session_start();
if($_SESSION['useremail']==""){


  header('location:index.php');
}


include_once 'include/header.php';




?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ADMIN DASHBOARD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php
                $connect = mysqli_connect("localhost", "root", "", "pos_db");
                $query="SELECT * FROM tbl_complaintuser";
                 $result= mysqli_query($connect,$query);
                 $numrow=mysqli_num_rows($result);
                 echo"$numrow";

              
              ?></h3>

                <p>Complaints</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="complaintlist.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php
                $connect = mysqli_connect("localhost", "root", "", "pos_db");
                $query="SELECT * FROM tbl_offcampus";
                 $result= mysqli_query($connect,$query);
                 $numrow=mysqli_num_rows($result);
                 echo"$numrow";

              
              ?><sup style="font-size: 20px"></sup></h3>

                <p>Off Campus Allowance Application</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="offcampusallowance.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
                $connect = mysqli_connect("localhost", "root", "", "pos_db");
                $query="SELECT * FROM tbl_user";
                 $result= mysqli_query($connect,$query);
                 $numrow=mysqli_num_rows($result);
                 echo"$numrow";

              
              ?></h3>
              
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="registration.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php
                $connect = mysqli_connect("localhost", "root", "", "pos_db");
                $query="SELECT * FROM tbl_noticeoffacility";
                 $result= mysqli_query($connect,$query);
                 $numrow=mysqli_num_rows($result);
                 echo"$numrow";

              
              ?></h3>

                <p>Notices</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="productlist.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
  <!-- Calendar -->
 


            <!-- /.card -->
            <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>ASSET REGISTER</h3>

                <p>ADD AN ASSET</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="assetregister.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>ADD AN ITEM<sup style="font-size: 20px"></sup></h3>

                <p>add item to store</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="product1.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> COMPLAINT</h3>
              
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="complaint.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> NOTICE OF FACILITY USE</h3>

                <p>Notices</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="noticeoffacility.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
  <!-- Calendar -->
 


            <!-- /.card -->
          </section><!-- /.content -->
  </div>


  
</section>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include 'include/footer.php';
  ?>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->

 
