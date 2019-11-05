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
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link d-inline-flex" href="#">
                                <img src="../asset/img/calendar-button.png" width="20" height="20" alt="" class="mr-2">
                                Event
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link d-inline-flex" href="#">
                                <img src="../asset/img/cart-button.png" width="20" height="20" alt="" class="mr-2">
                                Cart
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link" href="#">
                                <img src="../asset/img/login-button.png" width="15" height="15" alt="">
                                Log In
                            </a>
                        </div>
                    </li>
                    <li><a class="nav-link disabled" data-toggle="collapse">|</a></li>
                    <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link" href="#">
                                <img src="../asset/img/login-button.png" width="15" height="15" alt="">
                                Register
                            </a>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
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
                <div class="form-group">
                    <input id="my-input" class="input-login" type="text" name="" placeholder="Username">
                </div>
                <div class="form-group">
                    <input id="my-input" class="input-login" type="password" name="" placeholder="Password">
                </div>
                
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="../asset/js/jquery.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
</body>
</html>