<?php

	include("includes/db_conn.php");

	if(isset($_POST['btn-update']))
	{

		$id         	= mysqli_real_escape_string($db, $_POST['id']);
		$name           = mysqli_real_escape_string($db, $_POST['name']);
		$building       = mysqli_real_escape_string($db, $_POST['building']);
		$contact        = mysqli_real_escape_string($db, $_POST['contact']);
		$c_type         = mysqli_real_escape_string($db, $_POST['c_type']);
		$location       = mysqli_real_escape_string($db, $_POST['location']);
		$comment        = mysqli_real_escape_string($db, $_POST['comment']);
		$status         = mysqli_real_escape_string($db, $_POST['status']);
		
		$insert_data = "INSERT INTO tbl_compaint_all(name, contact, building, typeofcomplaint, location, status, comments, comp_date)
		                 VALUES('$name','$contact', '$building','$c_type', '$location','$comment','$status', NOW())";
		$run_std = mysqli_query($db, $insert_data);

		 // Delete Data
		$delete_data = "DELETE FROM tbl_complaint WHERE id = '$id'";
		$run_data    = mysqli_query($db, $delete_data);

		
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-complaint.php'</script>";
		 
	}
	

?>