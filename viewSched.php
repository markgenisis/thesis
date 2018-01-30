<?php
	$schedId = $_GET['viewSched'];
	$researchId = getResearchId($schedId);
	$panelId = $_SESSION['logged_in_id'];
	$rubricId = getRubric($schedId);
?>
<div class="w3-container">
	<h3><i class="fa fa-info-circle fa-fx"></i> Research Information<hr style="margin-top:3px;"/></h3>
	<div class="w3-container">
		<div class="w3-container " style="width:70%;margin:0px auto;">
			<table class="w3-table" width="50%" border="0">
				<tr>
					<td><span class="w3-right">TITLE:</span></td>
					<td><?php echo getTitle($researchId);?></td>
				</tr>
				<tr>
					<td><span class="w3-right">PROPONENTS:</span></td>
					<td><?php echo implode(', ',getPropo($researchId));?></td>
				</tr>
				<tr>
					<td><span class="w3-right">PANEL CHAIRMAN:</span></td>
					<td><?php echo implode(', ',getChair($researchId)); ?></td>
				</tr>
				<tr>
					<td><span class="w3-right">PANEL :</span></td>
					<td><?php echo implode(', ',getMems($researchId)); ?></td>
				</tr>
				<tr>
					<td><span class="w3-right">ADVISER :</span></td>
					<td><?php echo implode(', ',getAdviser($researchId)); ?></td>
				</tr>
				<tr>
					<td><span class="w3-right">SCHEDULE :</span></td>
					<td><?php echo getSchedDate($schedId); ?></td>
				</tr>
			</table>
		</div>
	</div>
	<h3><i class="fa fa-info-circle fa-fx"></i> Rating<hr style="margin-top:3px;"/></h3>
	<div class="w3-container">
		<div class="w3-container " style="width:70%;margin:0px auto;">
			<table class="w3-table w3-table-all" width="50%" border="1">
				<tr>
					<td><span class="">CRITERIA:</span></td>
					<td><span class="">PROPOSAL:</span></td>
					<td><span class="">FINAL:</span></td>
				</tr>
				<?php
					$query = mysql_query("SELECT * FROM `rubric_criteria` WHERE `rubric_id`='$rubricId'");
					while($r = mysql_fetch_assoc($query)){
						$id = $r['id'];
						?>
						<tr><td><?php echo $r['criteria']?></td>
						<?php
						$sql = mysql_query("SELECT * FROM `ratings` WHERE  `researchId`='$researchId' AND `criteriaId`='$id' AND `type`='1'");
						$num = mysql_num_rows($sql);
						if($num>0){
							while($row = mysql_fetch_assoc($sql)){
						
						
							?>
							<td><?php echo $row['rating']; ?></td>
							<?php
						}
						}else{
							echo "<td></td>";						}
						?>
						<?php
						$sqlq = mysql_query("SELECT * FROM `ratings` WHERE `researchId`='$researchId' AND `criteriaId`='$id' AND `type`='2'");
						$num2 = mysql_num_rows($sqlq);
						if($num2 > 0){
							while($row1 = mysql_fetch_assoc($sqlq)){
						
						
							?>
							<td><?php echo $row1['rating']; ?></td>
							<?php
						}}else{
							echo "<td></td>";
						}
						?>
						</tr>
				<?php
					}					
				?>
			</table>
		</div>
	</div>
	<h3><i class="fa fa-info-circle fa-fx"></i> Comments<hr style="margin-top:3px;"/></h3>
	<div class="w3-container">
		<div class="w3-container " style="margin:0px auto;">
			<div class="w3-row">
				<?php
					$comments=mysql_query("select * from comments where researchId='$researchId'");
					while($row=mysql_fetch_assoc($comments)){
				?>
				<div class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">
					<p><i>"<?php echo $row['comment']; ?>"</i></p>
					<span class="w3-right" style="font-size:12px; font-style:italic;"><?php echo date("m/d/Y h:i A",$row['date']); ?></span>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>