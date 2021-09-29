<?php
/* Database connection */
include("conn.php");
$ID = $_REQUEST['id'];
$avc = $_REQUEST['avc'];
if( $ID == null || $avc == null)
{
	echo 'Unsuccessful Value Parse.'; 
}
else
{
	$query = "DELETE FROM tblPartners WHERE ID ='$ID' AND AV_CODE = '$avc'";
	sqlsrv_query($conn,$query);
	sqlsrv_close($conn);
	/*Lets Verify Whether Deletion Has Been Carried Out*/
	include("conn.php");
	$query = "SELECT * FROM tblPartners WHERE ID = '$ID' AND AV_CODE = '$avc'";
	$result = sqlsrv_query($conn,$query);
	if(sqlsrv_has_rows($result))
	{
		echo "Deletion operation not successfully carried out. Please try again. ";
	}
	else
	{
		echo "Deletion operation successfully carried out.";
	}
} 
sqlsrv_close($conn);
?>