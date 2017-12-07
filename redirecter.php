<?php
	session_start();
	if($_SESSION['ACCESS_TYPE'] == 1){
		header("location:admin/");
	}else if($_SESSION['ACCESS_TYPE'] == 2){
		header("location:research/");
	}else if($_SESSION['ACCESS_TYPE'] == 3){
		header("location:panel/");
	}else if($_SESSION['ACCESS_TYPE'] == 3){
		header("location:adviser/");
	}else{
		header("location:index.php");
	}

?>