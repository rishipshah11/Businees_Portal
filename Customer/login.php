<?php 
error_reporting(0);
include 'connection.php';
session_start();

if (isset($_POST['submit'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_select = $con->query("select * from user where email='$email' and password='$password'");

    $rowcount = $login_select->num_rows;

    if($rowcount == 1)
    {
        $row = $login_select->fetch_object();
        if($row->status=='inactive')
        {
             echo "<script>alert('Verify Your Account Before Login..');document.location='check_otp.php';</script>";
        }
        else
        {
            $role = $row->role_id;
            if($role==2)
            {
                $_SESSION['user_id'] = $row->u_id;
                header('location:index.php');
            }
            else
            {
                $_SESSION['in_id'] = $row->u_id;
                header('location:http://localhost/oibp/Innovators/dashboard.php');
            }
        }
    }
    else{
        echo "<script>alert('Invalid Email or Password');</script>";
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
                <h1 align="center" style="position: relative; right: 50px;">Login</h1>
                <br/>
                    <form method="post" style="position: relative;left: 250px">
                        <div class="left">
                            <input type="email" placeholder="Enter Email" name="email" id="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required>
                            <input type="password" placeholder="Enter Password" name="password" id="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter password'" required>
                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
                        <a href="registration.php">Don't have an Account ?</a>
                        <a href="forgot.php" style="float: right;">Forgot Password?</a>
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
