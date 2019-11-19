<?php
    require ('../config.php');
    if(isset($_POST['register'])){
        // echo "nasdbasbdmb";
        function random($digit){
            $karakter = '1234567890';
            $string = '';
            for($i=0; $i<$digit; $i++){
                $post = rand(0, strlen($karakter)-1);
                $string .= $karakter{$post};
            };

            return $string;
        };

        $code = random(8);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $def = new project1();
        $add = $def->addAdmin($code, $name, $username, $hashed);
        if($add == "sukses"){
            echo "Berhasil";
        }else{
            echo "Gagal Function";
        }
    }else{
        header("location:register.php?gagal");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/adminlte.min.css">
    <link rel="stylesheet" href="../asset/css/adminlte.min.css">
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
</head>
<body>
    <div class="card">
        <form action="" method="post" role="form">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input id="" class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input id="" class="form-control" type="text" name="username">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input id="" class="form-control" type="password" name="password">
                </div>
            </div>
            <div class="card-footer">
                <!-- <input type="submit" value="register" name="register"> -->
                <button type="submit" class="btn btn-primary" name="register">Register</button>
            </div>
        </form>
    </div>

    <script src="../asset/js/jquery.js"></script>
    <script src="../asset/js/adminlte.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
</body>
</html>