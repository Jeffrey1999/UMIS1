<?php
include_once 'connectdb.php';
$id=$_POST['assetidd'];
$sql="delete from tbl_complaintuser where id=$id";
$delete=$pdo->prepare($sql);
 
if($delete->execute()){

    
}else{

    echo'Error in Deleting';
}

?>