<?php 
session_start();
if ($_SESSION['user'] == null)
{
	header("Location: login_page.php");
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bn_css.css"/>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/corporate_partners_table_js.js"></script>
<title>Partner's Table</title>
</head>

<body>
<center>
<table id="operationTbl" style="font-family:cambria; font-size:13px; color:#333333" width="900" height="auto" cellpadding="4" cellspacing="1">
<thead bgcolor="#336600" style="font-size:13px; color:#FFF; font-weight:bold">
<td align="left">ID</td>
<td align="left">Availability Code</td>
<td align="left">Corporate Partner's Name</td>
<td align="left">RC Number</td>
<td align="left">Registration Date</td>
<td align="left" colspan="2">Actions</td>
</thead>
<?php
include("conn.php");
$id = "";
$name = "";
if ( isset($_GET["id"]) )
{
   $id = $_REQUEST["id"];
   $query = "SELECT corpID, AV_CODE, CorpName, CorpRCNo, CorpRegDate FROM tblCorpPartners WHERE AV_CODE = '$id'";
}
else
{
   $name = $_REQUEST["name"];
}
;
if($id == "")
{
	$query = "SELECT corpID, AV_CODE, CorpName, CorpRCNo, CorpRegDate FROM tblCorpPartners WHERE CorpName = '$name'";
}
if($id == "" && $name == "")
{
	echo "Parsing Error.";
	return false;
}
else
{
	$result = sqlsrv_query($conn,$query);
	if(sqlsrv_has_rows($result))
	{
		$i=0;
		while($data = sqlsrv_fetch_array($result)) {
?>
<input type="hidden" id="avCode" value= "<?php echo $data[1]; ?>" />
<input type="hidden" id="rcNo" value= "<?php echo $data[3]; ?>" />
<tr id="<?php echo $data[0]; ?>" title="<?php echo $data[3]; ?>" style="font-size:12px; color:#360; font-weight:bold; background-color:#FFF">
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
      !!! No Data Found/Empty Entry !!! <?php echo $id; ?>
      </td>
     </tr>
  <?php
}}
sqlsrv_close($conn);
?>
</table>
<br />
<input type="hidden" id="aVc" value= "<?php echo $id; ?>" />
<input id="addPartner" type="button" value="Add a New Corporate Partner" style="font-family:cambria; font-size:12px; color:#333" />
<div id="show">
</div>
</body>
</html>