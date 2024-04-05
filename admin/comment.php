<?php
include('../config.php');
session_start();
if (isset($_POST['video_comment'])) {
    $video_id =  $_POST['video_id'];
    $user_id = $_POST['user_id'];
    $UserName =  $_SESSION['username'];
    $comment = $_POST['comment'];


    // Insert the comment into the database
    $query = "INSERT INTO comment (video_id, user_id, username, comment )
              VALUES ('$video_id', '$user_id', '$UserName', '$comment' )";

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
