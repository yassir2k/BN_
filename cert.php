<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<center>

<?php

$certString = "";



if ($_SESSION['user_type'] == 'admin'){
$dd = $_SESSION['r_date'];
$day = date('d', $dd);

$ts =   $dd; 
$date_month = date('F', $dd);  
$date_year = date('Y', $dd);

switch ($day) {
	case 1:
	$y = "First";
	break;
	case 2:
	$y = "Second";
	break;
	case 3:
	$y = "Third";
	break;
	case 4:
	$y = "Fouth";
	break;
	case 5:
	$y = "Fifth";
	break;
	case 6:
	$y = "Sixth";
	break;
	case 7:
	$y = "Seventh";
	break;
	case 8:
	$y = "Eighth";
	break;
	case 9:
	$y = "Ninth";
	break;
	case 10:
	$y = "Tenth";
	break;
	case 11:
	$y = "Eleventh";
	break;
	case 12:
	$y = "Twelfth";
	break;
	case 13:
	$y = "Thirteenth";
	break;
	case 14:
	$y = "Fourteenth";
	break;
	case 15:
	$y = "Fifteenth";
	break;
	case 16:
	$y = "Sixteenth";
	break;
	case 17:
	$y = "Seventeenth";
	break;
	case 18:
	$y = "Eighteenth";
	break;
	case 19:
	$y = "Nineteenth";
	break;
	case 20:
	$y = "Twentieth";
	break;
	case 21:
	$y = "Twenty First";
	break;
	case 22:
	$y = "Twenty Second";
	break;
	case 23:
	$y = "Twenty Third";
	break;
	case 24:
	$y = "Twenty Fourth";
	break;
	case 25:
	$y = "Twenty Fifth";
	break;
	case 26:
	$y = "Twenty Sixth";
	break;
	case 27:
	$y = "Twenty Seventh";
	break;
	case 28:
	$y = "Twenty Eighth";
	break;
	case 29:
	$y = "Twenty Ninth";
	break;
	case 30:
	$y = "Thirtieth";
	break;
	case 31:
	$y = "Thirty First";
	break;
	default:
	$y = First;

}	
}
else{
	
$date1 = date_create(); 
$ts1 =   date_timestamp_get($date1); 
$x = date('d', $ts1);
$date_month = date('F', $ts1);
$date_year = date('Y', $ts1);

switch ($x) {
	case 1:
	$y = "First";
	break;
	case 2:
	$y = "Second";
	break;
	case 3:
	$y = "Third";
	break;
	case 4:
	$y = "Fouth";
	break;
	case 5:
	$y = "Fifth";
	break;
	case 6:
	$y = "Sixth";
	break;
	case 7:
	$y = "Seventh";
	break;
	case 8:
	$y = "Eighth";
	break;
	case 9:
	$y = "Ninth";
	break;
	case 10:
	$y = "Tenth";
	break;
	case 11:
	$y = "Eleventh";
	break;
	case 12:
	$y = "Twelfth";
	break;
	case 13:
	$y = "Thirteenth";
	break;
	case 14:
	$y = "Fourteenth";
	break;
	case 15:
	$y = "Fifteenth";
	break;
	case 16:
	$y = "Sixteenth";
	break;
	case 17:
	$y = "Seventeenth";
	break;
	case 18:
	$y = "Eighteenth";
	break;
	case 19:
	$y = "Nineteenth";
	break;
	case 20:
	$y = "Twentieth";
	break;
	case 21:
	$y = "Twenty First";
	break;
	case 22:
	$y = "Twenty Second";
	break;
	case 23:
	$y = "Twenty Third";
	break;
	case 24:
	$y = "Twenty Fourth";
	break;
	case 25:
	$y = "Twenty Fifth";
	break;
	case 26:
	$y = "Twenty Sixth";
	break;
	case 27:
	$y = "Twenty Seventh";
	break;
	case 28:
	$y = "Twenty Eighth";
	break;
	case 29:
	$y = "Twenty Ninth";
	break;
	case 30:
	$y = "Thirtieth";
	break;
	case 31:
	$y = "Thirty First";
	break;
	default:
	$y = First;

}

}
include("conn.php");
$avc = $_REQUEST["avc"];
$code = $_SESSION['avcode'];


