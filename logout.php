<?php
session_start();

if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
}
// if(isset($_SESSION['UserName'])){
//     unset($_SESSION['UserName']);
// }
 echo "<script>alert('you have logged out');</script>";

 echo "<script>window.location.href='login.php';</script>";
exit;
header("location:login.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Logout</title>
</head>
<body>
    
</body>
</html>