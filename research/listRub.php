<header class="w3-container" style="padding-top:22px">
	<h5><b><i class="fa fa-list-ol fa-fx"></i> Rubrics Lists</b><hr style="margin:0px" /></h5>
</header>
<div class="w3-container">
	<table id="researchTbl" class="w3-table w3-text-black display dataTable no-footer">
		<thead>
			<tr>
				<th>ID</th>
				<th>Template Name</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$counter = 1;
				$sql = mysql_query("select * from rubrics");
				while($row = mysql_fetch_assoc($sql)){
			?>
			<tr>
				<td><?php echo $counter?></td>
				<td><?php echo $row['template_name'];?></td>
				<td>
					<button class="w3-button w3-green w3-small"><span class="fa fa-edit fa-fx"></span> Edit</button>
				</td>
			</tr>
			<?php $counter++; }?>
		</tbody>
	</table>
</div>