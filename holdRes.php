<div class="w3-container">
<h3>Researches</h3>
<hr/>
<table class="w3-table w3-table-all" id="researchTbl">
<thead>
	<tr>
		<th>Title</th>
		<th>Schedule</th>
	</tr>
</thead>
<tbody>
<?php
	function getResName($x){
		$sql = mysql_query("SELECT * FROM `researches` WHERE `id`='$x'");
		while($row = mysql_fetch_assoc($sql)){
			return $row['title'];
		}
	}
	function getResSched($x){
		$sql = mysql_query("SELECT * FROM `schedules` WHERE `researchId`='$x'");
		while($row = mysql_fetch_assoc($sql)){
			return $row['dateSchedule'];
		}
	}
	$holdRes = $_GET['holdRes'];
	$r = mysql_query("SELECT * FROM `panels` WHERE `name`='$holdRes'");
	while($row = mysql_fetch_assoc($r)){
		
?>
	<tr>
		<td><?php echo getResName($row['researchId'])?></td>
		<td><?php echo getResSched($row['researchId'])?></td>
	</tr>
<?php }?>
<tbody>
<table>
</div>