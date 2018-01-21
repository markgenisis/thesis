<?php
	session_start();
	date_default_timezone_set("Asia/Manila");
	$db = 'thesis';//database variable initialization and assignment
	$link = mysql_connect('localhost','root','');//link to connect with the server
	$db_connection = mysql_select_db($db,$link);//database selection to connect with
	date_default_timezone_set('Asia/Manila');
	/*
	if($db_connection){ //if this is true code inside the curly braces will execute else code inside the else block will execute
		echo "connected";
	}else{
		echo "not connected";
	}*/
	$sql = mysql_query("SELECT * FROM `activeyear`");
	while($row = mysql_fetch_assoc($sql)){
		$_SESSION['activeYear'] = $row['yearRange'];
	}
	
	function getUserType($x){
		switch($x){
			case 1:break;
			case 2: $usertype = "Research Professor";return $usertype;
			case 3: $usertype = "Panel";return $usertype;
			case 4: $usertype = "Adviser";return $usertype;
			default:$usertype = "Unknown";return $usertype;
		}
	}
	
	
	
	
	
	function getPanels($x){
		$sql = mysql_query("SELECT * FROM `panels` WHERE `researchId`='$x'");
		while($row = mysql_fetch_assoc($sql)){
			$d[] = $row['name'];
		}
		return $d;
	}
	
	
	
	function getPanelSched($x){
		foreach($x as $key => $value){
			$d[$value] = array();
			$sql = mysql_query("SELECT `researchId` FROM `panels` WHERE `name`='$value'");
			while($row = mysql_fetch_assoc($sql)){
				//print_r($row);
				//echo $row['name'].'='.$row['researchId'].' -> ';
				array_push($d[$value],$row['researchId']);
				//print_r($row['researchId']);
			}
		}
		return $d;
	}
	
	
	
	//getting the list of researches of a certain adviser id
	function getAdviserAdvicee($x){
		//$d[]="";
		$sql = mysql_query("SELECT * FROM `researches` WHERE `adviserId`='$x'");
		while($row = mysql_fetch_assoc($sql)){
			$d[] = $row['id'];
		}
		return $d;
	}
	
	
	
	//getting the schedules of each handled researches
	function getSchedHandled($x,$type){
		//print_r($);
		foreach($x as $key => $value){
			$sql = mysql_query("SELECT * FROM `schedules` WHERE `researchId`='$value' AND `defenseType`='$type'");
			while($row = mysql_fetch_assoc($sql)){
				$sched[] = $row['dateSchedule'];
			}
		}
		return $sched;
	}
	
	
	function getSchedHandledPanelMem($x,$type){
		foreach($x as $key => $value){
			$sched[$key] = array();
			foreach($value as $i => $j){
				$sql = mysql_query("SELECT * FROM `schedules` WHERE `researchId`='$j' AND `defenseType`='$type'");
				while($row = mysql_fetch_assoc($sql)){
					array_push($sched[$key],$row['dateSchedule']);
				}
			}
			
		}
		return $sched;
	}
?>