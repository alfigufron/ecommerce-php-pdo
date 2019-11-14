<?php
    require '../config/conn.php';
    if (isset($_POST['register'])) {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone-number', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $pw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $birth = filter_input(INPUT_POST, 'birth', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $hashed = password_hash($pw, PASSWORD_DEFAULT);
        $picture = $_FILES['photo'];

        $def = new DB();
        $add = $def->register($name,$email,$phone,$username,$hashed,$birth,$address,$picture);
        if($add = "berhasil") {
            header("location:login.php");
        } else {
            
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
                    <!-- <li class="nav-item">
                        <div class="nav-menu">
                            <a class="nav-link d-inline-flex" href="#">
                                <img src="../asset/img/cart-button.png" width="20" height="20" alt="" class="mr-2">
                                Cart (0)
                            </a>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid login-class">
        <div class="form-login">
            <div class="head-register">
                
            </div>
            <div class="body-register bg-gray1">
                <h3>Register</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input id="my-input" class="input-register" type="text" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input id="my-input" class="input-register" type="text" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input id="my-input" class="input-register" type="number" name="phone-number" placeholder="Phone Number" step="0">
                    </div>
                    <div class="form-group">
                        <input id="my-input" class="input-register" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input id="my-input" class="input-register" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input id="my-input" class="input-register" type="date" name="birth" placeholder="Date Birth">
                    </div>
                    <div class="form-group">
                        <textarea name="address" id="" cols="36" rows="4" class="textarea-reg" placeholder="Alamat Lengkap"></textarea>
                    </div>
                    <div class="upload-pict w-100 text-center">
                        <p>Upload Picture</p>
                        <input type="file" name="photo" style="max-width:100px;">
                    </div>
                    <div class="register-class" >
                        <span class="register">Have account?</span>
                        <a href="login.php">Log In</a>
                    </div>
                    <div>
                        <input type="submit" name="register" class="btn-register float-none" value="Register">
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
<script>
    $(document).ready(function() {
        $('textarea').autoResize();
    });
</script>
</html>