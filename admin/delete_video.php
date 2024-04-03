<?php
include '../config.php';

if(isset($_GET['video_id'])) {
    $e_id = $_GET['video_id'];
    
    if(isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
        
        $sql = "DELETE FROM videos WHERE video_id='$e_id'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "<script>alert('Your event has been deleted'); window.location.href = 'video_edit.php';</script>";
            exit();
        } else {
            echo "<script>alert('Failed to delete event'); window.location.href = 'video_edit.php';</script>";
            exit();
        }
    } else {
        
        echo "<script>
                var result = confirm('Are you sure you want to delete this video?');
                if (result) {
                    window.location.href = 'delete_video.php?video_id=$e_id&confirm=true';
                } else {
                    window.location.href = 'video_edit.php';
                }
              </script>";
        exit();
    }
} else {
    echo "<script>alert('video ID is missing.'); window.location.href = 'video_edit.php';</script>";
    exit();
}
?>
