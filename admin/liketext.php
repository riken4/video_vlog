<?php
// like.php

include '../config.php';

if (isset($_POST['video_id'])) {
    $videoId = $_POST['video_id'];
    // Perform like action and update like count in the database
    // Example: Update the likes column in the videos table
    $sql = "UPDATE videos SET likes = likes + 1 WHERE video_id = $videoId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Return JSON response with success status and updated like count
        $response = array('success' => true, 'likes' => getLikesCount($videoId));
        echo json_encode($response);
    } else {
        // Return JSON response with failure status
        $response = array('success' => false);
        echo json_encode($response);
    }
}

function getLikesCount($videoId) {
    // Query database to get current like count for the video
    // Example: SELECT likes FROM videos WHERE video_id = $videoId
    // Replace this with your actual database query
    return 0; // Return current like count as an example
}
?>
