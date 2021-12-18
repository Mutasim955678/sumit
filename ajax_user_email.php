<?php
require('db.php');
session_start();
$match = $db->query("select * from user where user_email='".$_GET["cid"]."'");
if($match->num_rows > 0){
  echo " <span style='color:red;'> ( This email already exist )</span> ";
  $_SESSION['exist_email']= " <span style='color:red;'> ( This email already exist )</span> ";
}else{
  unset($_SESSION['exist_email']);
}
 ?>
