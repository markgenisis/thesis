<?php
	require('../include/dbcon.php');
	
	function getTableLastId($x){
		$sql = mysql_query("SELECT * FROM `".$x."` ORDER BY `id` DESC LIMIT 1");
		while($row = mysql_fetch_assoc($sql)){
			return $row['id'];
		}
	}
	
	
	
	//print_r($_POST);
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
		
	}
	
	
	
	
	
	if(isset($_POST['addNewResearch'])){
		$proponentsArr = $_POST['prop_content'];
		$panelMemArr = $_POST['panelMem'];
		$props =explode(',',$proponentsArr);
		$panelsMems =explode(',',$panelMemArr);
		$title = $_POST['title'];
		$res_desc = $_POST['res_desc'];
		$adviser = $_POST['adviser'];
		$panelChair = $_POST['panelChair'];
		$course = $_POST['course'];
		$sy = $_SESSION['activeYear'];
		$check = mysql_num_rows(mysql_query("SELECT * FROM `researches` WHERE `title`='$title' AND `course_id`='$course'"));
		if($check > 0){
			echo "D";
		}else{
			$insertRes = mysql_query("INSERT INTO `researches` (`title`,`description`,`course_id`,`adviserId`,`schoolYear`) VALUES ('$title','$res_desc','$course','$adviser','$sy')");
			if($insertRes){			
				$lastId = getTableLastId('researches');
				foreach($props as $key=>$value){
					$insertProp = mysql_query("INSERT INTO `proponents` (`researchId`,`name`) VALUES ('$lastId','$value')");
				}
				$insertPanelChair = mysql_query("INSERT INTO `panels` (`name`,`designation`,`researchId`) VALUES ('$panelChair','4','$lastId')");
				if($insertPanelChair){
					foreach($panelsMems as $key => $value){
						$insertPanelMems = mysql_query("INSERT INTO `panels` (`name`,`designation`,`researchId`) VALUES ('$value','3','$lastId')");
					}
					if($insertPanelMems){
						echo "SUCCESS";
					}
				}else{
					echo mysql_error();
				}
			}else{
				echo mysql_error();
			}
		}
	}
	
	if(isset($_POST['adviserId'])){
		$id = $_POST['adviserId'];
		$activeSy = $_SESSION['activeYear'];
		$query = mysql_num_rows(mysql_query("SELECT * FROM `researches` WHERE `adviserId`='$id' AND `schoolYear`='$activeSy'"));
		echo $query;
	}
	
	
	
	
	
	
	if(isset($_POST['schedTitleId'])){
		$researchId = $_POST['schedTitleId'];
		$researchType = $_POST['defType'];
		$dateSched = $_POST['dateTobeSched'];
		$sql = mysql_query("SELECT * FROM `researches` WHERE `id`='$researchId'");
		while($row = mysql_fetch_assoc($sql)){
			$adviserId = $row['adviserId'];
		}
		$adviserResearchesArr = getAdviserAdvicee($adviserId);
		$adviserScheds = getSchedHandled($adviserResearchesArr,$researchType);
		$panelsArr = getPanels($researchId);
		$eachPanelResearches = getPanelSched($panelsArr);
		$panelsScheds = getSchedHandledPanelMem($eachPanelResearches,$researchType);
		//print_r($panelsScheds);
		$formatedDate =strtotime($dateSched);
		$formatedDatePlus = strtotime($dateSched)+(3600*2);
		//echo $formatedDate.' - '.date("F d, Y h:i A",$formatedDatePlus);
		$adviserConflict = "";
		$panelConflict = "";
		foreach($panelsScheds as $key => $value){
			if(in_array($formatedDate,$value)){
				$conflict[$key] = 1;
			}
		}
		/*if(in_array($formatedDate,$adviserScheds)){
			echo "Adviser not Available";
		}*/
		//maximum range of sched is 2 hours from the schedule datetime
		if(is_array($adviserScheds)){
			foreach($adviserScheds as $key => $value){
				$endTime = (strtotime($value) + (3600*2));
				//echo $formatedDate.' == '.strtotime($value).', ';
				if($formatedDate >= strtotime($value) && $formatedDate <= $endTime){
					$adviserConflict[$adviserId]=1;
				}
			}
		}else{
			
		}
		//adviserConflict holds value if there is a schedule Conflict
		
		
		if(is_array($panelsScheds)){
			foreach($panelsScheds as $key => $value){
				foreach($value as $i => $j){
					$endTime = (strtotime($j) + (3600*2));
					if($formatedDate >= strtotime($j) && $formatedDate <= $endTime){
						$panelConflict[$key] = 1;
					}
				}
			}
		}else{
			
		}
	
		if(is_array($adviserConflict) && !is_array($panelConflict)){
			//only adviser is not available
			echo 1;
		}else if(is_array($adviserConflict) && is_array($panelConflict)){
			//both adviser and panels have conflicts
			echo 2;
		}else if(!is_array($adviserConflict) && is_array($panelConflict)){
			//only the panels have conflicts
			echo 3;
		}else{
			echo 0;
		}
		//echo $formatedDate;
		//echo strtotime($dateSched);
		//print_r($adviserScheds);
		//echo date("F d, Y",strtotime($dateSched));
		//compare the dates from form to the dates from the db
		//make flags to tell if available sched or not
		//$getAdviserResearches = mysql_query("SELECT * FROM `panels` WHERE ``")
	}
?>