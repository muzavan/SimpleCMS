 <!DOCTYPE.php>
<html lang="en">
<head>
  <title>SimpleCMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="bootstrap/js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<?php
	var_dump($_COOKIE);
	if(!isset($_COOKIE["role"])){
		echo "Please login as admin.";
		die();
	}
	else if($_COOKIE"role"]!="1"){
		echo "Please login as admin.";
		die();
	}
?>
<body>
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <span><img class="navbar-brand" src="logo-kotak.png" alt="Bandung Connection" /></span>
            <a href="#" class="navbar-brand">BANDUNG CONNECTION</a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
        	<!-- print all category -->
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="admin-post.php">Post</a></li>
                <li><a href="admin-image.php">Image</a></li>
                <li><a href="admin-video.php">Video</a></li>
                <li><a href="admin-users.php">Users</a></li>
                <li><a href="admin-logout.php">Logout</a></li>
            </ul>
        </div>

    </nav>

    	<div class="container-space">
    	</div>

    	<div class="container">
    		<div class="row">
    			<div class="col-md-4">
    			</div>
    			<div class="col-md-4">
    				<h3>Upload Image</h3>
	    			<form action="upload-image.php" method="post" enctype="multipart/form-data">
					    <div class="form-group">
					        <label for="inputEmail">Tag </label>
					        <input type="text" class="form-control" id="tag" name="tag" placeholder="(words describing your image)" width="40pt">
					    </div>
					    <div class="form-group">
					    	<label for="inputEmail">Image</label>
					        <input type="file" class="form-control" id="uploadfile" name="imgSrc" placeholder="Image">
					    </div>
					    <button type="submit" class="btn btn-primary"> Image </button>
					</form>
    			</div>
    			<div class="col-md-4">
    			</div>
    		</div>
    	</div>
        <div class="container">
	        <div class="table-responsive">          
		      <table class="table">
		        <thead>
		          <tr>
		            <th>Thumbnail</th>
		            <th>Keywords</th>
		            <th>Action</th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php
		          	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
		          	mysql_select_db('u160485837_bdg');
		          	$query = "SELECT * FROM `video` ORDER BY  `ID` DESC LIMIT 10;";
		          	$result = mysql_query($query);
		          	
		          	while ($row = mysql_fetch_assoc($result)){
		          	?>
		          	<tr>
			          	<th><iframe width="420" height="315"
src="?php echo $row['path'];?>">
</iframe></th>
			          	<th><?php echo $row['alt'];?></th>
			          	<th><a href="<?php echo $row['path'];?>">View Image</a></th>
		          	</tr>

		         <?php	
		          	}
		          ?>
		        </tbody>
		      </table>
		      </div>
		    </div>
		</div>


</body>
</html>
</div>