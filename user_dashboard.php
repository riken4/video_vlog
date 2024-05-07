<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
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

  .row {

    flex-wrap: wrap;
    justify-content: center;
    padding-top: 5px;
    height: 70px;
  }

  .video-comment-container {
    display: flex;
    flex-direction: row;
    margin: 20px;
  }

  .video-container {
    width: 30%;

    margin-left: 500px;
  }

  .comment-container {
    width: 30%;
    display: flex;
    flex-direction: column;
  }

  .comment-box {
    border: 1px solid black;
    padding: 5px;
    margin-bottom: 10px;
  }


  .vd {
    width: 100%;
    max-height: 700px;
  }



  .v_title {
    border: 1px solid black;


    padding-left: 5px;
  }

  .comment-text {
    width: calc(100% - 20px);
    margin-bottom: 10px;
  }

  .btn-comment {
    width: 100%;
  }


  .logout {
    padding: 10px;
    margin-top: 400px;

  }

  .wel {
    padding: 250px;
    padding-left: 350px;
    text-align: center;
    font-size: 20px;
  }
</style>
</head>

<body>

  <section class="header">
    <div class="wel">
      <h1>Welcome To Video Vlog </h1>

      <h2><?php
      session_start();
      echo $_SESSION["username"] ?></h2>
      <h3>Click here to watch <a href="http://localhost/project_2/admin/readvideoes.php">video</a></h3>
    </div>
    <nav>
      <div class="sidenav">
        <a href="./user_dashboard.php">Home</a>
        <div class="profile">
          <div class="user">
          <?php
            include ("./config.php");

            $sql = "SELECT * FROM tbl_user where username = '" . $_SESSION["username"] . "'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo "<img src='./profile_img/" . $row['profile_picture'] . "'>";
            echo '<br>';
            echo $row['UserName'];
            ?>


          </div>

          <a href="./admin/pass_change.php">change</a>
          <a href="./admin/manageprofile.php?username=<?php echo $_SESSION["username"]; ?>">profile</a>
        </div>
        <a class="logout" href="./login.php">Logout</a>
      </div>
    </nav>
</body>

</html>