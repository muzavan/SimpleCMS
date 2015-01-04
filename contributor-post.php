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
	//var_dump($_COOKIE);
	if(!isset($_COOKIE["role"])){
		echo "Please login as admin or contributor";
		die();
	}
	else if($_COOKIE["role"]!="2"){
		echo "Please login as admin or contributor";
		if($_COOKIE["role"]=="1"){
			header('Location : admin-post.php');
		}
		else{
			die();
		}
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
            	<li><a href="contributor-post.php">Post</a></li>
                <li><a href="contributor-image.php">Image</a></li>
                <li><a href="contributor-video.php">Video</a></li>
                <li><a href="contributor-logout.php">Logout</a></li>
            </ul>
        </div>

    </nav>

    	<div class="container-space">
    	</div>

    	<div class="well well-small"><a href="new-post.php"><h2>+New Post</h2></a></div>

        <div class="container">
	        <div class="table-responsive">          
		      <table class="table">
		        <thead>
		          <tr>
		            <th>Title</th>
		            <th>Summary</th>
		            <th>Thumbnail</th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php
		          	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
		          	mysql_select_db('u160485837_bdg');
		          	$query = "SELECT `title`,`summary`,`thumbnail`,`ID` FROM `content` ORDER BY  `ID` DESC LIMIT 5;";
		          	$result = mysql_query($query);
		          	
		          	while ($row = mysql_fetch_assoc($result)){
		          	?>
		          	<tr>
			          	<th><a href="post.php?id=<?php echo $row['ID'];?>"><?php echo $row['title'];?></a></th>
			          	<th><?php echo $row['summary'];?></th>
			          	<th><a href="<?php echo $row['thumbnail'];?>" > <!-- <img src="<?php echo $row['thumbnail'];?>" style="max-width:100%;" > --> Thumbnail</a></th>
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