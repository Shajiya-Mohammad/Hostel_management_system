<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO feesstructure(block_id,usertype,room_type,cost,status)VALUES('$_POST[block_id]','$_POST[usertype]','$_POST[room_type]','$_POST[cost]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 ) {
		echo "<SCRIPT>alert('record inserted successfully..');</SCRIPT>";
		echo "<script>window.location='feesstructure.php';</script>";
	}
}
?>
	</div>
	<!-- //banner -->
	<!-- page details -->
	<div class="breadcrumb-agile">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item">
				<a href="index.php">Home</a>
			</li>
		</ol>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Fees structure</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree">
	<div class="form-group">
		<label>
		Block ID
		</label>
		<select name="block_id" class="form-control">
			<option value="">Select</option>
		</select>
	</div>
	<div class="form-group">
		<label>
		User type
		</label>
		<select name="usertype" class="form-control">
			<option value="">Select</option>
		</select>
	</div>
	<div class="form-group">
		<label>
		Room type
		</label>
		<select name="room_type" class="form-control">
			<option value="">Select</option>
		</select>
	</div>
	<div class="form-group">
		<label>
			Cost
		</label>
		<input class="form-control"  type="text" name="cost">
	</div>
	
	<div class="form-group">
		<label>
			Status
		</label>
		<select name="status" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Active","Inactive");
			foreach($arr as $val)
			{
				echo "<option value='$val'>$val</option>";
			}
			?>
		</select>
	</div>

	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Submit</button>
	</div>
</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //contact -->

	<?php
	include("footer.php");
	?>