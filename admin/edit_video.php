<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Information Form</title>
    <style>

    </style>
</head>
<body>
<table border>
      <!-- <label for="">u_name: <?php
      session_start();
      if (isset ($_SESSION["username"])) {
        echo $_SESSION["username"];
      }
      ?></label> -->

      <tr>
        <center>
          <td>video title
        </center>
        </td>

        <center>
          <td> <input type="text" name="video_title" value="<?php echo $row['video_title']; ?>" >
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
        <th> <input type="radio" name="fav_language" id="" value="Active"> <label for="">Active</label>
          <input type="radio" name="fav_language" id="" value="Inactive"> <label for="">Inactive</label>
      </tr>
      </th>

      </tr>
      <tr>
        <th colspan="2">
          <center><input type="submit" name="but_upload" value="upload"></center>
        </th>
      </tr>

    </table>
    </form>
    <?php
    include '../config.php';
    if(isset($_POST['edit'])){
        $video_title = $_POST['video_title'];
        $v_des = $_POST['video_description'];
        $comment = $_POST['comment'];
        move_uploaded_file($temp, $folder);
        $sid=$_GET['video_id'];
        $sql="UPDATE videos set videos(video_title,video_description,name,location,comment) VALUES('" . $video_title . "','" . $v_des . "','" . $name . "','" . $target_file . "','" . $comment . "')";
            echo "edited successfully";
        }

    
    
    ?>
</body>
</html>
