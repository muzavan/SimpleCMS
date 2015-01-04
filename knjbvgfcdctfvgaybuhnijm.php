<?php
	if(!isset($_POST['email']) || !isset($_POST['password'])){
		die();
	}
	$email = $_POST['email'];
	$password = $_POST['password'];
	$remember="";
	if(isset($_POST['remember'])){
		$remember=$_POST['remember'];
	}
	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
	mysql_select_db('u160485837_bdg');
	$query = "SELECT * FROM `user` WHERE `email`=\"$email\" AND `status`=1 ;";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	if($password===$row['password']){
		if($remember==="on"){
			setcookie("name",$row["name"],time()+86400*7);
			setcookie("role",$row["role"],time()+86400*7);
		}
		else{
			setcookie("name",$row["name"],0);
			setcookie("role",$row["role"],0);
		}
		echo "Login berhasil. Klik <a href='contributor-post.php'> ini </a> jika tidak automatis redirect";
		header("Location : contributor-post.php");
	}
	else{
		echo "Login gagal. Username dan password tidak cocok";
	}
?>