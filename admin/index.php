<?php
    require ('../config/conn.php');
    if(isset($_POST['login'])) {
        $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $pw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $def = new DB();
        $add = $def->admin($user, $pw);
        if(isset($_SESSION['code'])){
            header("location:dashboard.php?verify=".$_SESSION['code']);
        }else {
            header("location:index.php?gagal");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/adminlte.min.css">
    <link rel="stylesheet" href="../asset/css/adminlte.min.css">
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

    <script src="../asset/js/jquery.js"></script>
    <script src="../asset/js/adminlte.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
</body>
</html>