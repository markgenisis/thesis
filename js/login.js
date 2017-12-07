
function logmein(){
	var username=$("#username").val();
	var password=$("#password").val();
	
	if(username ==""){
		$("#loading_on_login").show().html("<div class='w3-panel w3-red w3-padding'>Enter a Username.</div>");
		$("#loginFormCon").effect("shake");
		setTimeout(function(){$("#loading_on_login").hide("slow");},2000);
		document.getElementById("username").focus();
		return false;
	}else if(password==""){
		$("#loading_on_login").show().html("<div class='w3-panel w3-red w3-padding'>Enter a Password.</div>");
		$("#loginFormCon").effect("shake");
		setTimeout(function(){$("#loading_on_login").hide("slow");},2000);
		document.getElementById("password").focus();
		return false;
	}else{
		var data="username="+username+"&password="+password;
		$.ajax({
			type: "POST",
			url: "include/actions.php",
			data: data,
			success: function(data){
				console.log(data);
				if(data == "1"){
					location="admin/";
				}else if(data == "2"){
					location="research/";
				}else if(data == "3"){
					location="panel/";
				}else if(data == "4"){
					location="adviser/";
				}else if(data=="ERROR"){
					$("#status_on_login").html("<div class='w3-panel w3-red w3-padding'>ACCESS DENIED!</div>").fadeIn("slow").delay(2000).hide("slow");
					//setTimeout(function(){$("#loading_on_login").hide("slow");},2000);
					document.getElementById("password").focus();
				}
			}
		});
	}
}
