<?php
session_start();


if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<style>font-family: "Lato", sans-serif;
    
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

  
}

.sidenav a {
 
  text-decoration: none;
  font-size: 25px;
  color: #fff;
  display: block;
  background-color: #424242;

}

.sidenav {
  text-align: center;
  padding: 1px 1px 1px 1px;
  text-decoration: none;
  font-size: 25px;
  color: #fff;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
  
}
.das{
  text-align: center;
  padding: 8px;
  font-size: 16px;
  
  background-color: #424242;

}
.upload{
  text-align: center;
  padding: 8px;
  font-size: 16px;
  
  background-color: #424242;





@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.login{
  padding:10px;
  margin-top: 480px;

}
.logout{
  padding:10px;
  margin-top: 95px;
  
}
.upload{
  padding:10px;
}</style>
</head>
<body>
	<div></div>

<h1>THIS IS USER HOME PAGE</h1><?php echo $_SESSION["username"] ?>
<a href="readvideoes.php">video</a>
<a href="logout.php">Logout</a>

</body>
</html>
