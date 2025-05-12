<?php
include("header.php");
if(isset($_POST['submit']))
{
	$filename = rand() . $_FILES['photo_img']['name'];
	move_uploaded_file($_FILES['photo_img']['tmp_name'],"imggallery/".$filename);
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		 $sql ="UPDATE photo SET photo_title='$_POST[photo_title]'";
		 if($_FILES['photo_img']['name'] != "")
		 {
		 $sql = $sql . ", photo_img='$filename'";
		 }
		 $sql = $sql . ",gallery_type_id='$_POST[gallery_type_id]',photo_status='$_POST[photo_status]' WHERE photo_id ='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<script>viewmessagebox('Photo record updated successfully....','viewphoto.php')</script>";
		}
		//Update statement ends here		
	}
	else
	{
		//INSERT statement starts here
		$sql = "INSERT INTO photo(gallery_type_id,photo_title,photo_img,photo_status) VALUES('$_POST[gallery_type_id]','$_POST[photo_title]','$filename','$_POST[photo_status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<script>viewmessagebox('New Photo Uploaded to the Gallery....','photo.php')</script>";
		}
		//INSERT statement starts here
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM photo WHERE photo_id ='" . $_GET['editid'] ."'";
	$qsqledit = mysqli_query($con,$sqledit);
	echo mysqli_error($con);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	</div>
	<!-- //banner -->
	<!-- page details -->
	<div class="breadcrumb-agile">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>	
		</ol>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Photo Gallery</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree" enctype="multipart/form-data" name="frmform" id="frmform" onsubmit="return validateform()">
<?php
if(isset($_GET['editid']))
{
?>
<input type="hidden" id="photo_id" name="photo_id" value="<?php echo $_GET['editid']; ?>" >
<?php
}
else
{
?>
<input type="hidden" id="photo_id" name="photo_id" value="0" >
<?php
}
?>
	<div class="form-group">
		<label>
			Gallery Type
		</label><span class="errclass" id="idgallery_type_id"></span>
		<select name="gallery_type_id" class="form-control">
			<option value="">Select Gallery Type</option>
			<?php
			$sqlblocks = "SELECT * FROM gallery_type where gallery_type_status='Active'";
			$qsqlblocks = mysqli_query($con,$sqlblocks);
			while($rsblocks = mysqli_fetch_array($qsqlblocks))
			{
				if($rsblocks['gallery_type_id'] == $rsedit['gallery_type_id'])
				{
				echo "<option value='$rsblocks[gallery_type_id]' selected>$rsblocks[gallery_type]</option>";
				}
				else
				{
				echo "<option value='$rsblocks[gallery_type_id]' >$rsblocks[gallery_type]</option>";
				}
			}
			?>
		</select>
	</div>
		
	<div class="form-group">
		<label>
			Photo title
		</label><span class="errclass" id="idphoto_title"></span>
		<input class="form-control" type="text" placeholder="Photo title" name="photo_title" id="photo_title" value="<?php echo $rsedit['photo_title'];?>" >
	</div>
		
	<div class="form-group">
		<label>Event banner</label><span class="errclass" id="idphoto_img"></span>
		<input class="form-control" type="file" name="photo_img" id="photo_img"  >
		<img src="imggallery/<?php echo $rsedit['photo_img'];?>" style="width: 100%;">
	</div>
	
	<div class="form-group">
		<label>
			Status
		</label><span class="errclass" id="idphoto_status"></span>
		<select name="photo_status" id="photo_status" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Published","Draft");
			foreach($arr as $val)
			{
				if($val == $rsedit['photo_status'])
				{
				echo "<option value='$val' selected>$val</option>";
				}
				else
				{
				echo "<option value='$val'>$val</option>";
				}
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
<script>
function validateform()
{
	var errstatus = "true";
	if(document.frmform.gallery_type_id.value == "")
	{
		document.getElementById("idgallery_type_id").innerHTML = "Gallery Type should not be empty...";
		errstatus = "false";
	}
	
	if(document.getElementById("photo_title").value == "")
	{
		document.getElementById("idphoto_title").innerHTML = "Photo Title should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.photo_img.value == "")
	{
		if(document.frmform.photo_id.value == 0)
		{
			document.getElementById("idphoto_img").innerHTML = "Kindly upload the photo..";
			errstatus = "false";
		}
	}
	if(document.getElementById("photo_status").value == "")
	{
		document.getElementById("idphoto_status").innerHTML = "Kindly select the status...";
		errstatus = "false";
	}
	if(errstatus == "true")
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>