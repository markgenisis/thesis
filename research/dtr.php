<?php
include "../include/dbcon.php";
 $sched=mysql_query("select * from schedules where researchId='{$_POST['researchID']}'");
 while($row=mysql_fetch_assoc($sched)){
 	$scheds=strtotime($row['dateSchedule']);
 }
 $date=date("d",$scheds);
?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 15">
<meta name=Originator content="Microsoft Word 15">
<link rel=File-List href="CSCForm48_DailyTimeRecord(DTR)_files/filelist.xml">
<title>Civil Service Form No</title>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>v_gaje</o:Author>
  <o:LastAuthor>MarkGenz</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>2</o:TotalTime>
  <o:Created>2018-02-08T12:04:00Z</o:Created>
  <o:LastSaved>2018-02-08T12:04:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>238</o:Words>
  <o:Characters>1358</o:Characters>
  <o:Company>OPS</o:Company>
  <o:Lines>11</o:Lines>
  <o:Paragraphs>3</o:Paragraphs>
  <o:CharactersWithSpaces>1593</o:CharactersWithSpaces>
  <o:Version>15.00</o:Version>
 </o:DocumentProperties>
 <o:OfficeDocumentSettings>
  <o:TargetScreenSize>800x600</o:TargetScreenSize>
 </o:OfficeDocumentSettings>
</xml><![endif]-->
<link rel=themeData href="CSCForm48_DailyTimeRecord(DTR)_files/themedata.thmx">
<link rel=colorSchemeMapping
href="CSCForm48_DailyTimeRecord(DTR)_files/colorschememapping.xml">
<style>
body{
	width:500px !important; 
}
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1107305727 0 0 415 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Arial","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";}
h1
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:right;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:1;
	font-size:8.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Arial","sans-serif";
	mso-bidi-font-family:"Times New Roman";
	mso-font-kerning:0pt;
	font-weight:normal;
	font-style:italic;}
h2
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:2;
	font-size:8.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Arial","sans-serif";
	mso-bidi-font-family:"Times New Roman";
	font-weight:normal;
	font-style:italic;}
h3
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin-top:6.0pt;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:3;
	font-size:10.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Arial","sans-serif";
	mso-bidi-font-family:"Times New Roman";}
