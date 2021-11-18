<?php




$db = mysqli_connect("localhost", "root", "", "pos_db");

	if(isset($_POST['btn-update']))
	{
		
		$id         	= mysqli_real_escape_string($db, $_POST['id']);
		$cname           = mysqli_real_escape_string($db, $_POST['name']);
		$contact        = mysqli_real_escape_string($db, $_POST['contact']);
		$building       = mysqli_real_escape_string($db, $_POST['building']);
		$c_type         = mysqli_real_escape_string($db, $_POST['c_type']);
		$location       = mysqli_real_escape_string($db, $_POST['location']);
		$comment        = mysqli_real_escape_string($db, $_POST['comment']);
		$inspectioncomment       = mysqli_real_escape_string($db, $_POST['txtinspectioncomments']);
		$inspectiondate       = mysqli_real_escape_string($db, $_POST['txtinspectiondate']);
		$approved       = mysqli_real_escape_string($db, $_POST['txtapproved']);
		$dateofapproval       = mysqli_real_escape_string($db, $_POST['txtdateofapproval']);
		$status         = mysqli_real_escape_string($db, $_POST['status']);
		
		$insert_data = "INSERT INTO tbl_complaint(c_name, contact, building, complaint,c_location,comment,inspectioncomment,inspection_date,approvedby,dateofapproval,c_status,comp_date)
						 VALUES('$cname','$contact', '$building','$c_type', '$location','$comment','$inspectioncomment','$inspectiondate','$approved','$dateofapproval' ,'$status', NOW())";
					
		$run_std = mysqli_query($db, $insert_data);

		// mysqli_query($link, "INSERT INTO tbl_complaint values('', $_POST[txtname]','$_POST[txtcontact]','$_POST[txtbuilding]','$_POST[txttypeofcomplaint]',
        // '$_POST[txtlocation]','$_POST[txtinspectioncomments]','$_POST[txtinspectiondate]','$_POST[txtapproved]','$_POST[txtdateofapproval]','$_POST[txtcomments]')");



		 // Delete Data
		$delete_data = "DELETE FROM tbl_complaintuser WHERE id = '$id'";
		$run_data    = mysqli_query($db, $delete_data);

		
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-complaint.php'</script>";
		 
	}
	

?>