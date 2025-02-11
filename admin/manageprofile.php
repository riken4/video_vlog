<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    </head>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #1451;
        }

        .reg {
            background-color: #666;
            padding: 20px;
            border-radius: 10px;
        
            max-width: 400px;
            width: 100%;
        }

        .reg h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        table tr td {
            padding: 10px;
        }

        table tr td label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"],
        select,
        input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            
            
        }

        input[type="submit"]:hover {
            
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
        }   .logout {
            padding: 10px;
            margin-top: 400px;

        }
         img{
            width: 70px;
            height: 70px;
     
        }
    </style>

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
    <div class="reg">
<h1>Manage Profile</h1>
        <?php
        include("../config.php");

        $userold = $_GET['username'];

        $sql = "SELECT * FROM tbl_user WHERE username ='$userold'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form method="POST">
            <table>
                <tr>
                    <td><label for="fullname">Full Name:</label></td>
                    <td><input type="text" name="fullname" value="<?php echo $row['fullName']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="UserName">User Name:</label></td>
                    <td><input type="text" name="UserName" value="<?php echo $row['UserName']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="phone">Phone:</label></td>
                    <td><input type="tel" name="phone" value="<?php echo $row['Number']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" name="email" value="<?php echo $row['Email']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td><input type="text" name="address" value="<?php echo $row['Address']; ?>" required></td>
                </tr>
                <tr><div class="pic">
                    <td><label for="profile_picture">Profile Picture:</label></td>
                    
                   <center><img src='../profile_img/<?php echo $row['profile_picture'] ?>'></center> 
                    <td><input type="file" name="profile_picture" value="<?php echo $row['profile_picture']; ?>" ></td>
                </tr></div>
          
            </table>
            <input type="submit" name="submit" value="Update">
        </form>
        <?php
        }
        ?>

        <?php
  
        if (isset($_POST['submit'])) {
            // Retrieve form data
            $fullname = $_POST['fullname'];
            $UserName = $_POST['UserName'];
            $Number = $_POST['phone'];
            $Email = $_POST['email'];
            $Address = $_POST['address'];
            $profile_picture = $_POST['profile_picture'];
            
            if (!$profile_picture==null) {
                $sql1 = "UPDATE tbl_user SET fullName='$fullname', UserName='$UserName', Number='$Number', Email='$Email', Address='$Address', profile_picture='$profile_picture' WHERE username ='$userold'";
            $result = mysqli_query($conn
            , $sql1);}
            else{
                $sql2 = "UPDATE tbl_user SET fullName='$fullname', UserName='$UserName', Number='$Number', Email='$Email', Address='$Address' WHERE username ='$userold'";
            $result = mysqli_query($conn, $sql2);
            }

            if ($result) {
                echo "<script>alert('User updated successfully');</script>";
               
                // header("Location: readvideoes.php");
                exit();
            } else {
                echo "User not updated";
            }
        }
        ?>
    </div>
</body>
</html>
