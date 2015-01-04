<?php
	if(!isset($_POST['email']) || !isset($_POST['comment']) || !isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password'])){
		die();
	}
	$url = "";
	$age = "";
	if(isset($_POST['age'])){
		$age = $_POST['age'];
	}
	if(isset($_POST['url'])){
		$age = $_POST['url'];
	}


	$email = $_POST['email'];
	$password = $_POST['password'];
	$name=$_POST['name'];
	$comment=$_POST['comment'];
	$profile= "$comment-$age-$url" ;
	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
	mysql_select_db('u160485837_bdg');
	$query = "INSERT INTO `user`(`name`,`email`,`profile`,`password`) VALUES(\"$name\",\"$email\",\"$profile\",\"$password\");";
	$result = mysql_query($query);
	if($result){
		echo "Register Success. Wait for Confirmation";
	}
	else{
		echo "Something's Wrong";
	}
?>