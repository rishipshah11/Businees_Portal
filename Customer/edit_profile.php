<?php
    error_reporting(0); 
    include 'connection.php';

    session_start();
    $rselect = $con->query("select * from role");
    $user_id = $_SESSION['user_id'];
    $user_select = $con->query("select * from user where u_id='$user_id'");
    $user_data = $user_select->fetch_object();

    if (isset($_POST['submit'])) {
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
        
       

        if($password == $cpassword){
            $update = $con->query("update user set u_fname='$fname',u_lname='$lname',gen='$gen',dob='$dob',email='$email',contact='$contact',address='$address',city='$city',state='$state',degree='$degree',work_exp='$work_exp'  where u_id='$user_id'");

            if($update){
                echo "<script>alert('Update successfully');</script>";
                header("location:index.php");
            }
            else
                echo "<script>alert('Error..');</script>"; 
        }
        else
            echo "<script>alert('Password Missmatch');</script>";

    
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
                <h1 align="center" style="position: relative; right: 50px;">Edit Profile</h1>
                <br/>

                
                    <form method="post" style="position: relative;left: 250px; width: 1200px" novalidate="" enctype="multipart/form-data">
                        <div class="left">
                            <input type="text" placeholder="First Name" name="fname" id="fname" value="<?php echo $user_data->u_fname; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required>

                            <input type="text" placeholder="Last Name" name="lname" id="lname" value="<?php echo $user_data->u_lname; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Last Name'" required>
                            
                            <input type="email" placeholder="Email" name="email" id="email" value="<?php echo $user_data->email; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required>
                            
                            <input type="text" placeholder="Contact" name=contact id="contact" value="<?php echo $user_data->contact; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required>

                          

                            <input style="color: gray;" type="date" value="<?php echo $user_data->dob; ?>" placeholder="Date of Birth" name="dob" id="dob" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date of Birth'" required>

                            <div>
                            <label style="margin-left: 20px;: ">Gender :</label>
                                <input  style="width: 50px;" type="radio" name="gender" id="male" <?php if(($user_data->gen) == "Male" or ($user_data->gen) == "male" ) echo "checked"; ?> value="male" onfocus="this.placeholder = ''" onblur="this.placeholder = 'radio'" required>
                                <label class="form-group">Male</label>

                                <input style="width: 50px;" type="radio" name="gender" id="male" <?php if(($user_data->gen) == "Female" or ($user_data->gen) == "female" ) echo "checked"; ?>value="male" onfocus="this.placeholder = ''" onblur="this.placeholder = 'gender'" required>
                                <label class="form-group">Female</label>
                            </div>

                            <textarea name="address" cols="20" rows="7" id="address"  placeholder="Enter Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" required><?php echo $user_data->address; ?></textarea>

                            <select name="state" class="form-control mt-3 mb-3">
                                <option value=""> Select State </option>
                                <option value="gujarat"
                                <?php if(($user_data->state) == "gujarat") echo "selected"; ?>>Gujarat</option>
                                <option value="delhi" <?php if(($user_data->state) == "delhi") echo "selected"; ?>>Delhi</option>
                                <option value="maharastra" <?php if(($user_data->state) == "maharastra") echo "selected"; ?>>Maharastra</option>
                                <option value="rajeshthan" <?php if(($user_data->state) == "rajeshthan") echo "selected"; ?>>Rajeshthan</option>
                            </select>

                             <select name="city" class="form-control mt-3 mb-3">
                                <option value="1"> Select City</option>
                                <option value="ahmedabad" <?php if(($user_data->city) == "ahmedabad") echo "selected"; ?>>Ahmedabad</option>
                                <option value="mehsana" <?php if(($user_data->city) == "mehsana") echo "selected"; ?>>Mehsana</option>
                                <option value="surat" <?php if(($user_data->city) == "surat") echo "selected"; ?>>Surat</option>
                            </select>

                            <select name="degree" class="form-control mt-3 mb-3">
                                <option value="">  Select Degree  </option>
                                <option value="post graduate" <?php if(($user_data->degree) == "post graduate") echo "selected"; ?>>Post Graduate</option>
                                <option value="graduate" <?php if(($user_data->degree) == "graduate") echo "selected"; ?>>Graduate</option>
                                <option value="under graduate" <?php if(($user_data->degree) == "under graduate") echo "selected"; ?>>Under Graduate</option>
                                <option value="master" <?php if(($user_data->degree) == "master") echo "selected"; ?>>Master</option>
                            </select>

                            <input type="text" placeholder="Experience" name="expeiernce" id="expeiernce" value="<?php echo $user_data->work_exp; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Experience'" required>

                            <input type="submit" name="submit" id="submit" value="Update" class="font-weight-bold btn btn-success">
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
