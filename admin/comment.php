<?php
include('../config.php');
session_start();
if (isset($_POST['video_comment'])) {
    $video_id =  $_POST['video_id'];
    $user_id = $_POST['user_id'];
    // $location = $_POST['location'];
    $UserName =  $_SESSION['username'];
    $comment = $_POST['comment'];
    // $c_status = $_POST['c_status'];


    $query = "INSERT INTO comment (video_id, user_id, location, username, comment,c_status )
              VALUES ('$video_id', '$user_id', '$location', '$UserName', '$comment','1' )";

    if (mysqli_query($conn, $query)) {
        header('Location: http://localhost/project_2/admin/readvideoes.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>