if ($avc === $code){

$query = "SELECT * FROM tblBNames WHERE AV_CODE = '$avc'";
$result = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($result);
$stateCode = $row['STATE_ADDRESS'];

$query1 = "SELECT State From tblStates WHERE StateCode = '$stateCode'";
$result1 = sqlsrv_query($conn, $query1);
$row1 = sqlsrv_fetch_array($result1);
?>

<table align="center" width="600" border="0" >
  <tr>
    <td>
    <table align="center" width="600" border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>

<tr>
    <td>&nbsp;</td>
  </tr>
<tr>
    <td>&nbsp;</td>
  </tr>
<tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo "&nbsp;&nbsp;&nbsp;".$row['RC']; ?></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    
      
      
      
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align="center" style="font-size:36px; font-family:calligrapher">Certificate of Registration</td>
   </tr>
   <tr>
    <td align="center" style="font-size:30px; font-family:calligrapher">Of Business Name</td>
  </tr>
  <tr>
    <td align="center"><font face="Times new roman" size="3">COMPANIES AND ALLIED MATTERS ACT 1990</font></td>
  </tr>
  <tr>
    <td height="21" align="center"><font face="Times new roman"><i>Pursuant to Section 659</i></font></td>
  </tr>
  <tr>
    <td height="44" align="center"><font face="ariston">I hereby certify that</font></td>
  </tr>
  <tr>
    <td height="58" align="center" style="text-transform:uppercase;">
<?php echo "<font  color='#B90000' face='Times new roman' size='3'>". $row['BUS_NAME'] ."</font>";  ?></td>
  </tr>
  <tr>
    <td align="center"><font face="ariston" size="4">is registered as a Business Name with the Commision</font></td>
  </tr>
  <tr>
    <td height="27" align="center"><font face="ariston">The general nature of the business is:</font></td>
  </tr>
  <tr>
<?php
if( ($row['LIN_BUS1']!=" ") && ($row['LIN_BUS2']!=" ") && ($row['LIN_BUS3']!=" "))
{
    $certString = $row['LIN_BUS1'].", ".$row['LIN_BUS2'].", ".$row['LIN_BUS3'];
}
else if(($row['LIN_BUS1']!=" ") && ($row['LIN_BUS2']==" ") && ($row['LIN_BUS3']!=" "))
{
    $certString = $row['LIN_BUS1'].", ".$row['LIN_BUS3'];
}
else if(($row['LIN_BUS1']!=" ") && ($row['LIN_BUS2']!=" ") && ($row['LIN_BUS3']==" "))
{
    $certString = $row['LIN_BUS1'].", ".$row['LIN_BUS2'];
}
else
{
    $certString = $row['LIN_BUS1'];
}
?>
    <td height="54" align="center"><?php echo $certString; ?></td>
  </tr>
  <tr>
    <td align="center"><font face="ariston">The address of the principal place of Business is:</font></td>
  </tr>
  <tr>
    <td height="40"  align="center" style="text-transform: uppercase;"><?php echo $row['STREET_ADDRESS']; ?> <?php echo $row['TOWN_ADDRESS']; ?>, <?php echo $row1['State'];?>, Nigeria</td>
  </tr>
  <tr>
    <td height="46" align="center"><font face="Ariston">Dated this <?php echo $y." day of ". $date_month.", ".$date_year;  ?> </font></td>
  </tr>
</table>
  
<table width="750">
<tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" style="position:absolute; left:70%; top:99%;"><img src="images/signature.PNG" width="110" height="56" />&nbsp;&nbsp;</td>
  </tr>
<tr><td align="right" style="position:absolute; left:70%; top:105%;">BELLO MAHMUD</td></tr>
</table>

    
    
    </td>
  </tr>
</table>

<?php

$_SESSION['avcode'] = "";
 }
else {
	echo "Link has expired!<br />";
	echo "<a href='dashboard.php'>Back</a>";
	$_SESSION['avcode'] = "";
	
} 
?>

</center>
</body>
</html>