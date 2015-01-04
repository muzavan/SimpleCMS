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
	else if($_COOKIE["role"]!="1"){
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
        	<div class="alert alert-info" role="alert"><h1>New User</h1></div>
	        <div class="table-responsive">          
		      <table class="table">
		        <thead>
		          <tr>
		            <th>Name</th>
		            <th>Email</th>
		            <th>Profile</th>
		            <th>Action</th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php
		          	mysql_connect('localhost','root','connection');
		          	mysql_select_db('simpleCMS');
		          	$query = "SELECT * FROM `user` WHERE `status`=0 ORDER BY  `ID` DESC;";
		          	$result = mysql_query($query);
		          	
		          	while ($row = mysql_fetch_assoc($result)){
		          	?>
		          	<tr>
			          	<th><?php echo $row['name'];?></th>
			          	<th><?php echo $row['email'];?></th>
			          	<th><?php echo $row['profile'];?></th>
			          	<th><a href="approve.php?id=<?php echo $row['ID'];?>"><div class="alert alert-success" role="alert">Approve</div></a> <a href="reject.php?id=<?php echo $row['ID'];?>"><div class="alert alert-warning alert-small small" role="alert">Reject</div></a></th>
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