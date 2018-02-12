
	 
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
    <h3>Criteria (<?php if($row['defenseType']==2){echo "Final";}else{ echo "Proposal";} ?>)</h3>
     <hr />
     <div class="w3-row">
     
     <div class="w3-col w3-container" style="max-width:600px; margin-left:100px;">
     <div id="msgForm"></div>
     <form class="w3-container" action="" id="ratingsForm">
     <?php $rIDs=array(); $w=0;
	 	$rubcri=mysql_query("select * from rubric_criteria where rubric_id='$rubricsID'");
		while($rc=mysql_fetch_assoc($rubcri)){
			$getRate=mysql_query("select * from ratings where criteriaId='{$rc['id']}' and researchId='{$_GET['rating']}' and panelId='{$_SESSION['logged_in_id']}' and rubricId='$rubricsID'");
			$num=mysql_num_rows($getRate);
			if($num){$rate=mysql_result($getRate,0,"rating");$w++; }
	 ?>
     <label><?php echo $rc['criteria']; ?> (<?php echo $rc['percentage']; ?>%):</label>
     	<input type="text" class="w3-input w3-margin-bottom" name="criteria<?php echo $rc['id']; ?>" id="criteria<?php echo $rc['id']; ?>" placeholder="<?php echo $rc['description']; ?>" <?php if($num){?>value='<?php echo $rate;?>' disabled="disabled"<?php } ?> />
     <?php array_push($rIDs, $rc['id']); } 
	 $ids=implode(",",$rIDs);
	 ?>
     <input type="hidden" id="ids" name="ids" value="<?php echo $ids; ?>"  />
     <input type="hidden" id="panelId" name="panelId" value="<?php echo $_SESSION['logged_in_id']; ?>"  />
     <input type="hidden" id="rubricId" name="rubricId" value="<?php echo $rubricsID; ?>"  />
     <input type="hidden" id="researchId" name="researchId" value="<?php echo $_GET['rating']; ?>"  />
     <input type="hidden" id="rtype" name="rtype" value="<?php echo $row['defenseType']; ?>"  />
     <button class="w3-btn w3-green w3-margin-top"  type="button"onclick="getRatings();" <?php if($w!=0){ ?>disabled<?php } ?> >Save Rating</button>
     </form>
     </div>
     </div>
<?php } 
	}?>
</div>