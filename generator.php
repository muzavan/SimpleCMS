<?php
	var_dump($_COOKIE);
	if(!isset($_COOKIE["role"])){
		echo "Login sebagai admin terlebih dahulu";
	}
	else if($_COOKIE["role"]!="admin"){
		echo "Harus login sebagai admin";
	}
?>