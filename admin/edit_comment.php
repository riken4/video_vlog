
<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>comment</title>
</head>
<link rel="stylesheet" href="nav_bar.css">


<header>
<h1 style="margin-left:25%;"> comment</h1>

</header>

<body style="margin-left:25%;padding:1px 16px;height:1000px;">
    <div class="sidenav">
        <a class="das" href="admin_dashboard.php">Video Vlog</a></li><br>
        <a class="upload" href="upload.php">Add Video</a></li><br>
        <a href="video_edit.php">Manage Video</a><br>
        <a href="edit_comment.php">Manage Comment</a><br>
    

        <a class="logout" href="http://localhost/project_2/login.php">logout </a></li>
    </div>



    <div>
       
        <div class="gallery">
            <!-- <button class="addevent"><a href="upload.php">Add video</a></button> -->
            <table style="width:80%" border=1px solid black>
                <tr>


                    <div>
                        <th>comment_id</th>
                        <th>video_id</th>
                     <th>video</th>
                        <th>username</th>
                        <th>comment</th>
                      
                        <th>status</th>
                    </div>
                </tr>
                <?php
                include '../config.php';

                $sql = "SELECT * FROM comment";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                $sno = 1;
                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr style="height:100px">
                            <!-- <td>
                                <?php echo $sno++ ?>
                            </td> -->
                            <td>
                                <?php echo $row['comment_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['video_id']; ?>
                            </td>
                            
                            <td><video style="width:10%" height="10%">
                                    <source class="vd" src="<?php echo $row['location'] ?>" type="video/mp4">
                                </video></td>
                            <td>
                                <?php echo $row['username']; ?>
                            </td>
                            <td>
                                <?php echo $row['comment']; ?>
                            </td>

                      
                        </td>
                        <td>
                   <form action=""  method="post">

      <select name="status" id="">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <input type="submit"  value="Upload"></form>
    
            <?php
                                if ($row['status'] == 1) {
                                    echo 'Avtive';
                                } else {
                                    echo 'Inactive';
                                }
                                ?>
        </select></td>
      </td>
   
      
                            </td>
                        </tr>


                    <?php }
                }
                ?>
            </table>

        </div>
        
    </div>

</body></html>