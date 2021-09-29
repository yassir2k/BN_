<?php
include("conn.php");
$query="SELECT business_objects FROM tblBizObjects";
$result = sqlsrv_query($conn,$query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
session_start();
if ($_SESSION['user'] == null)
{
	header("Location: login_page.php");
}
$user = $_SESSION['user'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bn_css.css"/>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/operationsjs.js"></script>
<title>Change Of Name</title>
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
<td class="tdb" align="center" style="width:auto"><a class="menutag"  href="index.php">File New BN</a>
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
<td align='center' style='width:auto'><a class='selected' href='other_operations.php' style='font-weight:bold'>Others</a></td>";
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
<fieldset style="width:880px; background-color:#f5f5f5">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#003300; font-weight:bold">
Post Registration Operations
</legend>
<table width="200" style="font-family:cambria; font-size:13px; color:#333333">
  <tr>
    <td align="left"><label>
      <input type="radio" name="operation" value="con" id="operation_0" />
      Change Of Name</label></td>
  </tr>
  <tr>
    <td align="left"><label>
      <input type="radio" name="operation" value="coa" id="operation_1" />
      Change Of Address</label></td>
  </tr>
  <tr>
    <td align="left"><label>
      <input type="radio" name="operation" value="coo" id="operation_2" />
      Change Of Objects</label></td>
  </tr>
  <tr>
    <td align="left"><label>
      <input type="radio" name="operation" value="cop" id="operation_3" />
      Winding Up Business Name</label></td>
  </tr>
</table>
<br />
<!--------------------------------------------------------------------------------------------------------------------------->
<fieldset style="width:800px; background-color:#f5f5f5" id="one" >
<legend align="left" style="font-size:20px; font-family:Cambria; color:#003300; font-weight:bold">
Change Of Business Name
</legend>
<table style="font-family:cambria; font-size:13px; color:#333333" width="439" height="auto" cellpadding="4" cellspacing="1">
<tr>
<td width="220" align="right">
<select id="bN" name="bN" style="font-family:cambria; font-size:13px; color:#333333" >
<option value="">Choose Search Input...</option>
<option value="AV Code">Availability Code</option>
<option value="RC Number">RC Number</option>
</select>
</td>
<td width="200" align="left"><input type="text" id="conFieldBox" style="width:200px" /></td>
<td align="left">
<div title="Missing Entry" id="conErr" style="color:#F00; font-family:Arial; font-weight:bold; font-size:13px">*</div>
</td>
</tr>
<tr>
<td colspan="3" align="right">
<input type="button" id="searchCon" value="Search" style="font-family:cambria; font-size:13px; color:#333333" />
</td>
</tr>
</table>
<br />
<div id="conTblLoad">
</div>
</fieldset>
<!--------------------------------------------------------------------------------------------------------------------------->
<fieldset style="width:800px; background-color:#f5f5f5" id="two">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#003300; font-weight:bold">
Change Of Address
</legend>
<table style="font-family:cambria; font-size:13px; color:#333333" width="439" height="auto" cellpadding="4" cellspacing="1">
<tr>
<td width="220" align="right"><select name="bCoa" id="bCoa" style="font-family:cambria; font-size:13px; color:#333333">
<option value="">Choose Search Input...</option>
<option value="AV Code">Availability Code</option>
<option value="RC Number">RC Number</option>
</select></td>
<td width="198" align="left">
<input type="text" id="coaFieldBox" style="width:200px" />
</td>
<td align="left">
<div title="Missing Entry" id="coaErr" style="color:#F00; font-family:Arial; font-weight:bold; font-size:13px">*</div>
</td>
</tr>
<tr>
<td colspan="3" align="right">
<input type="button" id="searchCoa" value="Search" style="font-family:cambria; font-size:13px; color:#333333" />
</td>
</tr>
</table>
<br />
<div id="coaTblLoad">
</div>
</fieldset>
<!--------------------------------------------------------------------------------------------------------------------------->
<fieldset style="width:800px; background-color:#f5f5f5" id="three">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#003300; font-weight:bold">
Change Of Objects
</legend>
<table style="font-family:cambria; font-size:13px; color:#333333" width="439" height="auto" cellpadding="4" cellspacing="1">
<tr>
<td width="220" align="right">
<select id="bCoo" style="font-family:cambria; font-size:13px; color:#333333">
<option value="">Choose Search Input...</option>
<option value="AV Code">Availability Code</option>
<option value="RC Number">RC Number</option>
</select>
</td>
<td width="198" align="left">
<input type="text" id="cooFieldBox" style="width:200px" />
</td>
<td align="left">
<div title="Missing Entry" id="cooErr" style="color:#F00; font-family:Arial; font-weight:bold; font-size:13px">*</div>
</td>
</tr>
<tr>
<td colspan="3" align="right">
<input type="button" id="searchCoo" value="Search" style="font-family:cambria; font-size:13px; color:#333333" />
</td>
</tr>
</table>
<br />
<div id="updateLoad3">
</div>
<div id="cooTblLoad">
</div>
</fieldset>
<!--------------------------------------------------------------------------------------------------------------------------->
<fieldset style="width:800px; background-color:#f5f5f5" id="four">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#003300; font-weight:bold">
Wind Up Business Name
</legend>
<table style="font-family:cambria; font-size:13px; color:#333333" width="439" height="auto" cellpadding="4" cellspacing="1">
<tr>
<td width="220" align="right">
<select id="bWind" style="font-family:cambria; font-size:13px; color:#333333">
<option value="">Choose Search Input...</option>
<option value="AV Code">Availability Code</option>
<option value="RC Number">RC Number</option>
</select>
</td>
<td width="198" align="left">
<input type="text" id="wucFieldBox" style="width:200px" />
</td>
</tr>
<tr>
<td colspan="3" align="right">
<input type="button" id="searchWuc" value="Search" style="font-family:cambria; font-size:13px; color:#333333" />
</td>
<td align="left">
<div title="Missing Entry" id="wucErr" style="color:#F00; font-family:Arial; font-weight:bold; font-size:13px">*</div>
</td>
</tr>
</table>
<br />
<table style="font-family:cambria; font-size:13px; color:#333333" width="500" height="auto" cellpadding="2" cellspacing="1">
<tr>
<td align="center" colspan="2">
<input type="submit" value="Wind Up Company" id="submitWup" style="font-family:cambria; font-size:13px; color:#333333" />
</td>
</tr>
</table>
<div id="cooTblLoad">
</div>
</fieldset>
<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->
</fieldset>
</center>
<div id="footer">
</div>
</div>
</body>
</html>