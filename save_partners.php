<?php
$avc = $_REQUEST["avc"];
$num = $_REQUEST["num"];
$pattern = "/'/";
$replacement = "''";
//$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
for($i=0; $i < $num; $i++)
{
	include("conn.php");
	$a = preg_replace($pattern,$replacement,$_REQUEST["a_".($i+1)]);
	$b = preg_replace($pattern,$replacement,$_REQUEST["b_".($i+1)]);
	$c = preg_replace($pattern,$replacement,$_REQUEST["c_".($i+1)]);
	$d = preg_replace($pattern,$replacement,$_REQUEST["d_".($i+1)]);
	$e = preg_replace($pattern,$replacement,$_REQUEST["e_".($i+1)]);
	$f = preg_replace($pattern,$replacement,$_REQUEST["f_".($i+1)]);
	$g = preg_replace($pattern,$replacement,$_REQUEST["g_".($i+1)]);
	$h = preg_replace($pattern,$replacement,$_REQUEST["h_".($i+1)]);
	$j = preg_replace($pattern,$replacement,$_REQUEST["i_".($i+1)]);
	$k = preg_replace($pattern,$replacement,$_REQUEST["k_".($i+1)]);
$query = "UPDATE tblPartners SET AV_CODE = '$avc', PARTNERS_NAME = '$a', FORMER_NAME = '$b', SEX = '$c', OCCUPATION = '$d', NATIONALITY = '$e'";
$query.= ", STATE_ADDR = '$f', LGA = '$g', TOWN_ADDR = '$h', STREET_ADDR = '$j' WHERE ID = '$k'";
	if(!sqlsrv_query($conn,$query))
	{
		die( print_r( sqlsrv_errors(), true)); 
	}
	else
	{
		if($i == ($num - 1))
		{
			echo "Data Successfully Saved.";
		}
		sqlsrv_close($conn);
	}
}
//Insertion into the database

?>