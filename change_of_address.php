<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/change_of_address_js.js"></script>
<center>
<?php
include("conn.php");
$flag = $_REQUEST["flag"];
if($flag == "avc")
{
$avCode = $_REQUEST["input"];
$query="Select STATE_ADDRESS, AREA_ADDRESS, TOWN_ADDRESS, STREET_ADDRESS From tblBNames Where AV_CODE = '$avCode'";
$result = sqlsrv_query($conn,$query);
	if( sqlsrv_has_rows($result) )
	{
		$data = sqlsrv_fetch_array($result);?>
<table id="tbl2" style="font-family:cambria; font-size:13px; color:#333333" width="434" height="auto" cellpadding="2" cellspacing="1">
  <tr>
    <td width="223" align="right">Availability Code:</td>
    <td width="200" align="left">
    <input type="text" id="bnAVC_coa" style="width:200px; background-color:#eee" disabled="disabled" value="<?php echo $avCode;?>" />
    </td>
  </tr>
  <tr>
    <td align="right">State:</td>
    <td align="left">
    <select name="bnState" style="width:200px;" id="bnState" onchange="getLgas(this.value)">
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
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[0]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[1]);?></option>
<?php } ?>
    </select>
    </td>
  </tr>
  <tr>
    <td align="right">Local Government Area (LGA):</td>
    <td align="left">
    <div id="loadLga" style="width:200px;">
    <select id="lga" style="width:200px;">
    <option value=""></option>
<?php 
sqlsrv_close($conn);
include("conn.php");
$query2="SELECT lga FROM tbl_lga WHERE state = '$data[0]'";
$results = sqlsrv_query($conn,$query2);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($results)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[1]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
<?php } ?>
    </select>
    </div>
    </td>
  </tr>
  <tr>
    <td align="right"><font id="coaFont2">Town:</font></td>
    <td align="left"><input type="text" id="bnTown" style="width:200px" value="<?php echo $data[2];?>" /></td>
  </tr>
  <tr>
    <td align="right"><font id="coaFont1">Street Address:</font></td>
    <td align="left"><input type="text" id="bnStreet" style="width:200px" value="<?php echo $data[3];?>" /></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><input type="submit" id="submitCoa" style="font-family:cambria; font-size:13px; color:#333333" /></td>
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
$RC = $_REQUEST["input"];
$query="Select RC, STATE_ADDRESS, AREA_ADDRESS, TOWN_ADDRESS, STREET_ADDRESS From tblBNames Where RC = '$RC'";
$result = sqlsrv_query($conn,$query);
	if( sqlsrv_has_rows($result) )
	{
		$data = sqlsrv_fetch_array($result);?>
<table id="tbl2" style="font-family:cambria; font-size:13px; color:#333333" width="434" height="auto" cellpadding="2" cellspacing="1">
  <tr>
    <td width="223" align="right">BN Registration Number:</td>
    <td width="200" align="left">
    <input type="text" id="bnRC_coa" style="width:200px; background-color:#eee" disabled="disabled" value="<?php echo $data[0];?>" />
    </td>
  </tr>
  <tr>
    <td align="right">State:</td>
    <td align="left">
    <select name="bnState" style="width:200px;" id="bnState" onchange="getLgas(this.value)">
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
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[1]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[1]);?></option>
<?php } ?>
    </select>
    </td>
  </tr>
  <tr>
    <td align="right">Local Government Area (LGA):</td>
    <td align="left">
    <div id="loadLga" style="width:200px;">
    <select id="lga" style="width:200px;">
    <option value=""></option>
<?php 
sqlsrv_close($conn);
include("conn.php");
$query2="SELECT lga FROM tbl_lga WHERE state = '$data[1]'";
$results = sqlsrv_query($conn,$query2);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($results)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[2]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
<?php } ?>
    </select>
    </div>
    </td>
  </tr>
  <tr>
    <td align="right"><font id="coaFont2">Town:</font></td>
    <td align="left"><input type="text" id="bnTown" style="width:200px" value="<?php echo $data[3];?>" /></td>
  </tr>
  <tr>
    <td align="right"><font id="coaFont1">Street Address:</font></td>
    <td align="left"><input type="text" id="bnStreet" style="width:200px" value="<?php echo $data[4];?>" /></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><input type="submit" id="submitCoa" style="font-family:cambria; font-size:13px; color:#333333" /></td>
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
}?>
<div id="updateLoad2">
</div>
</center>