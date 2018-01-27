<?php
	require('../include/dbcon.php');
	
	
	if(isset($_POST['addFromAdmin'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mname = $_POST['mname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$usertype = $_POST['usertype'];
		$deptID=$_POST['deptID'];
		$d = getDate();
		$date_now = $d[0];
		
		$check = mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `username`='$username'"));
		if($check > 0){
			echo "D";
		}else{
			$insert = mysql_query("INSERT INTO `users` (`first_name`,`middle_name`,`last_name`,`username`,`password`,`user_type`,`date_added`,`deptID`)VALUES ('$fname','$mname','$lname','$username','$password','$usertype','$date_now','$deptID')");
			if($insert){
				echo "SUCCESS";
			}else{
				echo mysql_error();
			}
		}
	}
	
	
	
	
	
	if(isset($_POST['courseName'])){
		$courseName = $_POST['courseName'];
		$courseCode = $_POST['courseCode'];
		$now = getDate();
		$date = $now[0];
		$check = mysql_num_rows(mysql_query("SELECT * FROM `courses` WHERE `course`='$courseName' AND `courseCode`='$courseCode'"));
		if($check > 0){
			echo "D";
		}else{
			$insert = mysql_query("INSERT INTO `courses` (`course`,`courseCode`,`dateAdded`,`dateModefied`) VALUES ('$courseName','$courseCode','$date','')");
			if($insert){
				echo "SUCCESS";
			}else{
				echo mysql_error();
			}
		}
	}
	
	
	
	if(isset($_POST['changeSy'])){
		$sY = $_POST['changeSy'];
		$syUpdate = mysql_query("UPDATE `activeyear` SET `yearRange`='$sY'");
		if($syUpdate){
			echo "SUCCESS";
		}else{
			echo mysql_error();
		}
	}
	if(isset($_POST['deptName'])){
		$dept=mysql_query("insert into departments values ('NULL','{$_POST['deptName']}')");	
		if($dept){
			echo "SUCCESS";
		}
	}
?>