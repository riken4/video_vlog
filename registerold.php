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
<body>
    <div class="reg">
            <h1>Register</h1>
            <form method="POST">
            <div class="box">
            <label for="fullname">Full Name</label><br>
            <input type="text" name="fullname" placeholder=" " class="input-responsive" required>

            <label for="username">UserName</label>
            <input type="text" name="UserName" placeholder=" " class="input-responsive" required>

        
            <label for="">Phone Number</label>
            <input type="tel" name="contact"  placeholder=" " class="input-responsive" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>

            <label for="">Email</label>
            <input type="email" name="email" placeholder=" " class="input-responsive" required>

           <label for="">Address</label>
            <input type="text" name="address" placeholder=" " class="input-responsive" required>

            <form method="post" enctype="multipart/form-data">
<input type="file" name="image">
<input type="submit" value="save" name="image" />
<?php
							include ('config.php');
							
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
            <label for="password">password</label>
        <input type="password" name="password" id="password" required value=""><br>
    
            <select name="gender" class="input-responsive" required>
                <option value="" selected disabled>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <div class="loginb">
            <input type="submit" name="submit" value="Register" class="btn btn-primary"></div>
            </div>
            </div>
            </form>

<?php
include "config.php";

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $UserName = $_POST['UserName'];
    $Number = $_POST['contact'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $Gender = $_POST['gender'];
    $profile_picture=$row['profile_picture'];
    $Password = $_POST['password'];
    $hash=sha1($Password);

    $query = "INSERT INTO tbl_user (UserName, fullname, Number, Email, Address, Gender,profile_picture, Password) VALUES ('$UserName','$fullname', '$Number', '$Email', '$Address', '$Gender','$profile_picture', '$hash')";
    $result = mysqli_query($conn,$query);

    if ($result) {
         echo "<center> User created successfully </center>"; 
        header("Location:login.php"); 
        exit();
    } else {
        echo "User not inserted";
    }
    
}
?>
        </div>
    </div>
</body>
</html>
