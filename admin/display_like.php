<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>comment</title>
</head>
<link rel="stylesheet" href="nav_bar.css">
<h1 style="margin-left:25%;"> likes</h1>

<body style="margin-left:25%;padding:1px 16px;height:1000px;">
    <div class="sidenav">
        <a class="das" href="admin_dashboard.php">Video Vlog</a></li><br>
        <a class="upload" href="upload.php">Add Video</a></li><br>
        <a href="video_edit.php">Manage Video</a><br>
        <a href="edit_comment.php">Manage Comment</a><br>
        <a href="display_like.php">Like</a><br>
        <a class="logout" href="../logout.php">Logout </a></li>
    </div>
    <div>
        <div class="gallery">
            <!-- <button class="addevent"><a href="upload.php">Add video</a></button> -->
            <table style="width:80%" border=1px solid black>
                <tr>
                    <div>
               
                        <th>video_id</th>
                        <th>video</th>
                        <!-- <th>username</th> -->
                      
                        <th>likes</th>
                    </div>
                </tr>
                <?php
                include '../config.php';
                // $sql = "SELECT * FROM videos ORDER BY video_id DESC";

                $sql = "SELECT * FROM likes join videos on likes.video_id=videos.video_id ORDER BY like_id DESC";
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
                                <?php echo $row['video_id']; ?>
                            </td>
                            <td><video style="width:10%" height="10%">
                                    <source class="vd" src="<?php echo $row['location'] ?>" type="video/mp4">
                                </video></td>
                            <!-- <td>
                                <?php echo $row['username']; ?>
                            </td> -->
                           
                            <td>
                    
                            <?php
                                $quee = mysqli_query($conn, "SELECT COUNT(DISTINCT UserName) AS user_count FROM likes ;");
                                $quee1=mysqli_fetch_array($quee);
                                echo $quee1['user_count'];
                                    ?>


                            </td>
                        </tr>
                        <?php
                     
                    }
                }
                ?>
            </table>

        </div>

    </div>

</body>

</html>
