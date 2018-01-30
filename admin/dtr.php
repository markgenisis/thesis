<?php
	//print_r($_GET);
	$notArr = implode(",",array('1','0','2'));
?>
<div class="w3-container w3-padding">
	<div class="w3-row">
		
		<form action="getDtr.php" target="_blank" id='dtrForm' onsubmit="" method="post">
			<table>
				<tr>
					<td><label>SELECT USER:</label></td>
					<td>
						<select name="userId" id="userId" class="w3-input w3-border" required>
							<option value="" selected disabled>Please select user</option>
							<?php 
								$sql = mysql_query("SELECT * FROM `users` WHERE `user_type` NOT IN ('0', '1', '2')");
								while($row = mysql_fetch_assoc($sql)){
							?>
								<option value="<?php echo $row['id'];?>"><?php echo ucwords($row['first_name'].' '.$row['middle_name'].' '.$row['last_name'])?></option>
							<?php }?>
						</select>
					</td>
					<td><label>SELECT MONTH:</label></td>
					<td>
						<select name="month" id="month" class="w3-input w3-border" required>
							<option value="" selected disabled>Please select month</option>
							<option value="1">JANUARY</option>
							<option value="2">FEBRUARY</option>
							<option value="3">MARCH</option>
							<option value="4">APRIL</option>
							<option value="5">MAY</option>
							<option value="6">JUNE</option>
							<option value="7">JULY</option>
							<option value="8">AUGUST</option>
							<option value="9">SEPTEMBER</option>
							<option value="10">OCTOBER</option>
							<option value="11">NOVEMBER</option>
							<option value="12">DECEMBER</option>
						</select>
					</td>
					<td><button class="w3-button w3-green">PRINT</button></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="w3-container" id="dtrHolder"></div>
</div>