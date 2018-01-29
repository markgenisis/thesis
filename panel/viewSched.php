<?php
	$schedId = $_GET['viewSched'];
	$researchId = getResearchId($schedId);
	print_r($_SESSION);
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
						$sql = mysql_query("SELECT * FROM `ratings` WHERE `panelId`='$panelId' AND `researchId`='$researchId' AND `categoryId`='$id'");
						while($row = mysql_fetch_assoc($sql)){
							?>
							<td>aa</td>
							<td>aa</td>
							<?php
						}
						?>
						</tr>
				<?php
					}					
				?>
			</table>
		</div>
	</div>
</div>