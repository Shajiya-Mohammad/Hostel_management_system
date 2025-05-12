<?php
include("header.php");
?>
	<!-- banner -->
	<div class="banner-w3pvt">
	<?php include("slider.php"); ?>
	</div>
	<!-- //banner -->
	
		<!-- events -->
	<div class="about-w3sec" id="event">
		<div class="container py-xl-5">
			<div class="title text-center mb-sm-5 mb-4"><h4 class="title-w3 text-bl text-center font-weight-bold"> ANDHRA UNIVERSITY HOSTEL MANAGEMENT</h4>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="evnt-grid p-sm-5 p-4">
				<div class="row">
					<div class="col-lg-12 col-sm-3 text-center mt-2">
<p><b>The Hostel Management System developed by Andhra University is a digital platform designed to streamline the management of hostel operations.</b></p>
<p><b>It automates key functions like room allocation, fee management, attendance tracking, maintenance requests, and communication between students and administration. The system also handles mess management, visitor tracking, and generates detailed reports for the administration. By leveraging technology, this system improves efficiency, transparency, and convenience for both hostel residents and management, contributing to a smoother and more organized living experience.</b></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //events -->
<?php
if(!isset($_SESSION['hostellerid']))
{
	if(!isset($_SESSION['guestid']))
	{
		if(!isset($_SESSION['emp_id']))
		{
		?>
	<!-- news -->
	<section class="blog_w3ls " id="news">
		<div class="container py-xl-5 py-lg-3"><hr>
			<div class="title text-center mb-sm-5 mb-4">
				<h4 class="title-w3 text-bl text-center font-weight-bold"> ACCOUNT PANEL</h4>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>

					<div class="row pt-4">

						<!-- blog grid -->
						<div class="col-lg-3 col-md-3 mt-lg-0 mt-5">
							<div class="card border-0 med-blog">
								<div class="card-header p-0">
									<a href="hostellerlogin.php">
										<img class="card-img-bottom" src="images/hostel1.jpg" alt="Card image cap">
									</a>
								</div>
								<div class="card-body border border-top-0 pb-5">
									<div class="mb-3">
										<h5 class="blog-title card-title font-weight-bold m-0">
											<a href="hostellerlogin.php">Hosteller - Login</a>
										</h5>
									</div>
									<a href="hostellerlogin.php" class="blog-btn">Click here to Login</a>
								</div>
							</div>
						</div>
						<!-- //blog grid -->
						<!-- blog grid -->
						<div class="col-lg-3 col-md-3 mt-md-0 mt-5">
							<div class="card border-0 med-blog">
								<div class="card-header p-0">
									<a href="hosteller.php">
										<img class="card-img-bottom" src="images/hostel2.jpg" alt="Card image cap">
									</a>
								</div>
								<div class="card-body border border-top-0 pb-5">
									<div class="mb-3">
										<h5 class="blog-title card-title font-weight-bold m-0">
											<a href="hosteller.php">Hosteller - Register</a>
										</h5>
									</div>
									<a href="hosteller.php" class="blog-btn">Click here to Register</a>
								</div>
							</div>
						</div>
						<!-- //blog grid -->
						<!-- blog grid -->
						<div class="col-lg-3 col-md-3 mt-lg-0 mt-5">
							<div class="card border-0 med-blog">
								<div class="card-header p-0">
									<a href="guestlogin.php">
										<img class="card-img-bottom" src="images/hostel3.jpg" alt="Card image cap">
									</a>
								</div>
								<div class="card-body border border-top-0 pb-5">
									<div class="mb-3">
										<h5 class="blog-title card-title font-weight-bold m-0">
											<a href="guestlogin.php">Visitor - Login</a>
										</h5>
									</div>
									<a href="guestlogin.php" class="blog-btn">Click here to Register</a>
								</div>
							</div>
						</div>
						<!-- //blog grid -->
						<!-- blog grid -->
						<div class="col-lg-3 col-md-3 mt-lg-0 mt-5">
							<div class="card border-0 med-blog">
								<div class="card-header p-0">
									<a href="guest.php">
										<img class="card-img-bottom" src="images/hostel4.jpg" alt="Card image cap">
									</a>
								</div>
								<div class="card-body border border-top-0 pb-5">
									<div class="mb-3">
										<h5 class="blog-title card-title font-weight-bold m-0">
											<a href="guest.php">Visitor - Register</a>
										</h5>
									</div>
									<a href="guest.php" class="blog-btn">Click here to Register</a>
								</div>
							</div>
						</div>
						<!-- //blog grid -->
					</div>
		
		</div>
	</section>
	<!-- //blog -->
		<?php
		}
	}
}
?>	
<?php
include("footer.php");
?>