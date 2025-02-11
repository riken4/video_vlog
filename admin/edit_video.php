<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="nav_bar.css">

<head>
    <title>Video Upload</title>
    <h1 style="margin-left:45%;">Video Upload</h1>
</head>

<body>
    <main>
        <div class="sidenav">
            <a class="das" href="./admin_dashboard.php">Video Vlog</a><br>
            <a class="upload" href="./upload.php">Add Video</a><br>
            <a href="./video_edit.php">Manage Video</a><br>
            <a href="edit_comment.php">Manage Comment</a><br>
            <a href="display_like.php">Like</a><br>
            <a class="logout" href="../logout.php">Logout</a><br>
        </div>
        <?php
        include("../config.php");

        $video_id = $_GET['video_id'];

        $sql = "SELECT * FROM videos WHERE video_id ='$video_id'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form method="post" action="" enctype="multipart/form-data">
            <center>
                <table border>
                  
                    <tr>
                        <td>Video Title</td>
                        <td><input type="text" name="video_title" value="<?php echo $row['video_title']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">Video Description</label></td>
                        <td><input type="text" name="video_description" value="<?php echo $row['video_description']; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type='file' name='file'>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="">Status</label></td>
                        <td>
                            <select name="status" id="">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><input type="submit" name="but_upload" value="Upload"></center>
                        </td>
                    </tr>
                </table>
            </center>
        </form>
        <?php
        }
        ?>
    </main>
</body>

</html>

<?php
include("../config.php");

if (isset($_POST['but_upload'])) {
    $maxsize = 262144000; //25mb
    $video_title = $_POST['video_title'];
    $v_des = $_POST['video_description'];
    $status = $_POST['status'];
    
    $file = $_FILES['file']['name'];

    if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file']['name'];
        $location = "../videos/" . $file;

        $sql = "UPDATE videos SET video_title='$video_title', video_description='$v_des', name='$file', location='$location', status='$status' WHERE video_id ='$video_id'";
    } else {
        $sql = "UPDATE videos SET video_title='$video_title', video_description='$v_des',  name='$file', status='$status' WHERE video_id ='$video_id'";
    }

    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo "<script>alert('upload successfully');</script>";
       
    } else {
        echo "<script>alert('>Upload failed');</script>";
       
    }
}
?>