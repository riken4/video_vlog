<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
font-family: "Lato", sans-serif;
background-color: #1451;
    
}
.navbar body {
            font-family: "Lato", sans-serif;
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
            font-size: 25px;
            color: #fff;
            display: block;
            background-color: #424242;
            padding: 8px;
            margin-bottom: 10px;
        }

.logout{
  padding:10px;
  margin-top: 95px;
}
.wel{
  padding: 250px;
  padding-left: 350px;
  text-align: center;
  font-size: 20px;
}
.logout {
            padding: 10px;
            margin-top: 600px;
        }
</style>
</head>
<body>

<div class="wel">
    <h1>Welcome To Video Vlog </h1>
    <h2><?php echo $_SESSION["username"] ?></h2>
    <h3>Click here to watch video <a href="http://localhost/project_2/admin/readvideoes.php">video</a></h3>
    </div>
    <div class="sidenav">
        <a href="user_dashboard.php">Home</a>


<a  class="logout" href="logout.php">Logout</a>
</div>
</body>
</html>