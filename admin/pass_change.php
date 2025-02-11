<?php
include("../config.php");
session_start();
if(!isset($_SESSION['username']))
{
	header("location:../login.php");
}

$UserName = $_SESSION['username'];
$info = ""; // Initializing $info variable

if(isset($_POST['submit'])) {
    $oldPassword = $_POST['old'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Fetching the user's data from the database
    $fetchUserQuery = "SELECT * FROM tbl_user WHERE username='$UserName'";
    $result = mysqli_query($conn, $fetchUserQuery);
    $userData = mysqli_fetch_array($result);

    // Verifying the old password
    $oldPasswordHash = sha1($oldPassword);
    if($oldPasswordHash !== $userData['password']) {
      
        echo "<script>alert('Incorrect Old Password'); window.location.href = 'pass_change.php';</script>";
        exit();
    } elseif($newPassword !== $confirmPassword) {
        
        echo "<script>alert('New Passwords Didn't Match'); window.location.href = 'pass_change.php';</script>";
        exit();
    } else {
        // Hashing the new password
        $hashedPassword = sha1($newPassword);

        // Updating the password in the database
        $updatePasswordQuery = "UPDATE tbl_user SET password='$hashedPassword' WHERE username='$UserName'";
        if(mysqli_query($conn, $updatePasswordQuery)) {
      
            echo "<script>alert('Successfully Changed your Password'); window.location.href = '../user_dashboard.php';</script>";
            exit();
        } else {
            $info = "Error updating password: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <title>Password Change</title>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Change Password</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
         body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        #header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .headingMain {
            font-size: 24px;
        }

        .subHead {
            font-size: 18px;
        }

        .info {
            color: red;
        }

        .labels {
            text-align: right;
            padding-right: 10px;
        }

        .fields {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .design {
            background-color: #666;
            padding: 20px;
            border-radius: 10px;
        
            max-width: 420px;
            width: 100%;
        }

        .link {
            text-decoration: none;
            color: #333;
        }

        .link:hover {
            color: #666;
        }
        body {
    font-family: "Lato", sans-serif;

    margin: 0;
  }

  .sidenav {
    height: 100%;
    width: 150px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
    text-align: center;
  }

  .sidenav a {
    text-decoration: none;
    font-size: 18px;
    color: #fff;
    display: block;
    background-color: #424242;
    padding: 8px;
    margin-bottom: 10px;
  }

  .sidenav a:hover {
    color: #f1f1f1;
  }

  .profile img {
    width: 40px;
    height: 40px;
  }

  .profile {
    padding: 8px;
    font-size: 16px;
    background-color: #424242;
  }

  .user {
    padding: 3px;
    font-size: 16px;
    color: #fff;
    background-color: #424242;
  }



  .logout {
    padding: 10px;
    margin-top: 400px;

  }
    </style>
</head>

<body>
<nav>
            <div class="sidenav">
                <a href="../user_dashboard.php">Home</a>
                <div class="profile">
                    <div class="user">
                        <?php
                             include ("../config.php");
                           
                        $sql = "SELECT * FROM tbl_user where username = '" . $_SESSION["username"] . "'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        echo "<img src='../profile_img/" . $row['profile_picture'] . "'>";
                        echo '<br>';
                   echo $row['UserName'];
                        ?>
                    
                    </div>

                    <a href="pass_change.php">Change Password</a>
        <a href="manageprofile.php?username=<?php echo $_SESSION["username"];?>">profile</a>
                </div>
                <a class="logout" href="../logout.php">Logout</a>
            </div>
        </nav>
<br />
<br />

<div align="center">
    <span class="subHead">Change Password<br /></span><br />
    <?php
    if(isset($info)) {
        echo "<div class='info'>$info</div>";
    }
    ?>
    <form method="post" action="">
        <table cellpadding="3" cellspacing="3" class="design" align="center">
            <tr>
                <td class="labels">Old Password :</td>
                <td><input type="password" name="old" size="25" class="fields" placeholder="Enter Old Password" required="required" /></td>
            </tr>
            <tr>
                <td class="labels">New Password :</td>
                <td><input type="password" name="new_password" size="25" class="fields" placeholder="Enter New Password" required="required"  /></td>
            </tr>
            <tr>
                <td class="labels">Confirm Password :</td>
                <td><input type="password" name="confirm_password" size="25"  class="fields" placeholder="Re-Type New Password" required="required" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Change Password" class="fields" /></td>
            </tr>
        </table>
    </form>
    <br />
    <br />

</div>
</body>
</html>
