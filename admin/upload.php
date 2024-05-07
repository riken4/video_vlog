<!DOCTYPE html>
<html lang="en">

<head>

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
          $query = "INSERT INTO videos(video_title,video_description,name,location,status) VALUES('" . $video_title . "','" . $v_des . "','" . $name . "','" . $target_file . "','" . $status . "')";
          mysqli_query($conn, $query);
          // echo "<center> upload successfully. </center>";
          echo "<script>alert('upload successfully'); window.location.href = 'upload.php';</script>";
        }
      }

    } else {
      echo "<center> invalid file extension.</center>";
    }
  }
  ?>

</head>
<link rel="stylesheet" href="nav_bar.css">

<style>
  body {
    font-family: "Lato", sans-serif;
    background-color: ;
  }

  main {
    margin: 20px;
  }

  
  .content {

    position: absolute;
    top: 50px;
    right: 50px;
    width: 200px;
    height: 100px;
    border: 3px solid #73AD21;

  }
</style>

<body>
  <main>
    <div class="sidenav">

      <a class="das" href="./admin_dashboard.php">Video Vlog</a></li><br>

      <a class="upload" href="./upload.php">Add Video</a></li><br>
      <a href="./video_edit.php">Manage Video</a><br>
      <a href="edit_comment.php">Manage Comment</a><br>

      <a class="logout" href="http://localhost/project_2/login.php">Logout </a></li>

    </div>
    <h1 style="margin-left:45%;"> video upload</h1>
  

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
        <center>
          <td>video title
        </center>
        </td>

        <center>
          <td> <input type="text" name="video_title" value="">
        </center><br></td>
      <tr>
        <td><label for="">video description</label>
        <td><input type="text" name="video_description"></td>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input style="" type='file' name='file'>
        </td>
      </tr>
      <tr>
        <th>status</th>
        <td><select name="status" id="">
            <option value="1">
              Active
            </option>
            <option value="0">
              Inactive
            </option>
          </select></td>

      </tr>


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