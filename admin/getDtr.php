<?php
	require('../include/dbcon.php');
?>


<body onload="window.print();">
<style>
table{
	border-collapse: collapse;
}
</style>

<?php
	
	//print_r($_POST);
	//print_r($_SESSION);
	$yearNow = explode("-",$_SESSION['activeYear']);
	$activeYear = $_SESSION['activeYear'];
	
	function getSchedMonth($id,$month,$y){
		$sql = mysql_query("SELECT * FROM `panels` WHERE `name`='$id'");
		while($row = mysql_fetch_assoc($sql)){
			$resId = $row['researchId'];
			$query = mysql_query("SELECT * FROM `schedules` WHERE `researchId`='$resId'");
			while($r = mysql_fetch_assoc($query)){
				$defType=$r['defenseType'];
				$schedDate = strtotime($r['dateSchedule']);
				$day = date('d',$schedDate);
				$startTime = date('h:i A',$schedDate);
				$endTime = date('h:i A',($schedDate+7200));
				$schedMonth = date('n',$schedDate);
				$schedYear = date('Y',$schedDate);
				
				if($schedMonth == $month && $schedYear == $y){
					$q = mysql_num_rows(mysql_query("SELECT * FROM `ratings` WHERE `researchId`='$resId' AND `type`='$defType' AND `panelId`='$id'"));
					if($q>0){
						$data[] = array("day"=>$day,"timeStart"=>$startTime,"endTime"=>$endTime);
					}
				}else{
					
				}
			}
		}
		return $data;
	}
	
	
	if(isset($_POST['userId']) && isset($_POST['month'])){
		$userId = $_POST['userId'];
		$month = $_POST['month'];
		$getMonthText = getMonthText($month);
		$schedForTheMonth = getSchedMonth($userId,$month,$yearNow[1]);
		$panelName = implode(',',getName($userId));
		echo "<table width='300px' border='1'>";
		echo "<tr><td colspan='3' align='center'>".ucwords($panelName)."</td></tr>";
		echo "<tr><td colspan='3' align='center'>".ucwords($getMonthText)." / ".$yearNow[1]."</td></tr>";
		echo "<tr><td align='left'>DAY</td><td align='center'>Time In</td><td  align='center'>Time Out</td></tr>";
		foreach($schedForTheMonth as $key => $value){
			//print_r($value);
			echo "<tr><td >".$value['day']."</td><td  align='center'>".$value['timeStart']."</td><td align='center'>".$value['endTime']."</td></tr>";
		}
		echo "</table>";
		
	}
?>
</body>