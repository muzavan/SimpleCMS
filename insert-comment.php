<?php
	if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['comment']) || !isset($_GET['id'])){
		die();
	}

	$site ="";
	if(isset($_POST['url'])){
		$site =$_POST['url'];
	}
	$PID = $_GET['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
	mysql_select_db('u160485837_bdg');
	$query = "INSERT INTO `comment` (`PID`, `name`, `email`, `full-comment`, `site`) VALUES ('$PID', '$name', '$email', '$comment', '$site')";
	$result = mysql_query($query);
	if($result){
		echo "1";
	}
	else{
		echo "0";
	}



?>