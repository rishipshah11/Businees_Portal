<?php 
    error_reporting(0);
    session_start();
    include 'connection.php';

    $idea_id = $_GET['idea_id'];

    $idea_result = $con->query("SELECT idea.id, idea.title, idea.lddesc, idea.file, idea.duration, idea.price, idea.status, idea.date, category.cat_name, subcategory.sub_name FROM idea INNER JOIN category ON idea.cat_id=category.cat_id INNER JOIN subcategory ON idea.sub_id=subcategory.sub_id WHERE idea.id='$idea_id'");

    $idea_row = $idea_result->fetch_object();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Job Single</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/fonts/flat-icon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.skinFlat.css">
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

    <!-- Job Single Content Starts -->
    <section class="job-single-content section-padding">
        <div class="container" style="position: relative;bottom: 150px;">
            <div class="row">
                <h1 style="position: relative; left: 450px; bottom: 40px">Idea Details</h1>
                <!-- <div class="col-lg-2"></div> -->
                <div class="col-lg-10" style="position: relative; left: 80px;">
                    <div class="main-content">
                        <div class="single-content1">
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-text">
                                    <h4><?php echo $idea_row->title; ?></h4>
                                    <ul class="mt-4">
                                        <li class="mb-3">
                                             <p style="text-align: justify;"><?php echo $idea_row->lddesc; ?>.</p>
                                        </li>
                                        <li class="mb-3">
                                            <h5><b>Category :</b> <?php echo $idea_row->cat_name;?></h5>
                                        </li>
                                        <li class="mb-3">
                                            <h5><b>Setup iPrice :</b> <?php echo $idea_row->price;?></h5>
                                        </li>
                                        <li class="mb-3">
                                            <h5><b>Setup Duration :</b> <?php echo $idea_row->duration;?></h5>
                                        </li>
                                        
                                        <li><h5><b><i class="fa fa-clock-o"></i> Idea Uploaded On:</b> <?php echo $idea_row->date;?></h5></li>
                                    </ul>
                                    <br>

                                <a href="../Innovators/upload/<?php echo $idea_row->file?>" download="">Download Document</a>

                                <br/><br/>
                                <?php
                                if(isset($_SESSION['user_id']))
                                {
                                   ?>
                                <a href="add_cart.php?idea_id=<?php echo $idea_row->id;?>" class="template-btn" style="border-radius: 10px;">Add to Cart</a>
                                <?php
                            }
                            ?>
                                 
                                   
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
               <!--  <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="single-item mb-4">
                            <h4 class="mb-4">jobs type</h4>
                            <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>Full Time</span>
                                <span class="text-right">25 job</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>Part Time</span>
                                <span class="text-right">25 job</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between">
                                <span>Internship</span>
                                <span class="text-right">25 job</span>
                            </a>
                        </div>
                        <div class="single-item mb-4">
                            <h4 class="mb-4">job by location</h4>
                            <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>New York</span>
                                <span class="text-right">25 job</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>California</span>
                                <span class="text-right">25 job</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>Swizerland</span>
                                <span class="text-right">25 job</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>Canada</span>
                                <span class="text-right">25 job</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between">
                                <span>Sweden</span>
                                <span class="text-right">25 job</span>
                            </a>
                        </div>
                        <div class="single-item mb-4">
                            <h4 class="mb-4">salary range</h4>
                            <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>$20,000-$30,000</span>
                                <span class="text-right">25 job</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>$25,000-$45,000</span>
                                <span class="text-right">25 job</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between">
                                <span>$40,000-$70,000</span>
                                <span class="text-right">25 job</span>
                            </a>
                        </div>
                        <div class="single-item">
                            <h4 class="mb-4">filter by salary</h4>
                            <input type="text" id="range" value="" name="range" />
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Job Single Content End -->

    <!-- Footer Area Starts -->
        <?php include 'common/footer.php'; ?>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/ion.rangeSlider.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
