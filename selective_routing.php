<?php

include("conn.php");
$avc = $_POST['avcode'];
$user = $_POST['user'];

	
$update = "UPDATE tblBNames SET user_id = '$user' WHERE AV_CODE = '$avc' ";
	if(sqlsrv_query($conn, $update)){
	header('Location: dashboard.php');
	}
	else{
		echo sqlsrv_errors();
	}

?>
