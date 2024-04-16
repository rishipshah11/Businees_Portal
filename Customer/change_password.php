<?php 
error_reporting(0);
include 'connection.php';
session_start();

$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) 
{
    $oldpass = $_POST['old_password'];

    $old = $con->query("select * from user where u_id='$user_id' and password='$oldpass'");
    $old_data = $old->fetch_object();
    $old_password = $old_data->password;

    if ($oldpass == $old_password) {

        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if ($password == $cpassword) {

            $new_password = $con->query("update user set password='$password' where u_id='$user_id'");
            if ($new_password) {
                echo "<script>alert('Password Successfully Changed.');</script>";
                header('location:index.php');
            }
        }
        else{
            echo "<script>alert('Password Missmatch.');</script>";
    }
        
    }
    else{
        echo "<script>alert('Invalid Old Password.');</script>";
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
    <title>Change Password</title>

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
                    <br/><br/>
                <h1 align="center" style="position: relative; right: 50px;">Change Password</h1>
                <br/>
                    <form method="post"><br><br>
                        <div class="left">
                            <input type="password" placeholder="Enter Old Password" name="old_password" id="old_password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Old Password'" required><br>
                            <input type="password" placeholder="Enter New Password" name="password" id="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter ew Password'" required><br>
                            <input type="password" placeholder="Enter Confire Password" name="cpassword" id="cpassword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Confire Password'" required><br><br>
                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
                        <!-- <a href="registration.php">Don't have an Account ?</a> -->
                        </div>
                        <div class="right">
                           <img src="assets/images/changepassword1.jpg" height="300" width="330">
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
