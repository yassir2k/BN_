<?php
include ('conn.php');

if ($_POST['new_object'] == ""){

echo "please enter a value";
	
}
else{
$object = $_POST['new_object'];

$query ="SELECT * FROM tblBizObjects WHERE business_objects ='$object'";
$row = sqlsrv_query($conn, $query);
	if(sqlsrv_has_rows($row)) {
	
		echo "Object Exist!";
		header("location:new_object.php");
	}else{
	
 	  $sql = "INSERT INTO tblBizObjects (business_objects) VALUES('$object') ";
	  if (sqlsrv_query($conn, $sql)){
		  echo "successful";
		  header("location:new_object.php");
	  }
	  else{
		  echo "not successful";
		  header("location:new_object.php");
	  }
		  
		  
	
	}
}

?>



