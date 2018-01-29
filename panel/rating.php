
	 
<div class="w3-container">
<?php
	$sql=mysql_query("select * from researches where id='{$_GET['rating']}'");
	while($row=mysql_fetch_assoc($sql)){
		$proponents = getPropo($_GET['rating']);
?>
	 <h3>Research Information</h3>
     <hr />
     <table>
     	<tr>
        	<td   width="300" style="text-align:right">Title:</td>
            <td>&nbsp;&nbsp;&nbsp;<?php echo $row['title']; ?></td>
        </tr>
        <tr>
        	<td class="w3-right">Proponent/s:</td>
            <td>&nbsp;&nbsp;&nbsp;<?php echo implode(", ",$proponents); ?></td>
        </tr>
        <tr>
        	<td class="w3-right">Defense Schedule</td>
            <td>&nbsp;&nbsp;&nbsp;<?php echo getSched($_GET['rating']); ?></td>
        </tr>
     </table>
     <?php 
	}$criteria=mysql_query("select * from schedules where researchId='{$_GET['rating']}'");
	while($row=mysql_fetch_assoc($criteria)){
		$rubricsID=$row['rubricId'];
		$rubs=mysql_query("select * from rubrics where id='$rubricsID'");
		while($rub=mysql_fetch_assoc($rubs)){
?>
    <h3>Criteria (<?php echo $rub['template_name']; ?>)</h3>
     <hr />
     <div class="w3-row">
     <div class="w3-col w3-container" style="max-width:600px; margin-left:100px;">
     <form class="w3-container">
     <?php
	 	$rubcri=mysql_query("select * from rubric_criteria where rubric_id='$rubricsID'");
		while($rc=mysql_fetch_assoc($rubcri)){
	 ?>
     <label><?php echo $rc['criteria']; ?>:</label>
     	<input type="text" class="w3-input w3-margin-bottom" placeholder="<?php echo $rc['description']; ?>" />
     <?php } ?>
     <button class="w3-btn w3-green w3-margin-top">Save Rating</button>
     </form>
     </div>
     </div>
<?php } 
	}?>
</div>