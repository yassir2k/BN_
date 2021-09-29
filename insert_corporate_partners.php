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
	$cc = preg_replace($pattern,$replacement,$_REQUEST["c_".($i+1)]);
	$c = preg_replace($pattern,$replacement,date("l, j F Y",strtotime($cc)));
	$d = preg_replace($pattern,$replacement,$_REQUEST["d_".($i+1)]);
	$e = preg_replace($pattern,$replacement,$_REQUEST["e_".($i+1)]);
	$f = preg_replace($pattern,$replacement,$_REQUEST["f_".($i+1)]);
	$g = preg_replace($pattern,$replacement,$_REQUEST["g_".($i+1)]);

		$query="INSERT INTO tblCorpPartners (AV_CODE, corpRCNo, corpName, corpRegDate, corpState, LGA, corpTown, corpAddress)";
		$query.= " VALUES ('$avc', '$a', '$b', '$c', '$d', '$e', '$f', '$g')";
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