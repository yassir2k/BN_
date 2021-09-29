<?php
include ("conn.php");
$pattern = "/'/";
$replacement = "''";
$f = $_REQUEST["f"];
$a="";
if($f == "rc")//Update Through RC
{
$a = preg_replace($pattern,$replacement,$_REQUEST["rc"]);
}
else//Update Through AVC
{
$a = preg_replace($pattern,$replacement,$_REQUEST["avc"]);
}
$b = preg_replace($pattern,$replacement,$_REQUEST["street"]);
$c = preg_replace($pattern,$replacement,$_REQUEST["town"]);
$d = preg_replace($pattern,$replacement,$_REQUEST["lga"]);
$e = preg_replace($pattern,$replacement,$_REQUEST["state"]);
if($a == "" || $b == "" || $c == "" || $d == "" || $e == "")
{
	echo "Error In Retrieving Data. Please Check & Retry.";
}
else
{
	if($f == "av")//Meaning Using Availability Code
	{
		$query3 = "SELECT * FROM tblBNames WHERE AV_CODE = '$a'";
		$result3 = sqlsrv_query($conn,$query3);
		$data3 = sqlsrv_fetch_array($result3);
		$address = $data3['STREET_ADDRESS']." ".$data3['TOWN_ADDRESS'].",".$data3['AREA_ADDRESS']." ".$data3['STATE_ADDRESS'];
		$rc = $data3['RC'];
		$cc = date('m/d/y',time());
		$date = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));
		$query = "UPDATE tblBNames SET STREET_ADDRESS = '$b', TOWN_ADDRESS = '$c', AREA_ADDRESS = '$d', STATE_ADDRESS = '$e' ";        $query.="WHERE AV_CODE = '$a'";
		$result = sqlsrv_query($conn,$query);
		sqlsrv_close($conn);
		include("conn.php");
		$fQuery = "Select TOWN_ADDRESS From tblBNames WHERE AV_CODE = '$a'";
		$fresult = sqlsrv_query($conn,$fQuery);
		$fdata = sqlsrv_fetch_array($fresult);
		if($c == $fdata[0])
		{
			echo "Confirmed";
		}
		else
		{
			echo "Data Wasn't Successfully Saved. Please Try Again.";
		}
	}
	else//Meaning Using RC Number
	{
		$query3 = "SELECT * FROM tblBNames WHERE RC = '$a'";
		$result3 = sqlsrv_query($conn,$query3);
		$data3 = sqlsrv_fetch_array($result3);
		$address = $data3['STREET_ADDRESS']." ".$data3['TOWN_ADDRESS'].",".$data3['AREA_ADDRESS']." ".$data3['STATE_ADDRESS'];
		$rc = $data3['RC'];
		$cc = date('m/d/y',time());
		$date = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));
		$query = "UPDATE tblBNames SET STREET_ADDRESS = '$b', TOWN_ADDRESS = '$c', AREA_ADDRESS = '$d', STATE_ADDRESS = '$e' ";        $query.="WHERE RC = '$a'";
		$result = sqlsrv_query($conn,$query);
		sqlsrv_close($conn);
		include("conn.php");
		$query2 = "INSERT INTO tblTransactions (RC, TransCode, TransDesc, TransDate, UserID) VALUES";
		$query2.=" ('$rc','COA','$address','$date','dd')";
		$result = sqlsrv_query($conn,$query2);
		sqlsrv_close($conn);
		include("conn.php");
		$fQuery = "Select TOWN_ADDRESS From tblBNames WHERE RC = '$a'";
		$fresult = sqlsrv_query($conn,$fQuery);
		$fdata = sqlsrv_fetch_array($fresult);
		if($c == $fdata[0])
		{
			echo "Confirmed";
		}
		else
		{
			echo "Data Wasn't Successfully Saved. Please Try Again.";
		}
	}
}
?>