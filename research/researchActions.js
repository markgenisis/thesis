function research_users(){
	var fname = $('#f_name').val();
	var lname = $('#l_name').val();
	var mname = $('#m_name').val();
	var username = $('#user_name').val();
	//var usertype = $('#user_type').val();
	var password = $('#user_pw').val();
	var password_c = $('#user_pw_c').val();
	
	if(password != password_c){
		alert('Password not match!');
	}else{
		$.ajax({
			url:'researchProcess.php',
			type:'post',
			cache:false,
			data:'fname='+fname+'&lname='+lname+'&mname='+mname+'&username='+username+'&password='+password+'&addFromResearch=true',
			beforeSend:function(){
				console.log("Adding");
			},
			success:function(data){
				console.log(data);
				alert("Account successfully added!");
				document.getElementById("newUserForm").reset();
			}
		});
	}
}

function saveCriteria(){
	var criteria = JSON.stringify($('input[name="criteriaName[]"]').map(function () {
    			return this.value; // $(this).val()
				}).get());
	var criteriaDesc = JSON.stringify($('textarea[name="criteriaDesc[]"]').map(function () {
    			return this.value; // $(this).val()
				}).get());	
	var criteriaOrder = JSON.stringify($('input[name="criteriaOrder[]"]').map(function () {
    			return this.value; // $(this).val()
				}).get());	
	var total=0;
	var tots=$('input[name="percentage[]"]').map(function () {
    			total+=parseInt(this.value); // $(this).val() 
				}).get()
	var criteriaPercentage = JSON.stringify($('input[name="percentage[]"]').map(function () {
    			return this.value; // $(this).val() 
				}).get());	
	
	//$(criteriaPercentage).each(function(){
		//console.log($(this).val());
	//});
		
	var templateName = $('#templateName').val();
	var templateDesc = $('#res_desc').val();
	var templateMaxRate = $('#maxRate').val();
	if(total != 100){
		alert("Percentage must be 100 in total!");
		return false;
		}
	$.ajax({
		url:'researchProcess.php',
		type:'post',
		cache:false,
		data:'criteria='+criteria+'&criteriaDesc='+criteriaDesc+'&criteriaOrder='+criteriaOrder+'&templateName='+templateName+'&templateDesc='+templateDesc+'&templateMaxRate='+templateMaxRate+"&criteriaPercentage="+criteriaPercentage,
		beforeSend:function(){
			
		},
		success:function(data){
			console.log(data);
			if(data == "SUCCESS"){
				alert("Rubric Successfully Added!");
				document.getElementById("addRubForm").reset();
				$('#res_desc').summernote('code', '');
			}else{
				if(data == "DUPLICATE"){
					alert("Rubric already Exists!");
					$('#templateName').focus();
				}else{
					alert("Something went wrong!");
					window.reload();
				}
			}
		}
	});
}



function new_research (){
	var prop_content = $('#proponents').val();
	var title = $('#res_title').val();
	var res_desc = $('#res_desc').val();
	var adviser = $('#adviser').val();
	var panelChair = $('#panelChair').val();
	var panelMem = $('#panelMem').val();
	var course = $('#course').val();
		
	$.ajax({
		url:'researchProcess.php',
		type:'post',
		cache:false,
		data: "prop_content="+prop_content+'&title='+title+'&res_desc='+res_desc+'&adviser='+adviser+'&panelChair='+panelChair+'&panelMem='+panelMem+'&course='+course+'&addNewResearch=true',
		beforeSend:function(){
			console.log("adding new research");
		},
		success:function(data){
			console.log(data);
			if(data == "SUCCESS"){
				alert("Research Successfully Added!");
				//document.getElementById("addNewResearchForm").reset();
				//$('#res_desc').summernote('code', '');
				window.location.reload();
			}else if(data == "D"){
				alert("Research already exists in database!");
			}else{
				alert("");
			}
		}
	});
}




function checkLoad(){
	var adviserId = $("#adviser").val();
	$.ajax({
		url:"researchProcess.php",
		type:"POST",
		data:'adviserId='+adviserId,
		beforeSend:function(){
			
		},
		success:function(data){
			console.log(data);
			if(data >= 10){	
				alert("Adviser reached its maximum load!");
				$('#newResSubmit').attr("disabled",true);
			}else{
				
			}
		}
	});
}




function checkAvailability(){
	var titleId=$('#schedResTitle').val();
	var defType=$('#schedResType').val();
	var dateSched=$('#scheduleDate').val();
	if(titleId == '' || titleId == ' '){
		alert("Please Select Research Title First");
		$('#schedResTitle').focus();
	}else{
		$.ajax({
			url:'researchProcess.php',
			type:"POST",
			data:'schedTitleId='+titleId+'&defType='+defType+'&dateTobeSched='+dateSched,
			beforeSend:function(){
				
			},
			success:function(data){
				console.log(data);
				if(data == 1 || data == '1'){
					alert("Adviser have schedule on "+dateSched);
					$("#newSchedBtn").attr('disabled','true');
				}else if(data == 2 || data == '2'){
					alert("Both Adviser and Panels have schedule on "+dateSched);
					$('#newSchedBtn').attr("disabled",true);
				}else if(data == 3 || data == '3'){
					alert("Panels have schedule on "+dateSched);
					$('#newSchedBtn').attr("disabled",true);
				}else{
					$('#newSchedBtn').attr("disabled",false);
				}
			}
		});
	}
	
}




function new_sched(){
	var schedInfo = $('#schedInfo').serializeArray();
	
	$.ajax({
		url:'researchProcess.php',
		type:'post',
		cache:false,
		data:schedInfo,
		success:function(data){
			console.log(data);
			if(data = "SUCCESS"){
				alert("Schedule Successfully Added!");
				window.location.reload();
				//$("#schedInfo")[0].reset();
			}else if(data == 0 || data == '0'){
				alert("Same schedule exists in database");
				//$("#schedInfo")[0].reset();
				window.location.reload();
			}else{
				alert("Please try again later");
				//$("#schedInfo")[0].reset();
				window.location.reload();
			}
		}
	});
}

/*
function excludeSelected(){
	var selected = $("#panelChair").val();
	$.ajax({
			url:'researchProcess.php',
			type:'post',
			cache:false,
			data:'excludeId='+selected,
			beforeSend:function(){
				console.log("Excluding");
			},
			success:function(data){
				console.log(data);
			}
		});
}*/
function getTitlePanels(){
	var resID=$("#researchID").val();
	$.ajax({
		type: "POST",
		url: "researchProcess.php",
		data: "resID="+resID,
		success: function(data){
			$("#userId").html(data);
		}
	});
}


function searchNow(){
	var searchMe = $("#searchMe").val();
	if(searchMe == '' || searchMe == " "){
			$('#searchResults').addClass("w3-hide ");
	}else{
		$.ajax({
			url:'researchProcess.php',
			type:'post',
			data:'toSearch='+searchMe,
			success:function(data){
				console.log(data);
				$('#searchResults').removeClass("w3-hide ");
				$('#searchResults').html(data);
			}
		})
	}
	
}