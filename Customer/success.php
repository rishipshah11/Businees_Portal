<?php 
error_reporting(0);
include 'connection.php';
session_start();

$id = $_SESSION['inn_id'];
$profile_data = $con->query("select * from user where u_id='$id'");
$profile = $profile_data->fetch_object();
$fullname  = $profile->u_fname.' '.$profile->u_lname;
$mobile = $profile->contact; 


$user_id = $_SESSION['user_id'];
$user_data = $con->query("select * from user where u_id='$user_id'");
$user = $user_data->fetch_object();
$contact = $user->contact; 
//sms start code
$fields = array(
                   "sender_id" => "FSTSMS",
                   "message" => "We Have Recevied your Request , Innovator will contact you within 4 Hrs or you can contact $fullname on $mobile",
                   "language" => "english",
                   "route" => "p",
                   "numbers" => "$contact",
                   "flash" => "1"
               );
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: MLXw2uUN5eszZkqa68DP7lGRyWVcF3BJdSAr0QTbKC4OYE1njhewDGsUdP1LvgiyAzTfcECH7Wu5Yk03",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

 $response = curl_exec($curl);
 $err = curl_error($curl);

 curl_close($curl);

 if ($err) {
   echo "cURL Error #:" . $err;
 } 
 

///sms end code



unset($_SESSION['idea_id']);
unset($_SESSION['title']);
unset($_SESSION['duration']);
unset($_SESSION['price']);
unset($_SESSION['inn_id']);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Succcess</title>

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
        <div class="container" style="position: relative;bottom: 100px;">
            <div class="row">
                <div class="col-lg-12">
                    <br/><br/>
                   
                   <img src="assets/images/s1.png" style="position: relative;left:120px;">
                   
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
