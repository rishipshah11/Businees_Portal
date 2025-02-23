<?php
session_start();
error_reporting(0);

include 'connection.php';

$ord_date = date("Y-m-d");
$u_id = $_SESSION['user_id'];
$amount = $_SESSION['price'];
$i_id = $_SESSION['idea_id'];
$inn_id = $_SESSION['inn_id'];

$con->query("INSERT INTO `myorder`(`ord_date`, `u_id`, `i_id`, `amount`, `inn_id`) VALUES ('$ord_date','$u_id','$i_id','$amount','$inn_id')");

$order_id = $con->insert_id;


$con->query("INSERT INTO `payment`(`user_id`, `order_id`,`amount`) VALUES ('$u_id','$order_id','$amount')");


$apiKey = "rzp_test_pLl681e9OrLq4X";

$profile_data = $con->query("select * from user where u_id='$u_id'");
$profile = $profile_data->fetch_object();


  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Payment</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/fonts/flat-icon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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

        input[type=button], input[type=submit], input[type=reset] {
  position: relative;
  top: 150px;
  left:450px;
  color: black !important;
    background: #ff9902;
    height: 100px;
    width: 300px;
    font-size: 24px;
    border-radius: 15px;
    font-weight: 600;

}
    </style>

    <!-- Contact Form Starts -->
    <section class="contact-form section-padding3">
        <div class="container" style="position: relative;bottom: 100px;">
            <div class="row">
                <div class="col-lg-12">
                    <br/><br/>
                  
                  <form action="http://localhost/oibp/Customer/success.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo intval($_SESSION['price']) * 100;?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"//You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-id="<?php echo $order_id;?>"//Replace with the order_id generated by you in the backend.
    data-buttontext="Pay with Razorpay"
    data-name="Online Innovators and Business Portal"
    data-description="Complete Business Solution"
    data-image="https://oibp1.000webhostapp.com/logo.PNG"
    data-prefill.name="<?php echo $profile->u_fname.' '.$profile->u_lname;?>"
    data-prefill.email="<?php echo $profile->email;?>"
    data-prefill.contact="<?php echo $profile->contact;?>"
    data-theme.color="#ff9902"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>

                   
                </div>
                 
            </div>
        </div>
    </section>
    <!-- Contact Form End -->

<br/><br/><br/><br/><br/><br/><br/>
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
