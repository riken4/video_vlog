<?php 
include("../config.php");

// if(!isset($_SESSION['login_session'])){ 
// 	header("location:../login.php");
// }
// else 
// {
// 	$userid=$_SESSION['userid'];
//     include("functions.php");
// }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Like Dislike (Unlike) system in PHP and AJAX</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

	<script src="like_dislike.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div style="background:grey; color: #fff;" class="card">
	 			<h1>All Posts </h1>
				<a href="logout.php">Logout</a>
			</div>
		</div>
		<br>
    	<div class="row">
    		<?php 
			include('../config.php');
			include("./function.php");

        	$sql = "SELECT * FROM videos ORDER BY video_id DESC"; 
        	$result=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        	foreach($rows as $row) {
        	?> 
        	<div class="col-sm-2"></div>
        	<div class="col-sm-8 list">
				<div class="row card_item">
	  				<div class="col-sm-12">
						<li class="title"><a href="readvideoes.php?id=<?php echo $row['video_id'];?>"><?php echo $row["location"]; ?></a></li>
						<div class="content"><?php echo $row['video_title']?> </div> 
					</div>
					<div class="col-sm-12">
				        <i <?php
                 
				        	if(userLikesDislikes($row['video_id'],'like',$dbname)): ?>
				              class="fa fa-thumbs-up like-btn"
				          <?php else: ?>
				              class="fa fa-thumbs-o-up like-btn"
				          <?php endif ?>
				          data-id="<?php echo $row['video_id'] ?>"></i>
				        <span class="likes"><?php echo getLikesDislikes($row['video_id'],'like',$dbname); ?></span>
				        
				        &nbsp;&nbsp;&nbsp;&nbsp;
				        <i 
				          <?php if (userLikesDislikes($row['video_id'],$userid,'dislike',$dbname)): ?>
				              class="fa fa-thumbs-down dislike-btn"
				          <?php else: ?>
				              class="fa fa-thumbs-o-down dislike-btn"
				          <?php endif ?>
				          data-id="<?php echo $row['video_id'] ?>"></i>
				        <span class="dislikes"><?php echo getLikesDislikes($row['video_id'],'dislike',$dbname); ?></span>
			        </div>
			    </div>
		    </div>
		    <div class="col-sm-2"></div>
			<?php }
  
        //    function userLikesDislikes($video_id, $id, $rating_action, $dbname) {
        //     try {
        //         $sql = "SELECT COUNT(*) FROM user_rating WHERE id = $id AND video_id = $video_id AND rating_action = '$rating_action'";
        //         $count = mysqli_query($conn,$sql);
        //         return ($count > 0);
        //     } catch (PDOException $e) {
        //         // Handle the exception, for example:
        //         error_log("Error in userLikesDislikes function: " . $e->getMessage());
        //         return false; // Return false to indicate failure
        //     }
        // }
        
	    	?> 
    	</div>
	</div>
</body>
</html>
