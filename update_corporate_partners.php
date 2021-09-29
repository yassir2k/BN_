<?php 
session_start();
if ($_SESSION['user'] == null)
{
	header("Location: login_page.php");
}
$user = $_SESSION['user'];
include("conn.php");
$avc = $_REQUEST["avc"];
$pattern = "/'/";
$replacement = "''";
//$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$a = preg_replace($pattern,$replacement,$_REQUEST["a"]);
$b = preg_replace($pattern,$replacement,$_REQUEST["b"]);
$cc = preg_replace($pattern,$replacement,$_REQUEST["c"]);
$c = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));
$d = preg_replace($pattern,$replacement,$_REQUEST["d"]);
$e = preg_replace($pattern,$replacement,$_REQUEST["e"]);
$f = preg_replace($pattern,$replacement,$_REQUEST["f"]);
$g = preg_replace($pattern,$replacement,$_REQUEST["g"]);

	$query3 = "SELECT corpRCNo FROM tblCorpPartners WHERE AV_CODE = '$avc'";
	$result3 = sqlsrv_query($conn,$query3);
	$data3 = sqlsrv_fetch_array($result3);
	$rc = $data3[0];
	
	
	$cc = date('m/d/y',time());
	$date = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));

	$query="UPDATE tblCorpPartners SET corpName = '$b', corpRegDate = '$c', corpState = '$d', LGA = '$e', corpTown = '$f', ";
	$query.="corpAddress = '$g' WHERE AV_CODE = '$avc' AND corpRCNo = '$a'";
$query2 = "INSERT INTO tblTransactions (RC, TransCode, TransDesc, TransDate, UserID) VALUES ('$a', 'COCP', '$a', '$date', '$user')";


if((sqlsrv_query($conn,$query)))
{
	sqlsrv_close($conn);
	include ("conn.php");
	if((sqlsrv_query($conn,$query2)))
	{
		echo "Data Successfully Saved";
	}
	else
	{
		echo "second error ne";
	}
}
else
{
	die( print_r( sqlsrv_errors(), true)); 
	sqlsrv_close($conn);
}
//Insertion into the database

?>