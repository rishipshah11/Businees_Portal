<?php
session_start();
$inn_id = $_SESSION['in_id'];

include'connection.php';
$feedback=$obj->query("SELECT myorder.*, user.u_fname,user.u_lname, idea.title FROM myorder
INNER JOIN user ON myorder.u_id=user.u_id 
INNER JOIN idea ON myorder.i_id = idea.id where myorder.inn_id='$inn_id'");
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

	<title>MyOrders</title>

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

					<h1 class="alert alert-info h2 p-3">My Orders</h1> 
				</div> 

						<div class="col-12 col-xl-12">

						</div>

						<div class="col-12 col-xl-12">
							<div class="card">
								
								<table class="table">
									<thead>
										<tr>
											<th style="width:15%">Sr</th>
											<th style="width:15%">Name</th>
											<th style="width:25%">Idea</th>
											<th style="width:25%">Date</th>
											<th style="width:25%">Amount</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while($row=$feedback->fetch_object())
										{
											?>
											<tr>
												<td> <?php echo $row->ord_id; ?></td>
											    <td><?php echo $row->u_fname." ".$row->u_lname; ?></td>
												<td> <?php echo $row->title; ?></td>
												<td> <?php echo $row->ord_date; ?></td>
												<td> <?php echo $row->amount; ?></td>
										</tr>
										<?php

										 }

										 ?>
										
										
										
										
									</tbody>
								</table>
							</div>
						</div>

						<div class="col-12">
							<div class="card">
								
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