<?php
	session_start();
	require("include/dbcon.php");
	//$con = mysql_connect('localhost','root','');
	//$link  = mysql_select_db('lecs',$con);

	/*$q = mysql_query("SELECT * FROM `events`");
	while($r = mysql_fetch_assoc($q)){
		$title = $r['title'];
		$description = $r['description'];
		$event_date = $r['date'];
		$url = "?viewSched=".$r['id'];
		$data[] = array("title"=>$title,"start"=>$event_date,"url"=>$url);
	}*/
	$query = mysql_query("SELECT * FROM `schedules`");
	while($row = mysql_fetch_assoc($query)){
		$title = getTitle($row['researchId']);
		$eventDate = $row['dateSchedule'];
		$url = "?viewSched=".$row['id'];
		$data[] = array("title"=>$title,"start"=>$eventDate,"url"=>$url);
	}
	print json_encode($data);
?>