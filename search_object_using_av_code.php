<?php
include ("conn.php");
$pattern = "/'/";
$replacement = "''";
$a = preg_replace($pattern,$replacement,$_REQUEST["input"]);
if($a == "")
{
	echo "Error In Retrieving Data. Please Check & Retry.";
}
else
{
	$query = "SELECT LIN_BUS1, LIN_BUS2, LIN_BUS3 FROM tblBNames WHERE AV_CODE = '$a'";
	$result = sqlsrv_query($conn,$query);
	if( sqlsrv_has_rows($result) )
	{
		$data = sqlsrv_fetch_array($result);
		echo $data[0];
		echo "@";
		echo $data[1];
		echo "@";
		echo $data[2];
	}
	else
	{
		echo "No Record Available For This Entry. Please Try Again.";
	}
}
?>