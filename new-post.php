 <!DOCTYPE.php>
<html lang="en">
<head>
  <title>SimpleCMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="bootstrap/js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/adapters/jquery.js"></script>
	<script type="text/javascript">
		$( document ).ready( function() {
			$( 'textarea#content' ).ckeditor();
		} );
	</script>
</head>
<?php
	var_dump($_COOKIE);
	if(!isset($_COOKIE["role"])){
		echo "Please login as admin or contributor.";
		die();
	}
	else if($_COOKIE["role"]!="1" && $_COOKIE["role"]!="2" ){
		echo "Please login as admin or contributor.";
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

	    	<div class="well well-small"><a href="new-post.php"><h2>+New Post</h2></a></div>

        <div class="container">
	       <div class="col-sm-2">
	       </div>

	       <div class="col-sm-8 well">
	       		<form role="form" action="new-post-back.php" enctype="multipart/form-data" method="post">
						 	  <div class="form-group">
							    <label for="name">Title:</label>
							    <input type="text" class="form-control" id="title" name="title">
							  </div>
							  <div class="form-group">
							    <label for="summary">Summary:</label>
							    <input type="summary" class="form-control" id="summary" name="summary">
							  </div>
							  	<div class="form-group">
					    			<label for="inputEmail">Image</label>
					        		<input type="file" class="form-control" id="thumbnail" name="thumbnail" placeholder="Image">
					    		</div>
					    		<div class="form-group">
							    <label for="alt">Tag:</label>
							    <input type="text" class="form-control" id="tag" name="tag">
							  </div>
							   <div class="form-group">
								  <label for="content">Full Content:</label>
								  <textarea class="form-control" rows="8" id="content" name="content"></textarea>
								</div>
								<div class="form-group">
								  <label for="sel1">Select Category:</label>
								  <select class="form-control" id="sel1" name="category">
								    <option>Opinion</option>
								    <option>Business</option>
								    <option>Politics</option>
								    <option>Indonesian</option>
								  </select>
								</div>
						  
						  <button type="submit" class="btn btn-default">Submit</button>
					</form>
	       </div>

	       <div class="col-sm-2">
	       </div>
		</div>


</body>
</html>
</div>