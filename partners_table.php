<?php
include("conn.php");
$flag = $_REQUEST["flag"];
$id = $_REQUEST["id"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bn_css.css"/>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/partners_table_js.js"></script>
<title>Partner's Table</title>
</head>

<body>
<center>
<?php
if($flag == NULL )
{
	echo "Unsuccessful Data Parsing. Please Try Again";
}
else
{
	if($flag == "avc")
	{
		?>
    <table id="operationTbl" style="font-family:cambria; font-size:13px; color:#333333" width="880" height="auto" cellpadding="4" cellspacing="1">
        <tr bgcolor="#336600" style="font-size:13px; color:#FFF; font-weight:bold">
        <td align="left">ID</td>
        <td align="left">Availability Code</td>
        <td align="left">Partner's Name</td>
        <td align="left">Sex</td>
        <td align="left">Nationality</td>
        <td align="left" colspan="2">Actions</td>
        </tr>
        <?php
		$query = "SELECT ID, AV_CODE, PARTNERS_NAME, SEX, NATIONALITY FROM tblPartners WHERE AV_CODE = '$id' AND RC is NULL";
		$result = sqlsrv_query($conn,$query);
		if(sqlsrv_has_rows($result))
		{
			$i=0;
			while($data = sqlsrv_fetch_array($result)) {
		?>
		<tr id="<?php echo $data[0]; ?>" style="font-size:12px; color:#360; font-weight:bold; background-color:#FFF">
		<td align="left" style="border:1px solid #336600"><?php echo $data[0]; ?></td>
		<td align="left" style="border:1px solid #336600"><?php echo $data[1]; ?></td>
		<td align="left" style="border:1px solid #336600"><?php echo $data[2]; ?></td>
		<td align="left" style="border:1px solid #336600"><?php echo $data[3]; ?></td>
		<td align="left" style="border:1px solid #336600"><?php echo $data[4]; ?></td>
		<td align="left" style="border:1px solid #336600"><a  href="#" class="edit">Edit</a></td>
		<td align="left" style="border:1px solid #336600"><a onclick="showDelete(<?php echo "'".$data[0]."'"; ?>)" href="#" class="delete">Delete</a></td>
		</tr>
		<?php }
		  $i++;
				   }
		else
		{
			?>
			<tr style="font-size:12px; font-family:Cambria; color:#360; font-weight:bold; background-color:#FFF">
			<td colspan="7"  align="center" style="border:1px solid #336600;">
			  !!! No Data/Entry found for the AV Code <?php echo $id; ?>!!!
			  </td>
			 </tr>
		  <?php
		}
	}//End Of Search Using Code
	else//Meaning Search Using BN RC Number.................................................................................
	{
				?>
    <table id="operationTbl" style="font-family:cambria; font-size:13px; color:#333333" width="880" height="auto" cellpadding="4" cellspacing="1">
        <tr bgcolor="#336600" style="font-size:13px; color:#FFF; font-weight:bold">
        <td align="left">ID</td>
        <td align="left">BN RC Number</td>
        <td align="left">Partner's Name</td>
        <td align="left">Sex</td>
        <td align="left">Nationality</td>
        <td align="left" colspan="2">Actions</td>
        </tr>
        <?php
		sqlsrv_close($conn);
		include("conn.php");
		$query = "SELECT ID, AV_CODE, PARTNERS_NAME, SEX, NATIONALITY, RC FROM tblPartners WHERE RC = '$id'";
		$result = sqlsrv_query($conn,$query);
		if(sqlsrv_has_rows($result))
		{
			$i=0;
			while($data = sqlsrv_fetch_array($result)) {
		?>
		<tr id="<?php echo $data[0]; ?>" style="font-size:12px; color:#360; font-weight:bold; background-color:#FFF">
		<td align="left" style="border:1px solid #336600"><?php echo $data[0]; ?></td>
		<td align="left" style="border:1px solid #336600"><?php echo $data[5]; $id = $data[1];?></td>
		<td align="left" style="border:1px solid #336600"><?php echo $data[2]; ?></td>
		<td align="left" style="border:1px solid #336600"><?php echo $data[3]; ?></td>
		<td align="left" style="border:1px solid #336600"><?php echo $data[4]; ?></td>
		<td align="left" style="border:1px solid #336600"><a  href="#" class="edit">Edit</a></td>
		<td align="left" style="border:1px solid #336600"><a onclick="showDelete(<?php echo "'".$data[0]."'"; ?>)" href="#" class="delete">Delete</a></td>
		</tr>
		<?php }
		  $i++;
				   }
		else
		{
			?>
			<tr style="font-size:12px; font-family:Cambria; color:#360; font-weight:bold; background-color:#FFF">
			<td colspan="7"  align="center" style="border:1px solid #336600;">
			  !!! No Data Found/Empty Entry !!!
			  </td>
			 </tr>
		  <?php
		}
	}//End Of Search Using Name
}
sqlsrv_close($conn);
?>
</table>
<br />
<input id="addPartner" type="button" value="Add a new Partner" style="font-family:cambria; font-size:12px; color:#333" />
<div id="show">
</div>
<input type="hidden" id="avCode" value= "<?php echo $id; ?>" />
</body>
</html>