// JavaScript Document
$(document).ready(function() {
	$.ajax({
		url : "../data.php",
		type : "GET",
		success : function(data){
			console.log($.parseJSON(data));
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,listWeek'
				},
				editable: false,
				eventLimit: true, // allow "more" link when too many events
				events: $.parseJSON(data),
				eventClick: function(event) {
						if (event.url) {
							window.open(event.url,"_self");
							return false;
						}
					}
			});
		}
	});
	$('#userListTbl').DataTable({
		columnDefs: [
		   { orderable: false, targets: -1 }
		]
	});
	$('#researchTbl').DataTable({
		columnDefs: [
		   { orderable: false, targets: [-2,-1] }
		]
	});
	$('#res_desc').summernote({
		height: 200,
		 toolbar: [
		  ['style', ['bold', 'italic', 'underline', 'clear']],
		  ['font', ['strikethrough']],
		  ['fontsize', ['fontsize']],
		  ['para', ['ul', 'ol', 'paragraph']],
		  ['height', ['height']],
		  ['view', ['codeview']]
		]
	});
	$('.criteriaDesc').summernote({
		height: 150,
		 toolbar: [
		  ['style', ['bold', 'italic', 'underline', 'clear']],
		  ['font', ['strikethrough']],
		  ['fontsize', ['fontsize']],
		  ['para', ['ul', 'ol', 'paragraph']],
		  ['height', ['height']],
		  ['view', ['codeview']]
		]
	});
});
// Get the Sidebar
	var mySidebar = document.getElementById("mySidebar");

	// Get the DIV with overlay effect
	var overlayBg = document.getElementById("myOverlay");

	// Toggle between showing and hiding the sidebar, and add overlay effect
	function w3_open() {
		if (mySidebar.style.display === 'block') {
			mySidebar.style.display = 'none';
			overlayBg.style.display = "none";
		} else {
			mySidebar.style.display = 'block';
			overlayBg.style.display = "block";
		}
	}

	// Close the sidebar with the close button
	function w3_close() {
		mySidebar.style.display = "none";
		overlayBg.style.display = "none";
	}


	function open_nav_accord(y) {
		var x = document.getElementById(y);
		if (x.className.indexOf("w3-show") == -1) {
			x.className += " w3-show";
			x.previousElementSibling.className += " w3-blue";
		} else { 
			x.className = x.className.replace(" w3-show", "");
			x.previousElementSibling.className = 
			x.previousElementSibling.className.replace(" w3-blue", "");
		}
	}
	
	
	
	
	function showSyForm(){
		$("#activeSy").addClass("w3-hide");
		$("#editSyForm").removeClass("w3-hide");
	}
	
	
	function showactiveSy(){
		$("#activeSy").removeClass("w3-hide");
		$("#editSyForm").addClass("w3-hide");
	}
	function getRatings(){
		//var id=ids.split(",");
		
		var data=$("#ratingsForm").serializeArray();
		
		$.ajax({
			type: "POST",
			url: "../panel/actions.php",
			data: data,
			success: function(data){
			console.log(data);
				$("#msgForm").show().html("<div class='w3-panel w3-green w3-padding'>Ratings has been saved!</div>");
				setTimeout(function(){$("#msgForm").hide('slow');},2000);
				setTimeout(function(){location.reload();},3000);
				}
			});
	}
	function getComment(){
		var comment=$("#comments").val();
		var rId=$("#researchId").val();
		$.ajax({
			type: "POST",
			url: "../panel/actions.php",
			data: "comments="+comment+"&rID="+rId,
			success: function(data){
				console.log(data);
				if(data=='SUCCESS'){
					location.reload();
				}
			}
		});
	} 
	