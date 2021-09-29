<?php
include ('conn.php');

if ($_POST['Uname'] == "" || $_POST['Pword1'] == ""){

header('Location:regform.php');	
	
}
else{
$uname = $_POST['Uname'];
$pword1 = $_POST['Pword1'];
$pword2 = $_POST['Pword2'];
$usertype = $_POST['UserType'];
$state = $_POST['state'];

$query ="SELECT * FROM tblUser WHERE user_id ='$uname'";
$row = sqlsrv_query($conn, $query);
if(sqlsrv_has_rows($row)) {
	
	echo "User Name Exist";
}else{
	
	if ($pword1 == $pword2){
	$query2 = "SELECT * FROM tblUser WHERE state_code = '$state' AND user_group = '$usertype'";
	$params = array();
	$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
	$row2 = sqlsrv_query($conn, $query2, $params,$options);
	$data = sqlsrv_num_rows($row2);
	
	$position = $data + 1;

	$sql = "INSERT INTO tblUser (user_id, passcode, state_code,user_group,group_position) VALUES('$uname','$pword1','$state','$usertype','$position') ";

	
	
		if (sqlsrv_query($conn, $sql)){
			
			//update tracking tables
			if ($usertype == 'pre_user'){
				$query3 = "UPDATE tblPreUserTracking SET total = $position WHERE state_code = '$state'";
				sqlsrv_query($conn ,$query3);
			}
			elseif ($usertype == 'post_user'){
				$query3 = "UPDATE tblPostUserTracking SET total = $position WHERE state_code = '$state'";
				sqlsrv_query($conn ,$query3);			
			}
			elseif ($usertype =='power_user'){
				$query3 = "UPDATE tblPowerUserTracking SET total = $position WHERE state_code = '$state'";
				sqlsrv_query($conn ,$query3);
			}
			else{
				die( print_r( sqlsrv_errors(), true));	
			}

			header("location: login_page.php");
		}
		else{
			echo "Could not Register User.<br />";
    		die( print_r( sqlsrv_errors(), true));}

	}
	else {
	echo "Passwords did not match!";
	
	}
}
}

?>