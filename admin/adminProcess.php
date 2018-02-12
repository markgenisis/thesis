<?php
	require('../include/dbcon.php');
	
	
	if(isset($_POST['addFromAdmin'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mname = $_POST['mname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$usertype = $_POST['usertype'];
		$desciplineID=$_POST['desciplineID'];
		$d = getDate();
		$date_now = $d[0];
		
		$check = mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `username`='$username'"));
		if($check > 0){
			echo "D";
		}else{
			$insert = mysql_query("INSERT INTO `users` (`first_name`,`middle_name`,`last_name`,`username`,`password`,`user_type`,`date_added`,`deptID` ,`descipline`)VALUES ('$fname','$mname','$lname','$username','$password','$usertype','$date_now','{$_SESSION['department_id']}','$desciplineID')");
			if($insert){
				echo "SUCCESS";
			}else{
				echo mysql_error();
			}
		}
	}
	
	if(isset($_POST['toSearch'])){
		$toSearch =$_POST['toSearch'];
		$sql = mysql_query("SELECT * FROM `proponents` WHERE `name` LIKE '$toSearch%'");
		$num = mysql_num_rows($sql);
		if($num > 0){
				echo "<strong>Proponents:</strong><ul class='w3-ul'>";
			while($row = mysql_fetch_assoc($sql)){
				echo "<li><a href='?viewSched=".$row['researchId']."' style='color:#000;'>".ucwords($row['name'])."</a></li>";
			}
				echo "</ul><hr/>";
		}
	//	$sql = mysql_query("SELECT * FROM `proponents` WHERE `name` LIKE '$toSearch%'");
	} 
	
	
	
	if(isset($_POST['courseName'])){
		$courseName = $_POST['courseName'];
		$courseCode = $_POST['courseCode'];
		$Descipline=$_POST['Descipline'];
		$now = getDate();
		$date = $now[0];
		$check = mysql_num_rows(mysql_query("SELECT * FROM `courses` WHERE `course`='$courseName' AND `courseCode`='$courseCode'"));
		if($check > 0){
			echo "D";
		}else{
			$insert = mysql_query("INSERT INTO `courses` (`course`,`courseCode`,`dateAdded`,`dateModefied`,`descipline`) VALUES ('$courseName','$courseCode','$date','','$Descipline')");
			if($insert){
				echo "SUCCESS";
			}else{
				echo mysql_error();
			}
		}
	}
	
	if(isset($_POST['descipline'])){
		$descipline = $_POST['descipline'];
		 
		$now = getDate();
		$date = $now[0];
		$check = mysql_num_rows(mysql_query("SELECT * FROM `descipline` WHERE `descipline`='$descipline' AND `dept_id`='{$_SESSION['department_id']}'"));
		if($check > 0){
			echo "D";
		}else{
			$insert = mysql_query("INSERT INTO `descipline` (`dept_id`,`descipline`) VALUES ('{$_SESSION['department_id']}','$descipline')");
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
	if(isset($_POST['getCourse'])){
		$course=$_POST['getCourse'];
		$desc=mysql_query("select * from courses where descipline='$course'");
		while($row=mysql_fetch_assoc($desc)){ ?>
		<option value="<?php echo $row['id']; ?>"> <?php echo $row['courseCode']; ?></option>
		<?php }
	}
	
?>