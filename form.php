<!DOCTYPE html>
<?php
session_start();

 ?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script>
		function show_password(){
			var t=1;
			var in_type = document.getElementById('password').type;
			if(in_type == 'password'){
				document.getElementById('password').type='text';
				return false;
			}else{
				document.getElementById('password').type='password';
				return false;
			}
		}
	</script>
</head>
<script type="text/javascript">
var xmlhttp = false;
try {
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch (E) {
xmlhttp = false;
}
}
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
}

function match_user_email(spage, objid)
{
  cid=document.getElementById("user_email").value;

  spage=spage+"?cid="+cid

 xmlhttp.open("GET", spage);
 xmlhttp.onreadystatechange = function()
  {
   if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
    {
     document.getElementById(objid).innerHTML = xmlhttp.responseText;
     //alert(xmlhttp.responseText);
    }
 }
xmlhttp.send(null);
}
</script>
<body>
	<div class="container col-lg-8">

		<div class="card">
<div class="card-header">
	Registration Form
</div>
<div class="card-body">
	<form action="insert_data.php" method="post" enctype="multipart/form-data">
		<div class="form-grop">
			<label for="username"><strong>Enter Name <?php if(isset($_SESSION["error_name"])){ echo "<span style='color:red'>( ".$_SESSION["error_name"]." )</span>"; } ?></strong></label>
			<input type="text" class="form-control <?php if(isset($_SESSION["error_name"])){ echo "border-danger"; } unset($_SESSION["error_name"]); ?>" name="user_name" value="<?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];} unset($_SESSION['user_name']); ?>" placeholder="Enter your name">
		</div>
  <div class="form-group">
    <label for="exampleFormControlInput1"><strong>Email address<span id="match_email"><?php if(isset($_SESSION['exist_email'])){echo $_SESSION['exist_email'];}unset($_SESSION['exist_email']); ?></span><?php if(isset($_SESSION["error_email"])){ echo "<span style='color:red'>( ".$_SESSION["error_email"]." )</span>"; }?></strong></label>
    <input type="text" class="form-control <?php if(isset($_SESSION["error_email"])){ echo "border-danger"; } unset($_SESSION["error_email"]); ?>" name="user_email" id="user_email" onblur="match_user_email('ajax_user_email.php','match_email')" value="<?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];} unset($_SESSION['user_email']); ?>" placeholder="name@example.com" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1"><strong>Select Country<?php if(isset($_SESSION["error_country"])){ echo "<span style='color:red'>( ".$_SESSION["error_country"]." )</span>"; }?></strong></label>
    <select class="form-control <?php if(isset($_SESSION["error_country"])){ echo "border-danger"; }  unset($_SESSION["error_country"]); ?>" name="user_country">
      <?php if(isset($_SESSION['user_country'])){ ?>
      <option value=""><--- Select Please ---></option>
      <option value="bangladesh" <?php if($_SESSION['user_country']=='bangladesh'){echo "selected"; unset($_SESSION['user_country']);} ?>>Bangladesh</option>
      <option value="india" <?php if($_SESSION['user_country']=='india'){echo "selected"; unset($_SESSION['user_country']);} ?>>India</option>
      <option value="pakistan" <?php if($_SESSION['user_country']=='pakistan'){echo "selected"; unset($_SESSION['user_country']);} ?>>Pakistan</option>
    <?php }else{ ?>
      <option value=""><--- Select Please ---></option>
      <option value="bangladesh" >Bangladesh</option>
      <option value="india" >India</option>
      <option value="pakistan">Pakistan</option>
    <?php } ?>
    </select>
  </div>
	<div class="form-group">
		<label for="gender"><strong>Select Gender<?php if(isset($_SESSION["error_gender"])){ echo "<span style='color:red'>( ".$_SESSION["error_gender"]." )</span>"; } unset($_SESSION["error_gender"]);?></strong></label><br>
    <?php if(isset($_SESSION['user_gender'])){ ?>
      <?php if($_SESSION['user_gender']=='male'){?>
		<input type="radio" name="user_gender" value="male" checked> Male
    <input type="radio" name="user_gender" value="female"> Female
  <?php unset($_SESSION['user_gender']);}else {?>
    <input type="radio" name="user_gender" value="male"> Male
		<input type="radio" name="user_gender" value="female" checked> Female
  <?php unset($_SESSION['user_gender']);} ?>
  <?php }else{ ?>
    <input type="radio" name="user_gender" value="male"> Male
		<input type="radio" name="user_gender" value="female"> Female
  <?php } ?>
	</div>
	<div class="form-group">
		<label for="image"><strong>Enter Image</strong></label>
		<input type="file" name="user_image" class="form-control">
	</div>
	<div class="form-group">
		<label for="password"><strong>Password<?php if(isset($_SESSION["error_password"])){ echo "<span style='color:red'>( ".$_SESSION["error_password"]." )</span>"; }?></strong></label>
		<div class="input-group mb-3">
  <div class="custom-file">
    <input type="password" id="password" name="user_password" class="form-control <?php if(isset($_SESSION["error_password"])){ echo "border-danger"; }  unset($_SESSION["error_password"]); ?>">
  </div>
  <div class="input-group-append">
    <span class="input-group-text" id="inputGroupFileAddon02"><i style="cursor:pointer;" onclick="return show_password()" class="fas fa-eye"></i></span>
  </div>
</div>
	</div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Address</label>
    <textarea class="form-control" name="user_address" id="exampleFormControlTextarea1" rows="3"><?php if(isset($_SESSION['user_address'])){echo $_SESSION["user_address"]; unset($_SESSION['user_address']);} ?></textarea>
  </div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" style="cursor:pointer;">SignUp</button>
	</div>
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
