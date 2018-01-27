<?php 
	if(isset($_SESSION['ACCESS_TYPE'])){
		if($_SESSION['ACCESS_TYPE'] == 1){
			header("location:admin/");
			die();
		}else if($_SESSION['ACCESS_TYPE'] == 2){
			header("location:research/");
			die();
		}else if($_SESSION['ACCESS_TYPE'] == 3){
			if($_SESSION['LOGIN_ACCESS']=='GRANTED'){
				header("location:panel/");
				die();
			}
		}else if($_SESSION['ACCESS_TYPE'] == 4){
			if($_SESSION['LOGIN_ACCESS']=='GRANTED'){
				header("location:adviser/");
				die();
			}
		}else if($_SESSION['ACCESS_TYPE'] == 0){
			header("location:superadmin/");
			die();
		}else{
		header("location:index.php");
		die();
		}
		 
	} 

?>