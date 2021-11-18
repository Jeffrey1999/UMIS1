<?php

	include('includes/db_conn.php');

    function ShowStudents()
	{
		 global $db;

		  // Total Members
	     $select_member = "SELECT * FROM tbl_students";

	     $run_member    = mysqli_query($db, $select_member);

	     $count_member  = mysqli_num_rows($run_member);

	     echo $count_member;

	}

    function ShowLecturers()
	{
		global $db;

		// Total Ministries
        $tot_min   = "SELECT * FROM tbl_lecturers";

        $run_min   = mysqli_query($db, $tot_min);

        $count_min = mysqli_num_rows($run_min);

        echo $count_min;

	}

   function ShowSlots()
	{
		global $db;

		// Total Groups
     	$tot_grp   = "SELECT * FROM tbl_slots";

     	$run_grp   = mysqli_query($db, $tot_grp);

     	$count_grp = mysqli_num_rows($run_grp);

     	echo $count_grp;

	}


   function ShowAssigned()
	{
		global $db;

		  // Total Donation
        $tot_don   = "SELECT * FROM tbl_students WHERE assign_status = 'Assigned'";

        $run_don   = mysqli_query($db, $tot_don);

        $count_don = mysqli_num_rows($run_don);

        echo $count_don;

	}

  

	function ShowUnassigned()
	{
			global $db;

            // Total Pledges
		    $tot_pgd   = "SELECT * FROM tbl_students WHERE assign_status = 'Unassigned'";

		    $run_pgd   = mysqli_query($db, $tot_pgd);

		    $count_pgd = mysqli_num_rows($run_pgd);
      
        	echo $count_pgd; 
  
            
	}


	function ShowIT()
	{
			global $db;

             // Total Events
		    $tot_event   = "SELECT * FROM tbl_students WHERE programme = 'IT'";

		    $run_event   = mysqli_query($db, $tot_event);

		    $count_event = mysqli_num_rows($run_event);
        	
        	echo $count_event;
            
	}


	function ShowCompSci()
	{
			global $db;

			// Total Upcoming Event
		    $tot_event   = "SELECT * FROM tbl_students WHERE programme = 'Computer Science'";

		    $run_event   = mysqli_query($db, $tot_event);

		    $count_upevent = mysqli_num_rows($run_event);

		    echo $count_upevent;
	}

	function ShowDipIT()
	{
			global $db;

			// Total Ongoing Event
		    $tot_event   = "SELECT * FROM tbl_students WHERE programme = 'Dip IT'";

		    $run_event   = mysqli_query($db, $tot_event);

		    $count_onevent = mysqli_num_rows($run_event);

		    echo $count_onevent;
	}


	function ShowDipCompSci()
	{
			global $db;

			// Total Ongoing Event
		    $tot_event   = "SELECT * FROM tbl_students WHERE programme = 'Dip Computer Science'";

		    $run_event   = mysqli_query($db, $tot_event);

		    $count_compevent = mysqli_num_rows($run_event);

		    echo $count_compevent;
	}


	function ShowReports()
	{
			global $db;

			// Total Ongoing Event
		    $tot_event  = "SELECT * FROM tbl_report";

		    $run_event  = mysqli_query($db, $tot_event);

		    $count_rep = mysqli_num_rows($run_event);

		    echo $count_rep;
	}


	function ShowITRep()
	{
			global $db;

			// Total Ongoing Event
		    $tot_event  = "SELECT * FROM tbl_report WHERE programme = 'IT'";

		    $run_event  = mysqli_query($db, $tot_event);

		    $count_it = mysqli_num_rows($run_event);

		    echo $count_it;
	}


    function ShowCompSciRep()
	{
			global $db;

			// Total Ongoing Event
		    $tot_event  = "SELECT * FROM tbl_report WHERE programme = 'Computer Science'";

		    $run_event  = mysqli_query($db, $tot_event);

		    $count_cs = mysqli_num_rows($run_event);

		    echo $count_cs;
	}


	function ShowDipITRep()
	{
			global $db;

			// Total Ongoing Event
		    $tot_event  = "SELECT * FROM tbl_report WHERE programme = 'Dip IT'";

		    $run_event  = mysqli_query($db, $tot_event);

		    $count_dit = mysqli_num_rows($run_event);

		    echo $count_dit;
	}


	function ShowDipCompSciRep()
	{
			global $db;

			// Total Ongoing Event
		    $tot_event  = "SELECT * FROM tbl_report WHERE programme = 'Dip Computer Science'";

		    $run_event  = mysqli_query($db, $tot_event);

		    $count_dcs = mysqli_num_rows($run_event);

		    echo $count_dcs;
	}




	


?>