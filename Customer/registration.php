<?php 
    error_reporting(0);
    include 'connection.php';
    session_start();
    $rselect = $con->query("select * from role");

    if (isset($_POST['submit'])) 
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gen = $_POST['gender'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $degree = $_POST['degree'];
        $work_exp = $_POST['expeiernce'];
        
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $exe = explode(".", $image);
        $e = strtolower(end($exe));
        $path = "upload/$image";

        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $reg_date = date('Y-m-d');
        $status = "inactive";
        $role_id = $_POST['role'];

        if($password == $cpassword)
        {
            if($e == "jpge" || $e == "jpg" || $e == "png")
            {

                if(move_uploaded_file($tmp, $path))
                {
                   
                    $otp = rand(1000,9999);

                    $otp_time = date('Y-m-d H:i:s');

                     $insert = $con->query("insert into user (u_fname,u_lname,gen,dob,email,contact,address,city,state,degree,work_exp,image,password,reg_date,status,role_id,otp,otp_time) values('$fname', '$lname', '$gen', '$dob', '$email', '$contact', '$address', '$city', '$state', '$degree', '$work_exp', '$image', '$password', '$reg_date', '$status', '$role_id','$otp','$otp_time')");

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
                    } 
                    else {
                       echo "<script>alert('Registered Successfully , Verify Account Now By OtP');document.location='check_otp.php';</script>"; 
                    }

                     ///sms end code
                }
                else
                {
                    echo "<script>alert('Error with File Uploading..');</script>";  
                }
            }
            else
            {
                echo "<script>alert('File Must Be In .jpg, .png, .jpge');</script>";
            }

        }
        else
        {
            echo "<script>alert('Password Missmatch');</script>";
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
    <title>Register</title>

   <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/fonts/flat-icon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style type="text/css">
        #address
        {
            width: 100%;
            border: 1px solid #eee;
            padding: 12px 20px;
            overflow: auto;
            resize: vertical;
        }
    </style>
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
    <section class="contact-form">
        <div class="container-fluid" style="position: relative;bottom: 70px;">
            <div class="row">
                 
                <div class="col-lg-12" >
                <br/><br/><br/>
                <h1 align="center" style="position: relative; right: 50px;">Register</h1>
                <br/>

                
                    <form method="post" style="position: relative;left: 250px; width: 1200px" enctype="multipart/form-data">
                        <div class="left">
                            <input type="text" placeholder="First Name" name="fname" id="fname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required="" 
                            pattern="[a-zA-Z]{3,20}" title="FirstName Must be Valid">

                            <input type="text" placeholder="Last Name" name="lname" id="lname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Last Name'" required="" 
                            pattern="[a-zA-Z]{3,20}" title="LastName Must be Valid">
                            
                            <input type="email" placeholder="Email" name="email" id="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required>
                            
                            <input type="text" placeholder="Contact" name=contact id="contact" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required="" 
                            pattern="[0-9]{10}" title="Contact Must be Valid">

                            <input type="password" placeholder="Password" name="password" id="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>

                            <input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" required>

                            <input style="color: gray;" type="date" placeholder="Date of Birth" name="dob" id="dob" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date of Birth'" required>

                            <div>
                            <label style="margin-left: 20px;: ">Gender :</label>
                                <input style="width: 50px;" type="radio" name="gender" id="male" value="male" onfocus="this.placeholder = ''" onblur="this.placeholder = 'radio'" required>
                                <label class="form-group">Male</label>

                                <input style="width: 50px;" type="radio" name="gender" id="male" value="male" onfocus="this.placeholder = ''" onblur="this.placeholder = 'gender'" required>
                                <label class="form-group">Female</label>
                            </div>

                            <textarea name="address" cols="20" rows="7" id="address"  placeholder="Enter Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" required></textarea>

                            <select id="city" name="role" class="form-control mt-3 mb-3" required="">
                                <option value="" selected="" disabled="">Select Role</option>
                                <?php

                                    while($role = $rselect->fetch_object())
                                    {
                                ?>
                                
                                <option value="<?php echo $role->role_id; ?>"><?php echo $role->name; ?></option>
                                
                                <?php
                                    }
                                ?>
                            </select>

                            <select name="state" class="form-control mt-3 mb-3" required="">
                                <option value=""> Select State </option>
                                <option value="gujarat">Gujarat</option>
                                <option value="delhi">Delhi</option>
                                <option value="maharastra">Maharastra</option>
                                <option value="rajeshthan">Rajeshthan</option>
                            </select>

                             <select name="city" class="form-control mt-3 mb-3" required="">
                                <option value="1"> Select City</option>
                                <option value="ahmedabad">Ahmedabad</option>
                                <option value="mehsana">Mehsana</option>
                                <option value="surat">Surat</option>
                            </select>

                            <select name="area" class="form-control mt-3 mb-3" required="">
                                <option value=""> Select Area </option>
                                <option value="visnagar">Visnagar</option>
                                <option value="kheralu">Kheralu</option>
                                <option value="vijapur">Vijapur</option>
                                <option value="kasa">Kasa</option>
                            </select>

                            <select name="degree" class="form-control mt-3 mb-3" required="">
                                <option value="">  Select Degree  </option>
                                <option value="post graduate">Post Graduate</option>
                                <option value="graduate">Graduate</option>
                                <option value="under graduate">Under Graduate</option>
                                <option value="master">Master</option>
                            </select>

                            <input type="text" placeholder="Experience" name="expeiernce" id="expeiernce" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Experience'" required>

                            <input type="file" placeholder="Select File" name="image" id="image" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Select File'" required>

                            <input type="submit" name="submit" id="submit" value="Register" class="font-weight-bold btn btn-success">
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
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I"></script>
    <script src="assets/js/vendor/gmaps.min.js"></script>
    <script src="assets/js/vendor/ion.rangeSlider.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
