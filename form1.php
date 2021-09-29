<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style>

		.resizedTextbox {
				width: 400px; 
				height: 45px;
				font-family:Tahoma, Geneva, sans-serif;
                font-size:16px;
				color:#333;
                padding:5px;
                border:1px solid #000;
				
				}

        .box{
                font-family:Tahoma, Geneva, sans-serif;
                font-size:16px;
				color:#333;
                padding:5px;
                border:1px solid #000;
				
				
        }
		
		.box2{
                font-family:"Times New Roman";
                font-size:16px;
                padding:5px;
                border:1px solid #000;
				color:#000080;
				font-style:italic;	
        }
		
		.box3{
                font-family:"Times New Roman";
                font-size:16px;
                padding:5px;
                border:1px solid #000;
				color:#FF0000;
					
        }
		
		
	h1
	{
		font:times "Times New Roman";
		text-align:center;
		color:#000080;
	}
	h2 
	{
		font:times new roman;
		text-align:center;
		color:#000080;
	}
	h3 
	{
		font:times new roman;
		text-align:center;
		color:#000080;
	}
	textarea {
  resize: none;
}
			
	
		
</style>


</head>

<body>
<?php
include("conn.php");

$avc = $_POST['avcode'];
$query = "SELECT * FROM tblBNames WHERE AV_CODE = '$avc'";
$result = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($result);
$x = $row['DateCommence'];
$query2 = "SELECT * FROM tblPartners WHERE AV_CODE = '$avc'";
$result2 = sqlsrv_query($conn, $query2);


