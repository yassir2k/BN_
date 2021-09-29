<?php
$pattern = "/'/";
$replacement = "''";
$flag = $_REQUEST["f"];
$a=0;
if($flag == 1)
{
	$a = $_REQUEST["rc"];
}
else
{
	$a = $_REQUEST["avc"];
}
$b = $_REQUEST["bname"];
include ("conn.php");

if($a == "" || $b == "")
{
	echo $a." AND ".$b." Error In Retrieving Data. Please Check & Retry...";
}
else
{
	if($flag == 2)/*We Know that we're updating Company Name Using AV Code*/	
	{
		$query3 = "SELECT BUS_NAME, AV_CODE FROM tblBNames WHERE AV_CODE = '$a'";
		$result3 = sqlsrv_query($conn,$query3);
		$data3 = sqlsrv_fetch_array($result3);
		$oldname = $data3[0];
		$rc = $data3[1];
		
		$cc = date('m/d/y',time());
		$date = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));
	
		
		$query = "UPDATE tblBNames SET BUS_NAME = '$b' WHERE AV_CODE = '$a'";
	
		$result = sqlsrv_query($conn,$query);
		sqlsrv_close($conn);
		include("conn.php");
		$query = "SELECT BUS_NAME FROM tblBNames WHERE AV_CODE = '$a'";
		$result = sqlsrv_query($conn,$query);
		$data = sqlsrv_fetch_array($result);
		if($b == $data[0])
		{
			echo "Confirmed";
		}
		else
		{
			echo "Data Wasn't Successfully Saved. Please Try Again.";
		}
	}
	else/*We Know that we're updating Company Name Using RC Number*/
	{
		$query3 = "SELECT BUS_NAME, RC FROM tblBNames WHERE RC = '$a'";
		$result3 = sqlsrv_query($conn,$query3);
		$data3 = sqlsrv_fetch_array($result3);
		$oldname = $data3[0];
		$rc = $data3[1];
		
		$cc = date('m/d/y',time());
		$date = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));
	
		
		$query = "UPDATE tblBNames SET BUS_NAME = '$b' WHERE RC = '$a'";
		
	
		$query2 = "INSERT INTO tblTransactions (RC, TransCode, TransDesc, TransDate, UserID) VALUES";
		$query2.=" ('$rc','CON','$oldname','$date','dd')";
	
		$result = sqlsrv_query($conn,$query);
		sqlsrv_close($conn);
		include("conn.php");
		$result2 = sqlsrv_query($conn,$query2);
		sqlsrv_close($conn);
		include("conn.php");
		$query = "SELECT BUS_NAME FROM tblBNames WHERE RC = '$a'";
		$result = sqlsrv_query($conn,$query);
		$data = sqlsrv_fetch_array($result);
		if($b == $data[0])
		{
			echo "Confirmed";
		}
		else
		{
			echo "Hmm..Data Wasn't Successfully Saved. Please Try Again.";
		}
	}
}
?>