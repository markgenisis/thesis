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
	
	function getVenue($x){
		//global $mysqli;
		$sql=mysql_query("select * from schedules where researchId='$x'");
		while($row=mysql_fetch_assoc($sql)){
			return $row['venue'];
		}
	}

	function getSchedId($x){
		$sql = mysql_query("SELECT * FROM `schedules` WHERE `researchId`='$x' ORDER BY `id` DESC LIMIT 1");
		while($row = mysql_fetch_assoc($sql)){
			$id = $row['id'];
		}
		return $id;
	}
	
	
	function getChair($x){
		$sql = mysql_query("SELECT * FROM `panels` WHERE `researchId`='$x' AND `designation`='4'");
		while($row = mysql_fetch_assoc($sql)){
			$d = $row['name'];
		}
		return getName($d);
	}
	
	
	function getPanels($x){
		$sql = mysql_query("SELECT * FROM `panels` WHERE `researchId`='$x'");
		while($row = mysql_fetch_assoc($sql)){
			$d[] = $row['name'];
		}
		return $d;
	}
	
	function getMems($x){
		$sql = mysql_query("SELECT * FROM `panels` WHERE `researchId`='$x' AND `designation`='3'");
		while($row = mysql_fetch_assoc($sql)){
			$d[] = $row['name'];
		}
		return getName($d);
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
	
	
	
	function getMonthText($x){
		$month = "";
		if($x == 1){
			$month = "January";
		}else if($x == 2){
			$month = "February";
		}else if($x == 3){
			$month = "March";
		}else if($x == 4){
			$month = "April";
		}else if($x == 5){
			$month = "May";
		}else if($x == 6){
			$month = "June";
		}else if($x == 7){
			$month = "July";
		}else if($x == 8){
			$month = "August";
		}else if($x == 9){
			$month = "September";
		}else if($x == 10){
			$month = "October";
		}else if($x == 11){
			$month = "November";
		}else if($x == 12){
			$month = "December";
		}else{
			$month = "Unknown";
		}
		return $month;
	}
	
	
	
	function getName($x){
		if(is_array($x)){
			foreach($x as $key => $value){
				$sql=mysql_query("select * from users where id='$value'");
					while($row = mysql_fetch_assoc($sql)){
					$d[] = $row['first_name']." ".$row['last_name'];
				}
			}
		}else{
			$sql=mysql_query("select * from users where id='$x'");
			while($row = mysql_fetch_assoc($sql)){
				$d[] = $row['first_name']." ".$row['last_name'];
			}
		}
		
		return $d;
	}
	function getDept($x){
		$sql=mysql_query("select * from departments where id='$x'");
		while($row = mysql_fetch_assoc($sql)){
			$d = $row['deptName'];
		}
		return $d;
	}
	
	function getDescipline($x){
	$sql=mysql_query("select * from descipline where id='$x'");
		while($row = mysql_fetch_assoc($sql)){
			$d = $row['descipline'];
		}
		return $d;
	}
	
	
	function getTitle($x){
		$sql = mysql_query("SELECT * FROM `researches` WHERE `id`='$x'");
		while($row = mysql_fetch_assoc($sql)){
			return $row['title'];
		}
	}
	
	function getSched($x){
		$sql=mysql_query("select * from schedules where researchId='$x'");
		while($row=mysql_fetch_assoc($sql)){
			return $row['dateSchedule'];
		}
	}
	
	
	function getPropo($x){
		//return $x;
		$sql = mysql_query("SELECT * FROM `proponents` WHERE `researchId`='$x'");
		while($row = mysql_fetch_assoc($sql)){
			$prop[] = $row['name'];
		}
		return $prop;
	}
	function getPanel($x){
		//return $x;
		$sql = mysql_query("SELECT * FROM `panels` WHERE `researchId`='$x'");
		while($row = mysql_fetch_assoc($sql)){
			$prop[] = implode(" ",(getName($row['name'])));
		}
		return $prop;
	}
	function getResearchId($x){
		$sql = mysql_query("SELECT * FROM `schedules` WHERE `id`='$x'");
		while($row = mysql_fetch_assoc($sql)){
			$title = $row['researchId'];
		}
		return $title;
	}
	
	
	
	function getAdviser($x){
		$sql = mysql_query("SELECT * FROM `researches` WHERE `id`='$x'");
		while($row = mysql_fetch_assoc($sql)){
			$d = $row['adviserId'];
		}
		return getName($d);
	}
	
	
	function getSchedDate($x){
		$sql = mysql_query("SELECT * FROM `schedules` WHERE `id`='$x'");
		while($row = mysql_fetch_assoc($sql)){
			$d = $row['dateSchedule'];
		}
		$date = date('F j, Y @ h:i A',strtotime($d));
		return $date;
	}
	
	
	function getRubric($x){
		$sql = mysql_query("SELECT * FROM `schedules` WHERE `id`='$x'");
		while($row = mysql_fetch_array($sql)){
			$d = $row['rubricId'];
		}
		return $d;
	}
?>