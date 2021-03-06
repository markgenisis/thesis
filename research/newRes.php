<script>
	function getPanelList(){
		var panelChairId = $('#panelChair').val();
		var adviser = $('#adviser').val();
		$.ajax({
			url:'getPanelList.php',
			type:'post',
			data:'panelToExclude='+panelChairId+'&adviserId='+adviser,
			success:function(data){
				console.log(data);
				$('#listOfPanels').html(data);
				$("#panelTemp").hide();
			}
		});
	}
	function getPanelChair(){
		var adviser = $('#adviser').val();
		$.ajax({
			url:'getPanelList.php',
			type:'post',
			data:'getAdviserId='+adviser,
			success:function(data){
				console.log(data);
				$('#listOfChair').html(data);
				$("#chairTemp").hide();
			}
		});
	}
</script>
<header class="w3-container" style="padding-top:22px">
	<h5><b><i class="fa fa-book fa-fx"></i> New Reseach</b><hr style="margin:0px" /></h5>
</header>
<div class="w3-container" style="">
	<div class="w3-row"  style="min-width:250px; max-width:800px;margin:0px auto;" >
		<form action="javascript:void(0);" onsubmit="return new_research()" id="addNewResearchForm" class="w3-container w3-margin">
			<div class="w3-row">
			  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Title:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Title:</b></div>
				<div class="w3-col s12 l9 m9">
				  <input class="w3-input w3-border" name="res_title" id="res_title" type="text" placeholder="Research Title" required />
				</div>
			</div>
			<div class="w3-row">
			  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large">Description:</b><b class="w3-left w3-hide-medium w3-hide-large w3-large">Description:</b></div>
				<div class="w3-col s12 l9 m9">
					<textarea id="res_desc" name="res_desc"></textarea>
				</div>
			</div>
			<div class="w3-row">
			  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Proponents:</b><b class="w3-left w3-hide-medium w3-hide-large w3-large"><span class="w3-text-red">*</span> Proponents:</b></div>
				<div class="w3-col s12 l9 m9">
				  <input class="" name="proponents" id="proponents" type="text" placeholder="Name/s of proponents" required />
				</div>
				<script>
				$('#proponents').selectize({
					persist: false,
					createOnBlur: true,
					create: true
				});
				</script>
			</div>
			<div class="w3-row">
			  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Adviser:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Adviser:</b></div>
				<div class="w3-col s12 l9 m9">
				  <select id="adviser" placeholder="Select Adviser" class="w3-input w3-border" onchange=" return getPanelChair()" required />
						<option value="">Select Adviser</option>
						<?php
							$sql = mysql_query("select * from users where user_type=' '");
							while($row = mysql_fetch_assoc($sql)){
								$check=mysql_num_rows(mysql_query("select * from researches where adviserId='{$row['id']}'"));
								if($check<=10){
						?>
							<option value="<?php echo $row['id'];?>"><?php echo ucwords($row['first_name'].' '.$row['middle_name'].' '.$row['last_name'])?></option>
						<?php } }?>
					</select>
				  
				<script>
				/* $('#adviser').selectize({
					persist: false,
					maxItems: 1,
				}); */
				</script>
				</div>
			</div>
			<div class="w3-row">
			  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Panel Chair:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Panel Chair:</b></div>
				<div class="w3-col s12 l9 m9">
					<div id="listOfChair"><select class="w3-input w3-border" id="chairTemp"></select></div>
				</div>
			</div>
			<div class="w3-row">
			  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Panel Members:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Panel Members:</b></div>
				<div class="w3-col s12 l9 m9">
				  <div id="listOfPanels"><select class="w3-input w3-border" id="panelTemp"></select></div>
				</div>
			</div>
			<div class="w3-row">
			  <div class="w3-col m3 l3 w3-padding"><b class=" w3-hide-small w3-right w3-large"><span class="w3-text-red">*</span> Course:</b><b class="w3-left w3-large w3-hide-large w3-hide-medium"><span class="w3-text-red">*</span> Course:</b></div>
				<div class="w3-col s12 l9 m9">
				  <select id="course" placeholder="Select Course">
						<option value="">Select Course</option>
						<?php
							$sql = mysql_query("select * from courses where descipline='{$_SESSION['descipline_id']}'");
							while($row = mysql_fetch_assoc($sql)){
						?>
							<option value="<?php echo $row['id']?>"><?php echo $row['courseCode'].' - '.$row['course']?></option>
						<?php }?>
					</select>
					<script>
					$('#course').selectize({
						persist: false,
						maxItems: 1,
					});
					</script>
				</div>
			</div>
			<button class="w3-button w3-right w3-section w3-blue w3-ripple w3-padding" id="newResSubmit">Submit</button>

			</form>
	</div>
</div>