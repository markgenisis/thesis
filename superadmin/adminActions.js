function addNewUserFromAdmin(){
	var fname = $('#f_name').val();
	var lname = $('#l_name').val();
	var mname = $('#m_name').val();
	var username = $('#user_name').val();
	var usertype = $('#user_type').val();
	var deptID=$("#dept_id").val();
	var password = $('#user_pw').val();
	var password_c = $('#user_pw_c').val();
	
	if(password != password_c){
		alert('Password not match!');
	}else{
		$.ajax({
			url:'adminProcess.php',
			type:'post',
			cache:false,
			data:'fname='+fname+'&lname='+lname+'&mname='+mname+'&username='+username+'&usertype='+usertype+'&password='+password+'&addFromAdmin=true&deptID='+deptID,
			beforeSend:function(){
				console.log("Adding");
			},
			success:function(data){
				console.log(data);
				if(data == "SUCCESS"){
					document.getElementById("newUserForm").reset();
					alert("User successfully added!");
				}else{
					alert("User not added!");
				}
			}
		});
	}
}




function addNewCourseAdmin(){
	var courseName = $("#courseName").val();
	var courseCode = $("#courseCode").val();
	
	$.ajax({
		url:"adminProcess.php",
		type:'post',
		cache:false,
		data:'courseName='+courseName+'&courseCode='+courseCode,
		beforeSend:function(){
			console.log("Adding Course");
		},
		success:function(data){
			console.log(data);
			if(data == "SUCCESS"){
				alert("Course successfully added!");
			}else{
				alert("Course not added!");
			}
		}
	});
}
function addNewDepartment(){
	var deptName=$("#deptName").val();
	$.ajax({
		url:"adminProcess.php",
		type:'post',
		cache:false,
		data:'deptName='+deptName,
		beforeSend:function(){
			console.log("Adding Department");
		},
		success:function(data){
			console.log(data);
			if(data == "SUCCESS"){
				alert("Department successfully added!");
				document.getElementById("deptForm").reset();
			}else{
				alert("Department not added!");
			}
		}
	});
}



function changeSy(){
	var sy = $('#newSY').val();
	$.ajax({
		url:"adminProcess.php",
		type:"POST",
		cache:false,
		data:"changeSy="+sy,
		success:function(data){
			console.log(data);
			if(data == "SUCCESS"){
				alert("Active School Year successfully changed!");
				window.location.reload();
			}else{
				alert("Sorry Try again later");
			}
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