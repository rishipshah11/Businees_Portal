<?php
include'connection.php';
if(isset($_POST['submit']))
{
	$cname=$_POST['cat_name'];
	$exe=$obj->query("insert into category(cat_name)values('$cname')");
	if($exe)
	{
		echo "<script>alert('category added');</script>";
		

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

			<div class="col-12 col-xl-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Add Categories</h5>
						</div>
<div class="card-body">
	<form method="post">
		<div class="mb-2 row">
			<label class="col-form-label col-sm-3 text-sm-right">Enter Categories</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Enter New Category" required="" 
                            pattern="[a-zA-Z]+[a-zA-Z ]+" title="CatName Must be Valid">
				</div>
		</div>
</div>
	<div class="mb-4 row">
		<div class="col-sm-9 ml-sm-auto">
			<input type="submit" name="submit" value="Add New Category" class="btn-primary">
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