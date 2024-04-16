<?php 
    error_reporting(0);
    include 'connection.php';
    session_start();
     // $subcategories = $con->query("select * from subcategory");
     $categories = $con->query("select * from category");
    
    $categories1 = $con->query("select * from category");
    


    if(isset($_POST["btnidea"]))
    {
        $cat_id = $_POST["category"];
        $sub_id = $_POST["subcategory"];
        $i_select = $con->query("select * from idea where cat_id='$cat_id' and sub_id='$sub_id' order by id desc limit 3");
    }
    else
    {
        $i_select = $con->query("select * from idea order by id desc limit 3");
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
    <title>OIBP</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/fonts/flat-icon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">

     <style type="text/css">
        .abc
        {
            width: 280px;
            height: 55px;
            display: inline-block;
            border: none;
            border-radius: 5px;
            padding: 0 20px;
            -webkit-tap-highlight-color: transparent;
    background-color: #fff;
    box-sizing: border-box;
    clear: both;
    cursor: pointer;
        border-image: initial;
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

    <!-- Banner Area Starts -->
    <section class="banner-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 px-0">
                    <div class="banner-bg"></div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="banner-text">
                        <h1>find your dream <span>Idea</span> & Start Business</h1>
                        <p class="py-3">Online Innovators & Business Portal is web application to give innovative idea along with setup for a business. With the help of this web application, Innovators can share their idea and users can see and purchase idea for their business. </p>
                        <a href="#" class="secondary-btn">explore now<span class="flaticon-next"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Search Area Starts -->
    <!-- Jobs Area Starts -->
    <section class="jobs-area section-padding" style="position: relative;bottom: 20px;">
         <div class="search-area">
        <div class="search-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">  
                        <form action="" class="d-md-flex justify-content-between" method="post">
                            <select id="category" name="category" onchange="getsubcat()" class="abc">
                                <option value="">Select Category</option>
                                 <?php
                                    while ($cat = $categories->fetch_object())
                                    {
                                        ?>
                                            <option value="<?php echo $cat->cat_id;?>"><?php echo $cat->cat_name;?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <select id="subcategory" name="subcategory" class="abc">
                                <option value="">Subcategory</option>
                            </select>
                             <button type="submit" class="template-btn" name="btnidea">Find Ideas</button>
                            <input type="text" placeholder="Search Keyword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'"  style="visibility: hidden;">
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
        <div class="container">

            <div class="row">
                <?php 
                    while ($row = $i_select->fetch_object()) {

                        $inn_data = $con->query("select * from user where u_id='$row->in_id'");
                        $in = $inn_data->fetch_object();
                        ?>
                        <div class="col-lg-12">
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-text">
                                    <h4><?php echo $row->title; ?></h4>
                                    <ul class="mt-4">
                                        <li class="mb-3"><h5><?php echo $row->smdesc; ?></h5></li>
                                       <!--  <li class="mb-3"><h5><b>Category : </b><?php echo $row->cat_id; ?></h5></li>
                                        <li class="mb-3"><h5><b>Subcategory : </b><?php echo $row->sub_id; ?></h5></li> -->
                                        <li class="mb-3"><h5><b>Approx. duration : </b><?php echo $row->duration; ?></h5></li>
                                        <li><h5><b>Total Cost : </b><?php echo $row->price; ?></h5></li>
                                    </ul>
                                    <br/>
                                    <a href="view_more_idea.php?idea_id=<?php echo $row->id; ?>" class="third-btn">View Idea Details</a>
                                </div>
                                <div class="job-img align-self-center">
                                    <img src="upload/<?php echo $in->image;?>" alt="job" style="height: 200px; width: 200px;">

                                    
                                </div>
                                <div class="job-btn align-self-center">
                                    
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- Jobs Area End -->
    <h1 align="center" style="position: relative;bottom: 100px;">Benefits That We Provide</h1>
       <section class="feature-area section-padding2" style="position: relative;bottom: 170px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-feature mb-4 mb-lg-0">
                        <h4>Maintaining The Business Detail Is Easier</h4>
                        <p class="py-3">You can add or delete information from your content on the listing site wherever you want it and make sure that you put forward the most relevant data related to your company.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature mb-4 mb-lg-0">
                        <h4>People Will Always Get What They Need</h4>
                        <p class="py-3">People are going to search for the services and if they find it near them then they are going to buy the product or get to services if they are available at reasonable prices.</p><br>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <h4>Reach Great Number Of Clients In Very Less Time </h4>
                        <p class="py-3">These platforms can help you to reach massive numbers of the audience and relevant customers that are going to be genuinely interested in buying your product.</p><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Area Starts -->
    <section class="category-area section-padding" style="position: relative;bottom: 160px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top text-center">
                        <h2>Get Business Idea Across Multiple Categories</h2>
                      <!--   <p>Open lesser winged midst wherein may morning</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    while ($c = $categories1->fetch_object())
                    {
                        ?>
                           
                             <div class="col-lg-3 col-md-6">
                    <div class="single-category text-center mb-4"  style="background-color: #ff9902; color: white; font-style: italic;">
                        <h4 style="color: white"><?php echo $c->cat_name;?></option>
                             <div class="col-lg-3 col-md-6"></h4>
                        <h5></h5>
                    </div>
                </div>
                        <?php
                    }
                ?>
               

               
                
            </div>
        </div>
    </section>
    <!-- Category Area End -->
  <!-- Feature Area Starts -->
 
    <!-- Feature Area End -->
    <!-- Search Area End -->

    
    <!-- Footer Area Starts -->
        <?php include 'common/footer.php'; ?>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
   
    <script src="assets/js/vendor/ion.rangeSlider.js"></script>
    <script src="assets/js/main.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


    <script type="text/javascript">
        function getsubcat()
        {
            var cat_id = $("#category").val();
            $.ajax({
                type:"POST",
                url:'getsub.php',
                data:"cat_id="+cat_id,
                success:function(result)
                {
                   // alert(ans);
                   document.getElementById('subcategory').innerHTML=result;
                  //$("#subcategory").html(result);
                }
            });
        }

        
    </script>
</body>
</html>
