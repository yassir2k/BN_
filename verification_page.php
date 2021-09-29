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
<td class="tdb" align="center" style="width:auto"><a class="selected"  href="dashboard.php">Dashboard</a>
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
<td align='center' style='width:auto'><a class='menutag' href='regform.php' style='font-weight:bold'>New User</a></td>
</tr>";
}

?>
</table>
</td>
</tr>
</table>
<br />
<table id="verificationTbl" style="font-family:cambria; font-size:12px; color:#333333" width="900" height="auto" cellpadding="4" cellspacing="1">
<tr bgcolor="#336600" style="font-size:12px; color:#FFF; font-weight:bold">
<td align="left" width="20">ID</td>
<td align="left" width="95">Availability Code</td>
<td align="left" width="200">Business Name</td>
<td align="left" width="65">Receipt No.</td>
<td align="left" width="190">Pay Date</td>
<td align="left" colspan="4" width="330">Actions</td>
</tr>
<?php
include("conn.php");
$avc = $_REQUEST['avc'];
    $query = "SELECT SERNUMBER, AV_CODE, BUS_NAME, RECEIPT_NO, PAY_DATE, STATE_ADDRESS, STATE_CODE FROM tblBNames WHERE AV_CODE ='$avc' ";
	$result = sqlsrv_query($conn,$query);
	if(sqlsrv_has_rows($result))
	{
		$i=0;
		while($data = sqlsrv_fetch_array($result)) {
?>
<tr id="<?php echo $data[0]; ?>" name="<?php echo $data[1]; ?>" style="font-size:12px; color:#360; font-weight:bold; background-color:#FFF">
<td align="left" style="border:1px solid #336600"><?php echo $data[0]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo $data[1]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo $data[2]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo $data[3]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo $data[4]; ?></td>
<td align="left" style="border:1px solid #336600">
<a  href="#" class="edit_entries">BN</a>
</td>
<td align="left" style="border:1px solid #336600">
<a  href="#" class="edit_partners">Partners</a>
</td>
<td align="left" style="border:1px solid #336600">
<a  href="#" class="edit_corporate">Corporate</a>
</td>
<td align="left" style="border:1px solid #336600">
<?php
$branch = $data[6];
$x ='pre_user';
$y ='pre';
$sc = $data[5];
echo "<a  href='routing.php?avc=$avc&sc=$branch&opr=$y&grp=$x'>Send</a>";
?>
</td>
</tr><input type="hidden" id="avCode" value= "<?php echo $data[1]; ?>" />
<?php }
  $i++;
		   }
else
{
	?>
    <tr style="font-size:12px; font-family:Cambria; color:#360; font-weight:bold; background-color:#FFF">
    <td colspan="9"  align="center" style="border:1px solid #336600;">
      !!! No Data Found/Empty Entry !!!
      </td>
     </tr>
  <?php
}
sqlsrv_close($conn);
?>
</table>
<br />
<div id="entries">
</div>
</center>
<div id="footer">
</div>
</div>
</body>
</html>