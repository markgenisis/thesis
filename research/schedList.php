<header class="w3-container" style="padding-top:22px">
	<h5><b><i class="fa fa-list-ol fa-fx"></i> Schedule Lists</b><hr style="margin:0px" /></h5>
</header>
<div class="w3-container">

	<table id="userListTbl" class="w3-table w3-border w3-text-black display dataTable no-footer">
		<thead>
			<tr>
				<th>Research Title</th>
				<th>Venue</th>
				 <th>Defense Type</th>
                <th>Schedule Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = mysql_query("select * from schedules");
				while($r = mysql_fetch_assoc($query)){
			?>
				<tr>
					<td><?php echo getTitle($r['researchId'])?></td>
					<td><?php echo $r['venue'];?></td>
					  <td>
						<?php
							if($r['rubricId']==2) echo "Final Defense"; else echo "Proposal Defense";
						?>
					</td>  
                    <td><?php echo $r['dateSchedule']; ?></td>
					<td>
						<!--<button class="w3-button w3-green w3-small"><span class="fa fa-edit fa-fx"></span> Edit</button>-->
                        <a href="javascript:void(0);" class="w3-btn w3-green" style="text-decoration:none;" onclick="myFunction(<?php echo $r['id']; ?>)"><i class="fa fa-print"></i> Print </a>
                        <div id="drp_<?php echo $r['id']; ?>"  class="w3-dropdown-content w3-bar-block w3-border" style="z-index:1;">
                            <a href="panel_appointments.php?id=<?php echo $r['researchId']; ?>" target="_new" class="w3-bar-item w3-button">Panel Appointment</a>
                            <a href="adviser_appointment.php?id=<?php echo $r['researchId']; ?>" target="_new" class="w3-bar-item w3-button">Adviser Appointment</a>
                            <a href="thesis_appointments.php?id=<?php echo $r['researchId']; ?>" target="_new"  class="w3-bar-item w3-button">Thesis Appointment</a>
                          </div>
					</td>
				</tr>
                
			<?php }?>
		</tbody>
	</table>
</div>
<script>
					function myFunction(i) {
						var x = document.getElementById("drp_"+i);
						if (x.className.indexOf("w3-show") == -1) {  
							x.className += " w3-show";
						} else { 
							x.className = x.className.replace(" w3-show", "");
						}
					}
					</script>