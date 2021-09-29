<?php
include("conn.php");
$avc = $_REQUEST["avc"];
$pattern = "/'/";
$replacement = "''";
//$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$a = preg_replace($pattern,$replacement,$_REQUEST["a"]);
	$b = preg_replace($pattern,$replacement,$_REQUEST["b"]);
	$c = preg_replace($pattern,$replacement,$_REQUEST["c"]);
	$d = preg_replace($pattern,$replacement,$_REQUEST["d"]);
	$e = preg_replace($pattern,$replacement,$_REQUEST["e"]);
	$f = preg_replace($pattern,$replacement,$_REQUEST["f"]);
	$g = preg_replace($pattern,$replacement,$_REQUEST["g"]);
	$h = preg_replace($pattern,$replacement,$_REQUEST["h"]);
	$j = preg_replace($pattern,$replacement,$_REQUEST["i"]);
	$k = preg_replace($pattern,$replacement,$_REQUEST["id"]);
	$query="UPDATE tblPartners SET PARTNERS_NAME = '$a', FORMER_NAME = '$b', SEX = '$c', OCCUPATION = '$d', NATIONALITY = '$e',";
	$query.=" STATE_ADDR = '$f', LGA = '$g', TOWN_ADDR = '$h', STREET_ADDR = '$j' WHERE AV_CODE = '$avc' AND ID = '$k'";
	if(!sqlsrv_query($conn,$query))
	{
		die( print_r( sqlsrv_errors(), true)); 
	}
	else
	{
		echo "Data Successfully Saved.";
		sqlsrv_close($conn);
	}
//Insertion into the database

?>