<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/change_of_bn_js.js"></script>
<center>
<?php
include("conn.php");
$flag = $_REQUEST["flag"];
if($flag == "avc")
{
$avCode = $_REQUEST["input"];
$query="Select BUS_NAME From tblBNames Where AV_CODE = '$avCode'";
$result = sqlsrv_query($conn,$query);
	if( sqlsrv_has_rows($result) )
	{
		$data = sqlsrv_fetch_array($result);?>
  <table style="font-family:cambria; font-size:13px; color:#333333" height="auto" cellpadding="2" cellspacing="1">
    <tr>
      <td width="223" align="right"><font id="conFont1">Availability Code:</font></td>
      <td width="200" align="left">
      <input type="text" id="bnAVC" style="width:200px; background-color:#eee" disabled="disabled" value="<?php echo $avCode; ?>" />
      </td>
    </tr>
    <tr>
      <td align="right"><font id="conFont2">Business Name:</font></td>
      <td align="left">
      <input type="text" id="bnCon" style="width:200px" value = "<?php echo $data[0]; ?>" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2">
      <input type="submit" id="submitCon" style="font-family:cambria; font-size:13px; color:#333333" /></td>
    </tr>
  </table>
<?php	}
	else
	{
		echo "No Record Available For This Entry. Please Try Again.";
	}
}

else if($flag == "rc")
{
$RCno = $_REQUEST["input"];
$query="Select BUS_NAME From tblBNames Where RC = '$RCno'";
$result = sqlsrv_query($conn,$query);
	if( sqlsrv_has_rows($result) )
	{
		$data = sqlsrv_fetch_array($result);?>
  <table style="font-family:cambria; font-size:13px; color:#333333; width:400px" height="auto" cellpadding="2" cellspacing="1">
    <tr>
      <td width="223" align="right"><font id="conFont1">BN Registration Number:</font></td>
      <td width="200" align="left">
<input type="text" id="bnRCNo" style="width:200px; background-color:#eee" disabled="disabled" value="<?php echo $RCno; ?>" />
      </td>
    </tr>
    <tr>
      <td align="right"><font id="conFont2">Business Name:</font></td>
      <td align="left">
      <input type="text" id="bnCon" style="width:200px" value = "<?php echo $data[0]; ?>" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2">
      <input type="submit" id="submitCon" style="font-family:cambria; font-size:13px; color:#333333" /></td>
    </tr>
  </table>
<?php	}
	else
	{
		echo "No Record Available For This Entry. Please Try Again.";
	}
}
else
{
	echo "Parsing Error. Please Contact Software Administrator.";
}
?>
<div id="updateLoad1">
</div>
</center>