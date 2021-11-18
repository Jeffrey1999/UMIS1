<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=pos_db','root','');
   // echo 'Connection Succesful';
}
catch(PDOException $f){
echo $f->getmessage();
}




?>