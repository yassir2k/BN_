<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/show_edit_corporate_js.js"></script>
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
	$("#cRegDate").datepicker({
		changeMonth: true,
		changeYear: true
	});
});
</script>
<title>Untitled Document</title>
</head>

<body>
<center>
<div id="base">
<br />
<fieldset style="width:800px; background-color:#f5f5f5">
<legend align="center" style="font-size:20px; font-family:Cambria; color:#006600; font-weight:bold">
Edit Corporate Partner
</legend>
<?php
include("conn.php");
$pattern = "/'/";
$replacement = "''";
$id = preg_replace($pattern,$replacement,$_REQUEST["id"]);
$avc = preg_replace($pattern,$replacement,$_REQUEST["avc"]);
$rc = preg_replace($pattern,$replacement,$_REQUEST["rc"]);
if($id == null || $avc == null || $rc == null)
{
	echo "Identity Couldn't Be Retrieved";
}
else
{
?>
<table style="font-family:cambria; font-size:13px; color:#333333" width="auto" height="auto" cellpadding="4" cellspacing="1">
<tr>
<td align="left" width="400"> <!-- Left -->
<table>
<tr>
<?php
$query = "SELECT CorpID, AV_CODE, CorpRcNo, CorpName, CorpRegDate, CorpState, LGA, CorpTown, CorpAddress";
$query.=" FROM tblCorpPartners WHERE CorpID = '$id' AND AV_CODE = '$avc' AND CorpRCNo = '$rc'";
$result = sqlsrv_query($conn,$query);
if(sqlsrv_has_rows($result))
{
	$i=0;
	while($data = sqlsrv_fetch_array($result)) {
?>
<td align="left"><font id ="ac">Availability Code</font></td>
<td align="left">
<input disabled="disabled" type="text" id="availCode" style="background-color:#f5f5f5;width:200px;" value="<?php echo $data[1]; ?>"/>
</td>
</tr>
<tr>
<td align="left"><font id ="crcn">Corporate RC Number</font></td>
<td align="left">
<input type="text" id="cRC" style="background-color:#f5f5f5;width:200px;" disabled="disabled" value="<?php echo $data[2]; ?>" /></td>
</tr>
<tr>
<td align="left"><font id ="cn">Corporate Name</font></td>
<td align="left"><input type="text" id="cName" style="width:200px;" value="<?php echo $data[3]; ?>" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="crd">Corporate Registration Date</font></td>
<td align="left"><input type="text" id="cRegDate" style="width:200px;" maxlength="100" value="<?php echo $data[4]; ?>"/></td>
</tr>
</table>
</td>
<td align="right" width="400"> <!-- Right -->
<table>
<tr>
<td align="left" width="200"><font id ="csr">Corporate State Of Residence</font></td>
<td align="left">
    <select id="cState" style="width:200px;" onchange="getLgas(this.value)">
    <option value=""></option>
<?php 
sqlsrv_close($conn);
include("conn.php");
$query="SELECT StateCode, State FROM tblStates";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[5]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[1]);?></option>
<?php } ?>
    </select>
</td>
</tr>
<tr>
<td align="left"><font id ="clgaor">Corporate L.G.A Of Residence</font></td>
<td align="left">
<div id="loadLga" style="width:200px;">
    <select id="lga" style="width:200px;">
    <option value=""></option>
<?php 
$query2="SELECT lga FROM tbl_lga WHERE state = '$data[5]'";
$results = sqlsrv_query($conn,$query2);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($results)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[6]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
<?php } ?>
    </select>
    </div>
</td>
</tr>
<tr>
<td align="left"><font id ="ctor">Corporate Town Of Residence</font></td>
<td align="left"><input value="<?php echo $data[7]; ?>" type="text" id="cTown" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="csa">Street Address</font></td>
<td align="left"><input value="<?php echo $data[8]; ?>" type="text" id="cStreet" style="width:200px;" maxlength="100"/></td>
</tr>
</table>
</td>
<?php
	}?>
</tr>
</table>
<?php }} ?>
<input id="updateCorpPartners" value="Update Corporate Partner" type="submit" style="font-family:cambria; font-size:13px; color:#333333">
<input id="closeForm" type="button" value="Close Form" style="font-family:cambria; font-size:13px; color:#333333"/>
<div id="cHoto">
</div>
</fieldset> 
</div>
</center>
</body>
</html>