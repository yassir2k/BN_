<?php
include ("conn.php");
$pattern = "/'/";
$replacement = "''";
$a = preg_replace($pattern,$replacement,$_REQUEST["input"]);
$type = $_REQUEST["option"];
if($a == "" || $type == "")
{
	echo "Error In Retrieving Data. Please Check & Retry.";
}
else
{
	if($type == "avc")
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
		$query = "SELECT * FROM tblPartners WHERE RC = '$a'";
		$result = sqlsrv_query($conn,$query);
		if( sqlsrv_has_rows($result) )
		{
			echo "RC is available";
		}
		else
		{
			echo "No Record Available For This Entry. Please Try Again.";
		}
	}
}
?>