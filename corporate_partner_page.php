<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bn_css.css"/>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/cp_pagejs.js"></script>
<title></title>
</head>

<body>
<div id="displayer">
<?php 
$avc = $_REQUEST["avc"];
?>
<input type="hidden" value="<?php echo $avc; ?>" id="avc" />
<fieldset style="width:900px; background-color:#f5f5f5">
<legend align="left" style="font-size:20px; font-family:Cambria; color:#003300; font-weight:bold">
Corporate Partners
</legend>
<table style="font-family:cambria; font-size:13px; color:#333333" width="auto" height="auto" cellpadding="4" cellspacing="1">
<tr>
<tr>
<td align="left">
Number of Corporate Partners:
</td>
<!------------------------------------------------------------------------------------------------------>
<td align="left">
    <select id="cPartnersNum" style="width:50px;">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>
</td>
<!------------------------------------------------------------------------------------------------------>
</tr>
</tr>
</table>
<br />
<div id="displayCPartners">
</div>
<input type="button" style="font-family:cambria; font-size:13px; color:#333333" id="finish" value="Skip & Finish >>" />
</fieldset>
</div>
</body>
</html>