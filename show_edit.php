<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/show_edit_js.js"></script>
<title>Untitled Document</title>
</head>

<body>
<center>
<div id="base_">
<br />
<fieldset style="width:800px; background-color:#f5f5f5">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#006600; font-weight:bold">
Edit Partner
</legend>
<?php
include("conn.php");
$a = $_REQUEST["id"];
if($a == null)
{
	echo "Identity Couldn't Be Retrieved";
}
else
{
?>
<table style="font-family:cambria; font-size:13px; color:#333333" width="auto" height="auto" cellpadding="4" cellspacing="1">
<tr>
<td align="left" width="400"> <!-- Left -->
<table>
<tr>
<?php
$query = "SELECT ID, AV_CODE, PARTNERS_NAME, FORMER_NAME, SEX, OCCUPATION, NATIONALITY, STATE_ADDR, LGA, TOWN_ADDR, STREET_ADDR";
$query.=" FROM tblPartners WHERE ID = '$a'";
$result = sqlsrv_query($conn,$query);
if(sqlsrv_has_rows($result))
{
	$i=0;
	while($data = sqlsrv_fetch_array($result)) {
?>
<td align="left"><font id ="ac">Availability Code</font></td>
<td align="left">
<input type="hidden" value="<?php echo $data[0]; ?>" id="hidden" />
<input disabled="disabled" type="text" id="availCode" style="background-color:#f5f5f5;width:200px;" value="<?php echo $data[1]; ?>"/>
</td>
</tr>
<tr>
<td align="left"><font id ="pn">Partner's Name</font></td>
<td align="left"><input type="text" id="name" style="width:200px;" maxlength="100" value="<?php echo $data[2]; ?>"/></td>
</tr>
<tr>
<td align="left"><font id ="fn">Former Name</font></td>
<td align="left"><input type="text" id="fname" style="width:200px;" maxlength="100" value="<?php echo $data[3]; ?>" /></td>
</tr>
<tr>
<td align="left"><font id ="ps">Partner's Sex</font></td>
<td align="left">
    <select id="sex" style="width:50px;">
    <option value=""></option>
    <?php if( $data[4] == "F")
	{?>
    <option value="F" selected="selected">F</option>
    <option value="M">M</option>
	<?php }
	else
	{?>
    <option value="M" selected="selected">M</option>
    <option value="F">F</option>
	<?php }?>
    </select>
</td>
</tr>
<tr>
<td align="left"><font id ="occ">Occupation</font></td>
<td align="left"><input value="<?php echo $data[5]; ?>" type="text" id="occupation" style="width:200px;" maxlength="100"/></td>
</tr>
</table>
</td>
<td align="right" width="400"> <!-- Right -->
<table>
<tr>
<td align="left"><font id ="nat">Nationality</font></td>
<td align="left">
    <select id="nationality" style="width:200px;">
    <option value=""></option>
<?php 
sqlsrv_close($conn);
include("conn.php");
$query="SELECT CountryName FROM tblCountries";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[6]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
<?php } ?>
    </select>
</td>
</tr>
<tr>
<td align="left"><font id ="nsr">Nigerian State Of Residence</font></td>
<td align="left">
<select id="state" style="width:200px;" onchange="getLgas(this.value)">
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
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[7]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[1]);?></option>
<?php } ?>
    </select>
</td>
</tr>
<tr>
<td align="left"><font id ="nlr">Nigerian L.G.A Of Residence</font></td>
<td align="left">
<div id="loadLga" style="width:200px;">
    <select id="lga" style="width:200px;">
    <option value=""></option>
<?php 
$query2="SELECT lga FROM tbl_lga WHERE state = '$data[7]'";
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
</tr>
<tr>
<td align="left"><font id ="tor">Town Of Residence</font></td>
<td align="left"><input value="<?php echo $data[9]; ?>" type="text" id="town" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="sa">Street Address</font></td>
<td align="left"><input type="text" id="street" style="width:200px;" maxlength="100" value="<?php echo $data[10]; ?>"/></td>
</tr>
</table>
</td>
<?php
	}?>
</tr>
</table>
<?php }} ?>
<input id="update" value="Update" type="submit" style="font-family:cambria; font-size:13px; color:#333333" />
<input id="close" type="button" value="Close Form" style="font-family:cambria; font-size:13px; color:#333333" />
<div id="hoto">
</div>
</fieldset>
</div>
</center>
</body>
</html>