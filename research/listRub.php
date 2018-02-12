<header class="w3-container" style="padding-top:22px">
	<h5><b><i class="fa fa-list-ol fa-fx"></i> Rubrics Lists</b><hr style="margin:0px" /></h5>
</header>
<div class="w3-container">
	<div class="w3-row">
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
				 
				$idSes = $_SESSION['logged_in_id'];
				$sql = mysql_query("select * from rubrics where res_prof_id='$idSes'"); 
				while($row = mysql_fetch_assoc($sql)){
			?>
			<tr>
				<td><?php echo $counter?></td>
				<td><?php echo $row['template_name'];?></td>
				<td>
					<button class="w3-button w3-green w3-small" onclick="getRubrics(<?php echo $row['id']; ?>)"><span class="fa fa-eye fa-fx"></span> View</button>
                    <button class="w3-button w3-red w3-small" onclick="delRubrics(<?php echo $row['id']; ?>)"><span class="fa fa-trash fa-fx"></span> Delete</button>
				</td>
			</tr>
			<?php $counter++; }?>
		</tbody>
	</table>
    </div>
    <div class="w3-row">
    <div id="rubs"></div>
    </div>
</div>