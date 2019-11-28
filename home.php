    <?php
        require ('config.php');
    ?>
    <div class="container-fluid all-category bg-white1">
        <!-- Product -->
        <div class="container storage-brand">
            <h5 class="text-uppercase text-dark font-weight-bolder mt-2">Available stock</h5>
            <div class="row justify-content-center">
                <?php
                    $def = new project1();
                    $goodsdata = $def->goodsData();
                    while($d = $goodsdata->fetch(PDO::FETCH_OBJ)){
                        $price_fix = "IDR ".number_format($d->price, 0,',','.');
                        echo "
                        <div class='col-3-auto m-4 mt-5'>
                        <div class='product-image'>
                            <a href='detail.php?code=$d->code_goods' class='product'>
                                <img src='asset/img/pict-goods/$d->picture' alt=''>
                                $d->name
                            </a>
                            <p>$price_fix </p>
                        </div>
                    </div>
                        ";
                    }
                ?>
            </div>  
        </div>
    </div>