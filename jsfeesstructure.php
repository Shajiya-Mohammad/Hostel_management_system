<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT &  ~E_WARNING);
date_default_timezone_set('Asia/Kolkata');
$dt = date("Y-m-d");
include("connection.php");
?>
<label>Fee structure </label>
<span class="errclass" id="idfee_str_id"></span>
<select name="fee_str_id" class="form-control">
	<option value="">Select</option>
	<?php
	$sqlblocks = "SELECT * FROM fees_structure where status='Active' ";
	echo $sqlblocks = $sqlblocks . " AND block_id='$_GET[block_id]'";
	$qsqlblocks = mysqli_query($con,$sqlblocks);
	echo mysqli_error($con);
	while($rsblocks = mysqli_fetch_array($qsqlblocks))
	{
		if($rsblocks['fee_str_id'] == $rsedit['fee_str_id'])
		{
		echo "<option value='$rsblocks[fee_str_id]' selected>$rsblocks[hostellertype] - $rsblocks[room_type] - $currencysymbol $rsblocks[cost]</option>";
		}
		else
		{
		echo "<option value='$rsblocks[fee_str_id]' >$rsblocks[hostellertype] - $rsblocks[room_type] - $currencysymbol $rsblocks[cost]</option>";
		}
	}
	?>
</select>