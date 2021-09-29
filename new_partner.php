<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/new_partner_js.js"></script>
<title>Untitled Document</title>
</head>

<body>
<center>
<div id="base">
<?php
$pattern = "/'/";
$replacement = "''";
$id = preg_replace($pattern,$replacement,$_REQUEST["id"]);
?>
<br />
<fieldset style="width:800px; background-color:#f5f5f5">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#006600; font-weight:bold">
New Partner
</legend>
<table style="font-family:cambria; font-size:13px; color:#333333" width="auto" height="auto" cellpadding="4" cellspacing="1">
<tr>
<td align="left" width="400"> <!-- Left -->
<table>
<tr>
<td align="left"><font id ="ac">Availability Code</font></td>
<td align="left">
<input type="text" id="availCode" value="<?php echo $id; ?>" style="background-color:#f5f5f5;width:200px;" disabled="disabled" />
</td>
</tr>
<tr>
<td align="left"><font id ="pn">Partner's Name</font></td>
<td align="left"><input type="text" id="name" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="fn">Former Name</font></td>
<td align="left"><input type="text" id="fname" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="ps">Partner's Sex</font></td>
<td align="left">
    <select id="sex" style="width:50px;">
    <option value=""></option>
    <option value="F">F</option>
    <option value="M">M</option>
    </select>
</td>
</tr>
<tr>
<td align="left"><font id ="occ">Occupation</font></td>
<td align="left"><input type="text" id="occupation" style="width:200px;" maxlength="100"/></td>
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
include("conn.php");
$query="SELECT CountryName FROM tblCountries";
$result = sqlsrv_query($conn,$query);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($result)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>">
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
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"  >
	<?php echo preg_replace($pattern,$replacement,$row[1]);?>
    </option>
<?php } ?>
    </select>
</td>
</tr>
<tr>
<td align="left"><font id ="nlr">Nigerian L.G.A Of Residence</font></td>
<td align="left">
<div id="loadLga">
    <select id="lga" name="lga" style="width:200px;">
    <option value=""></option>
    </select>
    </div>
</td>
</tr>
<tr>
<td align="left"><font id ="tor">Town Of Residence</font></td>
<td align="left"><input type="text" id="town" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="sa">Street Address</font></td>
<td align="left"><input type="text" id="street" style="width:200px;" maxlength="100"/></td>
</tr>
</table>
</td>
</tr>
</table>
<input id="addPartners" value="Add Partner" type="submit" style="font-family:cambria; font-size:13px; color:#333333" />
<input id="closeForm" type="button" value="Close Form" style="font-family:cambria; font-size:13px; color:#333333"/>
<div id="hoto">
</div>
</fieldset>
</div>
</center>
</body>
</html>