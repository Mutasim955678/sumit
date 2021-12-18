<?php
require('db.php');
session_start();
$user_name = $_POST["user_name"];
$user_email = $_POST["user_email"];
$user_country = $_POST["user_country"];
$user_gender = $_POST["user_gender"];
$user_password = $_POST["user_password"];
$user_address = $_POST["user_address"];
$c_user_name = preg_match('@[A-Z a-z]@',$user_name);
$c_user_email = filter_var($user_email,FILTER_VALIDATE_EMAIL);
$up_user_password = preg_match('@[A-Z]@',$user_password);
$low_user_password = preg_match('@[a-z]@',$user_password);
$num_user_password = preg_match('@[0-9]@',$user_password);
$_SESSION["user_name"] = $user_name;
$_SESSION["user_email"] = $user_email;
$_SESSION["user_country"] = $user_country;
$_SESSION["user_gender"] = $user_gender;
$_SESSION["user_address"] = $user_address;


if(isset($_SESSION['exist_email'])){
  header("location:form.php");
}
else if(empty($user_name)){
  $_SESSION["error_name"]="You cant remain the field blank";
  header("location:form.php");
}else if(!$c_user_name){
  $_SESSION["error_name"]="You input a invalid user name";
  header("location:form.php");
}
else if(empty($user_email)){
  $_SESSION["error_email"]="You cant remain the field blank";
  header("location:form.php");
}else if(!$c_user_email){
  $_SESSION["error_email"]="You input a invalid user email";
  header("location:form.php");
}
else if(empty($user_country)){
  $_SESSION["error_country"]="You cant remain the field blank";
  header("location:form.php");
}else if(empty($user_gender)){
  $_SESSION["error_gender"]="You cant remain the field blank";
  header("location:form.php");
}
else if(empty($user_password)){
  $_SESSION["error_password"]="You cant remain the field blank";
  header("location:form.php");
}
else if(!$up_user_password || !$low_user_password || !$num_user_password){
  $_SESSION["error_password"]="Your password format is wrong";
  header("location:form.php");
}
// image upload system
else{
  $uploaded_file = $_FILES['user_image'];
  $after_explode = explode('.',$uploaded_file['name']);
  $extension = end($after_explode);
  $acpt_extension = array('jpg','jpeg','gif','png');
  if(in_array($extension,$acpt_extension)){
    if($uploaded_file['size'] <= 1000000){
      $insert = "INSERT INTO user(user_name,user_email,user_country,user_gender,user_password,user_address,user_status) VALUES('$user_name','$user_email','$user_country','$user_gender','$user_password','$user_address','Active') ";
      $result = mysqli_query($db,$insert);
      $last_id=mysqli_insert_id($db);
      $file_name = $last_id.".".$extension;
      $new_location = 'uploads/user/'.$file_name;
      move_uploaded_file($uploaded_file['tmp_name'],$new_location);
      $update = "UPDATE user SET user_image='$file_name' WHERE user_id='$last_id'";
      $up_result = mysqli_query($db,$update);
      session_destroy();
      header("location:form.php");
    }else{
      $_SESSION["error_image"]="This image size is too large";
    }
  }else{
    $_SESSION["error_image"]="This is not an image";
  }

}
 ?>
