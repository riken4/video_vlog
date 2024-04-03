<?php
include('../config.php');

if (isset($_POST['video_comment'])) {
    $video_id =  $_POST['video_id'];
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    $time = time();

    // Insert the comment into the database
    $query = "INSERT INTO comment (video_id, user_id, username, comment, created)
              VALUES ('$video_id', '$user_id', '$UserName', '$comment', '$time')";

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
