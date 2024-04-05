<style>
    <style>body {

        font-family: "Lato", sans-serif;
    }

    .sidenav {
        font-family: "Lato", sans-serif;
        height: 100%;
        width: 150px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;


    }

    .sidenav a {

        text-decoration: none;
        font-size: 25px;
        color: #fff;
        display: block;
        background-color: #424242;

    }

    .sidenav {
        text-align: center;
        padding: 1px 1px 1px 1px;
        text-decoration: none;
        font-size: 25px;
        color: #fff;
        display: block;
    }

    .sidenav a:hover {
        color: #f1f1f1;

    }

    .das {
        text-align: center;
        padding: 8px;
        font-size: 16px;

        background-color: #424242;

    }

    .upload {
        text-align: center;
        padding: 8px;
        font-size: 16px;

        background-color: #424242;
    }

    .logout {
        padding: 10px;
        margin-top: 400px;

    }
</style>

<header>

</header>

<body style="margin-left:25%;padding:1px 16px;height:1000px;">
    <div class="sidenav">
        <a class="das" href="admin_dashboard.php">Video Vlog</a></li><br>
        <a class="upload" href="upload.php">Add Video</a></li><br>
        <a href="video_edit.php">Manage Video</a><br>
        <a class="logout" href="http://localhost/project_2/login.php">logout </a></li>
    </div>



    <div>
        <h1>videos</h1>
        <div class="gallery">
            <!-- <button class="addevent"><a href="upload.php">Add video</a></button> -->
            <table style="width:80%" border=1px solid black>
                <tr>


                    <div>
                        <th>video_id</th>
                        <th>video_title</th>
                        <th>video_description</th>
                        <th>video</th>
                        <th>delete</th>
                        <th>edit</th>
                        <th>status</th>
                    </div>
                </tr>
                <?php
                include '../config.php';

                $sql = "SELECT * FROM videos";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                $sno = 1;
                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr style="height:100px">
                            <td>
                                <?php echo $sno++ ?>
                            </td>
                            <td>
                                <?php echo $row['video_title']; ?>
                            </td>
                            <td>
                                <?php echo $row['video_description']; ?>
                            </td>

                            <td><video style="width:10%" height="10%">
                                    <source class="vd" src="<?php echo $row['location'] ?>" type="video/mp4">
                                </video>


                            <td>
                                <a href="./delete_video.php?video_id=<?php echo $row['video_id'] ?>">Delete</a>
                            </td>
                            <td><a href="./edit_video.php?video_id=<?php echo $row['video_id'] ?>">edit</a></td>
                            <td>
                                <?php
                                if ($row['status'] == 1) {
                                    echo 'Avtive';
                                } else {
                                    echo 'Inactive';
                                }
                                ?>
                            </td>
                        </tr>


                    <?php }
                }
                ?>
            </table>

        </div>
        
    </div>

</body>