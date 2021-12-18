<!DOCTYPE html>
<?php
require('db.php');
session_start();
if(isset($_GET['edit'])){
  $user_id = $_GET['edit'];
  $user_edit = "SELECT * FROM user WHERE user_id='$user_id'";
  $user = mysqli_query($db,$user_edit);
  $after_assoc = mysqli_fetch_assoc($user);
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="card">
 <h5 class="card-header">Edit User</h5>
 <div class="card-body">
   <form action="update_user_data.php" method="post" enctype="multipart/form-data">
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputPassword4">User Name<?php if(isset($_SESSION["error_name"])){ echo "<span style='color:red'>( ".$_SESSION["error_name"]." )</span>"; } unset($_SESSION['user_name']); ?></label>
    <input type="text" class="form-control" name="user_name" value="<?php echo $after_assoc['user_name']; ?>">
  </div>
  <div class="form-group col-md-6">
    <label for="inputEmail4">User Email<?php if(isset($_SESSION["error_email"])){ echo "<span style='color:red'>( ".$_SESSION["error_email"]." )</span>"; } unset($_SESSION['user_email']); ?></label>
    <input type="email" class="form-control" name="user_email"  value="<?php echo $after_assoc['user_email']; ?>">
  </div>

</div>
    <input type="hidden" class="form-control" name="user_id" value="<?php echo $after_assoc['user_id']; ?>">
<div class="form-group">
  <label for="inputAddress">Address</label>
  <input type="text" class="form-control" id="inputAddress" name="user_address" value="<?php echo $after_assoc['user_address']; ?>">
</div>
<div class="form-group">
  <label for="inputAddress">Previous Image</label><br>
  <img src="uploads/user/<?php echo $after_assoc['user_image']; ?>" width="250" alt="image">
</div>
<div class="form-group">
  <label for="inputAddress2">User Image<?php if(isset($_SESSION["error_img"])){ echo "<span style='color:red'>( ".$_SESSION["error_img"]." )</span>"; } unset($_SESSION['user_img']); ?></label>
  <input type="file" name="user_image" class="form-control" >
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputState">User Country<?php if(isset($_SESSION["error_country"])){ echo "<span style='color:red'>( ".$_SESSION["error_country"]." )</span>"; } unset($_SESSION['user_country']); ?></label>
    <select id="inputState" name="user_country" class="form-control">
      <option value=""><--- Select One ---></option>
      <option value="bangladesh" <?php if($after_assoc['user_country']=='bangladesh'){echo "selected";} ?>>Bangladesh</option>
      <option value="india" <?php if($after_assoc['user_country']=='india'){echo "selected";} ?>>India</option>
      <option value="pakistan" <?php if($after_assoc['user_country']=='pakistan'){echo "selected";} ?>>Bangladesh</option>
    </select>
  </div>
  <div class="form-group col-md-2">

  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Gender<?php if(isset($_SESSION["error_gender"])){ echo "<span style='color:red'>( ".$_SESSION["error_gender"]." )</span>"; } unset($_SESSION['user_gender']); ?></label><br>
    <input type="radio" value="male" name="user_gender" <?php if($after_assoc['user_gender']=='male'){echo "checked";} ?>>Male
    <input type="radio" value="female" name="user_gender" <?php if($after_assoc['user_gender']=='female'){echo "checked";} ?>> Female
  </div>
</div>
<button type="submit" class="btn btn-primary">Update</button>
</form>


 </div>
 </div>
      </div>




     <script src="https://kit.fontawesome.com/692ab58017.js"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
