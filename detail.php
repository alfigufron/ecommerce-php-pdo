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
                <!-- After Login -->
                <!-- <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link" href="auth/register.php">
                                <img src="asset/img/profile-icon.png" width="20" height="20" alt="">
                                <span class="username-profile">user</span>
                            </a>
                        </div>
                    </li>
                </ul> -->
            </div>
        </div>
    </nav>

    <!-- Detail Produk -->
    <div class="content-detail">
        <div class="detail-inner">
            <div class="image-detail">
                <img src="asset/img/storage/clothing_1.jpg" alt="">
            </div>
            <div class="desc-detail">
                <h1>CANVAS SUEDE TRUCKER BLACK</h1>
                <p id="cost">IDR 225.000</p>
                <p class="desc-text">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                    ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived 
                    not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 
                    1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like 
                    Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <div class="desc-2">
                    <div class="list-size">
                        <span class="text-light font-weight-bold">Size :</span>
                        <ul>
                            <li>S : 63cm x 49cm</li>
                            <li>M : 65cm x 52cm</li>
                            <li>L : 67cm x 54cm</li>
                            <li>XL : 69cm x 56cm</li>
                            <li>XXL : 71cm x 58cm</li>
                        </ul>
                    </div>
                    <div class="detail-2">
                        <span class="text-light font-weight-bold">Detail :</span>
                        <ul>
                            <li>Material : Canvas Sueding</li>
                            <li>Color : Black</li>
                            <li>Price : 225.000 IDR</li>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#exampleModal">Add to Cart</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">CANVAS SUEDE TRUCKER BLACK</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Test
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
                                <button type="button" class="btn btn-dark">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>

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