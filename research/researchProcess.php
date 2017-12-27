<?php
	require('../include/dbcon.php');
	
	
	if(isset($_POST['addFromResearch'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mname = $_POST['mname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$usertype = $_POST['usertype'];
		$d = getDate();
		$date_now = $d[0];
		
		$check = mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `username`='$username'"));
		if($check > 0){
			echo "D";
		}else{
			$insert = mysql_query("INSERT INTO `users` (`first_name`,`middle_name`,`last_name`,`username`,`password`,`user_type`,`date_added`)VALUES ('$fname','$mname','$lname','$username','$password','$usertype','$date_now')");
			if($insert){
				echo "SUCCESS";
			}else{
				echo mysql_error();
			}
		}
	}
	
	
	
	
	//function to exclude the selected panel chair in the panel member list
	if(isset($_POST['excludeId'])){
		$id = $_POST['excludeId'];
		$sql = mysql_query("select * from users where user_type='3' and id != '$id'");
		while($row = mysql_fetch_assoc($sql)){
			echo "<option value='".$row['id']."'>".ucwords($row['first_name'].' '.$row['middle_name'].' '.$row['last_name'])."</option>";
		}
	}
	
	
	
	
	//inserting rubrics and criteria 
	if(isset($_POST['templateMaxRate'])){
		$criteriaArr = json_decode($_POST['criteria']);
		$criteriaDescArr = json_decode($_POST['criteriaDesc']);
		$criteriaOrdArr = json_decode($_POST['criteriaOrder']);
		$templateName = $_POST['templateName'];
		$templateDesc = $_POST['templateDesc'];
		$templateMaxRate = $_POST['templateMaxRate'];
		$researchProfId = $_SESSION['logged_in_id'];
		$now = getDate();
		$date = $now[0];
		$numRows = mysql_num_rows(mysql_query("select * from rubrics where template_name = '$templateName'"));
		if($numRows > 0){
			echo "DUPLICATE";
		}else{
			$insert = mysql_query("insert into rubrics (template_name,description,max_rating,res_prof_id,date_added,date_modified) values ('$templateName','$templateDesc','$templateMaxRate','$researchProfId','$date','')");
			if($insert){
				//if success get the id of the inserted rubric
				$q = mysql_query("select * from rubrics order by id desc limit 1");
				while($row = mysql_fetch_assoc($q)){
					$last_id = $row['id'];
				}
				$counter = 0;
				$arrLen = count($criteriaArr);
				for($x = 0; $x < $arrLen; $x++){
					$criteria = $criteriaArr[$x];
					$criteriaDesc = $criteriaDescArr[$x];
					$criteriaOrd = $criteriaOrdArr[$x];
					$insertCriteria = mysql_query("insert into `rubric_criteria` (`rubric_id`,`criteria`,`description`,`order`,`date_added`,`date_modified`) values ('$last_id','$criteria','$criteriaDesc','$criteriaOrd','$date','')");
					$counter++;
					if($insertCriteria){
						
					}else{
						echo mysql_error();
					}
				}
				if($counter == $arrLen){
					echo "SUCCESS";
				}
			}else{
				echo mysql_error();
			}
		}
		
		//foreach()
	}
?>