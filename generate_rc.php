<?php
session_start();
if ($_SESSION['user'] == null)
{
	header("Location: login_page.php");
}
$user = $_SESSION['user'];
include("conn.php");
$avc = $_REQUEST['avc'];
$bname = $_REQUEST['name'];
$sql = "SELECT * FROM tblRC WHERE AV_CODE = '$avc'";
echo $sql."<br />";
$result = sqlsrv_query($conn,$sql);
if(sqlsrv_has_rows($result)){

	$row = sqlsrv_fetch_array($result);
	$rc = $row['RC'];
	$date_admin = $row['REG_DATE'];
	$query2 = "UPDATE tblBNames SET user_id = 'admin' WHERE AV_CODE = '$avc'";
	sqlsrv_query($conn,$query2);
	$_SESSION['avcode'] = $avc;
	$_SESSION['r_date'] = $date_admin;
	header('Location: cert.php?rc='.$rc.'&avc='.$avc);
		
		}
else{

	$date = date_create(); 
	$ts = date_timestamp_get($date); 
	//$reg_date = date('d/m/Y', $ts);
	
	
	$query = "INSERT INTO tblRC (AV_CODE,BUS_NAME,REG_DATE) VALUES ('$avc','$bname','$ts')";
	if(sqlsrv_query($conn, $query)){
		
		$sql = "SELECT SCOPE_IDENTITY()";
		$stmt = sqlsrv_query($conn, $sql);
		$id = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_NUMERIC);
		$rid = $id[0];
		
		//$str = str_pad($rid, 8, '0', STR_PAD_LEFT);
		$rc = 'BN '.$rid;
			
		$query2 = "UPDATE tblBNames SET RC = '$rc', user_id = 'admin', REG_DATE = '$ts' WHERE AV_CODE = '$avc'";
		$query3 = "UPDATE tblPartners SET RC = '$rc' WHERE AV_CODE = '$avc'";

		if(sqlsrv_query($conn,$query2) AND sqlsrv_query($conn,$query3)){
			
			$_SESSION['avcode'] = $avc;
			header('Location: cert.php?rc='.$rc.'&avc='.$avc);
		}
		else{
			echo sqlsrv_errors();
		}
						
	}
	else{
		echo sqlsrv_errors();
	}
}
?>
