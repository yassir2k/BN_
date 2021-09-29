<?php
include ("conn.php");
$pattern = "/'/";
$replacement = "''";
$a="";
$f = $_REQUEST["f"];
if( $f == 1)
{
$a = preg_replace($pattern,$replacement,$_REQUEST["avc"]);
}
if( $f == 2)
{
$a = preg_replace($pattern,$replacement,$_REQUEST["rc"]);
}
$b = preg_replace($pattern,$replacement,$_REQUEST["obj1"]);
$c = preg_replace($pattern,$replacement,$_REQUEST["obj2"]);
$d = preg_replace($pattern,$replacement,$_REQUEST["obj3"]);
if(($b == "" || $a == ""))
{
	echo "Error In Retrieving Data. Please Check & Retry.";
}
else
{
	if($f == 1)//Meaning Updating by using AV Code
	{
		$query3 = "SELECT * FROM tblBNames WHERE AV_CODE = '$a'";
		$result3 = sqlsrv_query($conn,$query3);
		$data3 = sqlsrv_fetch_array($result3);
		$object = $data3['LIN_BUS1']." ".$data3['LIN_BUS2'].",".$data3['LIN_BUS3'];
		$rc = $data3['RC'];
		
		$cc = date('m/d/y',time());
		$date = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));
	
		$query = "UPDATE tblBNames SET LIN_BUS1 = '$b', LIN_BUS2 = '$c', LIN_BUS3 = '$d' WHERE AV_CODE = '$a'";
		$result = sqlsrv_query($conn,$query);
		sqlsrv_close($conn);
		include("conn.php");
		$fQuery = "Select LIN_BUS1, LIN_BUS2, LIN_BUS3 From tblBNames Where AV_CODE = '$a'";
		$fResult = sqlsrv_query($conn,$fQuery);
		$fData = sqlsrv_fetch_array($fResult);
		if( ($b == $fData[0]) && ($c == $fData[1]) && ($d == $fData[2]))
		{
			sqlsrv_close($conn);
			echo "Confirmed";
		}
		else
		{
			sqlsrv_close($conn);
			echo "Data Wasn't Successfully Saved. Please Try Again.";
		}
	}
	else//Meaning Updating by using BN Registration Number
	{
		$query3 = "SELECT * FROM tblBNames WHERE RC = '$a'";
		$result3 = sqlsrv_query($conn,$query3);
		$data3 = sqlsrv_fetch_array($result3);
		$object = $data3['LIN_BUS1']." ".$data3['LIN_BUS2'].",".$data3['LIN_BUS3'];
		$rc = $data3['RC'];
		
		$cc = date('m/d/y',time());
		$date = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));
	
		$query = "UPDATE tblBNames SET LIN_BUS1 = '$b', LIN_BUS2 = '$c', LIN_BUS3 = '$d' WHERE RC = '$a'";
		$query2 = "INSERT INTO tblTransactions (RC, TransCode, TransDesc, TransDate, UserID) VALUES ";
		$query2.=" ('$rc','COO','$object','$date','dd')";
		
		$result = sqlsrv_query($conn,$query);
		$result = sqlsrv_query($conn,$query2);
		sqlsrv_close($conn);
		include("conn.php");
		$fQuery = "Select LIN_BUS1, LIN_BUS2, LIN_BUS3 From tblBNames Where RC = '$a'";
		$fResult = sqlsrv_query($conn,$fQuery);
		$fData = sqlsrv_fetch_array($fResult);
		if( ($b == $fData[0]) && ($c == $fData[1]) && ($d == $fData[2]))
		{
			sqlsrv_close($conn);
			echo "Confirmed";
		}
		else
		{
			sqlsrv_close($conn);
			echo "Data Wasn't Successfully Saved. Please Try Again.";
		}
	}
}
?>