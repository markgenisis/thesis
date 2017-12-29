
	<header class="w3-container" style="padding-top:22px">
	<h5><b><i class="fa fa-list-ol fa-fx"></i> Users Lists</b><hr style="margin:0px" /></h5>
</header>
<div class="w3-container">
	<table id="researchTbl" class="w3-table w3-text-black display dataTable no-footer">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Proponents</th>
				<th>Recommendations</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$counter = 1;
				$sql = mysql_query("SELECT * FROM `researches`");
				while($row = mysql_fetch_assoc($sql)){
					$resId = $row['id'];
			?>
			<tr>
				<td><?php echo $counter;?></td>
				<td><?php echo ucwords($row['title'])?></td>
				<td>
					<?php
						$query = mysql_query("SELECT * FROM `proponents` WHERE `researchId`='$resId'");
						while($row1 = mysql_fetch_assoc($query)){
							echo $row1['name'].', ';
						}
					?>
				</td>
				<td>
					<?php
					//SELECTION OF RECOMENDATIONS
					
					?>
				</td>
				<td>
					<button class="w3-button w3-green w3-small"><span class="fa fa-edit fa-fx"></span> Edit</button>
				</td>
			</tr>
			<?php $counter++;}?>
		</tbody>
	</table>
</div>