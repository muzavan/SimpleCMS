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
				<li>&nbsp</li>
            </ul>
        </div>
    </nav>

    <div class="space">
    </div>

    <div class="container">
    	<div class="row">
		    <div id="this-carousel-id" class="carousel slide"><!-- class of slide for animation -->
				  <div class="carousel-inner">
				 	<?php
			          	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
			          	mysql_select_db('u160485837_bdg');
			          	$query = "SELECT * FROM `content` ORDER BY ID DESC LIMIT 5";
			          	$result = mysql_query($query);
			          	if($row = mysql_fetch_assoc($result)){
			        ?>
			        	<div class="item active"><!-- class of active since it's the first item -->
					      <img src="<?php echo $row['thumbnail'];?>" alt="" />
					      <div class="carousel-caption">
					      	<h2><a href="post.php?id=<?php echo $row['ID'];?>"><?php echo $row['title'];?></a></h2>
					        <p><?php echo $row['summary'];?></p>
					      </div>
					    </div>

			        <?php
			          	
			          	while($row = mysql_fetch_assoc($result)){
					?>
					    <div class="item"><!-- class of active since it's the first item -->
					      <img src="<?php echo $row['thumbnail'];?>" alt="" />
					      <div class="carousel-caption">
					      <h2><a href="post.php?id=<?php echo $row['ID'];?>"><?php echo $row['title'];?></a></h2>
					        <p><?php echo $row['summary'];?></p>
					      </div>
					    </div>

				    <?php
				    		}
				    	}
				    ?>
				  </div><!-- /.carousel-inner -->
				  <!--  Next and Previous controls below
				        href values must reference the id for this carousel -->
				    <a class="carousel-control left" href="#this-carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				    <a class="carousel-control right" href="#this-carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div><!-- /.carousel -->
		</div>
	</div>

	<div class="container-space">
    </div>

	<div class="container">

	    <a href="#"><h2>RECENT NEWS</h2></a>
	    <div id="recentNews"class="row">
	    	<?php
			          	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
			          	mysql_select_db('u160485837_bdg');
			          	$query = "SELECT * FROM `content` ORDER BY ID DESC LIMIT 3";
			          	$result = mysql_query($query);
			          	while($row = mysql_fetch_assoc($result)){
					?>
					    <div class="col-md-4"><!-- class of active since it's the first item -->
						    <div class="content">
						      <img src="<?php echo $row['thumbnail'];?>" class="post-thumbnail" alt="" />
						      <h2><a href="post.php?id=<?php echo $row['ID'];?>"><?php echo $row['title'];?></a></h2>
						        <p><?php echo $row['summary'];?></p>
						    </div>
					    </div>

				    <?php
				    		
				    	}
				    ?>
	    </div>
    </div>

    <div class="container">

	    <a href="#"><h2>BUSINESS</h2></a>
	    <div id="recentNews"class="row">
	    	<?php
			          	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
			          	mysql_select_db('u160485837_bdg');
			          	$business = "business";
			          	$query = "SELECT * FROM `content` WHERE `category`=\"$business\" ORDER BY ID DESC LIMIT 3";
			          	$result = mysql_query($query);
			          	while($row = mysql_fetch_assoc($result)){
					?>
					    <div class="col-md-4"><!-- class of active since it's the first item -->
					      <img src="<?php echo $row['thumbnail'];?>" class="post-thumbnail" alt="" />					   
					      <h2><a href="post.php?id=<?php echo $row['ID'];?>"><?php echo $row['title'];?></a></h2>
					        <p><?php echo $row['summary'];?></p>
					    </div>

				    <?php
				    		
				    	}
				    ?>
	    </div>
    </div>

    <div class="container">

	    <a href="#"><h2>POLITICS</h2></a>
	    <div id="recentNews"class="row">
	    	<?php
			          	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
			          	mysql_select_db('u160485837_bdg');
			          	$politics = "politics";
			          	$query = "SELECT * FROM `content` WHERE `category`= \"$politics\" ORDER BY ID DESC LIMIT 3";
			          	$result = mysql_query($query);
			          	while($row = mysql_fetch_assoc($result)){
					?>
					    <div class="col-md-4"><!-- class of active since it's the first item -->
					      <img src="<?php echo $row['thumbnail'];?>" class="post-thumbnail" alt="" />
					      <h2><a href="post.php?id=<?php echo $row['ID'];?>"><?php echo $row['title'];?></a></h2>
					        <p><?php echo $row['summary'];?></p>
					    </div>

				    <?php
				    		
				    	}
				    ?>
	    </div>
    </div>
    

</body>
</html>
</div>