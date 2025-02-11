<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: "Lato", sans-serif;
            margin: 0;
        }

        .sidenav {
            height: 100%;
            width: 150px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
            text-align: center;
        }

        .sidenav a {
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            background-color: #424242;
            padding: 8px;
            margin-bottom: 10px;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .profile img {
            width: 40px;
            height: 40px;
        }

        .profile {
            padding: 8px;
            font-size: 16px;
            background-color: #424242;
        }

        .user {
            padding: 3px;
            font-size: 16px;
            color: #fff;
            background-color: #424242;
        }

        .row {
            flex-wrap: wrap;
            justify-content: center;
            padding-top: 5px;
            height: 70px;
        }

        .video-comment-container {
            display: flex;
            flex-direction: row;
            margin: 20px;
        }

        .video-container {
            width: 60%;
            margin-left: 170px;
        }

        .vd {
            width: 100%;
            max-height: 700px;
        }

        .comment_all table {
            max-height: 100px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
        }

        .comment-container {
            width: 30%;
            display: flex;
            flex-direction: column;
        }

        .comment-box {
            border: 1px solid black;
            padding: 5px;
            margin-bottom: 10px;
        }

        .comment-box img {
            max-height: 20px;
            max-width: 20px;
        }

        .v_title {
            border: 1px solid black;
            padding-left: 5px;
        }

        .comment-text {
            width: calc(100% - 20px);
            margin-bottom: 10px;
        }

        .btn-comment {
            width: 100%;
        }

        .logout {
            padding: 10px;
            margin-top: 400px;
        }
    </style>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <section class="header">
        <nav>
            <div class="sidenav">
                <a href="../user_dashboard.php">Home</a>
                <div class="profile">
                    <div class="user">
                        <?php
                        include ("../config.php");
                        session_start();
                        $sql = "SELECT * FROM tbl_user WHERE UserName = '" . $_SESSION["username"] . "'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        echo "<img src='../profile_img/" . $row['profile_picture'] . "'>";
                        echo '<br>';
                        echo $row['UserName'];
                        ?>
                    </div>
                    <a href="pass_change.php">Change</a>
                    <a href="manageprofile.php?username=<?php echo $_SESSION["username"]; ?>">Profile</a>
                </div>
                <a class="logout" href="../logout.php">Logout</a>
            </div>
        </nav>
        <div class="row">
            <?php
            $sql = "SELECT * FROM videos WHERE status = 1";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
                $location = $row['location'];
                $video_id = $row['video_id'];
                $name = $row['name'];

                // Check if the user has already liked the video
                $liked_sql = "SELECT * FROM likes WHERE video_id = '$video_id' AND UserName = '" . $_SESSION['username'] . "'";
                $liked_result = mysqli_query($conn, $liked_sql);
                $liked = mysqli_num_rows($liked_result) > 0;
                ?>
                <div class="video-comment-container">
                    <div class="video-container">
                        <video class="vd" controls>
                            <source src="<?php echo $location ?>" type="video/mp4">
                            <source src="<?php echo $row['name'] ?>">
                        </video>
                    </div>
                    <div class="comment-container">
                        <div class="v_title">
                            <h3><?php echo $row['video_title']; ?></h3>
                            <?php echo $row['video_description']; ?>
                        </div>
                        <div class="like">
                            <div class="num-body">
                                <!-- Display the number of likes/dislikes -->
                            </div>
                            <button class="like-btn" data-video-id="<?php echo $video_id; ?>" <?php echo $liked ? 'style="display:none;"' : ''; ?>>Like</button>
                            <button class="unlike-btn" data-video-id="<?php echo $video_id; ?>" <?php echo !$liked ? 'style="display:none;"' : ''; ?>>Unlike</button>
                            <span>
                                <?php
                                $quee = mysqli_query($conn, "SELECT COUNT(DISTINCT UserName) AS user_count FROM likes where video_id = '$video_id';");
                                $quee1=mysqli_fetch_array($quee);
                                echo $quee1['user_count'];
                                    ?>
                            </span>
                            <?php
                            $UserName = $_SESSION["username"];
                            ?>
                            <script>
                                $(document).ready(function () {
                                    $('.like-btn').click(function () {
                                        var videoId = $(this).data('video-id');
                                        var userId = "<?php echo $_SESSION['username']; ?>"; // using session username

                                        $.ajax({
                                            type: 'POST',
                                            url: 'like.php',
                                            data: {
                                                video_id: videoId,
                                                user_id: userId,
                                                action: 'like'
                                            },
                                            success: function (data) {
                                                $('.like-btn[data-video-id="' + videoId + '"]').hide();
                                                $('.unlike-btn[data-video-id="' + videoId + '"]').show();
                                            }
                                        });
                                    });

                                    $('.unlike-btn').click(function () {
                                        var videoId = $(this).data('video-id');
                                        var userId = "<?php echo $_SESSION['username']; ?>"; // using session username

                                        $.ajax({
                                            type: 'POST',
                                            url: 'like.php',
                                            data: {
                                                video_id: videoId,
                                                user_id: userId,
                                                action: 'unlike'
                                            },
                                            success: function (data) {
                                                $('.like-btn[data-video-id="' + videoId + '"]').show();
                                                $('.unlike-btn[data-video-id="' + videoId + '"]').hide();
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                        <?php
                        $comment_sql = "SELECT * FROM comment JOIN tbl_user ON comment.username = tbl_user.UserName WHERE video_id = '$video_id' ORDER BY video_id DESC";
                        $comment_result = mysqli_query($conn, $comment_sql);
                        while ($comment_row = mysqli_fetch_array($comment_result)) {
                            ?>
                            <div class="comment_all">
                                <div class="comment-box">
                                    <div class="comment">
                                        <?php echo "<img src='../profile_img/" . $comment_row['profile_picture'] . "'>"; ?>
                                        <b> <?php echo $comment_row['username'] . ":" ?></b>
                                        <?php echo $comment_row['comment']; ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <form method="POST" action="./comment.php">
                            <div class="c_title">
                                <label class="c_title" for="comment">Comment</label>
                                <input type="text" name="comment" placeholder="Write a comment..." class="comment-text">
                                <input type="hidden" name="video_id" value="<?php echo $video_id ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['username']; ?>">
                                <input type="submit" name="video_comment" value="Enter" class="btn-comment">
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</body>

</html>