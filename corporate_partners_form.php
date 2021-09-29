<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/cp_partners_formjs.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<link rel="stylesheet" type="text/css" href="css/bn_css.css"/>
<link rel="stylesheet" href="css/jquery.ui.core.css">
<link rel="stylesheet" href="css/jquery.ui.datepicker.css">
<link rel="stylesheet" href="css/jquery.ui.theme.css">
<link rel="stylesheet" href="css/demos.css">
<script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/jquery.ui.core.js"></script>

<script>
$(function() {
	$("#cRegDate_1").datepicker({
		changeMonth: true,
		changeYear: true
	});
});
$(function() {
	$("#cRegDate_2").datepicker({
		changeMonth: true,
		changeYear: true
	});
});
$(function() {
	$("#cRegDate_3").datepicker({
		changeMonth: true,
		changeYear: true
	});
});
$(function() {
	$("#cRegDate_4").datepicker({
		changeMonth: true,
		changeYear: true
	});
});
$(function() {
	$("#cRegDate_5").datepicker({
		changeMonth: true,
		changeYear: true
	});
});
</script>
</head>

<body>
<center>
<?php
$partners = $_REQUEST["num_of_partners"];
$avc = $_REQUEST["avc"];
for($i = 0; $i < $partners; $i++)
{?>
<input type="hidden" value="<?php echo $partners; ?>" id="hideen_no" />
<fieldset style="width:800px; background-color:#f5f5f5">
<legend align="center" style="font-size:20px; font-family:Cambria; color:#006600; font-weight:bold">
Corporate Partner <?php echo $i+1; ?>
</legend>
<table style="font-family:cambria; font-size:13px; color:#333333" width="auto" height="auto" cellpadding="4" cellspacing="1">
<tr>
<td align="left" width="400"> <!-- Left -->
<table>
<tr>
<td align="left"><font id ="ac_<?php echo $i+1; ?>">Availability Code</font></td>
<td align="left">
<input disabled="disabled" type="text" id="availCode_<?php echo $i+1;?>" style="background-color:#f5f5f5;width:200px;" value="<?php echo $avc;?>"/>
</td>
</tr>
<tr>
<td align="left"><font id ="crcn_<?php echo $i+1; ?>">Corporate RC Number</font></td>
<td align="left"><input type="text" id="cRC_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="cn_<?php echo $i+1; ?>">Corporate Name</font></td>
<td align="left"><input type="text" id="cName_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="crd_<?php echo $i+1; ?>">Corporate Registration Date</font></td>
<td align="left">
<input readonly="readonly" type="text" id="cRegDate_<?php echo $i+1;?>" style="width:200px;" maxlength="100" />
</td>
</tr>
</table>
</td>
<td align="right" width="400"> <!-- Right -->
<table>
<tr>
<td align="left" width="200"><font id ="csr_<?php echo $i+1; ?>">Corporate State Of Residence</font></td>
<td align="left">
    <select id="cState_<?php echo $i+1;?>" style="width:200px;" onchange="getLgas(this.value,<?php echo $i+1; ?>)">
    <option value="">Choose a State..</option>
<?php 
//sqlsrv_close($conn);
include("conn.php");
$query="SELECT StateCode, State FROM tblStates";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"  >
	<?php echo preg_replace($pattern,$replacement,$row[1]);?>
    </option>
<?php } ?>
    </select>
</td>
</tr>
<tr>
<td align="left"><font id ="clgaor_<?php echo $i+1; ?>">Corporate L.G.A Of Residence</font></td>
<td align="left">
    <div id="loadLga_<?php echo $i+1;?>" style="width:200px;">
    <select id="lga_<?php echo $i+1;?>" style="width:200px;">
    <option value=""></option>
    </select>
    </div>
</td>
</tr>
<tr>
<td align="left"><font id ="ctor_<?php echo $i+1; ?>">Corporate Town Of Residence</font></td>
<td align="left"><input type="text" id="cTown_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="csa_<?php echo $i+1; ?>">Street Address</font></td>
<td align="left"><input type="text" id="cStreet_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
</table>
</td>
</tr>
</table>
</fieldset> 
<?php } 
if(($partners > 0) && ($partners!=""))
{ ?>
<input id="cpSubmitPartners" value="Proceed >>" type="submit" style="font-family:cambria; font-size:13px; color:#333333">
<input id="cpResetPartners" type="reset" value="Reset" style="font-family:cambria; font-size:13px; color:#333333"/>
<?php }?>
<p> <div id="cHoto"></div>
</center>
</body>
</html>