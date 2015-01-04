<?php
		mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
		mysql_select_db('u160485837_bdg');
          	
		$i=0;
		while(file_exists("video/$i-{$_FILES['imgSrc']["name"]}")){
			$i++;
		}
		move_uploaded_file ($_FILES['imgSrc'] ['tmp_name'],
   		"video/$i-{$_FILES['imgSrc'] ['name']}");

		$imgSrc = "video/$i-{$_FILES['imgSrc'] ['name']}";
		$tag = $_POST['tag'];

		$query = "INSERT INTO `video`(`path`,`alt`) VALUES (\"$imgSrc\",\"$tag\")";
		$result = mysql_query($query);
		if($result){
			header('Location : admin-video.php');
		}
		else{
			echo $query;
		}
?>