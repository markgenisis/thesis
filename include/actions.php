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
			if($row['user_type']==""){
				$_SESSION['ACCESS_TYPE']=3;
				echo "3GRANTED";
			}else{
			echo $_SESSION['ACCESS_TYPE'];
			}
		}
	}else{
		echo "ERROR";
	}
}

?>