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
                            <a class="nav-link d-inline-flex" href="#">
                                <img src="asset/img/home-button.png" width="20" height="20" alt="" class="mr-2">
                                Home
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link d-inline-flex" href="#">
                                <img src="asset/img/calendar-button.png" width="20" height="20" alt="" class="mr-2">
                                Event
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link d-inline-flex" href="#">
                                <img src="asset/img/cart-button.png" width="20" height="20" alt="" class="mr-2">
                                Cart
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link" href="#">
                                <img src="asset/img/login-button.png" width="15" height="15" alt="">
                                Log In
                            </a>
                        </div>
                    </li>
                    <!-- <li><a class="nav-link disabled" data-toggle="collapse">|</a></li> -->
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link" href="#">
                                <img src="asset/img/login-button.png" width="15" height="15" alt="">
                                Register
                            </a>
                        </div>
                    </li>
                </ul>
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

    <!-- Menu -->
    <div class="container-fluid category bg-white1 pb-5">
        <h3 class="font-weight-bold mb-3">Category</h3>
        <ul class="list-unstyled d-inline-flex text-dark">
            <li class="p-2 list-category">
                <a href="#">All</a>
            </li>
            <li class="p-2 list-category">
                <a href="#">Clothes</a>
            </li>
            <li class="p-2 list-category">
                <a href="#">Pants</a>
            </li>
            <li class="p-2 list-category">
                <a href="#">Shoes</a>
            </li>
            <li class="p-2 list-category">
                <a href="#">Hats</a>
            </li>
        </ul>
        <!-- Product -->
        <div class="container storage-brand">
            <h5 class="text-uppercase text-dark font-weight-bolder mt-5">Available stock</h5>
            <div class="row justify-content-center">
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="product">
                            <img src="asset/img/storage/clothing_1.jpg" alt="">
                            CANVAS SUEDE TRUCKER BLACK
                        </a>
                        <p>IDR 225.000</p>
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_2.jpg" alt="">
                            CANVAS SUEDE TRUCKER BROWN
                        </a>
                        <p>IDR 325.000</p>
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_3.jpg" alt="">
                            CANVAS SUEDE TRUCKER LIGHT BROWN
                        </a>
                        <p>IDR 215.000</p>                        
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_4.jpg" alt="">
                            COTTON BASIC SHIRT ARMY
                        </a>
                        <p>IDR 125.000</p>                        
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_5.jpg" alt="">
                            COTTON BASIC SHIRT BLACK
                        </a>
                        <p>IDR 105.000</p>                        
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_6.jpg" alt="">
                            COTTON BASIC SHIRT LIGHT BROWN
                        </a>
                        <p>IDR 155.000</p>                        
                    </div>
                </div>
            </div>  
        </div>
    </div>
    
    <!-- Footer -->
    <div class="container-fluid brand-footer bg-gray1">
        <img src="asset/img/logo.png" alt="">
        <h3>Project 1</h3>
        <p>© 2015 Your Company. All Rights Reserved. Designed By Gufron</p>
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