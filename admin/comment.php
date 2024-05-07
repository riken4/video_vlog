<?php
include('../config.php');
session_start();
if (isset($_POST['video_comment'])) {
    $video_id =  $_POST['video_id'];
    $user_id = $_POST['user_id'];
    $location = $_POST['location'];
    $UserName =  $_SESSION['username'];
    $comment = $_POST['comment'];
    $status = $_POST['status'];


    // Insert the comment into the database
    $query = "INSERT INTO comment (video_id, user_id, location, username, comment,status )
              VALUES ('$video_id', '$user_id', '$location', '$UserName', '$comment','$status' )";

    if (mysqli_query($conn, $query)) {
        // Redirect after successful insertion
        header('Location: http://localhost/project_2/admin/readvideoes.php');
        exit();
    } else {
        // Handle insertion error
        echo "Error: " . mysqli_error($conn);
    }
}
?>