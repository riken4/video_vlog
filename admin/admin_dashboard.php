
<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
    exit;
}
?>
<html>

	<head>
	</head>
  <link rel="stylesheet" href="nav_bar.css">

<title>Admin Dashboad</title>

<body>
  <h1 style="margin-left:40%;padding:300px 16px;height:1000px;"> Welcome to Admin Dashboard</h1>
  
		<div class="sidenav">
			<a class="das" href="./admin_dashboard.php">Video Vlog</a></li><br>
			<a class="upload" href="./upload.php">Add Video</a></li><br>
			<a href="./video_edit.php">Manage Video</a><br>
      <a href="edit_comment.php">Manage Comment</a><br>
	  <a href="display_like.php">Likes</a><br>
			<a class="logout" href="../logout.php">Logout </a>
			</div>


</body>

</html>



</body>
</html>