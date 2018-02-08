<?php
	$db = 'thesis';//database variable initialization and assignment
	$link = mysql_connect('localhost','root','');//link to connect with the server
	$db_connection = mysql_select_db($db,$link);//database selection to connect with
	if(isset($_POST['panelToExclude'])){
		$id = $_POST['panelToExclude'];
		$adviserId = $_POST['adviserId'];
		$arr = implode("', '",array($id,$adviserId));
		echo "<select id='panelMem' placeholder='Select Panel Members'>";
		echo "<option value=''>Select Panel Members</option>";
		$sql = mysql_query("select * from users where user_type=' ' and id not in ('$arr')");
		while($row=mysql_fetch_assoc($sql)){
			echo "<option value='".$row['id']."'>".ucwords($row['first_name'].' '.$row['middle_name'].' '.$row['last_name'])."</option>";
		}
		echo "</select>";
		echo "<script>";
		echo "$('#panelMem').selectize({persist: false,maxItems: 2,});";
		echo "</script>";
	}
	
	
	
	if(isset($_POST['getAdviserId'])){
		$id = $_POST['getAdviserId'];
	
	
	
	
	
	?><select id='panelChair' onchange='return getPanelList()' placeholder='Select Panel Chairman'>
					<option value=''>Select Panel Chairman</option>
						<?php
							$sql = mysql_query("select * from users where user_type=' ' and id!='$id'");
							while($row = mysql_fetch_assoc($sql)){?>
							<option value="<?php echo $row['id'];?>"><?php echo ucwords($row['first_name'].' '.$row['middle_name'].' '.$row['last_name'])?></option>
						<?php }?>
					</select>
					<script>
					 $('#panelChair').selectize({
						persist: false,
						maxItems: 1,
					}); 
					</script>
<?php }                    
?>