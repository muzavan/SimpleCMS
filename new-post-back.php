<?php
	var_dump($_POST);
	$tag="logo";
	if(!isset($_POST['title']) || !isset($_POST['summary']) || !isset($_POST['content']) || !isset($_POST['category'])){
		die();
	}

	if(isset($_FILES['thumbnail'])){
		$i=0;
		while(file_exists("images/$i-{$_FILES['thumbnail']['name']}")){
			$i++;
		}
		move_uploaded_file ($_FILES['thumbnail'] ['tmp_name'],
   		"images/$i-{$_FILES['thumbnail'] ['name']}");

		$thumbnail = "images/$i-{$_FILES['thumbnail'] ['name']}";
		
		if(isset($_POST['tag']){
			$tag = $_POST['tag'];
		}

		$query = "INSERT INTO `images`(`path`,`alt`) VALUES (\"$thumbnail\",\"$tag\")";
		$result = mysql_query($query);
	}
	else{
		$thumbnail="logo.png";
	}
	$title = $_POST['title'];
	$summary = $_POST['summary'];
	$content = $_POST['content'];
	$content = str_replace("\"", "\\\"", $content);
	$content = str_replace("'", "\'"s, $content);
	$category = strtolower($_POST['category']);
	$writer = $_COOKIE['name'];
	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
	mysql_select_db('u160485837_bdg');
	$query = "INSERT INTO `content`(`title`,`summary`,`thumbnail`,`full_content`,`category`,`writer`,`date`) VALUES(\"$title\",\"$summary\",\"$thumbnail\",\"$content\",\"$category\",\"$writer\",CURRENT_DATE);";
	$result = mysql_query($query);
	if($result){
		echo "1";
	}
	else{
		echo "0";
	}
?>