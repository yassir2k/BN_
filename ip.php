<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/invoke_partners_js.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
</head>

<body>
<center>
<div id="cover">
<?php
include("conn.php");
$avc = $_REQUEST['avc'];

$query = "SELECT count (*) FROM tblPartners WHERE AV_CODE = $avc";
$result = sqlsrv_query($conn,$query);
$data = sqlsrv_fetch_array($result);
$partners = (int)$data[0];
sqlsrv_close($conn);
include("conn.php");
$query = "SELECT ID, AV_CODE, PARTNERS_NAME, FORMER_NAME, SEX, OCCUPATION, NATIONALITY, STATE_ADDR, LGA, TOWN_ADDR, STREET_ADDR";
$query.= " FROM tblPartners WHERE AV_CODE = $avc";
$result = sqlsrv_query($conn,$query);
$i = 0;
if(sqlsrv_has_rows($result))
{
while($data = sqlsrv_fetch_array($result))
{?>
<input type="hidden" value="<?php echo $partners; ?>" id="hideen_no" />
<input type="hidden" value="<?php echo $data[0]; ?>" id="id_<?php echo $i+1; ?>" />
<fieldset style="width:875px; background-color:#f5f5f5">
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
<td align="left">
<input type="text" id="name_<?php echo $i+1;?>" style="width:200px;" maxlength="100" value="<?php echo $data[2];?>"/></td>
</tr>
<tr>
<td align="left"><font id ="fn_<?php echo $i+1; ?>">Former Name</font></td>
<td align="left">
<input type="text" id="fname_<?php echo $i+1;?>" style="width:200px;" maxlength="100" value="<?php echo $data[3];?>" /></td>
</tr>
<tr>
<td align="left"><font id ="ps_<?php echo $i+1; ?>">Partner's Sex</font></td>
<td align="left">
    <select id="sex_<?php echo $i+1; ?>" style="width:50px;">
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
<td align="left"><font id ="occ_<?php echo $i+1; ?>">Occupation</font></td>
<td align="left">
<input type="text" id="occupation_<?php echo $i+1;?>" style="width:200px;" maxlength="100" value="<?php echo $data[5];?>" /></td>
</tr>
</table>
</td>
<td align="right" width="400"> <!-- Right -->
<table>
<tr>
<td align="left"><font id ="nat_<?php echo $i+1; ?>">Nationality</font></td>
<td align="left">
    <select id="nationality_<?php echo $i+1; ?>" style="width:200px;">
    <option value=""></option>
<?php 
$query1="SELECT CountryName FROM tblCountries";
$resulta = sqlsrv_query($conn,$query1);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($resulta)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[6]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
<?php } ?>
    </select>
</td>
</tr>
<tr>
<td align="left"><font id ="nsr_<?php echo $i+1; ?>">Nigerian State Of Residence</font></td>
<td align="left">
    <select id="state_<?php echo $i+1;?>" style="width:200px;" onchange="getLgas(this.value,<?php echo $i+1;?>)">
    <option value=""></option>
<?php 
$query1="SELECT StateCode, State FROM tblStates";
$resulta = sqlsrv_query($conn,$query1);
$pattern = "/'/";
$replacement = "''";
while($row = sqlsrv_fetch_array($resulta)) 
  { ?>
    <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"<?php if($data[7]==$row[0]){?> selected="selected"<?php }?>>
	<?php echo preg_replace($pattern,$replacement,$row[1]);?></option>
<?php } ?>
    </select>
</td>
</tr>
<tr>
<td align="left"><font id ="nlr_<?php echo $i+1; ?>">Nigerian L.G.A Of Residence</font></td>
<td align="left">
    <div id = "loadLga_<?php echo $i+1;?>">
    <select id="lga_<?php echo $i+1;?>" style="width:200px;">
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
<td align="left"><font id ="tor_<?php echo $i+1; ?>">Town Of Residence</font></td>
<td align="left">
<input type="text" id="town_<?php echo $i+1;?>" style="width:200px;" maxlength="100" value="<?php echo $data[9];?>" /></td>
</tr>
<tr>
<td align="left"><font id ="sa_<?php echo $i+1; ?>">Street Address</font></td>
<td align="left">
<input type="text" id="street_<?php echo $i+1;?>" style="width:200px;" maxlength="100" value="<?php echo $data[10];?>" /></td>
</tr>
</table>
</td>
</tr>
</table>
</fieldset> 
<?php  $i++; } } 
if(($partners > 0) && ($partners!=""))
{ ?>
<input id="savePartners" value="Save" type="submit" style="font-family:cambria; font-size:13px; color:#333333" />
<input id="bnResetPartners" type="reset" value="Reset" style="font-family:cambria; font-size:13px; color:#333333" />
<?php }?>
<div id="hoto"></div>
</div>
</center>
</body>
</html>