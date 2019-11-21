<?php
    require ('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project 1</title>
    <link rel="shortcut icon" href="asset/img/logo.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <script src="asset/js/jquery.js"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-gray1">
        <div class="container">
            <a class="navbar-brand font-weight-bolder text-uppercase text-light" href="index.php">
                <img src="asset/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                project 1
            </a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link d-inline-flex click-page" href="index.php">
                                <img src="asset/img/home-button.png" width="20" height="20" alt="" class="mr-2">
                                Home
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link d-inline-flex click-page" href="cart.php">
                                <img src="asset/img/cart-button.png" width="20" height="20" alt="" class="mr-2">
                                Cart (0)
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link d-inline-flex click-page" href="payment.php">
                                <img src="asset/img/payment-icon.png" width="20" height="20" alt="" class="mr-2">
                                Payments
                            </a>
                        </div>
                    </li>
                </ul>

                <?php if(empty($_SESSION['code'])) { ?>
                <!-- Before Log In -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link" href="auth/login.php">
                                <img src="asset/img/login-button.png" width="15" height="15" alt="">
                                Log In
                            </a>
                        </div>
                    </li>
                    <li><a class="nav-link disabled" data-toggle="collapse">|</a></li>
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link" href="auth/register.php">
                                <img src="asset/img/login-button.png" width="15" height="15" alt="">
                                Register
                            </a>
                        </div>
                    </li>
                </ul>
                <?php } if(isset($_SESSION['code'])) { ?>
                <!-- After Login -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <!-- <div class="nav-menu">
                            <a class="nav-link" href="auth/register.php">
                                
                                <span class="username-profile">user</span>
                            </a>
                        </div> -->
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="asset/img/profile-icon.png" width="20" height="20" alt=""> User
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Detail Account</a>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </nav>
    
    <!-- SLide Image -->
    <div id="my-carousel" class="carousel slide" data-ride="carousel">
        <!-- Slide Indicator -->
        <ol class="carousel-indicators">
            <li class="active" data-target="#my-carousel" data-slide-to="0" aria-current="location"></li>
            <li data-target="#my-carousel" data-slide-to="1"></li>
            <li data-target="#my-carousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner carousel-size">
            <div class="carousel-item active">
                <img class="d-block w-100" src="asset/img/slide/1.jpg" alt="">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="asset/img/slide/2.jpg" alt="">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="asset/img/slide/3.jpg" alt="">
            </div>
        </div>
        <a class="carousel-control-prev" href="#my-carousel" data-slide="prev" role="button">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#my-carousel" data-slide="next" role="button">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>  
    
    <div class="container-fluid category bg-white1">
        <h3 class="font-weight-bold mb-3">Category</h3>
        <ul class="list-unstyled d-inline-flex text-dark">
            <li class="p-2 list-category">
                <a href="#" class="click-page" id="active all-category">All</a>
            </li>
            <li class="p-2 list-category">
                <a href="#" class="click-page" id="cloth-category">Clothes</a>
            </li>
            <li class="p-2 list-category">
                <a href="#" class="click-page" id="pants-category">Pants</a>
            </li>
        </ul>
    </div>

    <!-- Menu -->
    <div class="content">
    
    </div>
    
    <script>
        $(document).ready(function() {
            $('.click-page').click(function() {
                var menu = $(this).attr('id');
                if(menu == "home"){
                    $('.content').load('home.php');
                }
            });

            $('.content').load('home.php');
        });
    </script>
    
    
    <!-- Footer -->
    <div class="container-fluid brand-footer bg-gray1">
        <img src="asset/img/logo.png" alt="">
        <h3>Project 1</h3>
        <p>© 2019 Your Company. All Rights Reserved. Designed By Gufron</p>
        <!-- Social Media -->
        <div class="container social-media">
            <ul class="list-unstyled d-flex justify-content-around pt-3">
                <li>
                    <div class="social-list">
                        <a href="#" class="d-inline-block">
                            <img src="asset/img/whatsapp-icon-2.png" alt="">Whatsapp
                        </a>
                    </div>
                </li>
                <li>
                    <div class="social-list">
                        <a href="#" class="d-inline-block">
                            <img src="asset/img/twitter-icon-2.png" alt="">Twitter
                        </a>
                    </div>
                </li>
                <li>
                    <div class="social-list">
                        <a href="#" class="d-inline-block">
                            <img src="asset/img/facebook-icon-2.png" alt="">Facebook
                        </a>
                    </div>
                </li>
                <li>
                    <div class="social-list">
                        <a href="#" class="d-inline-block">
                            <img src="asset/img/instagram-icon-2.png" alt="">Instagram
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Javascript -->
    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
</body>
</html>