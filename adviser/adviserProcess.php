<?php
	require('../include/dbcon.php');
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
		
		
		$sql1 = mysql_query("SELECT * FROM `researches` WHERE `title` LIKE '$toSearch%'");
		$num1 = mysql_num_rows($sql1);
		if($num1 > 0){
				echo "<strong>Title:</strong><ul class='w3-ul'>";
			while($row1 = mysql_fetch_assoc($sql1)){
				echo "<li><a href='?viewSched=".$row1['id']."' style='color:#000;'>".ucwords($row1['title'])."</a></li>";
			}
				echo "</ul><hr/>";
		}
		
		$sql2 = mysql_query("SELECT * FROM `users` WHERE `first_name` LIKE '$toSearch%' AND `user_type`=''");
		$num2 = mysql_num_rows($sql2);
		if($num2 > 0){
				echo "<strong>Panels:</strong><ul class='w3-ul'>";
			while($row2 = mysql_fetch_assoc($sql2)){
				echo "<li><a href='?holdRes=".$row2['id']."' style='color:#000;'>".ucwords($row2['first_name'].' '.$row['middle_name'].' '.$row2['last_name'])."</a></li>";
			}
				echo "</ul><hr/>";
		}
	} 
	} 
	
?>