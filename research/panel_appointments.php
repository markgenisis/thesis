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
    	<div class="w3-col s4 w3-padding-right">To:
        	<table class="w3-right"> 
            <tr>
            	<td class="w3-right"><strong><?php echo implode(" ",getName($row['adviserId'])); ?></strong></td>
            </tr>
            <?php
				$getPanel=mysql_query("select * from panels where researchId='$id'");
				while($row=mysql_fetch_assoc($getPanel)){
			?>
                <tr>
                    <td  class="w3-right"><strong><?php echo implode(" ",getName($row['name'])); ?></strong></td>
                </tr>
            <?php } ?>
            </table>
            </ul>
        </div>
        <div class="w3-col s6">&nbsp;
        	<table class="w3-left"> 
            <tr>
            	<td class="w3-left"> - Thesis Adviser</td>
            </tr>
            <?php
				$getPanel=mysql_query("select * from panels where researchId='$id'");
				while($row=mysql_fetch_assoc($getPanel)){
			?>
            <tr>
            	<td class="w3-left"> - <?php if($row['designation']==4) echo "Chairman"; else echo "Member"; ?></td>
            </tr>
            <?php } ?>
            </table>
        </div>
    </div>
    <div class="w3-row">
    	<p style="text-indent:50px; line-height:50px;">You are hereby advised to sit as adviser, chairman and members of the Thesis Committee for the thesis defense entitled "<?php echo getTitle($id); ?>" of <strong><?php foreach(getPropo($id) as $key => $val){echo $val.", ";} ?></strong> which will be scheduled on <?php echo date("F d, Y",strtotime(getSched($id))); ?> at Bicol University Polangui Campus - <?php echo getVenue($id); ?>.</p>
    </div>
    <div class="w3-row">
    	<div class="w3-col s4 w3-padding-right"> 
        	 &nbsp;
        </div>
        <div class="w3-col s6 w3-right">
        <table>
        	<tr>
            	<td style="border-bottom:1px solid #000;" width="300" class="w3-center">MERLY ARBO</td>
            </tr>
            <tr>
            	<td  class="w3-center">DEAN</td>
              </tr>
           </table>
        </div>
    </div>
    <?php } ?>
</div>
</body>
</html>