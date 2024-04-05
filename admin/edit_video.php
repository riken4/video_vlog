<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  if (isset($_GET['video_id'])) {
    include '../config.php';

    $video_id = $_GET['video_id'];

    $select_video = "select * from videos where video_id='$video_id'";
    $result_select = mysqli_query($conn, $select_video);
    if (mysqli_num_rows($result_select)) {
      while ($row = mysqli_fetch_assoc($result_select)) {
        $v_id = $row['video_id'];
        $v_title = $row['video_title'];
        $v_dec = $row['video_description'];
      }
    }
  }

  ?>

  <title>Video upload</title>
  <?php
  include ("../config.php");
  if (isset($_POST['but_upload'])) {
    $maxsize = 262144000;//25mb
    $video_title = $_POST['video_title'];
    $v_des = $_POST['video_description'];
    $status = $_POST['status'];
    $name = $_FILES['file']['name'];
    $target_dir = "../videos/";
    $target_file = $target_dir . $_FILES["file"]["name"];



    //select file type
    $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //valid file extensions
    $extensions_arr = array("mp4", "ogg", "avi", "3gp", "mov", "mpeg", "mp4v", ".JPG");

    //check extesnsion
    if (in_array($videoFileType, $extensions_arr)) {

      //check file size
      if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]['size'] == 0)) {
        echo "file too large. File must be less than 25MB.";
      } else {
        //supload
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
          //Insert record
          $sql = "UPDATE videos set video_title='$video_title', video_description='$v_des', status='$status' where video_id ='$video_id'";

          mysqli_query($conn, $sql);
          echo "<center> upload successfully. </center>";
        }
      }

    } else {
      echo "<center> invalid file extension.</center>";
    }
  }
  ?>

</head>
<style>
  body {
    font-family: "Lato", sans-serif;
    background-color: #f0f0f0;
  }

  main {
    margin: 20px;
  }

  .h1 {
    text-align: ;
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

  .das {
    text-align: center;
    padding: 8px;
    font-size: 16px;

    background-color: #424242;

  }

  .upload {
    text-align: center;
    padding: 8px;
    font-size: 16px;

    background-color: #424242;





    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }

    .login {
      padding: 10px;
      margin-top: 480px;

    }

    .logout {
      padding: 10px;
      margin-top: 400px;

    }



    .content {

      position: absolute;
      top: 50px;
      right: 50px;
      width: 200px;
      height: 100px;
      border: 3px solid #73AD21;

    }

    .videotitle {
      margin-left: 500px;
      padding-left: 50px;
    }
</style>

<body>
  <main>
    <div class="sidenav">

      <a class="das" href="./admin_dashboard.php">Video Vlog</a></li><br>

      <a class="upload" href="./upload.php">Add Video</a></li><br>
      <a href="./video_edit.php">Manage Video</a><br>


      <a class="logout" href="http://localhost/project_2/login.php">Logout </a></li>

    </div>
    <div class="content" style="margin-left:45%;padding:1px 16px;height:100px;">
      <h1>Video upload</h1>

      <form method="post" action="" enctype="multipart/form-data">
  </main>
  <center>
    <table border>
      <!-- <label for="">u_name: <?php
      session_start();
      if (isset($_SESSION["username"])) {
        echo $_SESSION["username"];
      }
      ?></label> -->

      <tr>

        <div class='videotitle'>
          <td>video title

          </td>
        </div>

        <center>
          <td> <input type="text" name="video_title" value='<?php echo $v_title ?>'>
        </center><br></td>
      <tr>
        <td><label for="">video description</label>
        <td><input type="text" name="video_description" value='<?php echo $v_dec ?>'></td>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input style="" type='file' name='file'>
        </td>
      </tr>
      <td><label for="">Status</label>
      <td><select name="status" id="">
          <option value="1">
            Active
          </option>
          <option value="0">
            Inactive
          </option>
        </select></td>
      </td>
      </th>

      </tr>
      <tr>
        <th colspan="2">
          <center><input type="submit" name="but_upload" value="upload"></center>
        </th>
      </tr>

    </table>
    </form>
    </div>

</body>

</html>