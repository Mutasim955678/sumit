<?php
require('db.php');
session_start();
$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];
$user_email = $_POST["user_email"];
$user_country = $_POST["user_country"];
$user_gender = $_POST["user_gender"];
$user_address = $_POST["user_address"];
$c_user_name = preg_match('@[A-Z a-z]@',$user_name);
$c_user_email = filter_var($user_email,FILTER_VALIDATE_EMAIL);




if(empty($user_name)){
  $_SESSION["error_name"]="You cant remain the field blank";
  header("location:edit_user.php?edit=$user_id");
}else if(!$c_user_name){
  $_SESSION["error_name"]="You input a invalid user name";
  header("location:edit_user.php?edit=$user_id");
}
else if(empty($user_email)){
  $_SESSION["error_email"]="You cant remain the field blank";
  header("location:edit_user.php?edit=$user_id");
}else if(!$c_user_email){
  $_SESSION["error_email"]="You input a invalid user email";
  header("location:edit_user.php?edit=$user_id");
}
else if(empty($user_country)){
  $_SESSION["error_country"]="You cant remain the field blank";
  header("location:edit_user.php?edit=$user_id");
}else if(empty($user_gender)){
  $_SESSION["error_gender"]="You cant remain the field blank";
  header("location:edit_user.php?edit=$user_id");
}else{
  if($_FILES['user_image']['name'] != ""){
    // delete image from folder
    $select_image = "SELECT user_image FROM user WHERE user_id='$user_id'";
    $select_image_result = mysqli_query($db,$select_image);
    $after_assoc = mysqli_fetch_assoc($select_image_result);
    $delete_from = 'uploads/user/'.$after_assoc['user_image'];
    unlink($delete_from);

    $upload_file = $_FILES['user_image'];
    $after_explode = explode('.',$upload_file['name']);
    $extension = end($after_explode);
    $acpt_extension = array('jpg','png','jpeg','gif');
    if(in_array($extension,$acpt_extension)){
      if($upload_file['size']<200000){
        // move image to the designation
        $image_name = $user_id.'.'.$extension;
        $image_loaction = "uploads/user/".$image_name;
        move_uploaded_file($upload_file['tmp_name'],$image_loaction);
        // update database
        $update_user = "UPDATE user SET user_name='$user_name',user_email='$user_email',user_address='$user_address',user_country='$user_country',user_gender='$user_gender',user_image='$image_name' WHERE user_id='$user_id'";
        $update_result = mysqli_query($db,$update_user);
        if ($update_result) {
          session_destroy();
          header("location:edit_user.php?edit=$user_id");

        }
      }else{
        $_SESSION["error_img"]="Image size is too large";
        header("location:edit_user.php?edit=$user_id");
      }
    }else{
      $_SESSION["error_img"]="This is not an image";
      header("location:edit_user.php?edit=$user_id");
    }

  }
  else{
    $_SESSION["error_img"]="You cant remain the field blank";
    header("location:edit_user.php?edit=$user_id");
  }
}

 ?>
