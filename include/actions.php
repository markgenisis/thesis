<?php 
include "dbcon.php";

if(isset($_POST['username'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	//print_r($_POST);
	$sql = mysql_query("select * from users where username='$username' and password='$password'");
	$now=time();
	if(mysql_num_rows($sql) > 0){
		while($row = mysql_fetch_array($sql)){
			$_SESSION['ACCESS_TYPE']=$row['user_type'];
			$_SESSION['logged_in_id']=$row['id'];
			$_SESSION['department_id']=$row['deptID'];
			//echo $row['user_type'];
			$id= $row['id'];
			if($row['user_type']=='4' || $row['user_type']=='3'){
				$getRID=mysql_query("select * from panels where name='$id'");
				$nosched=mysql_num_rows($getRID);
				
				if($nosched){
				while($sc=mysql_fetch_assoc($getRID)){
					//echo $sc['researchId'];
					$researchID=$sc['researchId'];
					$getSched=mysql_query("select * from schedules where researchId='$researchID'");
					$num=mysql_num_rows($getSched);
					//echo $num;
					if($num){
						while($sched=mysql_fetch_assoc($getSched)){
							$time=strtotime($sched['dateSchedule']);
							//echo date('F j, Y h:i A',$time)." - ".date('F j, Y h:i A',$now).' ';
							 $upto=$time+7200;
							if($time>$now || $upto > $now){
								  $access=$time-$now;
								if($access<1800){ 
									 echo $_SESSION['LOGIN_ACCESS']="GRANTED"; 	 
								} else{
										echo $_SESSION['LOGIN_ACCESS']="DENIED";
								}
							}else{
								echo $_SESSION['LOGIN_ACCESS']="DENIED";
							}
						}
					}else {  echo $_SESSION['LOGIN_ACCESS']="DENIED"; 
					}
					
				}
				}else {echo $_SESSION['LOGIN_ACCESS']="DENIED";
				}
			}else{
			//	echo "NOT  3";	
			}
		}
	}else{
		echo "ERROR";
	}
}

?>