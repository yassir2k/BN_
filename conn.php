<?php
$serverName = "localhost";
$connectionInfo = array( "Database"=>"BizNames", "UID"=>"sa", "PWD"=>"@87.Com#");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false ) {
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>
