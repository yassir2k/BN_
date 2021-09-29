<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bn_css.css"/>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/partners_table_js.js"></script>
<title>Partner's Table</title>
</head>

<body>
<center>
<table id="operationTbl" style="font-family:cambria; font-size:13px; color:#333333" width="900" height="auto" cellpadding="4" cellspacing="1">
<tr bgcolor="#336600" style="font-size:13px; color:#FFF; font-weight:bold">
<td align="left">Availability Code</td>
<td align="left">BN Number</td>
<td align="left">Bussiness Name</td>
<td align="left">Town</td>
<td align="left" colspan="2">Routing</td>
</tr>
<?php
session_start();
include("conn.php");

$pattern = "/'/";
$replacement = "''";
$id = preg_replace($pattern,$replacement,$_REQUEST["id"]);

//$id = $_REQUEST["id"];
$type = $_SESSION["type"];
$x ='power_user';
$y ='post';

if ($type == "code") {

	if($id == null)
{
	echo "ID Couldn't Be Retrieved. Please Try Again";
}
else
{
    $query = "SELECT AV_CODE, RC, BUS_NAME, TOWN_ADDRESS, STATE_ADDRESS FROM tblBNames WHERE AV_CODE = '$id'";
	$result = sqlsrv_query($conn,$query);
	if(sqlsrv_has_rows($result))
	{
		$i=0;
		while($data = sqlsrv_fetch_array($result)) {
			$sc= $data[4];
?>
<input type="hidden" id="avCode" value= "<?php echo $data[0]; ?>" />
<tr id="<?php echo $data[0]; ?>" style="font-size:12px; color:#360; font-weight:bold; background-color:#FFF">
<td align="left" style="border:1px solid #336600"><?php echo $data[0]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo $data[1]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo $data[2]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo $data[3]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo "<a  href='route_select.php?avc=$id&sc=$sc&grp=power_user'>";?>Selective</a>
<td align="left" style="border:1px solid #336600"><?php echo "<a  href='routing.php?avc=$id&sc=$sc&opr=$y&grp=$x'>";?>Automatic</a>
</td>
</tr><input type="hidden" id="avCode" value= "<?php echo $data[0]; ?>" />
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
}}
}
else {

	if($id == null)
{
	echo "ID Couldn't Be Retrieved. Please Try Again";
}
else
{
    $query = "SELECT AV_CODE, RC, BUS_NAME, TOWN_ADDRESS, STATE_ADDRESS FROM tblBNames WHERE BUS_NAME like '$id%'";
	$result = sqlsrv_query($conn,$query);
	if(sqlsrv_has_rows($result))
	{
		$i=0;
		while($data = sqlsrv_fetch_array($result)) {
			$sc= $data[4];
?>
<input type="hidden" id="avCode" value= "<?php echo $data[0]; ?>" />
<tr id="<?php echo $data[0]; ?>" style="font-size:12px; color:#360; font-weight:bold; background-color:#FFF">
<td align="left" style="border:1px solid #336600"><?php echo $data[0]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo $data[1]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo $data[2]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo $data[3]; ?></td>
<td align="left" style="border:1px solid #336600"><?php echo "<a  href='route_select.php?avc=$id&sc=$sc&grp=power_user'>";?>Selective</a>
<td align="left" style="border:1px solid #336600"><?php echo "<a  href='routing.php?avc=$id&sc=$sc&opr=$y&grp=$x'>";?>Automatic</a>
</td>
</tr><input type="hidden" id="avCode" value= "<?php echo $data[0]; ?>" />
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
}}



}



sqlsrv_close($conn);
?>
</table>
<br />
<div id="show">
</div>
</body>
</html>