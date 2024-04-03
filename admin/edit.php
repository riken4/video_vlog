<?php
  
    include "../config.php";

$sql = "SELECT * FROM videos";

$result = $conn -> query ($sql);


if(isset($_POST['update_v'])){
  $video_id = $_POST['update_video_id'];
  $video_title = $_POST['update_video_title'];
  $v_des= $_POST['update_video_description'];
  $name = $_POST['update_name'];
  $location = $_POST['update_location'];

  
  $update_query = "INSERT INTO videos(video_title,video_description,name,location,comment) VALUES('" . $video_title . "','" . $v_des . "','" . $name . "','" . $target_file . "','" . $comment . "')";
  if($update_query){
     header('location:.http://localhost/project_2/admin/video_edit.php');
  };
};



?>

<html>
<head>
<style>

    </style>
</head>
<body>
    <div class="container">

    <table class="table table-striped">
  <thead>

  </thead>
  <tbody>
   
      <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
               <tr>
                <input type="hidden" name="update_video_id"  value="<?php echo $row['video_id'];?>">
                <td><input type="text" name="update_video_title"  value="<?php echo $row['video_title'];?>"></td>
                <td><input type="text" name="update_video_description"  value="<?php echo $row['video_description'];?>"></td>
             
                <td><button type="submit" class="" name="update_v">update</button></td>

     
                </form>
                <?php }
        } else {
            echo "0 results";
        }
        ?>
      

    
  </tbody>
</table>
</div>
</body>
</html>