<?php
    include ("../config.php");

    $video_title = $_POST['$video_title'];
    $status = $_POST['$status'];

$sql= "UPDATE FROM videos set status=$status where video_title$video_title=$video_title";
mysqli_query($conn,$sql);
?>