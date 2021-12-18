<!DOCTYPE html>
<?php
require('db.php');
session_start();
if(isset($_GET['user_id'])){
  $single_user_id = $_GET['user_id'];
  $single_user = "SELECT * FROM user WHERE user_id='$single_user_id'";
  $single = mysqli_query($db,$single_user);
  $after_assoc = mysqli_fetch_assoc($single);
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
  <h5 class="card-header">Indivisual View</h5>
  <div class="card-body">
       <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" width="300" style="background:black;color:white;">User Name</th><td><?php echo $after_assoc['user_name']; ?></td>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="col" style="background:black;color:white;">User Email</th><td><?php echo $after_assoc['user_email']; ?></td>
    </tr>
    <tr>
      <th scope="col" style="background:black;color:white;">User Country</th><td><?php echo $after_assoc['user_country']; ?></td>
    </tr>
    <tr>
      <th scope="col" style="background:black;color:white;">User Gender</th><td><?php echo $after_assoc['user_gender']; ?></td>
    </tr>
    <tr>
      <th scope="col" style="background:black;color:white;">User Address</th><td><?php echo $after_assoc['user_address']; ?></td>
    </tr>
    <tr>
      <th scope="col" style="background:black;color:white;">User Image</th><td><img width="250" src="uploads/user/<?php echo $after_assoc['user_image']; ?>"></td>
    </tr>
  </tbody>
</table>
</div>
</div>
     </div>




    <script src="https://kit.fontawesome.com/692ab58017.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
