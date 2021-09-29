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
<title>Business Names Template :: Home</title>
<link rel="stylesheet" type="text/css" href="css/demos.css">
<link rel="stylesheet" type="text/css" href="css/bn_css.css"/>
<link rel="stylesheet" href="css/jquery.ui.core.css">
<link rel="stylesheet" href="css/jquery.ui.datepicker.css">
<link rel="stylesheet" href="css/jquery.ui.theme.css">
<script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/invoke_entries_js.js"></script>
<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/jquery.ui.core.js"></script>

<script>
$(function() {
	$("#datePaid").datepicker({
		changeMonth: true,
		changeYear: true
	});
});
</script>
<?php
function ae_detect_ie()
{
	if(isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
	return true;
	else
	return false;
}
?>
</head>

<body>
<div id="cover">
<center>
<div id="displayer">
<?php
include("conn.php");
$id = $_REQUEST["id"];
if($id == null)
{
	echo "ID Couldn't Be Retrieved. Please Try Again";
}
else
{
$queryUsr ="SELECT * FROM tblUser WHERE user_id ='$user'";
$resultUsr = sqlsrv_query($conn, $queryUsr);
$rowUsr = sqlsrv_fetch_array($resultUsr);
$role = $rowUsr['user_group'];
	$query = "SELECT SERNUMBER, AV_CODE, BUS_NAME, RECEIPT_NO, PAY_DATE, REG_DATE, STREET_ADDRESS, TOWN_ADDRESS, AREA_ADDRESS, STATE_ADDRESS, ";
	$query.= "LIN_BUS1, LIN_BUS2, LIN_BUS3, STATE_CODE FROM tblBNames WHERE SERNUMBER = '$id'";
	$result = sqlsrv_query($conn,$query);
		if(!($result))
		{
			die( print_r( sqlsrv_errors(), true)); 
		}
		else
		{
			$data = sqlsrv_fetch_array($result);
		}
?>
<br />
<fieldset style="width:880px; background-color:#f5f5f5">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#003300; font-weight:bold">
</legend>
<table style="font-family:cambria; font-size:13px; color:#333333" width="auto" height="auto" cellpadding="4" cellspacing="1">
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="av_font">*Availability Code:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> type="text" id="availCode" style="width:200px;" maxlength="100" value="<?php echo $data[1]; ?>"/>
</td>
<td>Entry Number:
</td>
<td>
<input  disabled="disabled" type="text" value="<?php echo $data[0]; ?>" id="entryNo2" style="background-color:#f5f5f5;width:50px;" maxlength="100"/>
</td>
<!------------------------------------------------------------------------------------------------------>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="rec_font">*Receipt Number:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> type="text" id="receiptNo" style="width:200px;" maxlength="100" value="<?php echo $data[3]; ?>" />
</td>
<td><font id="os_font">State Code</font>
</td>
<td><select <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> id="stateCode" name="stateCode" style="width:180px;">
  <option value=""></option>
  <?php 
//sqlsrv_close($conn);
include("conn.php");
$query="SELECT StateCode, State FROM tblStates";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
  <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>" <?php if($data[13] == $row[0]){?> selected="selected" <?php } ?> > <?php echo preg_replace($pattern,$replacement,$row[1]);?> </option>
  <?php } ?>
</select>
</td>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="date_font">*Date Paid:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> type="text" id="datePaid" name="datePaid" style="width:200px;" value="<?php echo $data[4]; ?>" />
</td>
<!------------------------------------------------------------------------------------------------------>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="appr_font">*Approved Name:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> type="text" id="approvedName" style="width:400px;" maxlength="150" value="<?php echo $data[2]; ?>" />
</td>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="str_font">*Street Address:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> type="text" id="streetAddress" style="width:200px;" maxlength="100" value="<?php echo $data[6]; ?>" />
</td>
<!------------------------------------------------------------------------------------------------------>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="st_font">*State:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
    <select <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> id="state" name="state" style="width:200px;" onchange="getLgas(this.value)">
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
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[9]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[1]);?></option>
<?php } ?>
    </select>
</td>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="lga_font">*Local Government Area:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
    <div id="loadLga" style="width:200px;">
    <select <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> id="lga" style="width:200px;">
    <option value=""></option>
<?php 
$query2="SELECT lga FROM tbl_lga WHERE state = '$data[9]'";
$results = sqlsrv_query($conn,$query2);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($results)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[8]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
<?php } ?>
    </select>
    </div>
</td>
<!------------------------------------------------------------------------------------------------------>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="town_font">*Town:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> type="text" id="town" style="width:200px;" maxlength="100" value="<?php echo $data[7]; ?>"/>
</td>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="fbo_font">*First Business Object:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
    <select <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> id="bnObject1" name="bnObject1" style="width:370px; font-family:cambria; font-size:12px;">
    <option value="">Choose Object...</option>
<?php 
sqlsrv_close($conn);
include("conn.php");
$query="SELECT business_objects FROM tblBizObjects ORDER BY business_objects";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>" <?php if($data[10] == $row[0]){?> selected="selected" <?php } ?> >
	<?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
<?php } ?>
    </select>
</td>
<!------------------------------------------------------------------------------------------------------>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="sbo_font">&nbsp;&nbsp;Second Business Object:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
    <select <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> id="bnObject2" name="bnObject2" style="width:370px; font-family:cambria; font-size:12px;">
    <option value="">Choose Object...</option>
<?php 
sqlsrv_close($conn);
include("conn.php");
$query="SELECT business_objects FROM tblBizObjects ORDER BY business_objects";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>" <?php if($data[11] == $row[0]){?> selected="selected" <?php } ?> >
	<?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
<?php } ?>
    </select>
</td>
<!------------------------------------------------------------------------------------------------------>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="tbo_font">&nbsp;&nbsp;Third Business Object:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
    <select <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> id="bnObject3" name="bnObject3" style="width:370px; font-family:cambria; font-size:12px;">
    <option value="">Choose Object...</option>
<?php 
sqlsrv_close($conn);
include("conn.php");
$query="SELECT business_objects FROM tblBizObjects ORDER BY business_objects";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>" <?php if($data[12] == $row[0]){?> selected="selected" <?php } ?> >
	<?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
<?php } ?>
    </select>
</td>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="center" colspan="4">
<input <?php if($rowUsr['user_group'] == 'pre_user') { echo "disabled='disabled'"; } ?> style="font-family:cambria; font-size:13px; color:#333333" type="button" id="submitBnForm" value="Save" />
<input style="font-family:cambria; font-size:13px; color:#333333" type="submit" id="blanket" value="Close Form" />
</td>
</tr>
</table>
<br />
<?php } ?>
<div id="hoto">
</div>
<div id="displayer">
</div>
</fieldset>
</div>
</center>
</div>
</div>
</body>
</html>