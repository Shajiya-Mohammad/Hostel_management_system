<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$dt = date("Y-m-d");
include("connection.php");
$sqlguestfees_structure = "SELECT * FROM fees_structure WHERE hostellertype='Guest'";
$qsqlguestfees_structure = mysqli_query($con,$sqlguestfees_structure);
$rsguestfees_structure = mysqli_fetch_array($qsqlguestfees_structure);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>ONLINE HOSTEL MANAGEMENT SYSTEM Hostel Management System</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Arizonia&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Righteous&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Great+Vibes&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- //Web-Fonts -->
	<link href="css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="js/jquery-3.3.1.js"></script>	
	<script src="js/jquery.dataTables.min.js"></script>
	<style>
	.errclass
	{
		color: red;
		padding-left: 5px;
	}
	</style>
<script src="js/sweetalert.min.js"></script>
<script>
function viewmessagebox(msg,pagename)
{
	swal({title: 'HMS Hostel..',text: msg, type: 'success'}).then(function() {  window.location =  pagename;});
}
</script>

</head>

<body>
<?php
include("topmenu.php");
?>
<?php
if(basename($_SERVER['PHP_SELF']) == "index.php")
{
?>
	<div class="main-w3pvt" id="home" style="background-color:black;">
<?php
}
else
{
?>	
	<div class="main-w3pvt-2" id="home" >
<?php
}
?>
		<!-- header -->
		<header style="background-color: #060619;opacity: 0.6;filter: Alpha(opacity=50);height: 80px;">
			<div class="container-fluid">
				<div class="header d-md-flex justify-content-between align-items-center py-3 px-lg-3 px-2">
					<!-- logo -->
					<div id="logo">
						<img src="images/logo.png" alt="" class="img-fluid" style="height: 60px;">
					</div>
					<!-- //logo -->
					<!-- nav -->
					<div class="nav_w3ls">
<nav>
	<label for="drop" class="toggle">Menu</label>
	<input type="checkbox" id="drop" />
	<ul class="menu">	
		
		<li class="mx-lg-1 mx-md-1 my-md-1 my-1"><a href="index.php">Home</a></li> 
		<li class="mx-lg-1 mx-md-1 my-md-1 my-1"><a href="about.php">About</a></li>		
		<?php
		if(!isset($_SESSION['hostellerid']))
		{
			if(!isset($_SESSION['guestid']))
			{
				if(!isset($_SESSION['emp_id']))
				{
		?>
		<li class="mx-lg-1 mx-md-1 my-md-1 my-1">
			<!-- First Tier Drop Down -->
			<label for="drop-2" class="toggle toogle-2">Hosteller <span class="fa fa-angle-down" aria-hidden="true"></span>
			</label>
			<a href="#">Hosteller <span class="fa fa-angle-down" aria-hidden="true"></span></a>
			<input type="checkbox" id="drop-2" />
			<ul>
				<li><a href="hostellerlogin.php" class="drop-text">Login</a></li>
				<li><a href="hosteller.php" class="drop-text">Register</a></li>
			</ul>
		</li>
		
		<li class="mx-lg-1 mx-md-1 my-md-1 my-1">
			<!-- First Tier Drop Down -->
			<label for="drop-12" class="toggle toogle-2">Guest <span class="fa fa-angle-down" aria-hidden="true"></span>
			</label>
			<a href="#">Guest <span class="fa fa-angle-down" aria-hidden="true"></span></a>
			<input type="checkbox" id="drop-12" />
			<ul>
				<li><a href="guestlogin.php" class="drop-text">Login</a></li>
				<li><a href="guest.php" class="drop-text">Register</a></li>
			</ul>
		</li>
		<?php
		if(!isset($_SESSION['emp_id'] ))
		{
		?>
		<li class="mx-lg-1 mx-md-1 my-md-1 my-1"><a href="emplogin.php">Employee</a></li>	
		<?php
		}
		?>
		<?php
				}
			}
		}
		?>
		<li class="mx-lg-1 mx-md-1 my-md-1 my-1">
			<!-- First Tier Drop Down -->
			<label for="drop-2" class="toggle toogle-2">Gallery <span class="fa fa-angle-down" aria-hidden="true"></span>
			</label>
			<a href="#">Gallery <span class="fa fa-angle-down" aria-hidden="true"></span></a>
			<input type="checkbox" id="drop-2" />
			<ul>
			<?php
				$sql ="SELECT * FROM gallery_type WHERE gallery_type_status='Active'";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
			?>
				<li><a href="gallery.php?gallery_type_id=<?php echo $rs['gallery_type_id']; ?>" class="drop-text"><?php echo $rs['gallery_type'];?></a></li>
			<?php
				}
			?>
			</ul>
		</li>
		<li class="mx-lg-1 mx-md-1 my-md-1 my-1"><a href="displayevents.php">Events</a></li>
		<li class="mx-lg-1 mx-md-1 my-md-1 my-1"><a href="contact.php">Contact Us</a></li>
		
	</ul>
</nav>
					</div>
					<!-- //nav -->
				</div>
			</div>
		</header>
		<!-- //header -->