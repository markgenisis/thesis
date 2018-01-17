function research_users(){
	var fname = $('#f_name').val();
	var lname = $('#l_name').val();
	var mname = $('#m_name').val();
	var username = $('#user_name').val();
	var usertype = $('#user_type').val();
	var password = $('#user_pw').val();
	var password_c = $('#user_pw_c').val();
	
	if(password != password_c){
		alert('Password not match!');
	}else{
		$.ajax({
			url:'researchProcess.php',
			type:'post',
			cache:false,
			data:'fname='+fname+'&lname='+lname+'&mname='+mname+'&username='+username+'&usertype='+usertype+'&password='+password+'&addFromResearch=true',
			beforeSend:function(){
				console.log("Adding");
			},
			success:function(data){
				console.log(data);
				
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
	var templateName = $('#templateName').val();
	var templateDesc = $('#res_desc').val();
	var templateMaxRate = $('#maxRate').val();
	$.ajax({
		url:'researchProcess.php',
		type:'post',
		cache:false,
		data:'criteria='+criteria+'&criteriaDesc='+criteriaDesc+'&criteriaOrder='+criteriaOrder+'&templateName='+templateName+'&templateDesc='+templateDesc+'&templateMaxRate='+templateMaxRate,
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
	$.ajax({
		url:'researchProcess.php',
		type:"POST",
		data:'schedTitleId='+titleId,
		beforeSend:function(){
			
		},
		success:function(data){
			console.log(data);
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
