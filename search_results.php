<?php 
session_start();
if ($_SESSION['user'] == null)
{
	header("Location: login_page.php");
}
$user = $_SESSION['user'];
?>
<!-- include style -->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bn_css.css"/>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/dashboard_table_js.js"></script>
<?php
//open database
include 'conn.php';
//include our awesome pagination
//class (library)
include 'ps_pagination.php';
$queryUsr ="SELECT * FROM tblUser WHERE user_id ='$user'";
$resultUsr = sqlsrv_query($conn, $queryUsr);
$rowUsr = sqlsrv_fetch_array($resultUsr);
$role = $rowUsr['user_group'];
//query all data anyway you want
$sql = "select * from tblBNames where user_id = '$user' ORDER BY SERNUMBER DESC";

//execute query and get and

$rs = sqlsrv_query($conn, $sql ) or die('Database Error: ' . sqlsrv_errors() . ' ' . $sql );

//now, where gonna use our pagination class
//this is a significant part of our pagination
//i will explain the PS_Pagination parameters
//$conn is a variable from our config_open_db.php
//$sql is our sql statement above
//3 is the number of records retrieved per page
//4 is the number of page numbers rendered below
//null - i used null since in dont have any other
//parameters to pass (i.e. param1=valu1&param2=value2)
//you can use this if you're gonna use this class for search
//results since you will have to pass search keywords
$pager = new PS_Pagination( $conn, $sql, 20, 16, null );

//our pagination class will render new
//recordset (search results now are limited
//for pagination)
$rs = $pager->paginate($user, $role); 

//get retrieved rows to check if
//there are retrieved data
//$num = sqlsrv_has_rows( $rs );
$Q= "SELECT SERNUMBER, AV_CODE, BUS_NAME, RECEIPT_NO, PAY_DATE, STATE_ADDRESS FROM tblBNames WHERE user_id ='$user' ";
$R = sqlsrv_query($conn, $Q);

if(sqlsrv_has_rows($R)){     
	//creating our table header
	echo "<table id='verificationTbl' cellpadding='4' cellspacing='1'>";
	echo "<tr bgcolor='#336600' style='font-size:12px; color:#FFF; font-weight:bold'>";
		echo "<th align='left' width='113'>Availability Code</th>";
		echo "<th align='left' width='524'>Business Name</th>";
		echo "<th align='left' colspan='5'>Actions</th>";
	echo "</tr>";
	
	//looping through the records retrieved
	while($row = sqlsrv_fetch_array( $rs )){
		$branch = $row['STATE_CODE'];
		$sc = $row['STATE_ADDRESS'];
		$bname = $row['BUS_NAME'];
		echo "<tr class='data-tr' align='center' id='"; echo $row['SERNUMBER']; echo "' name='"; echo $row['AV_CODE']."'>";
		$avc = $row['AV_CODE'];
		echo "<td style='border:1px solid #336600' align='left'>{$row['AV_CODE']}</td>";
		echo "<td style='border:1px solid #336600' align='left'>{$row['BUS_NAME']}</td>";
		echo "<td width='42' align='left' style='border:1px solid #336600'>";
		echo "<a  href='#' class='edit_entries'>BN</a></td>";
		echo "<td width='88' align='left' style='border:1px solid #336600'>";
		echo "<a  href='#' class='edit_partners'>Partners</a></td>";
		echo "<td width='85' align='left' style='border:1px solid #336600'>";
		echo "<a  href='#' class='edit_corp_partners'>Corporate</a></td>";
		
		//post user routing
		if($rowUsr['user_group'] == 'post_user'){
			$x ="post_user";
			$y ="post";
			echo"
		<td width='71' align='left' style='border:1px solid #336600'>
		<a class='edit_entries'  href='routing.php?avc=$avc&sc=$branch&opr=$y&grp=$x'>Send</a>
		</td>
		<td width='71' align='left' style='border:1px solid #336600'>
		<a class='edit_entries'  href='route_select.php?avc=$avc&sc=$branch&grp=$x'>Selective</a>
		</td>";
		}
		//pre user routing
		if($rowUsr['user_group'] == 'pre_user'){
			$x ="pre_user";
			$y ="pre";
			echo"
		<td width='71' align='left' style='border:1px solid #336600'>
		<a class='edit_entries' href='routing.php?avc=$avc&sc=$branch&opr=$y&grp=$x'>Send</a>
		</td>";
		echo"
		<td width='71' align='left' style='border:1px solid #336600'>
		<a class='edit_entries' href='route_select.php?avc=$avc&sc=$branch&opr=$y&grp=$x'>Selective</a>
		</td>";
		}
		//power user routing
		if($rowUsr['user_group'] == 'power_user' || $rowUsr['user_group'] == 'admin'){
		
			echo"
			<td width='71' align='left' style='border:1px solid #336600'>
		<a class='edit_entries'  href='route_select.php?avc=$avc&sc=$branch&grp=power_user'>Send</a>
		</td>
		<td width='71' align='left' style='border:1px solid #336600'>
		<a class='edit_entries'  href='generate_rc.php?avc=$avc&name=$bname'>Print</a>
		</td>";
		}
		echo "</tr>";
	}       
	
}else{ ?>
	<!-- if no records found -->
    <table id="verificationTbl" cellpadding="7" cellspacing="1">
    	<tr bgcolor='#336600' style='font-size:12px; color:#FFF; font-weight:bold'>
		    <th align='left' width='113'>Av_Code</th>
		    <th align='left' width='524'>Business Name</th>
		    <th align='left' colspan='5'>Actions</th>
	    </tr>
	    <tr style="font-size:12px; font-family:Cambria; color:#360; font-weight:bold; background-color:#FFF">
          <td colspan="9"  align="center" style="border:1px solid #336600;">
            !!! No Data Found/Empty Entry !!!
          </td>
        </tr>
<?php }
	echo "</table>";
//page-nav class to control
//the appearance of our page 
//number navigation
echo "<div class='page-nav'>";
	//display our page number navigation
	echo $pager->renderFullNav();
echo "</div>";

?>