<?php 
error_reporting(0);
include 'connection.php';
session_start();

if (isset($_POST['submit'])) 
{

    // echo '<pre>';
    // print_r($_POST);

    date_default_timezone_set('Asia/Kolkata');

    $contact = $_POST['contact'];

    $result = $con->query("select * from user where contact='$contact' and status='inactive'");
    $rowcount = $result->num_rows;

    if($rowcount==1)
    {
        $otp = rand(1000,9999);
        $otp_time = date('Y-m-d H:i:s');

        //sms start code

        $fields = array(
                    "sender_id" => "FSTSMS",
                    "message" => "One time Password for Login is : $otp and It is valid for 5 minutes. Regards : OIBP Web Application",
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
                    } else {
                      echo $response;
                    }
       

        if($err)
        {
           echo "<script>alert('Error!! Couldn't sensd otp');</script>"; 
        }
        else
        {
            $con->query("update user set otp='$otp', otp_time='$otp_time' where contact='$contact'");   
            echo "<script>alert('OTP has been sent to your number..');</script>";
        }
    }
    else
    {
        echo "<script>alert('No account found with this Number..');</script>";
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
                <h3 align="center" style="position: relative; right: 0px;">Enter Mobile Number get OTP</h3>
                <br/>
                    <form method="post" style="position: relative;left: 250px">
                        <div class="left">
                            <input type="text" placeholder="Enter Mobile Number" name="contact" id="contact" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Mobile Number'" required>
                           
                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Resend OTP">
                       
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
