<?php
session_start();
include ("conn.php");
$pattern = "/'/";
$replacement = "''";
$a = preg_replace($pattern,$replacement,$_REQUEST["input"]);
$type = $_REQUEST["option"];
$_SESSION['type'] = $type; 
if($a == "" || $type == "")
{
	echo "Error In Retrieving Data. Please Check & Retry.";
}
else
{
	if($type == "code")
	{
		$query = "SELECT * FROM tblBNames WHERE AV_CODE = '$a'";
		$result = sqlsrv_query($conn,$query);
		if( sqlsrv_has_rows($result) )
		{
			echo "It is available";
		}
		else
		{
			echo "No Record Available For This Entry. Please Try Again.";
		}
	}
	else
	{
		$query = "SELECT * FROM tblBNames WHERE BUS_NAME like '$a%'";
		$result = sqlsrv_query($conn,$query);
		if( sqlsrv_has_rows($result) )
		{
			echo "It is available";
		}
		else
		{
			echo "No Record Available For This Entry. Please Try Again.";
		}
	}
}
?>