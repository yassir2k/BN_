<?php
session_start();
$user = $_SESSION['user'];
include ("conn.php");
$pattern = "/'/";
$replacement = "''";
$a = preg_replace($pattern,$replacement,$_REQUEST["a"]);
$b = preg_replace($pattern,$replacement,$_REQUEST["b"]);
$cc = $_REQUEST["c"];
$d = preg_replace($pattern,$replacement,$_REQUEST["d"]);
$d = str_replace("%","[%]",$d);
$f = preg_replace($pattern,$replacement,$_REQUEST["f"]);
$g = preg_replace($pattern,$replacement,$_REQUEST["g"]);
$h = preg_replace($pattern,$replacement,$_REQUEST["h"]);
$i = preg_replace($pattern,$replacement,$_REQUEST["i"]);
$j = preg_replace($pattern,$replacement,$_REQUEST["j"]);
$k = preg_replace($pattern,$replacement,$_REQUEST["k"]);
$l = preg_replace($pattern,$replacement,$_REQUEST["l"]);
$m = preg_replace($pattern,$replacement,$_REQUEST["m"]);
if($a =="" || $b =="" || $cc =="" || $d == "" || $f == "" || $g == "" || $h == "" || $i == "" || $j == "" || $k == "" || $l == "" || $m=="")
{
	echo "Error In Retrieving Data. Please Check & Retry.";
}
else
{	
    $checkQuery = "SELECT * FROM tblBNames WHERE AV_CODE = '$a' OR BUS_NAME = '$d'";
	$checkResult = sqlsrv_query($conn,$checkQuery);
	if( sqlsrv_has_rows($checkResult) )
	{
		echo "A Record With A Similar Availability Code or Business Names Already Exists.";
	}
	else //Meaning At This Point There Is No Duplicate
	{
		$query="INSERT INTO tblBNames (AV_CODE, RECEIPT_NO, PAY_DATE, BUS_NAME, STREET_ADDRESS, STATE_ADDRESS, AREA_ADDRESS, ";
		$query.="TOWN_ADDRESS, LIN_BUS1, LIN_BUS2, LIN_BUS3, STATE_CODE, user_id, entered_by) VALUES ('$a', '$b', '$cc',";
		$query.=" '$d', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$m', '$user','$user')";
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
				echo "Error Saving Data. Please Try Again.";
			}
		}
	}
}
?>