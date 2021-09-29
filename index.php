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
<link rel="stylesheet" type="text/css" href="css/bn_css.css"/>
<link rel="stylesheet" href="css/jquery.ui.core.css">
<link rel="stylesheet" href="css/jquery.ui.datepicker.css">
<link rel="stylesheet" href="css/jquery.ui.theme.css">
<link rel="stylesheet" href="css/demos.css">
<script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/indexjs.js"></script>
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
</head>

<body>
<div id="page">
<div id="banner">
<div id="topbg">
<!-----------------------------------------------Menu Menu Menu------------------------------------------------------------->
<table width="auto" style="position:absolute; top:145px; right:-4px">
<tr>
<td width="90" align="right" style="font-family:cambria; font-size:12px; color:red; font-weight:bold ">
Hi,&nbsp;<?php $user = $_SESSION['user']; echo $user;?>
</td>
<td width="10" align="center" style="font-family:cambria; font-size:12px; color:#2a93c2; font-weight:bold ">|</td>
<td width="50" align="left"><a href="logout.php" class="signout">Signout</a></td>
</tr>
</table>
<!-----------------------------------------------Menu Menu Menu------------------------------------------------------------->
</div>
</div>
<center>
<?php include('conn.php');
$query ="SELECT * FROM tblUser WHERE user_id ='$user'";
$result = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($result);

if($row['user_group'] == 'post_user' || $row['user_group'] == 'power_user' || $row['user_group'] == 'admin'){ ?>
<table width="948" style="background-image:url(images/bg_green.png); background-repeat:repeat;">
<tr>
<td height="31" >
<table align="center" width="948">
<?php }
else
{?>
<table width="948" style="background-image:url(images/bg_green.png); background-repeat:repeat;">
<tr>
<td height="31" >
<table align="left" width="350">
<?php
}
?>
<tr>
<td class="tdb" align="center" style="width:auto"><a class="menutag"  href="dashboard.php">Dashboard</a>
</td>
<td align="center" class="separator">|</td>
<td class="tdb" align="center" style="width:auto"><a class="selected"  href="index.php">File New BN</a>
</td>
<td align="center" class="separator">|</td>
<td align="center" style="width:auto"><a class="menutag" href="print_form1.php">Form BN 1</a></td>
<?php

//display menu items base on user type
include('conn.php');
$query ="SELECT * FROM tblUser WHERE user_id ='$user'";
$result = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($result);

if($row['user_group'] == 'post_user' || $row['user_group'] == 'power_user' || $row['user_group'] == 'admin'){
	if ($row['user_group']=='power_user' || $row['user_group'] == 'admin'){
		echo"<td align='center' class='separator'>|</td>
		<td align='center' style='width:auto'><a class='menutag' href='bn_search.php' style='font-weight:bold'>BN Search</a></td>";
	}
echo "<td align='center' class='separator'>|</td>
<td align='center' style='width:auto'><a class='menutag' href='edit_partners.php' style='font-weight:bold'>Change Partners</a></td>
<td align='center' class='separator'>|</td>
<td align='center' style='width:auto'><a class='menutag' href='edit_corporate_partners.php' style='font-weight:bold'>Change Corporate Partners</a></td>
<td align='center' class='separator'>|</td>
<td align='center' style='width:auto'><a class='menutag' href='new_object.php' style='font-weight:bold'>New Object</a></td>
<td align='center' class='separator'>|</td>
<td align='center' style='width:auto'><a class='menutag' href='other_operations.php' style='font-weight:bold'>Others</a></td>";
}
if($row['user_group'] == 'admin'){
	echo"<td align='center' class='separator'>|</td>
<td align='center' style='width:auto'><a class='menutag' href='regform.php' style='font-weight:bold'>New User</a></td>
</tr>";
}

?>
</table>
</td>
</tr>
</table>
<br />
<div id="displayer" style="width:300">
<?php
include("conn.php");
$query = "select top 1 SERNUMBER from tblBNames order by SERNUMBER desc";
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
New Business Names Filing
</legend>
<table style="font-family:cambria; font-size:13px; color:#333333" width="auto" height="auto" cellpadding="4" cellspacing="1">
<!------------------------------------------------------------------------------------------------------>
<tr>
<td colspan="4" style="color:#900; font-size: 13px; font-weight: bold;"  align="center"> Fields With Asterix (*) Denote Mandatory Fields</td>
</tr>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="av_font">*Availability Code:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
<input type="text" id="availCode" style="width:200px;" maxlength="100"/>
</td>
<td align="left">Entry Number:
</td>
<td align="left"><input  disabled="disabled" type="text" value="<?php echo $data[0]; ?>" id="entryNo2" style="background-color:#f5f5f5;width:50px;" maxlength="100"/>
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
<input type="text" id="receiptNo" style="width:200px;" maxlength="100"/>
</td>
<td align="left"><font id="os_font">*Originating Branch:</font>
</td>
<td align="left"><select id="stateCode"  style="width:180px;">
  <option value=""></option>
  <?php 
//sqlsrv_close($conn);
include("conn.php");
$querys="SELECT StateCode, State FROM tblStates";
$results = sqlsrv_query($conn,$querys);
$patterns = "/'/";
$replacements = "''";
while($rows = sqlsrv_fetch_array($results)) 
  { ?>
  <option value="<?php echo preg_replace($patterns,$replacements,$rows[0]);?>" >
  <?php echo preg_replace($patterns,$replacements,$rows[1]);?> </option>
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
<input readonly="readonly" type="text" id="datePaid" style="width:200px;" />
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
<input type="text" id="approvedName" style="width:300px;" maxlength="150"/>
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
<input type="text" id="streetAddress" style="width:200px;" maxlength="100"/>
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
    <select id="state" name="state" style="width:200px;" onchange="getLgas(this.value)">
    <option value="">Choose a State..</option>
<?php 
sqlsrv_close($conn);
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
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="left">
<font id="lga_font">*Local Government Area:</font>
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
    <div id="loadLga" style="width:200px;">
    <select id="lga" name="lga" style="width:200px;">
    <option value=""></option>
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
<input type="text" id="town" style="width:200px;" maxlength="100"/>
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
    <select id="bnObject1" name="bnObject1" style="width:250px;">
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
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"> <?php echo preg_replace($pattern,$replacement,$row[0]);?> </option>
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
    <select id="bnObject2" name="bnObject2" style="width:250px;">
    <option value=" ">Choose Object...</option>
<?php 
sqlsrv_close($conn);
include("conn.php");
$query="SELECT business_objects FROM tblBizObjects ORDER BY business_objects";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"> <?php echo preg_replace($pattern,$replacement,$row[0]);?> </option>
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
    <select id="bnObject3" name="bnObject3" style="width:250px;">
    <option value=" ">Choose Object...</option>
<?php 
sqlsrv_close($conn);
include("conn.php");
$query="SELECT business_objects FROM tblBizObjects ORDER BY business_objects";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"> <?php echo preg_replace($pattern,$replacement,$row[0]);?> </option>
<?php } sqlsrv_close($conn); ?>
    </select>
</td>
</tr>
<!------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------>
<tr>
<td align="center" colspan="4">
<input style="font-family:cambria; font-size:13px; color:#333333" type="button" id="submitBnForm" value="Submit Form & Proceed >>" />
<input style="font-family:cambria; font-size:13px; color:#333333" type="reset" id="resetBnEntries" value="Reset Entries" /></td>
</tr>
</table>
<br />
<br />
<div id="hoto">
</div>
</fieldset>
</div>
</center>
<div id="footer">
</div>
</div>
</body>
</html>