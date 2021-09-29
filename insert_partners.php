<?php
$avc = $_REQUEST["avc"];
$num = $_REQUEST["num"];
$pattern = "/'/";
$replacement = "''";
//$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
for($i=0; $i<$num; $i++)
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
		$query="INSERT INTO tblPartners (AV_CODE, PARTNERS_NAME, FORMER_NAME, SEX, OCCUPATION, NATIONALITY, STATE_ADDR, LGA,"; 
		$query.="TOWN_ADDR, STREET_ADDR)";
		$query.= " VALUES ('$avc', '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$j')";
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