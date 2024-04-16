<?php 
error_reporting(0);
include 'connection.php';
session_start();

if (isset($_POST['submit'])) 
{

    // echo '<pre>';
    // print_r($_POST);


    $contact = $_POST['contact'];
    $otp = $_POST['otp'];

    $result = $con->query("select * from user where contact='$contact' and otp='$otp'");
    $rowcount = $result->num_rows;

    if($rowcount==1)
    {
        
        $row = $result->fetch_object();
        $otp_time = $row->otp_time;
        $new_time = date("Y-m-d H:i:s",strtotime($otp_time." +5 minutes"));

        // $current_datetime = date('Y-m-d H:i:s');
        // $ct = mktime(date('H'), date('i')+5, date('s'), date('m'), date('d'), date('Y'));


        $result1 = $con->query("select * from user where contact='$contact' and otp='$otp' and (otp_time between '$otp_time' and '$new_time')");

        $rowcount1 = $result1->num_rows;

        if($rowcount1==1)
        {
             $con->query("update user set status='active' where contact='$contact'");   
           echo "<script>alert('Success!!');document.location='login.php';</script>"; 
        }
        else
        {
            echo "<script>alert('OTP has expired..');document.location='gen.php';</script>";
        }
    }
    else
    {
        echo "<script>alert('Invalid OTP..Try Again..');document.location='check_otp.php';</script>";
    }
  

   


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Login</title>

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

    <!-- Contact Form Starts -->
    <section class="contact-form section-padding3">
        <div class="container" style="position: relative;bottom: 70px;">
            <div class="row">
                 
                <div class="col-lg-12" >
                    <br/><br/><br/>
                <h2 align="center" style="position: relative; right: 0px;">Verify Account by OTP</h2>
                <br/>
                    <form method="post" style="position: relative;left: 250px">
                        <div class="left">
                            <input type="text" placeholder="Enter Mobile Number" name="contact" id="contact" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Mobile Number'" required>
                            <input type="text" placeholder="Enter OTP" name="otp" id="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter OTP'" required>
                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Verify">
                       
                        </div>
                    </form>
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
