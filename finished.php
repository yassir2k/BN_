<link rel="stylesheet" type="text/css" href="css/bn_css.css"/>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<center>
<fieldset style="width:850px; background-color:#f5f5f5">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#006600; font-weight:bold">
Task Summary
</legend>
<?php
session_start();
include("conn.php");
$avc = $_REQUEST["avc"];

//$avc = '11111';
?>
<table cellpadding="3" cellspacing="3" width="600">
<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Availability Code:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $avc; ?>
</td>
</tr>
<?php
$query = "SELECT BUS_NAME, RECEIPT_NO, STREET_ADDRESS, TOWN_ADDRESS, AREA_ADDRESS, STATE_ADDRESS, LIN_BUS1, LIN_BUS2, LIN_BUS3, REG_DATE,STATE_CODE";
$query.=" FROM tblBNames WHERE AV_CODE = '$avc' ";
$result = sqlsrv_query($conn,$query);
if(!($result))
{
	die( print_r( sqlsrv_errors(), true)); 
}
else
{
	$data = sqlsrv_fetch_array($result)
?>
<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Approved Business Name:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[0]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Receipt No:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[1]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Street Address:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[2]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Town:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[3]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Local Government Area (LGA):
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[4]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
State:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php $sc =$data[5]; echo $sc; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
First Line Of Business:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[6]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Second Line Of Business:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[7]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Third Line Of Business:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[8]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Date Of Registration:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[9]; }?>
</td>
</tr>
</table>
<?php
sqlsrv_close($conn);
include("conn.php");
$query = "SELECT PARTNERS_NAME, FORMER_NAME, SEX, OCCUPATION, NATIONALITY, STATE_ADDR, LGA, TOWN_ADDR, STREET_ADDR FROM tblPartners ";
$query.="WHERE AV_CODE = '$avc'";
$result = sqlsrv_query($conn,$query);
if(sqlsrv_has_rows($result))
{
?>
<fieldset style="width:800px; background-color:#f5f5f5">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#006600; font-weight:bold">
Partners
</legend>
<?php 
$i = 0;
    while($data = sqlsrv_fetch_array($result)) 
	{
		?>
<table cellpadding="3" cellspacing="3" width="600">
<caption style="color: #060; font-family:cambria; font-size:18px; font-weight:bold;">Partner <?php echo $i+1; ?></caption>
<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Partner's Name:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[0]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Former Name:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[1]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Partner's Sex:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[2]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Occupation:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[3]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Nationality:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[4]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Nigerian State Of Residence:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[5]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Local Government Area (LGA) Of Residence:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[6]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Town Of Residence:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[7]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Street Address:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[8]; ?>
</td>
</tr>
</table>
<br />
<?php $i++; } ?>
</fieldset>
<?php
}
else
{
	;
}
sqlsrv_close($conn);
include("conn.php");
$query = "SELECT CorpRCNo, CorpName, CorpRegDate, CorpState, LGA, CorpTown, CorpAddress FROM tblCorpPartners WHERE AV_CODE = '$avc'";
$result = sqlsrv_query($conn,$query);
if(sqlsrv_has_rows($result))
{
?>
<fieldset style="width:800px; background-color:#f5f5f5">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#006600; font-weight:bold">
Corporate Partners
</legend>
<?php 
$i = 0;
    while($data = sqlsrv_fetch_array($result)) 
	{
		?>
<table cellpadding="3" cellspacing="3" width="600">
<caption style="color: #060; font-family:cambria; font-size:18px; font-weight:bold;">Corporate Partner <?php echo $i+1; ?></caption>
<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Corporate RC Number:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[0]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Corporate Name:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[1]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Corporate Registration Date:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[2]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Corporate State Of Residence:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[3]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Local Government Area (LGA) Of Residence:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[4]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Town:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[5]; ?>
</td>
</tr>

<tr>
<td width="288" align="left" style="font-family:cambria; color:#333; font-weight:bold; font-size:13px;">
Street Address:
</td>
<td width="289" align="left" style="font-family:cambria; color:#F00; font-weight:bold; font-size:13px;">
<?php echo $data[6]; ?>
</td>
</tr>
</table>

<br />
<?php $i++; } ?>
</fieldset>
<?php
}
else
{
	;
} ?>
<form>
<table border="0">
<tr>
<?php $branch = $data [10]; ?>
<td height="28"><input type="button" onclick="window.location.href='verification_page.php?avc=<?php echo $avc; ?>'" value="Edit" /></td>
<td height="28"></td>
<td><input type="button" onclick="window.location.href='routing.php?avc=<?php echo $avc; ?>&sc=<?php echo $branch; ?>&opr=<?php echo 'pre'; ?>&grp=<?php echo $_SESSION['user_type']; ?>'" value="Continue"/></td>
</tr>
</table>
</form>
</fieldset>
</center>