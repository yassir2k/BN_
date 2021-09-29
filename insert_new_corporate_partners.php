<?php
$avc = $_REQUEST["avc"];
$pattern = "/'/";
$replacement = "''";
//$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("conn.php");
$a = preg_replace($pattern,$replacement,$_REQUEST["a"]);
$b = preg_replace($pattern,$replacement,$_REQUEST["b"]);
$cc = preg_replace($pattern,$replacement,$_REQUEST["c"]);
$c = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));
$d = preg_replace($pattern,$replacement,$_REQUEST["d"]);
$e = preg_replace($pattern,$replacement,$_REQUEST["e"]);
$f = preg_replace($pattern,$replacement,$_REQUEST["f"]);
$g = preg_replace($pattern,$replacement,$_REQUEST["g"]);

	$query="INSERT INTO tblCorpPartners (AV_CODE, corpRCNo, corpName, corpRegDate, corpState, LGA, corpTown, corpAddress)";
	$query.= " VALUES ('$avc', '$a', '$b', '$c', '$d', '$e', '$f', '$g')";
	if(!sqlsrv_query($conn,$query))
	{
		die( print_r( sqlsrv_errors(), true)); 
	}
	else
	{
		echo "Data Successfully Saved.";
		sqlsrv_close($conn);
	}

?>