<?php
session_start();
include'connection.php';
$exe=$obj->query("select * from user where role_id='1'");
$row=$exe->fetch_object();
$gender=$row->gen;
$c=$row->city;
$state=$row->state;
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gen=$_POST['gen'];
	$dob=$_POST['dob'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	// $degree=$_POST['degree'];
	$work_exp=$_POST['work_exp'];
	$status=$_POST['status'];

	$result=$obj->query("update user set u_fname='$fname',u_lname='$lname',gen='$gen',dob='$dob',email='$email',contact='$contact',address='$address',city='$city',state='$state',work_exp='$work_exp',status='$status' where role_id='1' ");
	if($result)
	{
		// echo "<script>alert('Record updateed succefully');</script>";
		header('location: http://localhost/oibp/Innovators/dashboard.php');
	}
	else
	{
		echo "<script>alert('something is wrong');</script>";
	}

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Form Layouts | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<!-- sidebar start -->
		<?php
		include'common/sidebar.php';
		?>
		<!-- sidebar finish -->

		<div class="main">
			<!-- header start -->
			<?php
			include'common/header.php';
			?>
		<!-- header finish -->


<main class="content">
	<div class="container-fluid p-0">

			<div class="col-12 col-xl-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Edit profile</h5>
						</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">First name</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row->u_fname; ?>">
				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">Last Name</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row->u_lname; ?>">
				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">Gender</label>
				<div class="col-sm-7">
					<input type="radio" class="form-check-input" id="gen1" name="gen" value="female"  <?php if($gender == 'female') echo "checked"; ?> > Female
					<input type="radio" class="form-check-input" id="gen2" name="gen" value="male" <?php if($gender == 'male') echo "checked"; ?> > Male
				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">Date of Birth</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="dob" name="dob" value="<?php echo $row->dob; ?>">
				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">Email</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="email" name="email" value="<?php echo $row->email; ?>">
				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">Contact</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="contact" name="contact" value="<?php echo $row->contact; ?>">
				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">Address</label>
				<div class="col-sm-7">
					<textarea class="form-control"rows="3" id="address" name="address"><?php echo $row->address; ?></textarea>
				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">City</label>
				<div class="col-sm-7">
					<select class="form-control mb-3" id="city" name="city">
				           <option value=" ">-- select City --</option>
							<option value="ahmedabad" <?php if($row->city == 'ahmedabad') echo "selected"; ?> > Ahmedabad</option>
							<option value="mehsana" <?php if($row->city == 'mehsana') echo "selected"; ?>>Mehsana</option>
							<option value="surat" <?php if($row->city =='surat') echo "selected"; ?>>Surat</option>
									          
					</select>

				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">State</label>
				<div class="col-sm-7">
					<select class="form-control mb-3" id="state" name="state">
				          	<option value=" ">-- select state --</option>
							<option value="gujarat" <?php if($row->state == 'gujarat') echo "selected"; ?> > Gujarat</option>
						<option value="delhi" <?php if($row->state == 'delhi') echo "selected"; ?>>Dilhi</option>
							<option value="maharastra" <?php if($row->state=='maharastra') echo "selected"; ?>>Maharashtra</option>
							<option value="rajeshthan" <?php if($row->state=='rajeshthan') echo "selected"; ?>>Rajeshthan</option>		          
					</select>

				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">Work Experiance</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="work_exp" name="work_exp" value="<?php echo $row->work_exp; ?>">
				</div>
		</div>
</div>

<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">Status</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="status" name="status" value="<?php echo $row->status; ?>">
				</div>
		</div>
</div>

	<div class="mb-3 row">
		<div class="col-sm-10 ml-sm-auto">
			<input type="submit" name="submit" value="Update" class="btn-primary">
		</div>
	</div>
	</form>
	</div>
</div>
</div>
</form>
								</div>
							</div>
						</div>
					</div>

				</div>
</main>

			<!-- footer start-->
		<?php include'common/footer.php';?>
		<!--footer finish-->
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>