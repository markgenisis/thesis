function addNewUserFromAdmin(){
	var fname = $('#f_name').val();
	var lname = $('#l_name').val();
	var mname = $('#m_name').val();
	var username = $('#user_name').val();
	var usertype = $('#user_type').val();
	var desciplineID=$("#desciplineID").val();
	var password = $('#user_pw').val();
	var password_c = $('#user_pw_c').val();
	
	if(password != password_c){
		alert('Password not match!');
	}else{
		$.ajax({
			url:'adminProcess.php',
			type:'post',
			cache:false,
			data:'fname='+fname+'&lname='+lname+'&mname='+mname+'&username='+username+'&usertype='+usertype+'&password='+password+'&addFromAdmin=true&desciplineID='+desciplineID,
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
	var descipline=$("#Descipline").val();
	
	$.ajax({
		url:"adminProcess.php",
		type:'post',
		cache:false,
		data:'courseName='+courseName+'&courseCode='+courseCode+"&Descipline="+descipline,
		beforeSend:function(){
			console.log("Adding Course");
		},
		success:function(data){
			console.log(data);
			if(data == "SUCCESS"){
				alert("Course successfully added!");
				location.reload();
			}else{
				alert("Course not added!");
			}
		}
	});
}

function addNewDescipline(){
	//var courseName = $("#courseName").val();
	var descipline = $("#descipline").val();
	
	$.ajax({
		url:"adminProcess.php",
		type:'post',
		cache:false,
		data:'descipline='+descipline,
		beforeSend:function(){
			console.log("Adding descipline");
		},
		success:function(data){
			console.log(data);
			if(data == "SUCCESS"){
				alert("Descipline successfully added!");
				location="?listDescipline=true";
			}else{
				alert("Course not added!");
				location="?listDescipline=true";
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


function getCourses(){
	var desc=$("#desciplineID").val();
	$.ajax({
		type: "POST",
		url: "adminProcess.php",
		data: "getCourse="+desc,
		success: function(data){
			$("#courseID").html(data);
		}
	});
}

function getDtr(){
	var data = $('#dtrForm').serializeArray();
	$.ajax({
		url:'getDtr.php',
		type:'POST',
		cache:false,
		data:data,
		success:function(data){
			console.log(data);
			$("#dtrHolder").html(data);
		}
	});
} 
function delDescipline(x){
	if(confirm("Do you want to delete this descipline?")){
		$.ajax({
			type: "POST",
			url: "adminProcess.php",
			data: "delDescipline="+x,
			success: function(data){
				location.reload();
			}
		});
	} 
}


function searchNow(){
	var searchMe = $("#searchMe").val();
	if(searchMe == '' || searchMe == " "){
			$('#searchResults').addClass("w3-hide ");
	}else{
		$.ajax({
			url:'adminProcess.php',
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