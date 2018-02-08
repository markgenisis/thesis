<?php
	//print_r($_GET);
	$notArr = implode(",",array('1','0','2'));
?>
<div class="w3-container w3-padding">
	<div class="w3-row">
		
		<form action="dtr.php" target="_blank" id='dtrForm' onsubmit="" method="post">
			<table class="w3-table">
				<tr>
					<td><label>SELECT TITLE:</label></td>
					<td>
						<select name="researchID" id="researchID" class="w3-input w3-border" onChange="getTitlePanels()" required>
							<option value="" selected disabled>Please select title</option>
							<?php 
								$sql = mysql_query("SELECT * FROM `researches` ");
								while($row = mysql_fetch_assoc($sql)){
							?>
								<option value="<?php echo $row['id'];?>"><?php echo ucwords($row['title']);?></option>
							<?php }?>
						</select>
					</td>
                    <td>&nbsp;</td>
					<td><label>SELECT USER:</label></td>
					<td>
						<select name="userId" id="userId" class="w3-input w3-border" required>
							<option value="" selected disabled>Please select user</option>
							 
						</select>
					</td>
					<td><button class="w3-button w3-green">PRINT</button></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="w3-container" id="dtrHolder"></div>
</div>