?>`
<table width="1000" border="0" align="center">
<tr><td>
<h1>CORPORATE AFFAIRS COMMISSION</h1>
<h3>(Established under the Companies and Allied Matters Act 1, 1990)</h3>
<h2>P.M.B. 198, ABUJA</h2>

<form enctype="multipart/form-data">

<table width="100%" border="0" align="center">
  <tr>
    <td width="29%" height="104"><font color="#000080"><p><strong>Form CAC/BN/A1</strong></p></font><p><font color="#000080"><strong>BN No</strong>: </font><input type="text" class="box" name="bn_number" value="<?php echo $row['RC']; ?>" /></p></td>
    <td width="42%" align="center"><img src="images/CAC_New_Logo.png" width="100" height="100" /></td>
    <td width="29%">&nbsp;</td>
  </tr>
</table>

<h2>COMPANIES AND ALLIED MATTERS ACT 1, 1990</h2>
<hr color="#000080" size="3" />
<h3>FORM OF APPLICATION FOR REGISTRATION OF A BUSINESS NAME</h3>
<table width="900" border="0">
  <tr>
    <td height="47"><font color="#000080"><strong>(a) The business name:</strong></font></td><td align="right"> <input type="text" class="box3" size="100"  align="right" value="<?php echo $row['BUS_NAME']; ?>" /></td>
    
  </tr>
  <tr>
    <td height="34" colspan="2"><font color="#000080"><strong>(b) The general nature of the business:</strong></font></td>
  </tr>
  <tr>
    <td height="48" colspan="2" align="right"><input type="text" class="box" size="110" value="<?php echo $row['LIN_BUS1']; ?>, <?php echo $row['LIN_BUS2']; ?>, <?php echo $row['LIN_BUS3']; ?>"/></td>
  </tr>
  <tr>
    <td height="27" colspan="2"><font color="#000080"><strong>(c) The full address of the principal place of business:</strong></font></td>
  </tr>
  <tr>
    <td height="51" colspan="2" align="right"><input type="text" class="box" size="110" value="<?php echo $row['STREET_ADDRESS']; ?> <?php echo $row['TOWN_ADDRESS']; ?>, <?php echo $row['AREA_ADDRESS']; ?>"/></td>
  </tr>
  <tr>
    <td height="31" colspan="2"><font color="#000080"><strong>(d) The full address of each branch</strong></font></td>
  </tr>
  <tr>
    <td height="34" colspan="2">&nbsp;</td>
    
  </tr>
  <tr>
    <td colspan="2"><font color="#000080"><strong>(e) Particulars of the partners (other than corporations)</strong></font></td>
    
  </tr>
</table>


<?PHP

while($row2 = sqlsrv_fetch_array($result2)) {
echo "	
<table width='801' border='0' align='center'>
  <tr>
    <td width='200' height='206'>
    <table width='613' border='0' cellpadding='0' bordercolor='#000000'>
      <tr>
        <td width='142' height='60'><label for='textfield2'></label>
          <input type='text' name='textfield2' id='textfield2' class='box2' value='NAME' size='8' /></td>
        <td width='273'><label for='textfield'></label>
          <input type='text' class='box' name='textfield' id='textfield' size='50' value=". $row2['PARTNERS_NAME']." /></td>
        <td width='78'><input type='text' class='box2' value='SEX'  size='4' /></td>
        <td width='92'><input type='text' class='box' size='5' value=".$row2['SEX']." /></td>
      </tr>
      
    </table>
      <table width='613' border='0'>
        <tr>
          <td height='39'><input type='text' class='box2' value='RESIDENTIAL ADDRESS' size='26' /></td>
          <td rowspan='2'><input type ='text' class ='resizedTextbox' value=". $row2['STREET_ADDR'].", ".$row2['TOWN_ADDR']." ".$row2['LGA']." /></td>
        </tr>
          <td height='30'>&nbsp;</td>
          
    </table>
      <table width='611' border='0'>
        <tr>
          <td><input type='text' class='box2' value='OCCUPATION' size='13' /></td>
          <td><input type='text' class='box' size='20' value=". $row2['OCCUPATION']."  /></td>
          <td>EMAIL:</td>
          <td><input type='text' class='box' size='30' value=". $row2['EMAIL']." /></td>
        </tr>
    </table></td>
    <td width='591'><table width='200' border='1'>
      <tr>
        <td height='177'>&nbsp;</td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
      	<td height='73' colspan='2'><table width='815' border='0'>
      	  <tr>
      	    <td><input type='text' class='box2' value='NATIONALITY' size='14' /></td>
      	    <td><input type='text' class='box' size='16' value=". $row2['NATIONALITY']." /></td>
            
    
      	    <td rowspan='2'><textarea rows='2' cols='17' class='box2' >ANY FORMER NATIONALITY</textarea></td>
      	    <td rowspan='2'><textarea rows='2' cols='11' class='box' value=". $row2['FORMER_NATIONALITY']."></textarea></td>
      	    <td><input type='text' class='box2' value='AGE' size='6' /></td>
      	    <td>&nbsp;</td>
      	    <td>&nbsp;</td>
   	      </tr>
          <td>&nbsp;</td>
      	    <td>&nbsp;</td>
            <td><input type='text' class='box' size='5' /></td>
      	    <td>SIGN:______</td>
      	    <td>&nbsp;</td>
   	    </table></td>
  </tr>
  
 
  
  
</table>";
}

?>

 <table border="0" width="900">
  <tr>
  <td height="50"><p>&nbsp;</p>
    <p><font color="#000080"><strong>(f) Particulars of each corporation which is a partner</strong></font></p></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  
  </table>
  <table border="0" width="900">
  <tr>
  <td height="47"><font color="#000080"><strong>(g) Date of Commencement of business:</strong></font></td>
  <td ><label for="textfield3"></label>
    <input type="text" name="textfield3" id="textfield3" class="box" value="<?php echo $x; ?>" /></td>
  </tr>
  <tr>
  <td height="130" colspan="2"><p><font color="#000080" size="+1"><strong>Notes. We hereby certify that the foregoing particulars are to the best of our knowledge and belief,<br />
      correct and we undertake to notify the Registrar of Business Names whenever any change is made<br />
      or occurs in any of them other than the age of any of the partners.</strong></font></p></td>
  </tr> 
 </table>

<table border="0" width="900">
  <tr>
  <td width="66"><strong>1</strong></td>
  <td width="560" rowspan="2"><font color="#000080"><em><strong>Signature of a Magistrate, a legal practioner or<br />
    a Police Officer of the rank of ASP and above<br />
    where one of the partners is a minor.</strong></em></font></td>
  <td width="252"><font color="#000080"><em><strong>Signature:_______________________</strong></em></font></td>
  </tr>
  
  <tr>
  <td>&nbsp; </td>
  <td><font color="#000080"><em><strong>Rank___________________________</strong></em></font></td>
  </tr>
 <tr>
 
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
 
 
  <td><strong>2</strong></td>
  <td rowspan="2"><font color="#000080"><em><strong>Signature of a Director or Secretary of the<br />
    Company that is a partner.</strong></em></font></td>
  <td><font color="#000080"><em><strong>Signature</strong></em><strong>: ______________________</strong></font></td>
  </tr>
  
  <tr>
  <td height="41">&nbsp; </td>
  <td><font color="#000080"><em><strong>Seal:</strong></em></font></td>

  </tr>
  <tr>
    <td height="41" colspan="3">&nbsp;</td>
  </tr>
  
   <tr>
    <td colspan="3">
    
    <table border="0" width="900">
    <tr>
    <td width="266"><font color="#000080"><em><strong>Dated this</strong></em></font></td>
    <td width="618"><strong> <?php $date = date_create(); $ts = date_timestamp_get($date); echo date('l F jS, Y', $ts); ?></strong></td>
    </tr>
    <tr>
    <td height="58">&nbsp;</td>
        <td height="58">&nbsp;</td>

    </tr>
    </table>
    
    </td>
  </tr>
  
  </table>





</form>



</td>
</tr>
</table>
</body>
</html>
