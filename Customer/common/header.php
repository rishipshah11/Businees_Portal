<?php
session_start();
?>

<header class="header-area main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="index.html"><img src="assets/images/logo33.png" alt="logo" style="position: relative;bottom: 15px;"></a>
                    </div>
                </div>
                <div class="col-lg-10" style="position: relative;right: 60px;">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">
                        <ul>
                            <li class="active"><a href="index.php">home</a></li>
                            <li class=""><a href="about.php">About Us</a></li>
                           
                           
                            <li><a href="view_idea.php">Business Ideas</a></li>
                            <?php
                                if(isset($_SESSION['user_id']))
                                {
                                    ?>
                                    <li><a href="#">My Account</a>
                                        <ul class="sub-menu">
                                            <li><a href="edit_profile.php">Edit Profile</a></li>
                                            <li><a href="change_password.php">Change Password</a></li>
                                             <li><a href="feedback.php">Post Feedback</a></li>
                                            <li><a href="view_order.php">View Order</a></li>
                                        </ul>
                                    </li>
                                   
                                   
                                    <li class="menu-btn">
                                        <a href="logout.php" class="template-btn">Logout</a>
                                        
                                    </li>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                     
                                    <li><a href="contact-us.php">contact</a></li>
                                    <li class="menu-btn">
                                        <a href="login.php" class="template-btn">Login</a>
                                        
                                    </li>
                                    <?php
                                }

                            ?>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>