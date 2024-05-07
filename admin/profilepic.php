<!DOCTYPE html>
<html>

	<head>

	</head>

<body>



<form method="post" enctype="multipart/form-data">
<input type="file" name="image">
<input type="submit" value="save" name="image" />
<?php
							include ('../config.php');
							
							if (!isset($_FILES['image']['tmp_name'])) {
							echo "";
							}else{
							$file=$_FILES['image']['tmp_name'];
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];

							if ($error > 0){
										die("Error uploading file! Code $error.");
									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
									else
										{

									move_uploaded_file($_FILES["image"]["tmp_name"],"../profile_img/" . $_FILES["image"]["name"]);			
									$location="../profile_img/" . $_FILES["image"]["name"];
						
									$update=mysqli_query($conn,"UPDATE tbl_user SET profile_picture = '$location' WHERE id='$user'");
									
									$update1=mysqli_query($conn,"UPDATE comment SET image = '$location' WHERE id='$user'");

									}
										header('location:home.php');
									
									
									}
							}
						?>
						</form>

</body>

</html>