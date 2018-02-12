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
	//	$sql = mysql_query("SELECT * FROM `proponents` WHERE `name` LIKE '$toSearch%'");
	} 
	
?>