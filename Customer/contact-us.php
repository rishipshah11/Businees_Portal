<?php 

error_reporting(0);
include 'connection.php';

if (isset($_POST['submit'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $reg_date = date('Y-m-d');

    $con_insert = $con->query("insert into contact (con_name, con_email, con_subject, con_message, con_reg_date) values ('$name', '$email', '$subject', '$message', '$reg_date')");

    if($con_insert){
        echo "<script>alert('Your Data Successfully Submited');</script>";
    }
    else{
        echo "<script>alert('Error..!');</script>";
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
    <title>Contact Us</title>

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
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br/><br/>
                <h1 align="center">Contact Us</h1><br/><br/>
                    <form method="post">
                        <div class="left">
                            <input type="text" placeholder="Enter your name" name="name" id="name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" required="" 
                            pattern="[a-zA-Z]+[a-zA-Z ]+" title="Name Must be Valid">
                            <input type="email" placeholder="Enter email address" name="email" id="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required>
                            <input type="text" placeholder="Enter subject" name="subject" id="subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" required="" 
                            pattern="[a-zA-Z]+[a-zA-Z ]+" title="Subject Must be Valid">
                             <textarea name="message" cols="20" rows="7" id="message"  placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" required></textarea>
                              <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
                        </div>
                        <div class="right">
                           <img src="assets/images/contact3.jpg" height="400" width="400">
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
