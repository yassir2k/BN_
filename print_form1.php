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
<link rel="stylesheet" type="text/css" href="css/bn_css.css"/>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/edit_partners.js"></script>
<title>Business Names Template :: Edit Partners</title>
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
<td align="center" style="width:auto"><a class="selected" href="print_form1.php">Form BN 1</a></td>
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
<fieldset style="width:880px; background-color:#f5f5f5">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#003300; font-weight:bold">Availlability Code:
</legend>

<form method="post" action="form1.php">
<table style="font-family:cambria; font-size:13px; color:#333333" width="auto" height="auto" cellpadding="4" cellspacing="1">
<tr>
<td align="right">&nbsp;</td>
<td align="left">
<input type="text" name="avcode" style="width:200px" />
</td>
</tr>
<tr>
<td colspan="2" align="right">
<input type="submit" value="Generate" style="font-family:cambria; font-size:13px; color:#333333" />
</td>
</tr>
<tr>
<td colspan="2"></td>
</tr>
</table>
</form>

<div id="partnersTable">
</div>
<div id="loadPartnersTable">
</div>
</fieldset>
</center>
<div id="footer">
</div>
</div>
</body>
</html>