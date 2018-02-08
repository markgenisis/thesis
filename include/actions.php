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
			$_SESSION['descipline_id']=$row['descipline'];
			
			$id= $row['id'];
			if($row['user_type']!=""){
			echo $row['user_type'];
			}
			$sched=mysql_query("select * from schedules");
			while($rw=mysql_fetch_assoc($sched)){
				$sch=mysql_query("select * from panels where researchId='{$rw['researchId']}' and name='$id'");
				$schs=mysql_fetch_assoc($sch);
				$num=mysql_num_rows($sch);
				if($num){
					$_SESSION['ACCESS_TYPE']= $schs['designation'];
					 echo  $schs['designation'];
					$time=strtotime($rw['dateSchedule']);
							//echo date('F j, Y h:i A',$time)." - ".date('F j, Y h:i A',$now).' ';
							 $upto=$time+7200;
				//echo $time - $now;
					if($time>$now || $upto > $now){
								   $access=$time-$now;
								if($access<1800){ 
									 echo $_SESSION['LOGIN_ACCESS']="GRANTED";
									 die();									 
								} else{
										echo $_SESSION['LOGIN_ACCESS']="DENIED";
										 die();		
								}
					}else{
								echo $_SESSION['LOGIN_ACCESS']="DENIED";
								 die();		
					}
				}
			}
		}
	}else{
		echo "ERROR";
	}
}

?>