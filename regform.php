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
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/verification_table_js.js"></script>
<title>Verification Table</title>
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
<td align='center' style='width:auto'><a class='menutag' href='other_operations.php' style='font-weight:bold'>Others</a></td>";
}
if($row['user_group'] == 'admin'){
	echo"<td align='center' class='separator'>|</td>
<td align='center' style='width:auto'><a class='selected' href='regform.php' style='font-weight:bold'>New User</a></td>
</tr>";
}

?>
</table>
</td>
</tr>
</table>
<br />
<form action="insertuser.php" method="post">
<fieldset style="width:880px; background-color:#f5f5f5">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#003300; font-weight:bold">
New User Registration
</legend>
<table width="409" border="0" style="font-family:cambria; font-size:13px; color:#333333;" >
  <tr>
  	<td width="36">&nbsp;</td>
    <td width="161"><strong>User Name:</strong></td>
    <td width="161"><input type="text" name="Uname" id="Uname" /></td>
  	<td width="12">&nbsp;</td>    
  </tr>
  <tr>
  	<td>&nbsp;</td>  
    <td><strong>New Password:</strong></td>
    <td><input type="password" name="Pword1" id="Pword1" /></td>
  	<td>&nbsp;</td>    
  </tr>
  <tr>
  	<td>&nbsp;</td>  
    <td><strong>Confirm New Password:</strong></td>
    <td><input type="password" name="Pword2" id="Pword2" /></td>
  	<td>&nbsp;</td>    
  </tr>
  
  <tr>
  	<td>&nbsp;</td>  
    <td align="left"><strong>User Type:</strong></td>
    <td align="left">
      <select name="UserType" id="select">
      <option value="">Select...</option>
      <option value="pre_user">Pre Incorporation</option>
      <option value="post_user">Post Incorporation</option>
      <option value="power_user">Power User</option>
      </select></td>
  	<td>&nbsp;</td>      
  </tr>
  
  
  <tr>
  	<td>&nbsp;</td>  
    <td><strong>State:</strong></td>
    <td><select id="state" name="state">
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
    </select></td>
  	<td>&nbsp;</td>    
  </tr>
  
  <tr>
  	<td>&nbsp;</td>  
    <td colspan="2" align="center">
    <input name="" type="submit" value="Register" style="font-family:cambria; font-size:13px; color:#333333"/>
    </td>
  	<td>&nbsp;</td>    
  </tr>
</table>
</fieldset>
</form>
<br />
<br />
</center>
</div>
<div id="footer">
</div>
</body>
</html>