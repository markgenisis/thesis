<?php
include "../include/dbcon.php";
if(isset($_POST['ids'])){
	print_r($_POST);
	$now=time();
	 $x=0; $ids=explode(",",$_POST['ids']);
	foreach($_POST as $key => $val){
		if($key !='ids'){
			$ins=mysql_query("insert into ratings values ('NULL','{$_POST['researchId']}','{$ids[$x]}','{$_POST['rubricId']}','{$_POST['panelId']}','{$_POST['rtype']}','$val','$now');");
			$x++;
		}else{
			echo "SUCCESS";
			die();
			}
	} 
	
}
if(isset($_POST['rID'])){
	$comment=addslashes($_POST['comments']);
	$rid=$_POST['rID'];
	$now=time();
	$insert=mysql_query("insert into comments values ('NULL','{$_SESSION['logged_in_id']}','$rid','$comment','$now');") or die(mysql_error());
	if($insert){
		echo "SUCCESS";
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
