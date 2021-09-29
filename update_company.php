<?php
include ("conn.php");
$pattern = "/'/";
$replacement = "''";
$a = preg_replace($pattern,$replacement,$_REQUEST["a"]);
$b = preg_replace($pattern,$replacement,$_REQUEST["b"]);
$cc = $_REQUEST["c"];
$d = preg_replace($pattern,$replacement,$_REQUEST["d"]);
$f = preg_replace($pattern,$replacement,$_REQUEST["f"]);
$g = preg_replace($pattern,$replacement,$_REQUEST["g"]);
$h = preg_replace($pattern,$replacement,$_REQUEST["h"]);
$i = preg_replace($pattern,$replacement,$_REQUEST["i"]);
$j = preg_replace($pattern,$replacement,$_REQUEST["j"]);
$k = preg_replace($pattern,$replacement,$_REQUEST["k"]);
$l = preg_replace($pattern,$replacement,$_REQUEST["l"]);
$m = preg_replace($pattern,$replacement,$_REQUEST["m"]);
if($a == "" || $b == "" || $cc =="" || $d =="" || $f == "" || $g == "" || $h == "" || $i == "" || $j == "" || $m=="")
{
	echo "Error In Retrieving Data. Please Check & Retry.";
}
else
{
	$c = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));
$query="UPDATE tblBNames SET AV_CODE = '$a', RECEIPT_NO = '$b', PAY_DATE = '$c', BUS_NAME = '$d', STREET_ADDRESS = '$f',"; 
$query.="STATE_ADDRESS = '$g', AREA_ADDRESS = '$h', TOWN_ADDRESS = '$i', LIN_BUS1 = '$j', LIN_BUS2 = '$k', LIN_BUS3 = '$l',";
$query.="STATE_CODE = '$m' WHERE AV_CODE = '$a'";
    if(!sqlsrv_query($conn,$query))
	{
		die( print_r( sqlsrv_errors(), true)); 
	}
	else
	{
			/*Now To Confirm Whether The Data Were Saved On The Database*/
		include("conn.php");
		$query = "SELECT * FROM tblBNames WHERE AV_CODE = '$a' AND STREET_ADDRESS = '$f' AND LIN_BUS3 = '$l'";
		$result = sqlsrv_query($conn,$query);
		if( sqlsrv_has_rows($result) )
		{
			echo "Message Successfully Sent";
		}
		else
		{
			echo "Error Sending Message. Please Try Again.";
		}
	}
}
?>