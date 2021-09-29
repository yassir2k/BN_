<?php
session_start();
if ($_SESSION['user'] == null)
{
	header("Location: login_page.php");
}
$user = $_SESSION['user'];
include('conn.php');
$sc = $_REQUEST["sc"];
$grp = $_REQUEST["grp"];
$avc = $_REQUEST["avc"];



if (isset($_REQUEST["opr"])){
	$opr = $_REQUEST["opr"];
}
else{
	$opr ="";
}

//<-----Pre and Post Users to Power User------>


if ($grp = 'pre_user' || $grp = 'post_user'){

//get present count
	$sql = "SELECT * FROM tblPowerUserTracking WHERE state_code ='$sc' ";
	$stmnt = sqlsrv_query($conn, $sql);
	$row = sqlsrv_fetch_array($stmnt);
	$total = $row['total'];
	
	if($row['count'] > 0){
	$count = $row['count'];

	}
	else {
		$qry = "UPDATE tblPowerUserTracking SET count = 1 WHERE state_code = '$sc'";
		sqlsrv_query($conn,$qry);
		$count = 1;
	}
	
//fetch the user with group position the same as $count
	
	
	for ($i=0;$i<$total+1;$i++){
				
	$sql2 = "SELECT * FROM tblUser WHERE group_position = '$count' AND user_group = 'power_user' AND state_code = '$sc' ";
	$stmnt1 = sqlsrv_query($conn, $sql2);

	if ($row1 = sqlsrv_fetch_array($stmnt1)){
		$user = $row1['user_id'];
		$count = $count + 1;
		$sql4 = "UPDATE tblPowerUserTracking SET count = '$count' WHERE state_code='$sc'";
		sqlsrv_query($conn, $sql4);	
		break;
	}
	elseif ($count > $total){
		$count = 1;
		$sql4 = "UPDATE tblPowerUserTracking SET count = 1 WHERE state_code ='$sc'";
		sqlsrv_query($conn, $sql4);
		
	
	}

	else {
		$count = $count +1;
		$sql4 = "UPDATE tblPowerUserTracking SET count = '$count' WHERE state_code='$sc'";
		sqlsrv_query($conn, $sql4);
		
	
		}
	}
	

//<---Power user to pre user---->

} elseif ($grp = 'power_user' && $opr = 'pre'){
	
	$sql = "SELECT * FROM tblPreUserTracking WHERE state_code ='$sc' ";
	$stmnt = sqlsrv_query($conn, $sql);
	$row = sqlsrv_fetch_array($stmnt);
	if($row['count'] > 0){
	$count = $row['count'];
	}
	else {
		$qry = "UPDATE tblPreUserTracking SET count = 1 WHERE state_code = '$sc'";
		sqlsrv_query($conn,$qry);
		$count = 1;
	}
	
	
	//fetch the user with group position the same as $count
	$total = $row['total'];
	
	for ($i=0;$i<$total+1;$i++){
	
	$sql2 = "SELECT * FROM tblUser WHERE group_position = '$count' AND user_group = 'pre_user' AND state_code = '$sc' ";
	$stmnt1 = sqlsrv_query($conn, $sql2);

	if ($row1 = sqlsrv_fetch_array($stmnt1)){
		$user = $row1['user_id'];
		$count = $count +1;	
		$sql4 = "UPDATE tblPreUserTracking SET count = '$count' WHERE state_code='$sc'";	
		sqlsrv_query($conn, $sql4);
		break;
	}
	elseif ($count > $total){
		$count = 1;
		$sql4 = "UPDATE tblPreUserTracking SET count = 1 WHERE state_code ='$sc'";
		sqlsrv_query($conn, $sql4);
	
	}

	else {
		$count = $count +1;
		$sql4 = "UPDATE tblPreUserTracking SET count = '$count' WHERE state_code='$sc'";
		sqlsrv_query($conn, $sql4);
	
		}
		
	}
	
	
	
	
	
//<---	Power User to Post user---->
	
} elseif ($grp == 'power_user' && $opr == 'post'){
	
	$sql = "SELECT * FROM tblPostUserTracking WHERE state_code ='$sc' ";
	$stmnt = sqlsrv_query($conn, $sql);
	$row = sqlsrv_fetch_array($stmnt);
	if($row['count'] > 0){
	$count = $row['count'];
	}
	else {
		$qry = "UPDATE tblPostUserTracking SET count = 1 WHERE state_code = '$sc'";
		sqlsrv_query($conn,$qry);
		$count = 1;
	}
	
	
	//fetch the user with group position the same as $count
	$total = $row['total'];
	
	for ($i=0;$i<$total+1;$i++){
	
	$sql2 = "SELECT * FROM tblUser WHERE group_position = '$count' AND user_group = 'post_user' AND state_code = '$sc' ";
	$stmnt1 = sqlsrv_query($conn, $sql2);

	if ($row1 = sqlsrv_fetch_array($stmnt1)){
		$user = $row1['user_id'];
		$count = $count +1;	
		$sql4 = "UPDATE tblPostUserTracking SET count = '$count' WHERE state_code='$sc'";
		sqlsrv_query($conn, $sql4);	
		break;
	}
	elseif ($count > $total){
		$count = 1;
		$sql4 = "UPDATE tblPostUserTracking SET count = 1 WHERE state_code ='$sc'";
		sqlsrv_query($conn, $sql4);
	
	}

	else {
		$count = $count +1;
		$sql4 = "UPDATE tblPostUserTracking SET count = '$count' WHERE state_code='$sc'";
		sqlsrv_query($conn, $sql4);
	
		}
	}
	
}


//<---Power user to power user
else {

	//get present count
	$sql = "SELECT * FROM tblPowerUserTracking WHERE state_code ='$sc' ";
	$stmnt = sqlsrv_query($conn, $sql);
	$row = sqlsrv_fetch_array($stmnt);
	if($row['count'] > 0){
	$count = $row['count'];
	}
	else {
		$qry = "UPDATE tblPowerUserTracking SET count = 1 WHERE state_code = '$sc'";
		sqlsrv_query($conn,$qry);
		$count = 1;
	}
	
//fetch the user with group position the same as $count
	$total = $row['total'];
	
	for ($i=0;$i<$total+1;$i++){
	
	$sql2 = "SELECT * FROM tblUser WHERE group_position = '$count' AND user_group = 'power_user' AND state_code = '$sc' ";
	$stmnt1 = sqlsrv_query($conn, $sql2);

	if ($row1 = sqlsrv_fetch_array($stmnt1)){
		$user = $row1['user_id'];
		$count = $count + 1;
		$sql4 = "UPDATE tblPowerUserTracking SET count = '$count' WHERE state_code='$sc'";
		sqlsrv_query($conn, $sql4);		
		break;
	}
	elseif ($count > $total){
		$count = 1;
		$sql4 = "UPDATE tblPowerUserTracking SET count = 1 WHERE state_code ='$sc'";
		sqlsrv_query($conn, $sql4);
	
	}

	else {
		$count = $count +1;
		$sql4 = "UPDATE tblPowerUserTracking SET count = '$count' WHERE state_code='$sc'";
		sqlsrv_query($conn, $sql4);
	
		}
	}
}
$update = "UPDATE tblBNames SET user_id = '$user' WHERE AV_CODE = '$avc' ";

if(sqlsrv_query($conn, $update)){
	header('Location: dashboard.php');
}
else{
	echo sqlsrv_errors();
}


?>