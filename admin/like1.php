<?php
include '../config.php';
if (isset($_POST['like'])) {
$video_id = $_POST['video_id'];
$UserName = $_POST['username'];
$like_status = $_POST['like_status'];

// check if the like already exists

$check_like = mysqli_query($conn, "SELECT * FROM likes join tbl_user on likes.UserName=tbl_user.UserName where video_id='$video_id' order by video_id DESC;");
$like_exists = mysqli_num_rows($check_like);

if ($like_status == 'like' && $like_exists == 0) {
  // insert a new like
  $sql = "INSERT INTO likes (username, video_id, like_status) VALUES ('$UserName', '$video_id','$like_status')";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iii", $UserName, $video_id, $like_status);
  $stmt->execute();
} elseif ($like_status == 'unlike' && $like_exists > 0) {
  // delete the existing like
  $sql = "DELETE FROM likes WHERE video_id = ? AND username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $video_id, $UserName);
  $stmt->execute();
}
}
echo 'success';
?>