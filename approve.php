<?php
	if(!isset($_COOKIE["role"])){
		echo "Login sebagai admin terlebih dahulu";
		die();
	}
	else if($_COOKIE["role"]!="1"){
		echo "Harus login sebagai admin";
		die();
	}
	
	mysql_connect('mysql.idhostinger.com','u160485837_bdg','connection');
	mysql_select_db('u160485837_bdg');
	$id = $_GET['id'];
	$query = "UPDATE `user` SET `status`=1 WHERE `ID`=$id";
	$result = mysql_query($query);
	if($result){
		echo "User #$id Approved";
	}	          	
?>