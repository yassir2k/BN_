<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/change_of_obj_js.js"></script>
<center>
<?php
include("conn.php");
$flag = $_REQUEST["flag"];
if($flag == "avc")//Meaning Search Was Done Using Availability Code
{
	$avCode = $_REQUEST["input"];?>
	<input type="hidden" id="cooDetails" value="<?php echo $avCode; ?>" />
   <?php $query="Select LIN_BUS1, LIN_BUS2, LIN_BUS3 From tblBNames Where AV_CODE = '$avCode'";
    $result = sqlsrv_query($conn,$query);
	if( sqlsrv_has_rows($result) )
	{
		$data = sqlsrv_fetch_array($result);?>
        <table id="tbl3" style="font-family:cambria; font-size:13px; color:#333333" width="600" height="auto" cellpadding="2" cellspacing="1">
  <tr>
    <td width="221" align="right"><font id="cooFont1">*Change Of Object 1:</font></td>
    <td width="379" align="left">
    <select id="bnAVCObj1" style="width:370px; font-family:cambria; font-size:12px;">
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
      <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>" <?php if($data[0] == $row[0]){?> selected="selected" <?php } ?> > <?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td width="221" align="right"><font id="cooFont2">Change Of Object 2:</font></td>
    <td width="200" align="left">
    <select id="bnObj2" name="bnObj2" style="width:370px; font-family:cambria; font-size:12px;">
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
      <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>" <?php if($data[1] == $row[0]){?> selected="selected" <?php } ?> > <?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td width="221" align="right"><font id="cooFont3">Change Of Object 3:</font></td>
    <td width="200" align="left"><select id="bnObj3" name="bnObj3" style="width:370px; font-family:cambria; font-size:12px;">
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
      <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>" <?php if($data[2] == $row[0]){?> selected="selected" <?php } ?> > <?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><input type="submit" id="submitObj" style="font-family:cambria; font-size:13px; color:#333333" /></td>
  </tr>
</table>
     <?php }
     else
     {
		 echo "No Record Available For This Entry. Please Try Again.";
     }
}//End of Search Using AVC
else if($flag == "rc")//Meaning Search Was Done Using Company RC Number
{
	$RC = $_REQUEST["input"];
	$query="Select LIN_BUS1, LIN_BUS2, LIN_BUS3 From tblBNames Where RC = '$RC'";
    $result = sqlsrv_query($conn,$query);
	if( sqlsrv_has_rows($result) )
	{
		$data = sqlsrv_fetch_array($result);?>
        <input type="hidden" id="cooDetails" value="<?php echo $RC; ?>" />
        <table id="tbl3" style="font-family:cambria; font-size:13px; color:#333333" width="600" height="auto" cellpadding="2" cellspacing="1">
  <tr>
    <td width="221" align="right"><font id="cooFont1">*Change Of Object 1:</font></td>
    <td width="379" align="left">
    <select id="bnRCObj1" style="width:370px; font-family:cambria; font-size:12px;">
      <option value="">Choose Object...</option>
<?php 
sqlsrv_close($conn);
include("conn.php");
$query="SELECT business_objects FROM tblBizObjects";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
      <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>" <?php if($data[0] == $row[0]){?> selected="selected" <?php } ?> > <?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td width="221" align="right"><font id="cooFont2">Change Of Object 2:</font></td>
    <td width="200" align="left"><select id="bnObj2" name="bnObj2" style="width:370px; font-family:cambria; font-size:12px;">
      <option value="">Choose Object...</option>
      <?php 
sqlsrv_close($conn);
include("conn.php");
$query="SELECT business_objects FROM tblBizObjects";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
      <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>" <?php if($data[1] == $row[0]){?> selected="selected" <?php } ?> > <?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td width="221" align="right"><font id="cooFont3">Change Of Object 3:</font></td>
    <td width="200" align="left"><select id="bnObj3" name="bnObj3" style="width:370px; font-family:cambria; font-size:12px;">
      <option value="">Choose Object...</option>
      <?php 
sqlsrv_close($conn);
include("conn.php");
$query="SELECT business_objects FROM tblBizObjects";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
      <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>" <?php if($data[2] == $row[0]){?> selected="selected" <?php } ?> > <?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><input type="submit" id="submitObj" style="font-family:cambria; font-size:13px; color:#333333" /></td>
  </tr>
</table>
     <?php }
     else
     {
		 echo "No Record Available For This Entry. Please Try Again.";
     }
	
}//End Of Search Using Business Name
else
{
	echo "Parsing Error. Please Contact Software Administrator.";
}
?>
<div id="updateLoad3">
</div>
</center>