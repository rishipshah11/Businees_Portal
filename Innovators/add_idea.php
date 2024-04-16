<?php
session_start();
include'connection.php';
$category=$obj->query('select * from category');
$subcat=$obj->query('select * from subcategory');
$innovator=$obj->query('select * from innovator');
if(isset($_POST['submit']))
{
	$title=$_POST['title'];
	$sdesc=$_POST['sdesc'];
	$ldesc=$_POST['ldesc'];
	$cat_id=$_POST['cat_id'];
	$subcat_id=$_POST['subcat_id'];
	
	$duration=$_POST['duration'];
	$price=$_POST['price'];
	$date= date('Y-m-d');
	$status=$_POST['status'];
	$innovator_id= $_SESSION['in_id'];

	$file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $path = "upload/$file";

    $exe = explode(".", $file);
    $e = strtolower(end($exe));

    if($e=='pdf')
    {
    	if(move_uploaded_file($tmp, $path))
    	{
    		$exe=$obj->query("insert into idea(title, smdesc, lddesc, cat_id, sub_id, file, duration, price, date, status, in_id)values
				('$title','$sdesc','$ldesc','$cat_id','$subcat_id','$file','$duration','$price','$date','$status','$innovator_id')");
				if($exe)
				{
					echo "<script>alert('New Idea Uploaded Successfully');</script>";
				}
				else
				{
					echo "<script>alert('something is wrong');</script>";
					///echo "Failed : " . mysqli_error($obj);
				}
    	}
    	else
    	{
    		echo "<script>alert('Error in File Uploading..');</script>";
    	}
    }
    else
    {
    	echo "<script>alert('Invalid File Try Again');</script>";
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

	<title>OIBP : INNOVATORS</title>

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

					<h1 class="alert alert-info h2 p-3">Add New Idea</h1> 
			<div class="col-12 col-xl-12">
				<div class="card">
						
					<div class="card-header">
						</div>
<div class="card-body">
	<form method="post" enctype="multipart/form-data">
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Enter Ttile</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="title" name="title" placeholder="Title" required="" 
                            pattern="[a-zA-Z]+[a-zA-Z ]+" title="Title Must be Valid">
				</div>
		</div>
</div>
<div class="mb-3 row">
	<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Small Description</label>
		<div class="col-sm-7">
			<textarea id="sdesc" name="sdesc" class="form-control" placeholder="Small description" rows="3" required=""></textarea>
		</div>
</div>
<div class="mb-3 row">
	<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Long Description</label>
		<div class="col-sm-7">
			<textarea id="ldesc" name="ldesc" class="form-control" placeholder="Long description" rows="3" required=""></textarea>
		</div>
</div>

<div class="mb-1 row">
	<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Category</label>
		<div class="col-sm-7">
			<select class="form-control mb-3" id="cat_id" name="cat_id" required="">
		          <option>-- Select Categories --</option>
		          <?php
		          while($row=$category->fetch_object())
		          {
		          ?>
		          <option value="<?php echo $row->cat_id?>"> <?php echo $row->cat_name; ?></option>
		          <?php
		      		}
		      		?>
		          
        	</select>
        </div>
</div>
<div class="row">
	<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Sub Category</label>
		<div class="col-sm-7">
			<select class="form-control mb-3" id="subcat_id" name="subcat_id" required="">
		          <option>-- Select Sub Categories --</option>
		          <?php
		          while($row=$subcat->fetch_object())
		          {
		          ?>
		          <option value="<?php echo $row->sub_id?>"> <?php echo $row->sub_name; ?></option>
		          <?php
		      		}
		      		?>
		          
        	</select>
        </div>
</div>


<div class="row mb-4">
	<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">File</label>
		<div class="col-sm-7">
			<input type="file" class="form-control" id="file" name="file" accept="application/pdf" required="">
		</div>
</div>

	
		<div class="row mb-4">
			<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Enter Duration</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="duration" name="duration" placeholder="Duration" required="">
				</div>
		</div>

	
		<div class="mb-4 row">
			<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Enter Price</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="price" name="price" placeholder="Price" required="">
				</div>
		</div>

<div class="mb-4 row">
	<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Status</label>
		<div class="col-sm-7">
			<select class="form-control mb-3" id="status" name="status" required="">
		          <option value="active">Active</option>
		          <option value="inactive">InActive</option>    
        	</select>
        </div>
</div>

	<div class="mb-3 row">
		<div class="col-sm-10 ml-sm-auto">
			<input type="submit" name="submit" value="Submit" class="btn-primary"  style = "width:30%;margin-left: 120px;padding: 5px;font-weight: bold;">
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
