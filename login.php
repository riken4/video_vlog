<?php 
session_start();

include 'config.php';

if(isset($_POST['login'])) {
    $UserName = $_POST['username'];
    $Password = $_POST['password'];
    $hash=sha1($Password);
    $inputUsertype = $_POST['usertype'];

    if($inputUsertype == 1){
        $sql="SELECT * FROM admin WHERE username= '$UserName' and password='$hash'";
        $result=mysqli_query($conn,$sql); 
        $num=mysqli_num_rows($result);
        
        if($num > 0) { 
            $_SESSION['username'] = $UserName; 
            header("Location: http://localhost/project_2/admin/admin_dashboard.php");
            exit();
        } else {
            echo "<center> Invalid admin credentials </center>";
        }
        
    } else if ($inputUsertype == 2){
        $sql="SELECT * FROM tbl_user where username='$UserName' and Password='$hash'";
        $result=mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result) > 0) { 
            $_SESSION['username'] = $UserName; 
            header("Location: user_dashboard.php"); 
            exit(); 
        } else {
            echo "</center> Invalid student credentials </center>";
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
  body {
    font-family: Arial;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #1451;
    text-align: center;
  }
  .ff {
  background-color: #666;
  padding: 20px;
  border-radius: 10px;
}
.ff h1 {
  text-align: center;
  
}
.loginform {
  display: flex;
  flex-direction: column;
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
padding-right: 70px;
    padding-left: 70px;
  
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
button {
  padding: 10px;
  padding-right: 70px;
    padding-left: 70px;
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
    </style>
</head>
<body>
    <div class="ff">
        <h1>Login</h1>
        <div >
            <form class="loginform" method="post">
                <div class="userpass">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"><br><br>
                

                
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"><br><br>
                </div>

                
                    <label for="usertype">User Type</label>
                    <select name="usertype" id="usertype">
                        <option value="1">Admin</option>
                        <option value="2">user</option>
                    </select><br><br>
                </div>
                
                  <div class="loginb">
                <input type="submit" value="Login" name="login" class="btn-login">
                <p class="register-link">Don't have an account?<br> <button><a href="register.php">Register</button></a></p></div>
            </form>
        </div>
    </div>
</body>
</html>
