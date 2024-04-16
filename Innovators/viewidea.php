<?php
include'connection.php';
session_start();

$id=$_GET['vid'];
$idea=$obj->query("SELECT * FROM `idea` where id='$id'");
$row=$idea->fetch_object();


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

	

	if(!isset($_FILES['file_upload']) || $_FILES['file_upload']['error'] == UPLOAD_ERR_NO_FILE)
    {
          $file = $row->file;
    } 
    else 
    {
         	$file = $_FILES['file']['name'];
		    $tmp = $_FILES['file']['tmp_name'];
		    $path = "upload/$file";
		    move_uploaded_file($tmp, $path);
    }

    $exe=$obj->query("update idea set title='$title', smdesc='$sdesc', lddesc='$ldesc', cat_id='$cat_id', sub_id='$subcat_id', file='$file', duration='$duration', price='$price', date='$date', status='$status' where id='$id'");
	
	if($exe)
	{
		echo "<script>alert('Idea Updated Successfully'); document.location='all_idea.php';</script>";
	}
	else
	{
		echo "<script>alert('something is wrong');</script>";
		///echo "Failed : " . mysqli_error($obj);
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
						<h1 class="alert alert-info h2 p-3">Edit Idea Details</h1> 
	<div class="container-fluid p-0">

			<div class="col-12 col-xl-12">
				<div class="card">
					<div class="card-header">
						</div>
<div class="card-body">
	<form method="post" enctype="multipart/form-data">
		<div class="mb-1 row">
			<label class="col-form-label col-sm-4 text-sm-right">Enter Ttile</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $row->title;?>">
				</div>
		</div>
</div>
<div class="mb-3 row">
	<label class="col-form-label col-sm-4 text-sm-right">Small Description</label>
		<div class="col-sm-7">
			<textarea id="sdesc" name="sdesc" class="form-control" placeholder="small description" rows="3"><?php echo $row->smdesc;?></textarea>
		</div> 
</div>
<div class="mb-3 row">
	<label class="col-form-label col-sm-4 text-sm-right">Long Description</label>
		<div class="col-sm-7">
			<textarea id="ldesc" name="ldesc" class="form-control" placeholder="long description" rows="3"><?php echo $row->lddesc;?></textarea>
		</div>
</div>

<div class="mb-3 row">
	<label class="col-form-label col-sm-4 text-sm-right">category</label>
		<div class="col-sm-7">
			<select class="form-control mb-3" id="cat_id" name="cat_id">
		          <option>-- Select Categories --</option>
		          <?php
		          while($row1=$category->fetch_object())
		          {
		          ?>
		          <option value="<?php echo $row1->cat_id?>" 
		          	<?php if($row1->cat_id==$row->cat_id) echo 'selected';?>> <?php echo $row1->cat_name; ?></option>
		          <?php
		      		}
		      		?>
		          
        	</select>
        </div>
</div>
<div class="mb-3 row">
	<label class="col-form-label col-sm-4 text-sm-right">Sub Category</label>
		<div class="col-sm-7">
			<select class="form-control mb-3" id="subcat_id" name="subcat_id">
		          <option>-- Select Sub Categories --</option>
		          <?php
		          while($row2=$subcat->fetch_object())
		          {
		          ?>
		          <option value="<?php echo $row2->sub_id?>" <?php if($row2->sub_id==$row->sub_id) echo 'selected';?>> <?php echo $row2->sub_name; ?></option>
		          <?php
		      		}
		      		?>
		          
        	</select>
        </div>
</div>
<div class="card-body">
	<form method="post" enctype=multipart/form-data>
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">File</label>
				<div class="col-sm-7">
					<input type="file" class="form-control" id="file" name="file">
				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">Enter Duration</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="duration" name="duration" placeholder="Duration" value="<?php echo $row->duration;?>">
				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">Enter Price</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="price" name="price" placeholder="price" value="<?php echo $row->price;?>">
				</div>
		</div>
</div>

<div class="mb-3 row">
	<label class="col-form-label col-sm-4 text-sm-right">Status</label>
		<div class="col-sm-7">
			<select class="form-control mb-3" id="status" name="status">
		          <option value="active" <?php if($row->status=='active') echo 'selected';?>>Active</option>
		          <option value="inactive" <?php if($row->status=='inactive') echo 'selected';?>>InActive</option>    
        	</select>
        </div>
</div>

	<div class="mb-3 row">
		<div class="col-sm-10 ml-sm-auto">
			<input type="submit" name="submit" value="Update" class="btn-primary"  style = "width:30%;margin-left: 120px;padding: 5px;font-weight: bold;">
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
