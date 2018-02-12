<?php
include "../include/dbcon.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href='../css/jquery-ui.css' rel='stylesheet'  />
<link rel="stylesheet" href="../css/w3.css">
</head>

<body style="font-size:12px;" onload="window.print();">
<div class="w3-container">

	<div class="w3-row">
    	<div class="w3-col s3">
        	<img src="../images/bupc.png" width="150" style="position:relative;" class=""  />
        </div>
        <div class="w3-col s8">
        	<p>Republic of the Philippines</p>
            <p><strong>BICOL UNIVERSITY POLANGUI CAMPUS</strong></p>
             <p>Polangui Albay</p>
              <p>Tel. No: (052) 235-0508</p>
        </div>
        
    </div>
    <hr class="w3-black" />
    <?php
	$id=$_GET['id'];
		$sql=mysql_query("select * from researches where id='$id'");
		while($row=mysql_fetch_assoc($sql)){
	?>
    <div class="w3-row">
    <h5 class="w3-center"><strong>APPOINTMENT OF THESIS ADVISER</strong></h5><br /><Br />
    	<div class="w3-col s5 w3-padding-right"> 
        	<ul style="list-style:none;" >
                <li class="w3-left"><strong><?php echo strtoupper(implode(" ",getName($row['adviserId']))); ?></strong></li>
                <li class="w3-left">Faculty, Bicol University Polangui Campus</li><br />
                <li class="w3-left">Polangui, Albay</li>
            </ul>
        </div>
        <div class="w3-col s6"> 
        	<ul class="w3-ul">
            <li class="w3-right"> <?php echo date("F d, Y",time()); ?></li>
            </ul>
        </div>
    </div>
    <div class="w3-row"><br /><br />
    	<p style="text-indent:50px; ">Dear Sir:</p>
    	<p style="text-indent:50px; margin-left:50px; ">Upon recommendation of the Research Professor, may we invite you to act as Thesis Adviser of <strong><?php foreach(getPropo($id) as $key => $val){echo $val.", ";} ?></strong> who work on the topic "<strong><?php echo getTitle($id); ?></strong>" which is schedule for its Final Defense on <?php echo date("F d, Y",strtotime(getSched($id))); ?>, at <?php echo getVenue($id); ?>.</p>
    </div>
     <div class="w3-row">
    	<p style="text-indent:50px; ">As adviser, you shall perform the task:</p>
        <ol style="margin-left:100px;" >
        	<li>Check the format of the manuscript;</li>
            <li>Provide general editing of the thesis work;</li>
            <li>Check the content and organization of the paper;</li>
            <li>Attend the defense sessions of the advisee(s) and record suggestions and recommendations of the panel.</li>
            <li>Provide ample time to the advisee(s) in relation to the experimental work during the conduct of the study, and</li>
            <li>Orient the advisee(s) on what might/will transpire during the defense session.</li>
        </ol>
    </div>
    <div class="w3-row">
    	<div class="w3-col"><p style="text-indent:50px;  margin-left:50px;">Thank you and once again, we acknowledge the magnanimous support you have extend to our students in the development of their research capabilities.</p></div>
    </div>
    <div class="w3-row">
    	<div class="w3-col s4 w3-padding-right"> 
        	 &nbsp;
        </div>
        <div class="w3-col s6 w3-right">
        <table>
        <tr>
            	<td   width="300" height="50" >Very truly yours,</td>
            </tr>
             
        	<tr>
            	<td style="border-bottom:1px solid #000;" width="300" class="w3-center"><strong>MERLY ARBO</strong></td>
            </tr>
            <tr>
            	<td  class="w3-center">DEAN</td>
              </tr>
           </table>
           
           
        </div>
    </div>
    <div class="w3-row">
    	<table >
        	<tr>
            	<td   width="300"   >Conforme:______________________</td>
                <td width="300" class="w3-center"></td>
                <td   width="300" ></td>
            </tr>
             <tr>
            	<td   width="300" class="w3-center"  >Thesis Adviser</td>
                <td   width="300" class="w3-center"></td>
                <td   width="300"  ></td>
            </tr>
        	 
           </table>
    </div>
    <?php } ?>
</div>
</body>
</html>