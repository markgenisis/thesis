
	 
<div class="w3-container">
<?php
	$sql=mysql_query("select * from researches where id='{$_GET['comments']}'");
	while($row=mysql_fetch_assoc($sql)){
		$proponents = getPropo($_GET['comments']);
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
            <td>&nbsp;&nbsp;&nbsp;<?php echo getSched($_GET['comments']); ?></td>
        </tr>
     </table>
     <?php 
	}$criteria=mysql_query("select * from schedules where researchId='{$_GET['comments']}'");
	while($row=mysql_fetch_assoc($criteria)){
		$rubricsID=$row['rubricId'];
		$rubs=mysql_query("select * from rubrics where id='$rubricsID'");
		while($rub=mysql_fetch_assoc($rubs)){
?>
    <h3>Comments (<?php if($row['defenseType']==2){echo "Final";}else{ echo "Proposal";} ?>)</h3>
     <hr />
     <div class="w3-row">
     
     <div class="w3-col w3-container" style="max-width:600px; margin-left:100px;">
     <div id="msgForm"></div>
     <form class="w3-container" action="" id="ratingsForm">
    	<textarea cols="100" rows="5" id="comments"></textarea>
        <br />
        <input type="hidden" id="researchId" value="<?php echo $_GET['comments']; ?>"  />
     <button class="w3-btn w3-green w3-margin-top"  type="button"onclick="getComment();"  >Add Comment</button>
     </form>
     </div>
     </div>
     <div class="w3-row">
     	<hr />
        <?php
			$comments=mysql_query("select * from comments where researchId='{$_GET['comments']}'");
			while($row=mysql_fetch_assoc($comments)){
		?>
        <div class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">
        	<p><i>"<?php echo $row['comment']; ?>"</i></p>
            <span class="w3-right" style="font-size:12px; font-style:italic;"><?php echo date("m/d/Y h:i A",$row['date']); ?></span>
        </div>
        <?php } ?>
     </div>
<?php } 
	}?>
</div>