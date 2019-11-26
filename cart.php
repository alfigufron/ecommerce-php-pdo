<?php
    require ('config.php');
    $def = new project1();
    $get = $def->getDB();
    $codeuser = $_SESSION['code'];
    function ngacak($digit){
        $karakter = '1234567890';
        $string = '';
        for($i=0; $i<$digit; $i++)
        {
            $post = rand(0, strlen($karakter)-1);
            $string .= $karakter{$post};
        };
        return $string;
    };
    $transactionCode = ngacak(14);

    if(isset($_POST['order'])){
        $transCode = $_POST['input_transactionCode'];
        $userCode = $_POST['input_userCode'];
        $goodsCode = $_POST['input_goodsCode'];
        $goodsName = $_POST['input_goodsName'];
        $Lots = $_POST['input_Lots'];
        $Price = $_POST['input_Price'];
        $Note = $_POST['input_Note'];
        $Address = $_POST['input_Address'];

        $sql_addOrder = "INSERT INTO tbl_order(transaction_code, user_code, goods_code, goods_name, lots, price, note, shipping_address) 
        VALUES (:transaction_code, :user_code, :goods_code, :goods_name, :lots, :price, :note, :shipping_address)";
        $statement_addOrder = $get->prepare($sql_addOrder);
        $proof = NULL;
        $index = 0;
        foreach($userCode as $dataUser){
            $statement_addOrder->bindParam(':transaction_code', $transactionCode);
            $statement_addOrder->bindParam(':user_code', $dataUser);
            $statement_addOrder->bindParam(':goods_code', $goodsCode[$index]);
            $statement_addOrder->bindParam(':goods_name', $goodsName[$index]);
            $statement_addOrder->bindParam(':lots', $Lots[$index]);
            $statement_addOrder->bindParam(':price', $Price[$index]);
            $statement_addOrder->bindParam(':note', $Note[$index]);
            $statement_addOrder->bindParam(':shipping_address', $Address[$index]);
            if($statement_addOrder->execute()){
                $sql_deleteCart = "DELETE FROM tbl_cart WHERE codeuser=:codeuser";
                $statementDelete = $get->prepare($sql_deleteCart);
                $statementDelete->execute(array(':codeuser'=>$dataUser));
            }
            
            $index++;
        }
    };
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
                                <!-- Cart (0) -->
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
        <h2>Shopping Cart</h2>

        <?php if(empty($_SESSION['code'])) { ?>
        <div class="empty-cart">
            <h4>You must login first!</h4>
            <a href="auth/login.php" class="pb-5">Log In</a>
        </div>
        <?php } ?>

        <?php if(isset($_SESSION['code'])) {
        ?>
        <table class="table table-cart">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Goods Code</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Lots</th>
                    <th scope="col">Size</th>
                    <th scope="col">Note</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM tbl_cart WHERE codeuser=:codeuser ";
                $statement = $get->prepare($sql);
                $statement->execute(array(':codeuser'=>$codeuser));
                while($cart = $statement->fetch(PDO::FETCH_OBJ)){
                    $codegoods = $cart->codegoods;
                    $price_detail = "IDR ".number_format($cart->price, 0,',','.');
                    echo
                    "
                        <tr>
                            <td>$cart->codegoods</td>
                            <td>$cart->goodsname</td>
                            <td>$price_detail</td>
                            <td>$cart->lots</td>
                            <td>$cart->size</td>
                            <td>$cart->note</td>
                            <td>
                                <a href='config/delete-cart.php?id=$cart->id' class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>
                    ";
                }
                // Total Price
                $sql1 = "SELECT SUM(price) AS value_sum FROM tbl_cart WHERE codeuser=:codeuser";
                $statement1 = $get->prepare($sql1);
                $statement1->execute(array(':codeuser'=>$codeuser));
                $row = $statement1->fetch(PDO::FETCH_ASSOC);
                $total = $row['value_sum'];
                $total_detail = "IDR ".number_format($total, 0,',','.');

                // Total Lots
                $sql2 = "SELECT SUM(lots) AS value_sum FROM tbl_cart WHERE codeuser=:codeuser";
                $statement2 = $get->prepare($sql2);
                $statement2->execute(array(':codeuser'=>$codeuser));
                $row = $statement2->fetch(PDO::FETCH_ASSOC);
                $totalLots = $row['value_sum'];

                echo
                "
                <tr class='bg-dark text-light'>
                    <td>Total</td>
                    <td></td>
                    <td>$total_detail</td>
                    <td>$totalLots</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                "
            ?>
        </tbody>
        </table>
            <a href='' class='btn btn-dark' data-toggle='modal' data-target='#order-modal'>Order</a>
        <?php } ?>
        <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="orderDialog">
                        <form method="post" action="">
                            <?php
                                $sql_cart = "SELECT * FROM tbl_cart WHERE codeuser=:codeuser";
                                $statement_cart = $get->prepare($sql_cart);
                                $statement_cart->execute(array(':codeuser'=>$codeuser));
                                while($data_cart = $statement_cart->fetch(PDO::FETCH_OBJ)){
                                    $sql_user = "SELECT * FROM tbl_user WHERE code=:codeuser";
                                    $statement_user = $get->prepare($sql_user);
                                    $statement_user->execute(array(':codeuser'=>$codeuser));
                                    $data_user = $statement_user->fetch(PDO::FETCH_OBJ);
                                    $address = $data_user->address;
                                    echo
                                    "   
                                        <label>Kode Transaksi</label>
                                        <input type='text' name='input_transactionCode[]' value='$transactionCode'>
                                        <label>Kode User</label>
                                        <input type='text' name='input_userCode[]' value='$codeuser'>
                                        <label>Kode Barang</label>
                                        <input type='text' name='input_goodsCode[]' value='$data_cart->codegoods'>
                                        <label>Nama Barang</label>
                                        <input type='text' name='input_goodsName[]' value='$data_cart->goodsname'>
                                        <label>Jumlah Barang</label>
                                        <input type='text' name='input_Lots[]' value='$data_cart->lots'>
                                        <label>Harga Barang</label>
                                        <input type='text' name='input_Price[]' value='$data_cart->price'>
                                        <label>Catatan</label>
                                        <input type='text' name='input_Note[]' value='$data_cart->note'>
                                        <label>Alamat</label>
                                        <input type='text' name='input_Address[]' value='$address'>
                                    ";
                                }
                            ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <input type="submit" value="Beli" name="order">
                        </form>
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
<script>
    // $(document).on("click", ".data-cart", function() {
    //     let myId = $(this).data('id');
    //     $(".modal-body #orderId").val(myId);
    // });
</script>
</html>