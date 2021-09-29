<?php 
session_start();
if ($_SESSION['user'] == null)
{
	header("Location: login_page.php");
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<script type="text/javascript" src="js/invoke_corporate_js.js"></script>
</head>

<body>
<center>
<div id="cover">
<?php
include("conn.php");
$avc = $_REQUEST["avc"];
$queryUsr ="SELECT * FROM tblUser WHERE user_id ='$user'";
$resultUsr = sqlsrv_query($conn, $queryUsr);
$rowUsr = sqlsrv_fetch_array($resultUsr);
$role = $rowUsr['user_group'];

$query = "SELECT count (*) FROM tblCorpPartners WHERE AV_CODE = '$avc'";
$result = sqlsrv_query($conn,$query);
$data = sqlsrv_fetch_array($result);
$partners = (int)$data[0];
sqlsrv_close($conn);

include("conn.php");
$query = "SELECT CorpID, AV_CODE, CorpRCNo, CorpName, CorpRegDate, CorpState, LGA, CorpTown, CorpAddress";
$query.= " FROM tblCorpPartners WHERE AV_CODE = '$avc'";
$result = sqlsrv_query($conn,$query);
$i = 0;
if(sqlsrv_has_rows($result))
{
while($data = sqlsrv_fetch_array($result))
{?>
<input type="hidden" value="<?php echo $partners; ?>" id="hideen_no" />
<input type="hidden" value="<?php echo $data[0]; ?>" id="id_<?php echo $i+1; ?>" />
<fieldset style="width:875px; background-color:#f5f5f5">
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
<td align="left">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> value="<?php echo $data[2]; ?>" type="text" id="cRC_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="cn_<?php echo $i+1; ?>">Corporate Name</font></td>
<td align="left">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> value="<?php echo $data[3]; ?>" type="text" id="cName_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="crd_<?php echo $i+1; ?>">Corporate Registration Date</font></td>
<td align="left">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> value="<?php echo $data[4]; ?>" type="text" id="cRegDate_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
</table>
</td>
<td align="right" width="400"> <!-- Right -->
<table>
<tr>
<td align="left" width="200"><font id ="csr_<?php echo $i+1; ?>">Corporate State Of Residence</font></td>
<td align="left">
    <select <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> id="cState_<?php echo $i+1;?>" style="width:200px;" onchange="getLgas(this.value,<?php echo $i+1;?>)">
    <option value=""></option>
<?php 
$query1="SELECT StateCode, State FROM tblStates";
$resulta = sqlsrv_query($conn,$query1);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($resulta)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[5]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[1]);?></option>
<?php } ?>
    </select>
</td>
</tr>
<tr>
<td align="left"><font id ="clgaor_<?php echo $i+1; ?>">Corporate L.G.A Of Residence</font></td>
<td align="left">
    <div id="loadLga_<?php echo $i+1;?>" style="width:200px;">
    <select <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> id="cLga_<?php echo $i+1;?>" style="width:200px;">
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
<td align="left"><font id ="ctor_<?php echo $i+1; ?>">Corporate Town Of Residence</font></td>
<td align="left">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> value="<?php echo $data[7]; ?>" type="text" id="cTown_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="csa_<?php echo $i+1; ?>">Street Address</font></td>
<td align="left">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> value="<?php echo $data[8]; ?>" type="text" id="cStreet_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
</table>
</td>
</tr>
</table>
</fieldset> 
<?php $i++; } }  
if(($partners > 0) && ($partners!=""))
{ ?>
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> id="cpSubmitPartners" value="Save" type="submit" style="font-family:cambria; font-size:13px; color:#333333">
<input style="font-family:cambria; font-size:13px; color:#333333" id="blanket" name="blanket" value="Close Form" type="submit" />
<?php }?>
<div id="cHoto">
</div>
</div>
</center>
</body>
<script>
$(function() {
	$("#cRegDate_1").datepicker({
		changeMonth: true,
		changeYear: true
	});
	$("#cRegDate_2").datepicker({
		changeMonth: true,
		changeYear: true
	});
	$("#cRegDate_3").datepicker({
		changeMonth: true,
		changeYear: true
	});
	$("#cRegDate_4").datepicker({
		changeMonth: true,
		changeYear: true
	});
	$("#cRegDate_5").datepicker({
		changeMonth: true,
		changeYear: true
	});
});
</script>
</html>