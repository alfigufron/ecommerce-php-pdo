<?php
    require ('config.php');
    $def = new project1();
    $get = $def->getDB();
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
                                <?php
                                    if(isset($_SESSION['code'])){
                                        $codeusercart = $_SESSION['code'];
                                        $sqlCart = "SELECT codegoods FROM tbl_cart WHERE codeuser=:codeuser ";
                                        $statementCart = $get->prepare($sqlCart);
                                        $statementCart->execute(array(':codeuser'=>$codeusercart));
                                        $count = $statementCart->rowCount();
                                        if($count > "0"){
                                            echo "Cart($count)";
                                        }else{
                                            echo "Cart(0)";
                                        }
                                    }elseif(empty($_SESSION['code'])){
                                        echo "Cart(0)";
                                    }
                                ?>
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
                            <?php
                                $codeuser = $_SESSION['code'];
                                $get = $def->getDB();
                                $query = "SELECT * FROM tbl_user WHERE code=:code";
                                $statement = $get->prepare($query);
                                $statement->execute(array(':code' => $codeuser));
                                $d1 = $statement->fetch(PDO::FETCH_OBJ);
                            ?>
                            <button class="btn dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="asset/img/profile-icon.png" width="20" height="20" alt=""> <?= $d1->name ?>
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

    <div class="content-cart text-center">
        <h2>Payments</h2>
        <?php if(empty($_SESSION['code'])) { ?>
            <div class="empty-cart">
            <h4>You must login first!</h4>
            <a href="auth/login.php" class="pb-5">Log In</a>
        </div>
        <?php } ?>

        <?php if(isset($_SESSION['code'])) {
            $dataorder = $def->orderDataDetail($codeuser);
            $result = $dataorder->fetch(PDO::FETCH_ASSOC);
            if(empty($result)){
                echo
                "
                    <div class='empty-cart'>
                        <h4>Payment Empty</h4>
                    </div>
                ";
            }else{
        ?>
        <div class="table-responsive p-0">
            <table class="table table-cart table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Transaction Code</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Address</th>
                        <th scope="col">Proof</th>
                        <th scope="col">Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $dataorder = $def->orderDataDetail($codeuser);
                        while($d = $dataorder->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <tr>
                        <td><?= $d->transaction_code ?></td>
                        <td><?= $d->goods_name ?></td>
                        <td><?= $d->lots ?></td>
                        <td><?= $d->price ?></td>
                        <td><?= $d->shipping_address ?></td>
                        <td>
                            <?php
                                $data = $d->proof;
                                if($data == NULL){
                                    echo
                                    "
                                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
                                            Payment
                                        </button>
                                    ";
                                }else{
                                    echo
                                    "
                                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' disabled>
                                            Payment
                                        </button>
                                    ";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $data = $d->proof;
                                if($data == NULL){
                                    echo "Belum ada bukti pembayaran";
                                }else{
                                    echo "Menunggu Konfirmasi";
                                }
                            ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                            if(isset($_POST['sendProof'])){
                                $dataorder = $def->orderDataDetail($codeuser);
                                $d = $dataorder->fetch(PDO::FETCH_OBJ);
                                $transaction_code = $d->transaction_code;
                                $proofPicture = $_FILES['proof'];
                                $add = $def->sendProof($transaction_code, $proofPicture, $random);
                                if($add == "sukses"){
                                    echo "<script>alert('Berhasil')</script>";
                                }
                            }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="proof" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-dark">Send Proff</button> -->
                        <input type="submit" value="Send Proof" name="sendProof" class="btn btn-dark">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } }  ?>

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