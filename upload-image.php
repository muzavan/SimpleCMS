<?php
		mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
		mysql_select_db('u160485837_bdg');
          	
		$i=0;
		while(file_exists("images/$i-{$_FILES['imgSrc']["name"]}")){
			$i++;
		}
		move_uploaded_file ($_FILES['imgSrc'] ['tmp_name'],
   		"images/$i-{$_FILES['imgSrc'] ['name']}");

		$imgSrc = "images/$i-{$_FILES['imgSrc'] ['name']}";
		$tag = $_POST['tag'];

		$query = "INSERT INTO `images`(`path`,`alt`) VALUES (\"$imgSrc\",\"$tag\")";
		$result = mysql_query($query);
		if($result){
			header('Location : admin-image.php');
		}
		else{
			echo $query;
		}
?>