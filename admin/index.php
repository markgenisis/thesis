<?php
	include("../include/dbcon.php");
	if($_SESSION['ACCESS_TYPE'] != 1){
		header("location:../redirecter.php");
	}else{
		
	}
?>

<!DOCTYPE html>
<html>
<title>Administration</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="../images/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../google/fafa.css">
<link href="../dist/css/select2.min.css" rel="stylesheet" />
<link href='../css/fullcalendar.min.css' rel='stylesheet' />
<link href='../css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href='../css/dataTables.jqueryui.min.css' rel='stylesheet'/>
<link href='../css/jquery-ui.css' rel='stylesheet'  />
<link rel="stylesheet" href="../css/w3.css">
<script src='../js/moment.min.js'></script>
<script src='../js/jquery.min.js'></script>
<script src='../js/fullcalendar.min.js'></script>
<script src='../js/datatables.min.js'></script>
<script src='../js/dataTables.jqueryui.min.js'></script>
<link href="../research/summernote.css" rel="stylesheet">
<script src="../research/summernote.min.js"></script>
<script src='adminActions.js'></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-bar-item{
	padding:12px !important;
}
#calendar {
	max-width:95%;
	margin: 0 auto;
}
.fc-widget-header{
	font-size:1.1em !important;
}
.fc-day-number{
	font-size:1.1em !important;
}
</style>
<script>

