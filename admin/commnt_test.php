<!DOCTYPE html>
<html lang="en">
<head>
    <title>comment</title>
</head>
<link rel="stylesheet" href="nav_bar.css">
<h1 style="margin-left:25%;"> comment</h1>

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
                $sql = "SELECT * FROM comment join videos on comment.video_id=videos.video_id;";
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
                            <td>
                                <form method="post">
                                    <select name="c_status" id="">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select><br><br>
                                    <input type="submit" value="Change" name="change_status">
                                </form>
                                <?php
                                if(isset($_POST['change_status'])){
                                    $status = $_POST['c_status'];
                                    $comment_id =$row['video_id']; 
                                    echo $status;

                                    $sql = "update comment set c_status=$status where comment_id = $comment_id";
                                    $result = mysqli_query($conn, $sql);
                                    if($result){
                                        header("Location: edit_comment.php");
                                    }

                                }
                                if ($row['c_status'] == 1) {
                                    echo 'Active';
                                } else {
                                    echo 'Inactive';
                                }
                                
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
<?php

if (isset($_POST['change_status'])) {
    $c_status = $_POST['c_status'];
    $sql = "update comment set c_status = '$c_status' where comment_id='$id';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:http://localhost/project_2/admin/edit_comment.php");
        exit ();
    }
}
?>