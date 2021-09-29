<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/partners_formjs.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
</head>

<body>
<center>
<?php
$partners = $_REQUEST["num_of_partners"];
$avc = $_REQUEST["avc"];
for($i = 0; $i < $partners; $i++)
{?>
<input type="hidden" value="<?php echo $partners; ?>" id="hideen_no" />
<fieldset style="width:800px; background-color:#f5f5f5">
<legend align="center" style="font-size:20px; font-family:Cambria; color:#006600; font-weight:bold">
Partner <?php echo $i+1; ?>
</legend>
<table style="font-family:cambria; font-size:13px; color:#333333" width="auto" height="auto" cellpadding="4" cellspacing="1">
<tr>
<td align="left" width="400"> <!-- Left -->
<table>
<tr>
<td align="left"><font id ="ac_<?php echo $i+1; ?>">Availability Code</font></td>
<td align="left">
<input disabled="disabled" type="text" id="availCode_<?php echo $i+1;?>" style="background-color:#f5f5f5;width:200px;" value="<?php echo $avc;?>"/>
</td>
</tr>
<tr>
<td align="left"><font id ="pn_<?php echo $i+1; ?>">Partner's Name</font></td>
<td align="left"><input type="text" id="name_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="fn_<?php echo $i+1; ?>">Former Name</font></td>
<td align="left"><input type="text" id="fname_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="ps_<?php echo $i+1; ?>">Partner's Sex</font></td>
<td align="left">
    <select id="sex_<?php echo $i+1;?>" style="width:50px;">
    <option value=""></option>
    <option value="F">F</option>
    <option value="M">M</option>
    </select>
</td>
</tr>
<tr>
<td align="left"><font id ="occ_<?php echo $i+1; ?>">Occupation</font></td>
<td align="left"><input type="text" id="occupation_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
</table>
</td>
<td align="right" width="400"> <!-- Right -->
<table>
<tr>
<td align="left"><font id ="nat_<?php echo $i+1; ?>">Nationality</font></td>
<td align="left">
    <select id="nationality_<?php echo $i+1; ?>" style="width:200px;">
    <option value="">Select a Country...</option>
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
<td align="left"><font id ="nsr_<?php echo $i+1; ?>">Nigerian State Of Residence</font></td>
<td align="left">
    <select id="state_<?php echo $i+1;?>" style="width:200px;" onchange="getLgas(this.value,<?php echo $i+1; ?>)">
    <option value="">Choose a State...</option>
<?php 
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
<td align="left"><font id ="nlr_<?php echo $i+1; ?>">Nigerian L.G.A Of Residence</font></td>
<td align="left">
    <div id="loadLga_<?php echo $i+1;?>" style="width:200px;">
    <select id="lga_<?php echo $i+1;?>" style="width:200px;">
    <option value=""></option>
    </select>
    </div>
</td>
</tr>
<tr>
<td align="left"><font id ="tor_<?php echo $i+1; ?>">Town Of Residence</font></td>
<td align="left"><input type="text" id="town_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
<tr>
<td align="left"><font id ="sa_<?php echo $i+1; ?>">Street Address</font></td>
<td align="left"><input type="text" id="street_<?php echo $i+1;?>" style="width:200px;" maxlength="100"/></td>
</tr>
</table>
</td>
</tr>
</table>
</fieldset> 
<?php } 
if(($partners > 0) && ($partners!=""))
{ ?>
<input id="submitPartners" value="Proceed >>" type="submit" style="font-family:cambria; font-size:13px; color:#333333">
<input id="bnResetPartners" type="reset" value="Reset" style="font-family:cambria; font-size:13px; color:#333333"/>
<?php }?>
<p> <div id="hoto"></div>
</center>
</body>
</html>