</script>
<body class="w3-light-grey">
<!-- Top container -->
<div class=" w3-row w3-bar w3-top w3-white w3-large" style="z-index:9999;box-shadow:2px 2px 6px #eee;">
	<div class="w3-hide-small w3-bar-item w3-blue" style="width:230px;text-align:center;text-shadow:2px 2px 1px #000;font-weight:bold;">
		<a href="../admin/" style="text-decoration:none;"> <img src="../images/logo.png" class="w3-white w3-circle w3-card-4" width="25" height="25" />   Research Repository</a>
	</div>
	<button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i></button>
	<div class="w3-hide-small">
	<span class="fa fa-search w3-bar-item fa-lg" style="padding-top:15px !important;"></span>
	<input class="w3-input w3-bar-item w3-block w3-rest" type="text" placeholder="Search" style="padding-left:10px !important; min-width:50%;">
	<span class="w3-bar-item w3-right">
		<a href="../logout.php" class="w3-small "style="text-decoration:none;"><i class="fa fa-sign-out fa-fx"></i> Logout</a>
	</span>
	</div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:230px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../images/avatar.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span><strong>Super Admin</strong></span><br>
	  <hr style="margin:0px;"/>
	  <small>Administrator</small>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Administration</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
	 <div class="w3-bar-item w3-button w3-padding w3-hover-blue" onclick="open_nav_accord('a1')">
		<i class="fa fa-users fa-fw"></i> <b>Users</b> <i class="fa fa-caret-down w3-right fa-lg" style="position:relative;top:5px;"></i>
	 </div>
	  <div id="a1" class="w3-hide w3-white w3-animate-opacity w3-rightbar w3-border-blue" style="padding-left:20px;">
		<a href="?new_user=true" class="w3-bar-item w3-button w3-small"><i class="fa fa-plus fa-fx"></i>  New User </a>
		<a href="?list=true" class="w3-bar-item w3-button w3-small"><i class="fa fa-list-ul fa-fx"></i>  User List </a>
	  </div>
	 <div class="w3-bar-item w3-button w3-padding w3-hover-blue" onclick="open_nav_accord('a3')">
		<i class="fa fa-graduation-cap fa-fw"></i> <b>Courses</b> <i class="fa fa-caret-down w3-right fa-lg" style="position:relative;top:5px;"></i>
	 </div>
	  <div id="a3" class="w3-hide w3-white w3-animate-opacity w3-rightbar w3-border-blue" style="padding-left:20px;">
		<a href="?newCourse=true" class="w3-bar-item w3-button w3-small"><i class="fa fa-plus fa-fx"></i>  New Course </a>
		<a href="?listCourse=true" class="w3-bar-item w3-button w3-small"><i class="fa fa-list-ul fa-fx"></i>  Courses List </a>
	  </div>
	 <div class="w3-bar-item w3-button w3-padding w3-hover-blue" onclick="open_nav_accord('a2')">
		<i class="fa fa-flask fa-fw"></i> <b>Researches</b> <i class="fa fa-caret-down w3-right fa-lg" style="position:relative;top:5px;"></i>
	 </div>
	  <div id="a2" class="w3-hide w3-white w3-animate-opacity w3-rightbar w3-border-blue" style="padding-left:20px;">
		<a href="?listRes=true" class="w3-bar-item w3-button w3-small"><i class="fa fa-list-ul fa-fx"></i>  Researches List </a>
	  </div>
   
    <a href="javascript:void(0);" onclick="document.getElementById('activeSYModal').style.display='block';" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar fa-fw"></i>  <b>Active SY</b></a>
	
	
	
	
	<div id="activeSYModal" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('activeSYModal').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>
		<div class="w3-container w3-padding-32">
			<div class="w3-row" id="activeSy">
				<h2><i class="fa fa-calendar fa-fw"></i>  ACTIVE SCHOOL YEAR</h2>
				<div class="w3-center">
					<h3><?php echo $_SESSION['activeYear'];?>  <a href="javascript:void(0);" ><i class="fa fa-pencil" onclick="showSyForm()"></i></a></h3>
				</div>
			</div>
			<div class="w3-row w3-hide" id="editSyForm">
				<h2><i class="fa fa-calendar fa-fw"></i>  CHANGE SCHOOL YEAR </h2>
				<form action="javascript:void(0);" method="post" onsubmit="return changeSy()">
					<label>Select School Year:</label>
					<select id="newSY" class="w3-input w3-border">
						<option>2017-2018</option>
						<option>2018-2019</option>
						<option>2019-2020</option>
						<option>2020-2021</option>
						<option>2021-2022</option>
						<option>2022-2023</option>
						<option>2023-2024</option>
						<option>2024-2025</option>
						<option>2025-2026</option>
						<option>2026-2027</option>
					</select></br>
					<input type="submit" class="w3-btn w3-green" value="Save">
					<button class="w3-btn w3-red" onclick="showactiveSy()">Cancel</button>
				</form>
			</div>
		</div>
    </div>
  </div>
	
	
	
    <!-- <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Traffic</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a>
	-->
	<br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:230px;margin-top:43px;">

	<div class="w3-container">
		<div class="w3-white w3-card-2" id="calendar_container"  style="margin-top:2%;padding-bottom:20px;border:1px solid #ddd">
			<?php
				if(!$_GET){
			?>
				<header class="w3-container" style="padding-top:22px">
					<h5><b><i class="fa fa-dashboard"></i> Defense Calendar Schedules</b><hr style="margin:0px" /></h5>
				</header>
				<div id="calendar"></div>
			<?php }?>
			<?php if(isset($_GET['new_user'])){?>
				<header class="w3-container" style="padding-top:22px">
					<h5><b><i class="fa fa-user fa-fx"></i> New User</b><hr style="margin:0px" /></h5>
				</header>
				<div class="w3-container" style="">
					<div class="w3-row"  style="min-width:250px; max-width:600px;margin:0px auto;" >
						<form action="javascript:void(0);" onsubmit="return addNewUserFromAdmin()" class="w3-container w3-margin">
							<div class="w3-row">
							  <div class="w3-col m5 l5 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> First Name:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> First Name:</b></div>
								<div class="w3-col s12 l7 m7">
								  <input class="w3-input w3-border" name="f_name" id="f_name" type="text" placeholder="First Name" required />
								</div>
							</div>
							<div class="w3-row">
							  <div class="w3-col m5 l5 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Last Name:</b><b class="w3-left w3-hide-medium w3-hide-large w3-large"><span class="w3-text-red">*</span> Last Name:</b></div>
								<div class="w3-col s12 l7 m7">
								  <input class="w3-input w3-border" name="l_name" id="l_name" type="text" placeholder="Last Name" required />
								</div>
							</div>
							<div class="w3-row">
							  <div class="w3-col m5 l5 w3-padding"><b class="w3-right w3-hide-small w3-large"> Middle Name:</b><b class="w3-left w3-hide-medium w3-hide-large w3-large"> Middle Name:</b></div>
								<div class="w3-col s12 l7 m7">
								  <input class="w3-input w3-border" name="m_name" id="m_name" type="text" placeholder="Middle Name" required />
								</div>
							</div>
							<div class="w3-row">
							  <div class="w3-col  m5 l5 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Username:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Username:</b></div>
								<div class="w3-col s12 l7 m7">
								  <input class="w3-input w3-border" name="user_name" id="user_name" type="text" placeholder="Username" required />
								</div>
							</div>
							<div class="w3-row">
							  <div class="w3-col m5 l5 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> User Type:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> User Type:</b></div>
								<div class="w3-col s12 l7 m7">
									<select class="w3-select w3-border" name="user_type" id="user_type" required />
									  <option value="" disabled selected>Choose user type</option>
									  <option value="1">Super Administrator</option>
									  <option value="2">Research Professor</option>
									</select>
								</div>
							</div>
							<div class="w3-row">
							  <div class="w3-col m5 l5 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Password:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Password:</b></div>
								<div class="w3-col s12 l7 m7">
								  <input class="w3-input w3-border" name="user_pw" id="user_pw" type="password" placeholder="Password" required />
								</div>
							</div>
							<div class="w3-row">
							  <div class="w3-col m5 l5 w3-padding"><b class=" w3-hide-small w3-right w3-large"><span class="w3-text-red">*</span> Confirm Password:</b><b class="w3-left w3-large w3-hide-large w3-hide-medium"><span class="w3-text-red">*</span> Confirm Password:</b></div>
								<div class="w3-col s12 l7 m7">
								  <input class="w3-input w3-border" name="user_pw_c" id="user_pw_c" type="password" placeholder="Confirm Password" required />
								</div>
							</div>

							<button class="w3-button w3-right w3-section w3-blue w3-ripple w3-padding">Submit</button>

							</form>
					</div>
				</div>
			<?php }?>
			<?php
				if(isset($_GET['list'])){
			?>
			<header class="w3-container" style="padding-top:22px">
				<h5><b><i class="fa fa-list-ol fa-fx"></i> Users Lists</b><hr style="margin:0px" /></h5>
			</header>
			<div class="w3-container">
				<table id="userListTbl" class="w3-table w3-text-black display dataTable no-footer">
					<thead>
						<tr>
							<th>Username</th>
							<th>Full Name</th>
							<th>User Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = mysql_query("SELECT * FROM `users` WHERE `username`!='admin'");
							while($row = mysql_fetch_assoc($sql)){
						?>
						<tr>
							<td><?php echo $row['username'];?></td>
							<td><?php echo $row['first_name'].' '.$row['middle_name'].' '.$row['last_name']?></td>
							<td><?php
								if($row['user_type'] == 1){
									echo "Super Administrator";
								}else if($row['user_type'] == 2){
									echo "Research Professor";
								}else if($row['user_type'] == 3){
									echo "Panel";
								}else{
									echo "Adviser";
								}
							?></td>
							<td>
								<button class="w3-button w3-green w3-small"><span class="fa fa-edit fa-fx"></span> Edit</button>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
			<?php }?>
			
			<?php
				if(isset($_GET['listRes'])){
			?>
				<header class="w3-container" style="padding-top:22px">
				<h5><b><i class="fa fa-list-ol fa-fx"></i> Users Lists</b><hr style="margin:0px" /></h5>
			</header>
			<div class="w3-container">
				<table id="researchTbl" class="w3-table w3-text-black display dataTable no-footer">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Proponents</th>
							<th>Recommendations</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
						?>
						<tr>
							<td>1</td>
							<td>AWP 2.0</td>
							<td>Franky Samaniego, </td>
							<td>ashdaks dhalkshdla kshd alksdj</td>
							<td>
								<button class="w3-button w3-green w3-small"><span class="fa fa-edit fa-fx"></span> Edit</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<?php }?>
			<?php
				if(isset($_GET['newCourse'])){
			?>
				<header class="w3-container" style="padding-top:22px">
					<h5><b><i class="fa fa-graduation-cap fa-fx"></i> New Course</b><hr style="margin:0px" /></h5>
				</header>
				<div class="w3-container" style="">
					<div class="w3-row"  style="min-width:250px; max-width:600px;margin:0px auto;" >
						<form action="javascript:void(0);" onsubmit="return addNewCourseAdmin()" class="w3-container w3-margin">
							<div class="w3-row">
							  <div class="w3-col m5 l5 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Course Name:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Course Name:</b></div>
								<div class="w3-col s12 l7 m7">
								  <input class="w3-input w3-border" name="courseName" id="courseName" type="text" placeholder="" required />
								</div>
							</div>
							<div class="w3-row">
							  <div class="w3-col m5 l5 w3-padding"><b class="w3-right w3-hide-small w3-large"><span class="w3-text-red">*</span> Course Code:</b><b class="w3-left w3-hide-large w3-hide-medium w3-large"><span class="w3-text-red">*</span> Course Code:</b></div>
								<div class="w3-col s12 l7 m7">
								  <input class="w3-input w3-border" name="courseCode" id="courseCode" type="text" placeholder="" required />
								</div>
							</div>
							<button class="w3-button w3-right w3-section w3-blue w3-ripple w3-padding">Submit</button>

							</form>
					</div>
				</div>
			<?php }?>
			<?php if(isset($_GET['listCourse'])){?>
					<header class="w3-container" style="padding-top:22px">
				<h5><b><i class="fa fa-list-ol fa-fx"></i> Users Lists</b><hr style="margin:0px" /></h5>
			</header>
			<div class="w3-container">
				<table id="userListTbl" class="w3-table w3-text-black display dataTable no-footer">
					<thead>
						<tr>
							<th>Course</th>
							<th>Course Code</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = mysql_query("SELECT * FROM `courses`");
							while($row = mysql_fetch_assoc($sql)){
						?>
						<tr>
							<td><?php echo $row['course'];?></td>
							<td><?php echo $row['courseCode']?></td>
							<td>
								<button class="w3-button w3-green w3-small"><span class="fa fa-edit fa-fx"></span> Edit</button>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
			<?php }?>
		</div>
	</div>
  <!-- Header -->
 

  <!-- End page content -->
</div>
<script type="text/javascript" src="../js/jquery-ui.js" ></script>  
<script type="text/javascript" src="../js/actions.js"></script>
<script src="../dist/js/select2.min.js"></script>
<script>

</script>

</body>
</html>
