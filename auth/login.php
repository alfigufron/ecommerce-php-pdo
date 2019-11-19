<?php
    require ('../config.php');
    if(isset($_POST['login'])) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $def = new project1();
        $add = $def->logUser($username, $password);
        if(isset($_SESSION['code'])){
            header("location:../index.php?unique=".$_SESSION['code']);
        }else{
            header("location:login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project 1</title>
    <link rel="shortcut icon" href="../asset/img/logo.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
</head>
<body class="bg-desc">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-gray1">
        <div class="container">
            <a class="navbar-brand font-weight-bolder text-uppercase text-light" href="../index.php">
                <img src="../asset/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                project 1
            </a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link d-inline-flex" href="../index.php">
                                <img src="../asset/img/home-button.png" width="20" height="20" alt="" class="mr-2">
                                Home
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid login-class">
        <div class="form-login">
            <div class="head-login">
                <div id="my-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#my-carousel" data-slide-to="0" aria-current="location"></li>
                        <li data-target="#my-carousel" data-slide-to="1"></li>
                        <li data-target="#my-carousel" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner carousel-size-login">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../asset/img/slide/1.jpg" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../asset/img/slide/2.jpg" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../asset/img/slide/3.jpg" alt="">
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
            </div>
            <div class="body-login bg-gray1">
                <h3>Log In</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <input id="my-input" class="input-login" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input id="my-input" class="input-login" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="register-class" >
                        <span class="register">Don't have any account?</span>
                        <a href="register.php">Register</a>
                    </div>
                    <div>
                        <input type="submit" name="login" class="btn-login float-none" value="Log In">
                    </div>
                </form>
                <span class="desc-login text-light">© 2019 Your Company. All Rights Reserved</span>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid brand-footer bg-gray1">
        <img src="../asset/img/logo.png" alt="">
        <h3>Project 1</h3>
        <p>© 2019 Your Company. All Rights Reserved. Designed By Gufron</p>
        <!-- Social Media -->
        <div class="container social-media">
            <ul class="list-unstyled d-flex justify-content-around pt-3">
                <li>
                    <div class="social-list">
                        <a href="#" class="d-inline-block">
                            <img src="../asset/img/whatsapp-icon-2.png" alt="">Whatsapp
                        </a>
                    </div>
                </li>
                <li>
                    <div class="social-list">
                        <a href="#" class="d-inline-block">
                            <img src="../asset/img/twitter-icon-2.png" alt="">Twitter
                        </a>
                    </div>
                </li>
                <li>
                    <div class="social-list">
                        <a href="#" class="d-inline-block">
                            <img src="../asset/img/facebook-icon-2.png" alt="">Facebook
                        </a>
                    </div>
                </li>
                <li>
                    <div class="social-list">
                        <a href="#" class="d-inline-block">
                            <img src="../asset/img/instagram-icon-2.png" alt="">Instagram
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Javascript -->
    <script src="../asset/js/jquery.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
</body>
</html>