<?php
$avc = $_REQUEST["avc"];
$pattern = "/'/";
$replacement = "''";
//$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("conn.php");
$a = preg_replace($pattern,$replacement,$_REQUEST["a"]);
$b = preg_replace($pattern,$replacement,$_REQUEST["b"]);
$c = preg_replace($pattern,$replacement,$_REQUEST["c"]);
$d = preg_replace($pattern,$replacement,$_REQUEST["d"]);
$e = preg_replace($pattern,$replacement,$_REQUEST["e"]);
$f = preg_replace($pattern,$replacement,$_REQUEST["f"]);
$g = preg_replace($pattern,$replacement,$_REQUEST["g"]);
$h = preg_replace($pattern,$replacement,$_REQUEST["h"]);
$j = preg_replace($pattern,$replacement,$_REQUEST["i"]);
$cc = date('m/d/y',time());
$date = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));

	$query="INSERT INTO tblPartners (AV_CODE, PARTNERS_NAME, FORMER_NAME, SEX, OCCUPATION, NATIONALITY, STATE_ADDR, LGA, ";
	$query.="TOWN_ADDR, STREET_ADDR) VALUES ('$avc', '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$j')";
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