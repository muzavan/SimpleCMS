 <!DOCTYPE html>
<html lang="en">
<head>
  <title>SimpleCMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="bootstrap/js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#this-carousel-id').carousel();
  });
  </script>
</head>
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
            <a href="index.php" class="navbar-brand">BANDUNG CONNECTION</a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
        	<!-- print all category -->
            <ul class="nav navbar-nav navbar-right">
            	<?php
			          	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
			          	mysql_select_db('u160485837_bdg');
			          	$id = $_GET['id'];
			          	$query = "SELECT `category`,SUM(`viewer`) FROM `content` GROUP BY `category` ORDER BY SUM(`viewer`) DESC LIMIT 3";
			          	$result = mysql_query($query);
			          	if(mysql_num_rows($result)<=0){
			          		echo "<h3>No category yet</h3>";
			          	}
			          	else{

			          		while($row = mysql_fetch_assoc($result)){

					?>
		                <li><a href="tag.php?tag=<?php echo str_replace(" ","", $row['category']);?>"><?php echo strtoupper($row['category']);?></a></li>
					<?php
							}
						}
				?>
            </ul>
        </div>
    </nav>

	<div class="container-space">
    </div>

	<div class="container">

		<?php
		          	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
		          	mysql_select_db('u160485837_bdg');
		          	$id = $_GET['id'];
		          	$query = "SELECT * FROM `content` WHERE `ID`=$id;";
		        	$query2 = "UPDATE `content` SET `viewer`=`viewer`+1 WHERE `ID`=$id;";
		        	$result = mysql_query($query2);
		          	$result = mysql_query($query);
		          	$row = mysql_fetch_assoc($result);
		?>
	    <div id="recentNews"class="row">
	    	<div class="col-sm-1">
	    	</div>
	    	<div class="col-sm-7">
	    		<div class="keterangan">
	    		<h1><?php echo $row['title'];?></h1>
		    		<i>	
			    		<h4>Category : <?php echo strtoupper($row['category']);?></h4>
			    		<p><h4>Posted by <?php echo $row['writer'];?></h4><h5>On <?php echo $row['date'];?></p>
		    		</i>
	    		</div>
	    		<img src="<?php echo $row['thumbnail'];?>" alt="image" class="post-single-thumbnail"/>
	    		<p><?php echo $row['full_content'];?></p>
			<h1>Comments</h1>
				<div class="col-md-10">
					 <form role="form" action="insert-comment.php?id=<?php echo $row['ID'];?>" method="post">
						  <div class="form-group">
						    <label for="name">Name:</label>
						    <input type="text" class="form-control" id="name" name="name">
						  </div>
						  <div class="form-group">
						    <label for="email">Email:</label>
						    <input type="email" class="form-control" id="email" name="email">
						  </div>
						  <div class="form-group">
						    <label for="URL">URL:</label>
						    <input type="text" class="form-control" id="url" name="url">
						  </div>
						   <div class="form-group">
							  <label for="comment">Comment:</label>
							  <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
							</div>
						  <button type="submit" class="btn btn-default">Submit</button>
					</form>

					<div class="container-space">
					</div>
					<?php
			          	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
			          	mysql_select_db('u160485837_bdg');
			          	$id = $_GET['id'];
			          	$query = "SELECT * FROM `comment` WHERE `PID`=$id ORDER BY  `CID` DESC;";
			          	$result = mysql_query($query);
			          	if(mysql_num_rows($result)<=0){
			          		echo "<h3>No comment yet</h3>";
			          	}
			          	else{
			          		while($row = mysql_fetch_assoc($result)){

					?>

					<h3><?php echo $row['name']?></h3>
					<p><?php echo $row['full-comment']?></p>

					<?php
							}
						}
					?>
				</div>
				
	    	</div>
	    	<div class="col-sm-4">
	    		<h2>SUGGESTED POSTS</h2>
	    		<?php
	    				$category = $row['category'];
			          	$query = "SELECT * FROM `content` WHERE `category`=\"$category\" ORDER BY  `ID` DESC LIMIT 5;";
			          	$result = mysql_query($query);
			          	if(mysql_num_rows($result)<=0){
			          		echo "<h3>No Suggestion</h3>";
			          	}
			          	else{
			          		while($row = mysql_fetch_assoc($result)){

					?>

					<h4><a href="post.php?id=<?php echo $row['ID']?>"><?php echo $row['title']?></a></h4>
					<img src="<?php echo $row['thumbnail']?>" alt="image" class="post-thumbnail"/>
	    			<p><?php echo $row['summary']?></p>
				<?php
							}
						}
				?>

	    	</div>
	    </div>
    </div>
    

</body>
</html>
</div>