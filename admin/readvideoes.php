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
            padding-top: 60px;
            height: 64px;
            /* Adjusted padding for space taken by fixed navbar */
        }

        .video-comment-container {
            display: flex;
            flex-direction: row;
            margin: 20px;
        }

        .video-container {
            width: 30%;
            /* Adjusted width for video container */
   
            margin-left: 500px;
            /* Adjusted margin between video and comment container */
        }

        .comment-container {
            width: 30%;
            /* Adjusted width for comment container */
            display: flex;
            flex-direction: column;
        }

        .comment-box {
            border: 2px solid black;
            padding: 5px;
            margin-bottom: 10px;
        }


        .vd {
            width: 100%;
            /* Video width adjusted to fit its container */
            max-height: 700px;
            /* Set maximum height for the videos */
        }



        .v_title {

            margin-bottom: 0px;
            /* Adjusted margin */
            text-align: center;
            /* Centering video titles */
        }

        .comment-text {
            width: calc(100% - 20px);
            /* Making comment input full width */
            margin-bottom: 10px;
        }

        .btn-comment {
            width: 100%;
        }


        .logout {
            position: fixed;
            bottom: 20px;
            left: 20px;
            padding: 10px;
        }
    </style>
</head>

<body>

    <section class="header">
        <nav>
            <div class="sidenav">
                <a href="user_dashboard.php">Home</a>
                <div class="profile">
                    <div class="user">
                        <img src="../profile.png" alt=width="40" height="40" srcset=""><br>
                        <?php
                        session_start();

                        echo $_SESSION["username"];

                        ?>
                    </div>
                </div>
                <a class="logout" href="../logout.php">Logout</a>
            </div>
        </nav>
        <<div class="row">
            <?php
            include ("../config.php");
            $sql = "SELECT * FROM videos";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
                $location = $row['location'];
                $video_id = $row['video_id'];
                $name = $row['name'];
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
                            <h3><?php echo $row['video_title']; ?></h3><br>
                            <?php echo $row['video_description']; ?>
                        </div>
                        <?php
                        include ("../config.php");
                        $video_id = $row['video_id'];
                        $comment = mysqli_query($conn, "SELECT * FROM comment where video_id='$video_id' order by video_id DESC");
                        while ($comment_row = mysqli_fetch_array($comment)) {
                            ?>
                            <div class="comment-box">
                                <div class="comment">

                                    <?php echo $comment_row['comment']; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <form method="POST" action="./comment.php">
                            <div class="c_title">
                                <label class="c_title" for="">comment</label>
                                <input type="text" name="comment" placeholder="Write a comment..." class="comment-text">
                                <input type="hidden" name="video_id" value="<?php echo $video_id ?>">
                                <input type="hidden" name="user_id" value="<?php echo $user ?>">
                                <input type="submit" name="video_comment" value="Enter" class="btn-comment">
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
    </section>
    </div>


</body>

</html>