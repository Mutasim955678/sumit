<?php
$db = new mysqli("localhost","root","","my_form");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Search</title>
 </head>
 <body>
 	<form action="" method="post">
 		<input type="text" name="user_name">
 		<input type="submit" name="search" value="SEARCH">
 	</form><br><br>

 	<?php if(isset($_POST['search'])){
 		$s = $_POST['user_name'];
 		$select = "SELECT * FROM user WHERE user_name='$s'";
 		$select_result = mysqli_query($db,$select);
 		if(mysqli_num_rows($select_result)>0){
 		$after_assoc = mysqli_fetch_assoc($select_result);

 	 ?>
 	<table border="1px;" style="border-spacing: 0px;">
 		<tr>
 			<th>Name</th>
 			<th>Email</th>
 			<th>Country</th>
 		</tr>
 		<tr >
 			<td><?php echo $after_assoc['user_name']; ?></td>
 			<td><?php echo $after_assoc['user_email']; ?></td>
 			<td><?php echo $after_assoc['user_country']; ?></td>
 		</tr>


 	</table>
 <?php }else{ echo "No Result Found"; }} ?>


 </body>
 </html>