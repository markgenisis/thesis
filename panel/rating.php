
	 
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
	}
?>
</div>