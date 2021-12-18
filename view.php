<!DOCTYPE html>
<?php
require('db.php');
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
  <h5 class="card-header">Users</h5>
  <div class="card-body">
    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="70">User Name</th>
      <th scope="col">User Email</th>
      <th scope="col">User Country</th>
      <th scope="col" width="70">User Gender</th>
      <th scope="col">User Image</th>
      <th scope="col">User Address</th>
      <th scope="col">User Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        // delete file from folder
        $user = "SELECT user_image FROM user WHERE user_id='$delete_id'";
        $user_result = mysqli_query($db,$user);
        $user_data = mysqli_fetch_assoc($user_result);
        $delete_from = 'uploads/user/'.$user_data['user_image'];
        unlink($delete_from);
        // delete file from database
        $delete_user = "DELETE FROM user WHERE user_id='$delete_id'";
        $delete = mysqli_query($db,$delete_user);
        if($delete){
          header("location:view.php");
        }
      }
      if(isset($_GET['id'])){
        $update_id = $_GET['id'];
        $update_status = $_GET['status'];
        $update_user = "UPDATE user SET user_status='$update_status' WHERE user_id='$update_id'";
        $update = mysqli_query($db,$update_user);
        if($update){
          header("location:view.php");
        }
      }
      $disp_user= "SELECT * FROM user";
      $display = mysqli_query($db,$disp_user);

      foreach ($display as $user_details){

     ?>
    <tr>

      <td><?php echo $user_details['user_name']; ?></td>
      <td><?php echo $user_details['user_email']; ?></td>
      <td><?php echo $user_details['user_country']; ?></td>
      <td><?php echo $user_details['user_gender']; ?></td>
      <td><img src="uploads/user/<?php echo $user_details['user_image']; ?>" width="100" height="100"></td>
      <td><?php echo $user_details['user_address']; ?></td>
      <td><?php echo $user_details['user_status']; ?></td>
      <td><a style="text-decoration:none;" href="indivisual_view.php?user_id=<?php echo $user_details['user_id']; ?>"><i class="fas fa-desktop" data-toggle="tooltip" data-placement="bottom" title="Indivisual View"> &nbsp</i> </a> <a style="text-decoration:none;" href="edit_user.php?edit=<?php echo $user_details['user_id']; ?>"> &nbsp<i data-toggle="tooltip" data-placement="bottom" title="Edit" class="fas fa-user-edit"> &nbsp</i> </a><a style="text-decoration:none;" data-toggle="modal" data-target="#exampleModal<?php echo $user_details['user_id'];?>" href="" > <i data-toggle="tooltip" data-placement="bottom" title="Delete" class="fas fa-trash-alt"></i></a>
        <?php if($user_details['user_status']=='Active'){?>
          <a style="text-decoration:none;" data-toggle="tooltip" data-placement="bottom" title="Deactive User" class="text-danger" href="view.php?id=<?php echo $user_details['user_id']; ?>&status=Deactive"> &nbsp<i class="fas fa-times-circle"></i></a>
        <?php }else if($user_details['user_status']=='Deactive'){ ?>
          <a style="text-decoration:none;" data-toggle="tooltip" data-placement="bottom" title="Active User" class="text-success" href="view.php?id=<?php echo $user_details['user_id']; ?>&status=Active"> &nbsp<i class="fas fa-check-circle"></i></a>
        <?php } ?>
      </td>
      <div class="modal fade" id="exampleModal<?php echo $user_details['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete ?
      </div>
      <div class="modal-footer">
        <a class="btn btn-success" data-dismiss="modal">Cancel</a>
        <a href="view.php?delete=<?php echo $user_details['user_id']; ?>" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
    </tr>
  <?php } ?>
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
