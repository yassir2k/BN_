<?php
include("conn.php");
$state = $_GET['state'];
if(isset($_GET['index']))
{
  $index = $_GET['index'];
  $query="SELECT lga FROM tbl_lga WHERE state='$state'";
  $result = sqlsrv_query($conn,$query);
  ?>
  
  <select id="lga_<?php echo $index; ?>" style="width:200px">
  <!-- <option>Choose A Sub Category</option> //-->
  <option value=""></option>
  <?php 
  $pattern = "/'/";
  $replacement = "''";
  while($row = sqlsrv_fetch_array($result)) 
	{ ?>
	  <option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"><?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
  <?php } ?>
  </select>
  <?php
}
else
{
	$query="SELECT lga FROM tbl_lga WHERE state='$state'";
	$result = sqlsrv_query($conn,$query);
	?>
	
	<select id="lga" style="width:200px">
	<!-- <option>Choose A Sub Category</option> //-->
	<option value=""></option>
	<?php 
	$pattern = "/'/";
	$replacement = "''";
	while($row = sqlsrv_fetch_array($result)) 
	  { ?>
		<option value="<?php echo preg_replace($pattern,$replacement,$row[0]);?>"><?php echo preg_replace($pattern,$replacement,$row[0]);?></option>
	<?php } ?>
	</select>
	<?php
}
?>
