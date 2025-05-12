<?php
include("header.php");
if(!isset($_SESSION['emp_id']))
{
	echo "<script>window.location='emplogin.php';</script>";
}
?>
</div>
	<!-- //banner -->
	<!-- news -->
	<section class="blog_w3ls py-5" id="news">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Employee Dashboard</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>		
<div class="col-md-12">
<h4 style='color: red'>Recent Admissions:</h4>
	<table id="datatable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Hosteller</th>		
			<th>Room No.</th>		
			<th>Start date</th>		
			<th>End date</th>		
			<th>Food Type</th>		
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM admission LEFT JOIN hosteller ON admission.hostellerid=hosteller.hostellerid LEFT JOIN room ON room.room_id=admission.room_id WHERE admission.status='Active' Order by admission_id DESC limit 0,3";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[hostellertype] - $rs[name]</td>		
			<td>$rs[room_no]</td>		
			<td>" . date("d-m-Y",strtotime($rs['start_date'])) . "</td>		
			<td>" . date("d-m-Y",strtotime($rs['end_date'])) . "</td>		
			<td>$rs[food_type]</td>			
		</tr>";
	}
	?>
	</tbody>
</table>					

</div>			
			
			
			<div class="row pt-4">
			
			
				<!-- blog grid -->
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10" align="center" style="color:red;">Admission records</h5>
							<a href="#">
								<img class="card-img-bottom" src="images/admissions.jpg" style="width:90%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-">
								<h5 class="blog-title card-title font-weight-bold m-10">
	<?php
	$sql = "SELECT  * FROM admission";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewadmission.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				
				<!-- blog grid -->
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10" align="center" style="color:red;">Attendance records</h5>
							<a href="#">
								<img class="card-img-bottom" src="images/attendance.jpg" style="width:90%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-">
								<h5 class="blog-title card-title font-weight-bold m-10">
	<?php
	$sql = "SELECT  * FROM attendance";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewattendance.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10"  align="center" style="color:red;">Billing records</h5>
								<img class="card-img-bottom" src="images/billing.jpg" style="width:90%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-">
								<h5 class="blog-title card-title font-weight-bold m-10">
	<?php
	$sql = "SELECT  * FROM billing";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewbilling.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10" " align="center" style="color:red;">Blocks records</h5>
								<img class="card-img-bottom" src="images/blocks.jpg" style="width:80%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-">
								<h5 class="blog-title card-title font-weight-bold m-10">
	<?php
	$sql = "SELECT  * FROM blocks";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewblocks.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10" " "m-0" align="center" style="color:red;">Employee records</h5>
								<img class="card-img-bottom" src="images/employ.png" style="width:80%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-">
								<h5 class="blog-title card-title font-weight-bold m-10">
	<?php
	$sql = "SELECT  * FROM employee";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewemployee.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10" "  align="center" style="color:red;">Event records</h5>
								<img class="card-img-bottom" src="images/events.jpg" style="width:70%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-">
								<h5 class="blog-title card-title font-weight-bold m-10">
	<?php
	$sql = "SELECT  * FROM event";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewevent.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10"  align="center" style="color:red;">Fees records</h5>
								<img class="card-img-bottom" src="images/fees.jpg" style="width:70%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-">
								<h5 class="blog-title card-title font-weight-bold m-10">
	<?php
	$sql = "SELECT  * FROM fees";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewfees.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10" align="center" style="color:red;">Fees structure records</h5>
							<a href="#">
								<img class="card-img-bottom" src="images/feesstruct.jpg" style="width:70%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-">
								<h5 class="blog-title card-title font-weight-bold m-10">
	<?php
	$sql = "SELECT  * FROM fees_structure";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewfeesstructure.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10" align="center" style="color:red;">Guest records</h5>
							<a href="#">
								<img class="card-img-bottom" src="images/guest.jpg" style="width:70%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-">
								<h5 class="blog-title card-title font-weight-bold m-10">
	<?php
	$sql = "SELECT  * FROM guest";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewguest.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10" align="center" style="color:red;">Hosteller records</h5>
							<a href="#">
								<img class="card-img-bottom" src="images/images.png" style="width:70%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-">
								<h5 class="blog-title card-title font-weight-bold m-10">
	<?php
	$sql = "SELECT  * FROM hosteller";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewhosteller.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10" align="center" style="color:red;">Mess bill records</h5>
							<a href="#">
								<img class="card-img-bottom" src="images/mess.png" style="width:70%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-">
								<h5 class="blog-title card-title font-weight-bold m-10">
	<?php
	$sql = "SELECT  * FROM mess_bill";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewmessbill.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="card border-50 med-blog">
						<div class="card-header p-150">
						<h5 class="blog-title card-title font-weight-bold m-10" align="center" style="color:red;">Room records</h5>
							<a href="#">
								<img class="card-img-bottom" src="images/room.jpg" style="width:70%; height:200px;" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-10 pb-15">
							<div class="mb-3">
								<h5 class="blog-title card-title font-weight-bold m-0">
	<?php
	$sql = "SELECT  * FROM room";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> records
								</h5>
							</div>
							<a href="viewroom.php" class="blog-btn">Click here</a>
						</div>
					</div>
				</div>
				</section
	
	
				
				
				<!-- //blog grid -->
				
<?php
include("footer.php");
?>



