<?php 

error_reporting(0);
session_start();
include 'connection.php';



$user_id = $_SESSION['user_id'];


// $order_sel = $con->query("select * from myorder where u_id='$user_id'");
$order_sel = $con->query("SELECT myorder.ord_id,myorder.ord_date,myorder.amount,user.u_fname,user.u_lname,idea.title,idea.smdesc FROM myorder INNER JOIN user ON myorder.inn_id = user.u_id INNER JOIN  idea ON myorder.i_id = idea.id where myorder.u_id='$user_id'");

//echo "hello";exit;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>View Order</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/fonts/flat-icon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <?php include 'common/header.php'; ?>
    <!-- Header Area End -->

    <style type="text/css">
        #message
        {
            width: 100%;
            border: 1px solid #eee;
            padding: 12px 20px;
            overflow: auto;
            resize: vertical;
        }
    </style>

    <!-- Contact Form Starts -->
    <section class="contact-form section-padding3">
        <div class="container" style="position: relative;bottom: 30px;">
            <div class="row">
                <div class="col-lg-12">
                    <br/><br/>
                <h1 align="center">View Order</h1><br/><br/>
                    <form method="post">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Idea Name</th>
                                    <th>Small Description</th>
                                    <th>Innovatar Name</th>
                                    <th>Price</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($order_data = $order_sel->fetch_object()){
                                ?>
                                <tr>
                                    <td><?php echo $order_data->ord_id; ?></td>
                                    <td><?php echo $order_data->u_fname. " ". $order_data->u_lname; ?></td>
                                    <td><?php echo $order_data->title; ?></td>
                                    <td><?php echo $order_data->smdesc; ?></td>
                                    <td><?php echo $order_data->u_fname. " ". $order_data->u_lname; ?></td>
                                    <td><?php echo $order_data->amount; ?></td>
                                    <td><?php echo $order_data->ord_date; ?></td>
                                    <td><?php echo 'completed'; ?></td>
                                </td>
                            </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form End -->


    <!-- Footer Area Starts -->
        <?php include 'common/footer.php'; ?>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I"></script>
    <script src="assets/js/vendor/gmaps.min.js"></script>
    <script src="assets/js/vendor/ion.rangeSlider.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
