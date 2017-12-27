<script>
	function addNewCriteria(){
		var id = 0;
		var html = "<div class='w3-row w3-padding-16' id='delCriteria_'+id><div class='w3-col m3 l3 w3-padding'><b class='w3-right w3-hide-small w3-large'><span class='w3-text-red'>*</span> Criteria:</b><b class='w3-left w3-hide-large w3-hide-medium w3-large'><span class='w3-text-red'>*</span> Criteria:</b></div><div class='w3-col s12 l9 m9'><input type='text' name='criteriaName[]' id='criteriaName[]' class='w3-input w3-border' required /></div></div><div class='w3-row'><div class='w3-col m3 l3 w3-padding'><b class='w3-right w3-hide-small w3-large'><span class='w3-text-red'>*</span> Description:</b><b class='w3-left w3-hide-large w3-hide-medium w3-large'><span class='w3-text-red'>*</span> Description:</b></div><div class='w3-col s12 l9 m9 w3-padding-16' ><textarea id='criteriaDesc[]' class='criteriaDesc w3-input w3-border' name='criteriaDesc[]' rows='5' cols='20'></textarea></div></div><div class='w3-row'><div class='w3-col m3 l3 w3-padding'><b class='w3-right w3-hide-small w3-large'><span class='w3-text-red'>*</span> Order:</b><b class='w3-left w3-hide-large w3-hide-medium w3-large'><span class='w3-text-red'>*</span> Order:</b></div><div class='w3-col s12 l9 m9'><input type='number' min='1' max='100' name='criteriaOrder[]' id='criteriaOrder[]' class='w3-input w3-border' required /></div></div>";
		$("#formAppendHere").append(html);
	}
</script>
<header class="w3-container" style="padding-top:22px">
	<h5><b><i class="fa fa-code-fork fa-fx"></i> New Rubric</b><hr style="margin:0px" /></h5>
</header>
<div class="w3-container" style="">
	<div class="w3-row"  style="min-width:250px; max-width:800px;margin:0px auto;" >
		<form action="javascript:void(0);" onsubmit="return new_rubric()" class="w3-container w3-margin">
			<div class="w3-row">
			  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Template Name:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Template Name:</b></div>
				<div class="w3-col s12 l9 m9">
					<input type='text' name="scheResVenue" id="scheResVenue" class="w3-input w3-border" required />	
				</div>
			</div>
			<div class="w3-row">
			  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Description:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Description:</b></div>
				<div class="w3-col s12 l9 m9">
					<textarea id="res_desc" class="criteriaDesc" name="res_desc"></textarea>
				</div>
			</div>
			<div class="w3-row">
			  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Maximum Rate:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Maximum Rating:</b></div>
				<div class="w3-col s12 l9 m9">
					<input type='number' min="1" max="100" name="scheResVenue" id="scheResVenue" class="w3-input w3-border" required />	
				</div>
			</div>
			<div class="w3-container w3-margin-16">
				<h3><span class="">Criteria</span></h3>
				<hr style="margin-top:0px;"/>
				<div class="w3-row">
				  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Criteria:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Criteria:</b></div>
					<div class="w3-col s12 l9 m9">
						<input type='text' name="criteriaName[]" id="criteriaName[]" class="w3-input w3-border" required />	
					</div>
				</div>
				<div class="w3-row">
				  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Description:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Description:</b></div>
					<div class="w3-col s12 l9 m9 w3-padding-16">
						<textarea id="criteriaDesc[]" name="criteriaDesc[]" class="w3-input w3-border" rows="5" cols="20" ></textarea>
					</div>
				</div>
				<div class="w3-row">
				  <div class="w3-col m3 l3 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Order:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Order:</b></div>
					<div class="w3-col s12 l9 m9">
						<input type='number' min="1" max="100" name="criteriaOrder[]" id="criteriaOrder[]" class="w3-input w3-border" required />	
					</div>
				</div>
				<div id="formAppendHere"></div>
				<a href="javascript:void(0);" class="w3-button w3-right w3-section w3-blue w3-ripple w3-padding" onclick="addNewCriteria()">Add Criteria</a>
			</div>
			<button class="w3-button w3-right w3-section w3-blue w3-ripple w3-padding" onclick="saveCriteria()">Submit</button>

			</form>
	</div>
</div>