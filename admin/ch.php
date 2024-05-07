<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><form method="POST">
<td><input type="file" name="profile_picture" value="<?php echo $row['profile_picture']; ?>" required></td>
<input type="submit" name="submit" value="Update">
</form>
<?php
  include("../config.php");
  if (isset($_POST['submit'])) {
      // Retrieve form data
      $fullname = $_POST['fullname'];
      $UserName = $_POST['UserName'];
      $Number = $_POST['phone'];
      $Email = $_POST['email'];
      $Address = $_POST['address'];
      $profile_picture = $_POST['profile_picture'];
      
      $sql1 = "UPDATE tbl_user SET fullName='$fullname', UserName='$UserName', Number='$Number', Email='$Email', Address='$Address', profile_picture='$profile_picture' WHERE username ='$userold'";
      $result = mysqli_query($conn, $sql1);

      if ($result) {
          echo "<center>User updated successfully</center>";
          header("Location: readvideoes.php");
          exit();
      } else {
          echo "User not updated";
      }
  }
  ?>
  </body>
</html>