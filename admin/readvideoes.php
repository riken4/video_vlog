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
            width: 30%;

            margin-left: 500px;
        }
        
        .vd {
            width: 100%;
            max-height: 700px;
        }
.comment_all table{
    max-height: 100px; /* Adjust this height as needed */
    overflow-y: auto;
    border: 1px solid #ddd; /* Add border for better separation */
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
        .comment-box img{
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
                        $sql = "SELECT * FROM tbl_user where username = '" . $_SESSION["username"] . "'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        echo "<img src='../profile_img/" . $row['profile_picture'] . "'>";
                        echo '<br>';
                   echo $row['UserName'];
                        ?>
                    
                    </div>

                    <a href="pass_change.php">change</a>
        <a href="manageprofile.php?username=<?php echo $_SESSION["username"];?>">profile</a>
                </div>
                <a class="logout" href="../logout.php">Logout</a>
            </div>
        </nav>
        <<div class="row">
            <?php
       
            $sql = "SELECT * FROM videos where status = 1";
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
                            <h3><?php echo $row['video_title']; ?></h3>
                            <?php echo $row['video_description']; ?>
                        </div>
                        <div class="like" >
<!-- like -->

                            <div class="">
                                <div class="">
                                    <span class="">like</span>
                                    <span class="">0</span>
                                </div>
                                <div class="video-rating">
                                    <span class="">dislike</span>
                                    <span class="">0</span>
                                </div>
                                
                            </div>
                        </div>
                        <?php
                        include ("../config.php");

                        $video_id = $row['video_id'];
                        $comment = mysqli_query($conn, "SELECT * FROM comment join tbl_user on comment.username=tbl_user.UserName where video_id='$video_id' order by video_id DESC;");
                        while ($comment_row = mysqli_fetch_array($comment)) {
                            ?>
                            <div class="comment_all">
                            <div class="comment-box">
                                <div class="comment">
                                <?php
     
            
            echo "<img src='../profile_img/" . $comment_row['profile_picture'] . "'>"; ?>
                             
                                    <b> <?php echo $comment_row['username']; echo ":" ?></b>
                                    <?php echo $comment_row['comment']; ?>
                                </div>
                            </div></div>
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