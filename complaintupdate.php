<?php

    session_start();
    include 'connectdb.php';
    include_once 'include/header.php';

    
    if($_SESSION['useremail']== "")
    {
        header('location:index.php');

        
    }

    if (isset($_POST['updatedata']))
    {
        $con = mysqli_connect("localhost", "root", "", "pos_db"); 
        $id = mysqli_real_escape_string($con, $_POST['id']);

        mysqli_query($link, "INSERT INTO tbl_complaint values('', $_POST[txtname]','$_POST[txtcontact]','$_POST[txtbuilding]','$_POST[txttypeofcomplaint]',
        '$_POST[txtlocation]','$_POST[txtinspectioncomments]','$_POST[txtinspectiondate]','$_POST[txtapproved]','$_POST[txtdateofapproval]','$_POST[txtcomments]')");

        $del_user = "DELETE FROM tbl_complaintuser WHERE id = '$id'";
        $run_user = mysqli_query($con, $del_user);


    // mysqli_query($link,"UPDATE tbl_complaintuser values('','$_POST[txtname]','$_POST[txtcontact]','$_POST[txtbuilding]','$_POST[txtcomplaint]',
    // '$_POST[txtloc]','$_POST[txtstatus]','$_POST[txtcomments]')");
    // $id=$_POST['assetidd'];
    // $sql="delete from tbl_complaintuser where id=$id";
    // $delete=$pdo->prepare($sql);
    
    // if($delete->execute()){

    // }else{

    //     echo'Error in Deleting';
    // }





    echo '<script type="text/javascript">
        jQuery(function validation(){

          swal({
            title: "Application",
            text: "Submitted Successfully!",
            icon: "success",
            button: "OK..",
          });



        });
        </script>';
    }



?>