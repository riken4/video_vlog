<?php
include("../config.php");
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $video_id = $_POST['video_id'];
    $username = $_POST['user_id'];
    $action = $_POST['action'];

    // $check = "select * from likes where video_id = '$video_id' and UserName = '$username'";
    // $result = mysqli_query($conn, $check);
    // $num_rows = mysqli_num_rows($result);
    // if (num_rows_)
    if ($action == 'like') {
        $sql = "INSERT INTO likes (video_id, UserName) VALUES ('$video_id', '$username')";
    } else if ($action == 'unlike') {
        $sql = "DELETE FROM likes WHERE video_id = '$video_id' AND UserName = '$username'";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
