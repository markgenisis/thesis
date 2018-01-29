
	<header class="w3-container" style="padding-top:22px">
	<h5><b><i class="fa fa-list-ol fa-fx"></i>  Researches</b><hr style="margin:0px" /></h5>
</header>
<div class="w3-container">
	<table id="researchTbl" class="w3-table w3-text-black display dataTable no-footer">
		<thead>
			<tr>
				<!--<th>ID</th>-->
				<th>Title</th>
				<th>Proponents</th>
				<th>Status</th>
				<th></th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				//print_r($_SESSION);
				$panelId = $_SESSION['logged_in_id'];
				$sql = mysql_query("SELECT * FROM `panels` WHERE `name`='$panelId'");
				while($row = mysql_fetch_assoc($sql)){
					$researchId = $row['researchId'];
					$title = getTitle($researchId);
					$proponents = getPropo($researchId);
					
			?>
			<tr>
				<!--<td><?php echo $row['id'];?></td>-->
				<td><?php echo $title;?></td>
				<td><?php echo implode(", ",$proponents); ?></td>
				<td>ashdaks dhalkshdla kshd alksdj</td>
				<td class="w3-center">
					<?php
						
					?>
                    <a href="?rating=<?php echo $row['researchId']; ?>" class="w3-btn w3-green" style="text-decoration:none;">Rating</a>&nbsp;<a class="w3-btn w3-orange" href="?comments=<?php echo $row['researchId']; ?>" style="text-decoration:none; color:#fff;" >Comments</a>
				</td>
				<td>
					<a href="?viewSched=<?php echo getSchedId($row['researchId'])?>" class="w3-button w3-green w3-small"><span class="fa fa-eye fa-fx"></span> View</button>
				</td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>