p.MsoCaption, li.MsoCaption, div.MsoCaption
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	font-size:7.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Arial","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	font-style:italic;}
p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
	{mso-style-noshow:yes;
	mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:7.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Arial","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";}
p.bookletbody, li.bookletbody, div.bookletbody
	{mso-style-name:bookletbody;
	mso-style-unhide:no;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.25in;
	margin-bottom:.0001pt;
	text-align:justify;
	line-height:10.0pt;
	mso-line-height-rule:exactly;
	mso-pagination:widow-orphan;
	tab-stops:.25in;
	font-size:9.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
@page WordSection1
	{size:8.5in 11.0in;
	margin:.8in .7in .8in .7in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-columns:2 even 1.0in;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="1026"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:.5in' style="max-width:100px;" onLoad="window.print();">

<div class=WordSection1>

<h2>Civil Service Form No. 48</h2>

<h3><span style='font-size:12.0pt'>DAILY TIME RECORD<o:p></o:p></span></h3>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-size:8.0pt;mso-bidi-font-size:12.0pt'>-----o0o-----<o:p></o:p></span></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:.5pt solid windowtext;
 mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
  <td width=307 valign=top style='width:3.2in;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><o:p><?php echo implode(" ",getName($_POST['userId'])); ?></o:p></b></p>
  </td>
 </tr>
</table>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-size:8.0pt;mso-bidi-font-size:12.0pt'><span
style='mso-spacerun:yes'> </span>(Name)<o:p></o:p></span></p>

<p class=MsoNormal><span style='font-size:8.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:.5pt solid windowtext;
 mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=103 valign=top style='width:77.4pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
  <h2>For the month of </h2>
  </td>
  <td width=108 colspan=2 valign=top style='width:81.0pt;border:none;
  border-bottom:solid windowtext 1.0pt;mso-border-bottom-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><i><span style='font-size:8.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></i></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><i><span style='font-size:8.0pt;mso-bidi-font-size:12.0pt'><o:p><?php echo date("F",$scheds); ?></o:p></span></i></p>
  </td>
  <td width=60 valign=top style='width:45.0pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><i><span style='font-size:8.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></i></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid'>
  <td width=127 colspan=2 rowspan=2 style='width:95.4pt;border:none;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-top:2.0pt;text-align:center'><i><span
  style='font-size:8.0pt;mso-bidi-font-size:12.0pt'>Official hours for arrival
  and departure<o:p></o:p></span></i></p>
  </td>
  <td width=84 valign=top style='width:63.0pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
  <h1 style='margin-top:2.0pt'>Regular days</h1>
  </td>
  <td width=96 colspan=2 valign=top style='width:1.0in;border:none;border-bottom:
  solid windowtext 1.0pt;mso-border-bottom-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-top:2.0pt'><i><span style='font-size:8.0pt;
  mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></i></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes;page-break-inside:avoid'>
  <td width=84 valign=top style='width:63.0pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
  <h1>Saturdays</h1>
  </td>
  <td width=96 colspan=2 valign=top style='width:1.0in;border:none;border-bottom:
  solid windowtext 1.0pt;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><i><span style='font-size:8.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></i></p>
  </td>
 </tr>
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=103 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=84 style='border:none'></td>
  <td width=36 style='border:none'></td>
  <td width=60 style='border:none'></td>
 </tr>
 <![endif]>
</table>

<p class=MsoNormal><span style='font-size:8.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:.5pt solid windowtext;
 mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;page-break-inside:avoid'>
  <td width=31 rowspan=2 style='width:23.4pt;border-top:1.0pt;border-left:1.0pt;
  border-bottom:1.5pt;border-right:1.5pt;border-color:windowtext;border-style:
  solid;mso-border-top-alt:.5pt;mso-border-left-alt:.5pt;mso-border-bottom-alt:
  1.5pt;mso-border-right-alt:1.5pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:7.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'>Day</span><span
  style='font-size:9.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'><o:p></o:p></span></p>
  </td>
  <td width=96 colspan=2 valign=top style='width:1.0in;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-left-alt:solid windowtext 1.5pt;mso-border-top-alt:.5pt;
  mso-border-left-alt:1.5pt;mso-border-bottom-alt:.5pt;mso-border-right-alt:
  1.5pt;mso-border-color-alt:windowtext;mso-border-style-alt:solid;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:9.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'>A.M.<o:p></o:p></span></b></p>
  </td>
  <td width=96 colspan=2 valign=top style='width:1.0in;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-left-alt:solid windowtext 1.5pt;mso-border-top-alt:.5pt;
  mso-border-left-alt:1.5pt;mso-border-bottom-alt:.5pt;mso-border-right-alt:
  1.5pt;mso-border-color-alt:windowtext;mso-border-style-alt:solid;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:9.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'>P.M.<o:p></o:p></span></b></p>
  </td>
  <td width=84 colspan=2 style='width:63.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span class=SpellE><b><span
  style='font-size:8.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'>Undertime</span></b></span><b><span
  style='font-size:8.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid'>
  <td width=48 style='width:.5in;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.5pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;mso-border-top-alt:
  .5pt;mso-border-left-alt:1.5pt;mso-border-bottom-alt:1.5pt;mso-border-right-alt:
  .5pt;mso-border-color-alt:windowtext;mso-border-style-alt:solid;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:7.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'>Arrival<o:p></o:p></span></b></p>
  </td>
  <td width=48 style='width:.5in;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.5pt;border-right:solid windowtext 1.5pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span class=SpellE><b><span
  style='font-size:7.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'>Depar-ture</span></b></span><b><span
  style='font-size:7.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'><o:p></o:p></span></b></p>
  </td>
  <td width=48 style='width:.5in;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.5pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;mso-border-top-alt:
  .5pt;mso-border-left-alt:1.5pt;mso-border-bottom-alt:1.5pt;mso-border-right-alt:
  .5pt;mso-border-color-alt:windowtext;mso-border-style-alt:solid;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:7.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'>Arrival<o:p></o:p></span></b></p>
  </td>
  <td width=48 style='width:.5in;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.5pt;border-right:solid windowtext 1.5pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span class=SpellE><b><span
  style='font-size:7.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'>Depar-ture</span></b></span><b><span
  style='font-size:7.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'><o:p></o:p></span></b></p>
  </td>
  <td width=48 style='width:.5in;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.5pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;mso-border-top-alt:
  .5pt;mso-border-left-alt:1.5pt;mso-border-bottom-alt:1.5pt;mso-border-right-alt:
  .25pt;mso-border-color-alt:windowtext;mso-border-style-alt:solid;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:7.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'>Hours<o:p></o:p></span></b></p>
  </td>
  <td width=36 style='width:27.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.5pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .25pt;mso-border-top-alt:
  .5pt;mso-border-left-alt:.25pt;mso-border-bottom-alt:1.5pt;mso-border-right-alt:
  .25pt;mso-border-color-alt:windowtext;mso-border-style-alt:solid;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:7.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'>Min-<span
  class=SpellE>utes</span><o:p></o:p></span></b></p>
  </td>
 </tr>
 <?php

 for($x=1; $x<=31; $x++){
	 //if($date==$x){
 ?>
 <tr style='mso-yfti-irow:2'>
  <td width=31 valign=top style='width:23.4pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-top-alt:solid windowtext 1.5pt;mso-border-top-alt:1.5pt;
  mso-border-left-alt:.5pt;mso-border-bottom-alt:.5pt;mso-border-right-alt:
  1.5pt;mso-border-color-alt:windowtext;mso-border-style-alt:solid;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:9.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'><?php echo $x; ?><o:p></o:p></span></b></p>
  </td>
  <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext 1.5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-top-alt:1.5pt;mso-border-left-alt:1.5pt;mso-border-bottom-alt:
  .5pt;mso-border-right-alt:.5pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:9.0pt;mso-bidi-font-size:12.0pt;
  mso-bidi-font-family:Arial'><o:p><?php if($x==date("d",$scheds)){ if(date("A",$scheds)=="AM"){ echo date("h:i",$scheds);} }?></o:p></span></p>
  </td>
  <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-top-alt:solid windowtext 1.5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-top-alt:1.5pt;mso-border-left-alt:.5pt;mso-border-bottom-alt:.5pt;
  mso-border-right-alt:1.5pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:9.0pt;mso-bidi-font-size:12.0pt;
  mso-bidi-font-family:Arial'><o:p><?php if($x==date("d",$scheds)){ if(date("A",$scheds)=="AM"){ echo date("h:i",$scheds + 7200);} }?></o:p></span></p>
  </td>
  <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext 1.5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-top-alt:1.5pt;mso-border-left-alt:1.5pt;mso-border-bottom-alt:
  .5pt;mso-border-right-alt:.5pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:9.0pt;mso-bidi-font-size:12.0pt;
  mso-bidi-font-family:Arial'><o:p><?php if($x==date("d",$scheds)){ if(date("A",$scheds)=="PM"){ echo date("h:i",$scheds);} }?></o:p></span></p>
  </td>
  <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-top-alt:solid windowtext 1.5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-top-alt:1.5pt;mso-border-left-alt:.5pt;mso-border-bottom-alt:.5pt;
  mso-border-right-alt:1.5pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:9.0pt;mso-bidi-font-size:12.0pt;
  mso-bidi-font-family:Arial'><o:p><?php if($x==date("d",$scheds)){ if(date("A",$scheds)=="PM"){ echo date("h:i",$scheds + 7200);} }?></o:p></span></p>
  </td>
  <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext 1.5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-top-alt:1.5pt;mso-border-left-alt:1.5pt;mso-border-bottom-alt:
  .25pt;mso-border-right-alt:.25pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><span
  style='font-size:9.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext 1.5pt;mso-border-left-alt:solid windowtext .25pt;
  mso-border-alt:solid windowtext .25pt;mso-border-top-alt:solid windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><span
  style='font-size:9.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 
 <?php
 } 
 ?>
 
 <tr style='mso-yfti-irow:33;mso-yfti-lastrow:yes;page-break-inside:avoid'>
  <td width=223 colspan=5 valign=top style='width:167.4pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:solid windowtext 1.5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><span
  style='font-size:9.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'>Total<o:p></o:p></span></p>
  </td>
  <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .25pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .25pt;mso-border-left-alt:solid windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><b><span
  style='font-size:9.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .25pt;mso-border-left-alt:solid windowtext .25pt;
  mso-border-alt:solid windowtext .25pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><b><span
  style='font-size:9.0pt;mso-bidi-font-size:12.0pt;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></b></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoBodyText><i>I certify on my honor that the above is a true and
correct report of the hours of work performed, record of which was made daily
at the time of arrival and departure from office.<o:p></o:p></i></p>

<p class=MsoNormal><span style='font-size:7.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:.5pt solid windowtext;
 mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
  <td width=307 valign=top style='width:3.2in;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:7.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><span style='font-size:7.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoBodyText><i>VERIFIED as to the prescribed office hours:<o:p></o:p></i></p>

<p class=MsoNormal><span style='font-size:7.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span style='font-size:7.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:.5pt solid windowtext;
 mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
  <td width=307 valign=top style='width:3.2in;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:7.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoCaption>In Charge</p>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-size:7.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span style='font-size:7.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span style='font-size:7.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>

</div>

</body>

</html>
