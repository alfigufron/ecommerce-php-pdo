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

    <!-- Detail Produk -->
    <div class="content-detail">
        <div class="detail-inner">
            <?php
                $code = $_GET['code'];
                $get = $def->getDB();
                $query = "SELECT * FROM tbl_goods WHERE code_goods=:code";
                $statement = $get->prepare($query);
                $statement->execute(array(':code' => $code));
                $d = $statement->fetch(PDO::FETCH_OBJ);
                $price_detail = "IDR ".number_format($d->price, 0,',','.');
            ?>
            <div class="image-detail">
                <img src="asset/img/pict-goods/<?= $d->picture ?>" alt="">
            </div>
            <div class="desc-detail">
                <h1><?= $d->name ?></h1>
                <p id="cost"><?= $price_detail ?></p>
                <p class="desc-text"><?= $d->note ?></p>
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
                        <span class="text-light font-weight-bold">Notes :</span>
                        <ul>
                            <li>Stock : <?= $d->stock ?></li>
                        </ul>
                    </div>
                </div>
                <?php if(empty($_SESSION['code'])) { ?>
                <button class="btn btn-warning" type="button" id="alert-cart-login">Add to Cart</button>
                <?php } ?>
                <?php if(isset($_SESSION['code'])) { ?>
                
                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#exampleModal">Add to Cart</button>
                <?php } ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php
                            if(isset($_POST['addCart'])){
                                $cart_codeuser  = filter_input(INPUT_POST, 'input_codeuser', FILTER_SANITIZE_STRING);
                                $cart_codegoods = filter_input(INPUT_POST, 'input_codegoods', FILTER_SANITIZE_STRING);
                                $cart_goodsname = filter_input(INPUT_POST, 'input_goodsname', FILTER_SANITIZE_STRING);
                                $cart_lots      = filter_input(INPUT_POST, 'input_lots', FILTER_SANITIZE_STRING);
                                $cart_size      = filter_input(INPUT_POST, 'input_size', FILTER_SANITIZE_STRING);
                                $cart_price     = filter_input(INPUT_POST, 'input_price', FILTER_SANITIZE_STRING);
                                $cart_note      = filter_input(INPUT_POST, 'input_note', FILTER_SANITIZE_STRING);
                                $cart_total     = $cart_price*$cart_lots;
                                $add = $def->addCart($cart_codeuser, $cart_codegoods, $cart_goodsname, $cart_lots, $cart_size, $cart_total, $cart_note);
                                if($add == "sukses"){
                                    echo "<script>alert('Berhasil')</script>";
                                }else{
                                    echo "<script>alert('Gagal')</script>";
                                }
                            }
                        ?>
                        <form action="" method="post">
                            <input type="hidden" name="input_codeuser" value="<?= $codeuser; ?>" id="">
                            <input type="hidden" name="input_codegoods" value="<?= $code; ?>" id="">
                            <input type="hidden" name="input_goodsname" value="<?= $d->name; ?>" id="">
                            <input type="hidden" name="input_price" value="<?= $d->price; ?>" id="">
                            <div class="form-group">
                                <label for="">Size</label>
                                <select name="input_size" class="form-control" id="">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Lots</label>
                                <input type="number" class="form-control" name="input_lots" value="1" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Note</label>
                                <textarea name="input_note" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Add to Cart" name="addCart">
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                                </div>
                            </div>
                        </form>
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
<script>
    $(document).ready(function() {
        $('#alert-cart-login').click(function() {
            alert("Login terlebih dahulu!");
        });
    });
</script>
</html>