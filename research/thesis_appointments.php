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

<body style="font-size:12px;" onLoad="window.print();">
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
    <h5 class="w3-center"><strong>APPOINTMENT OF THESIS EVALUATOR</strong></h5>
    	<div class="w3-col s4 w3-padding-right"> 
        	<table>
            <?php foreach(getPanel($id) as $key => $val){ ?>
            <tr><td> <strong><?php echo strtoupper($val); ?></strong> </td></tr>
            <?php } ?>
            </table>
        </div>
        <div class="w3-col s6"> 
        	<ul class="w3-ul">
            <li class="w3-right"> <?php echo date("F d, Y",time()); ?></li>
            </ul>
        </div>
    </div>
    <div class="w3-row">
    	<p style="text-indent:50px; ">You are hereby appointed to constitute the Thesis Panel as indicated above to evaluate the researcher work of <strong><?php foreach(getPropo($id) as $key => $val){echo $val.", ";} ?></strong> who work on the topic "<strong><?php echo getTitle($id); ?></strong>".</p>
    </div>
     <div class="w3-row">
    	<p style="text-indent:50px; ">As such you are tasked to:</p>
        <ol  >
        	<li>Appraise the validity and acceptability of the thesis work in terms of its scholarly quality, correctness of the facts and claims contained therein; and completeness as to its basic components.</li>
            <li>Make sure that all suggestions are judiciously incorporated.</li>
            <li>Evaluate the research report based on the adopted criteria, and</li>
            <li>Be physically present during the oral defense.</li>
        </ol>
    </div>
    <div class="w3-row">
    	<div class="w3-col"><p style="text-indent:50px; ">You shall be entitled to an honorarium of Php. 600.00 as chairman or Php 350.00 as member or as per existing guidelines and policies.</p></div>
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
            	<td   width="300" height="150" >Conforme:</td>
                <td width="300" class="w3-center"></td>
                <td   width="300" ></td>
            </tr>
            <?php
				$sql = mysql_query("SELECT * FROM `panels` WHERE `researchId`='$id'");
		while($row = mysql_fetch_assoc($sql)){
			$prop[] = implode(" ",(getName($row['name'])));
		}
			?>
             <tr>
            	<td   width="300"   ></td>
                <td   width="300" class="w3-center"><strong><?php echo strtoupper($prop[0]);  ?></strong></td>
                <td   width="300"  ></td>
            </tr>
        	  <tr>
            	<td   width="300" ></td>
                <td width="300" class="w3-center">Panel Chairman</td>
                <td   width="300"  ></td>
            </tr>
            <tr>
            	<td   width="300" ></td>
                <td width="300" class="w3-center"> &nbsp;</td>
                <td   width="300"  ></td>
            </tr>
            <tr>
            	<td   width="300" class="w3-center"  ><strong><?php echo strtoupper($prop[1]);  ?></strong></td>
                <td   width="300" class="w3-center"></td>
                <td   width="300" class="w3-center" ><strong><?php echo strtoupper($prop[2]);  ?></strong></td>
            </tr>
        	  <tr>
              <td width="300" class="w3-center">Panel Member</td>
            	<td   width="300" ></td>
                <td width="300" class="w3-center">Panel Member</td>
            </tr>
            <?php  ?>
           </table>
    </div>
    <?php } ?>
</div>
</body>
</html>