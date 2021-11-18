<?php
include_once 'connectdb.php';
$id=$_POST['landidd'];
$sql="delete from tbl_land where id=$id";
$delete=$pdo->prepare($sql);
 
if($delete->execute()){

}else{

    echo'Error in Deleting';
}

?>