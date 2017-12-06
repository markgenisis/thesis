<?php
	$con = mysql_connect('localhost','root','');
	$link  = mysql_select_db('lecs',$con);
	

	$q = mysql_query("SELECT * FROM `events`");
	while($r = mysql_fetch_assoc($q)){
		$title = $r['title'];
		$description = $r['description'];
		$event_date = $r['date'];
		$data[] = array("title"=>$title,"start"=>$event_date);
	}
	print json_encode($data);
?>