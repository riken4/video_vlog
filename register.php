
<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #1451;
    text-align: center;
    
  }
  .reg {
  background-color: #666;
  padding: 20px;
  border-radius: 10px;
  border: none;
  

  
}


.box{
    font-family: Arial;
    display: flex;
    justify-content: center;
    align-items: center;
    
    margin-bottom: 15px;
   
    display: flex;
  flex-direction: column;

}
.box input {
  padding: 8px;
  font-size: 16px;
  border-radius: 10px;
  border: 1px solid #ccc;
}
.userpass {
  margin-bottom: 15px;
}
.userpass input {
  padding: 8px;
  font-size: 16px;
  border-radius: 10px;
  border: 1px solid #ccc;
}
.loginb input{
padding: 10px;
padding-right: 85px;
    padding-left: 85px;
  
  font-size: 16px;
  border: none;
  border-radius: 10px;
  color: #666;
  cursor: pointer;
  transition: background-color 0.3s ease;

}
.loginb input:hover {
  background-color: #0056b3;
}
button{
    padding: 10px;
    padding-right: 75px;
    padding-left: 75px;
  font-size: 16px;
  border: none;
  border-radius: 10px;
 
  color: #000;
  cursor: pointer;
  transition: background-color 0.3s ease;
}
button:hover {
  background-color: #0056b3;
}
.login{
    padding: 10px;
  font-size: 16px;
  border: none;
  border-radius: 10px;
  
  color: #000;
  cursor: pointer;
  transition: background-color 0.3s ease;
}
.loginb input:hover {
  background-color: #0056b3;
</style>
</head>
<title>Register</title>
<body>
    <div class="reg">
        <h1>Register</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="box">
            <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" pattern="98[0-9]{8}" title="Phone number must start with 98 and 10 digits long"required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="address">Address:</label>
        <input id="address" name="address" required><br>


        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

                <label for="profile_picture">Profile Picture</label>
                <input type="file" name="profile_picture" class="input-responsive" required>
                <div class="loginb">
                    <input type="submit" name="submit" value="Register" class="btn btn-primary">
                </div>
            </div>
        </form>

        <?php
        include "config.php";

        if(isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $UserName = $_POST['username'];
            $Number = $_POST['phone'];
            $Email = $_POST['email'];
            $Address = $_POST['address'];
            $Password = $_POST['password'];
            $hash = sha1($Password);

            $profile_picture = $_FILES['profile_picture'];
            $file_name = $profile_picture['name'];
            $file_tmp = $profile_picture['tmp_name'];
            $file_size = $profile_picture['size'];
            $file_error = $profile_picture['error'];

            $file_destination = $file_name;

            $checkuser = "SELECT  * from tbl_user where username = '$UserName' || email = '$Email'";
            $result = mysqli_query($conn, $checkuser);
            $count = mysqli_num_rows($result);
            if($count>0){
              echo "<script>alert('username or email already exists')</script>";
            }
            else{
              if ($file_error === 0) {
                if (move_uploaded_file($file_tmp, $file_destination)) {
                    $query = "INSERT INTO tbl_user (UserName, fullname, Number, Email, Address, Gender, profile_picture, Password) VALUES ('$UserName','$fullname', '$Number', '$Email', '$Address', '$Gender','$file_destination', '$hash')";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        echo "<center> User created successfully </center>";
                        header("Location: login.php");
                        exit();
                    } else {
                        echo "User not inserted";
                    }
                } else {
                    echo "Error uploading file";
                }
            } else {
                echo "Error uploading file: " . $file_error;
            }
            }
            
        }
        ?>
    </div>
</body>
</html>
