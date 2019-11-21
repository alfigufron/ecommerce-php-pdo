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
                        echo "
                        <div class='col-3-auto m-4 mt-5'>
                        <div class='product-image'>
                            <a href='detail.php' class='product'>
                                <img src='asset/img/pict-goods/$d->picture' alt=''>
                                $d->name
                            </a>
                            <p>IDR $d->price </p>
                        </div>
                    </div>
                        ";
                    }
                ?>
                
                <!-- <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="detail.php" class="product">
                            <img src="asset/img/storage/clothing_1.jpg" alt="">
                            CANVAS SUEDE TRUCKER BLACK
                        </a>
                        <p>IDR 225.000</p>
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_2.jpg" alt="">
                            CANVAS SUEDE TRUCKER BROWN
                        </a>
                        <p>IDR 325.000</p>
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_3.jpg" alt="">
                            CANVAS SUEDE TRUCKER LIGHT BROWN
                        </a>
                        <p>IDR 215.000</p>                        
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_4.jpg" alt="">
                            COTTON BASIC SHIRT ARMY
                        </a>
                        <p>IDR 125.000</p>                        
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_5.jpg" alt="">
                            COTTON BASIC SHIRT BLACK
                        </a>
                        <p>IDR 105.000</p>                        
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_6.jpg" alt="">
                            COTTON BASIC SHIRT LIGHT BROWN
                        </a>
                        <p>IDR 155.000</p>                        
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="product">
                            <img src="asset/img/storage/clothing_1.jpg" alt="">
                            CANVAS SUEDE TRUCKER BLACK
                        </a>
                        <p>IDR 225.000</p>
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_2.jpg" alt="">
                            CANVAS SUEDE TRUCKER BROWN
                        </a>
                        <p>IDR 325.000</p>
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_3.jpg" alt="">
                            CANVAS SUEDE TRUCKER LIGHT BROWN
                        </a>
                        <p>IDR 215.000</p>                        
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_4.jpg" alt="">
                            COTTON BASIC SHIRT ARMY
                        </a>
                        <p>IDR 125.000</p>                        
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_5.jpg" alt="">
                            COTTON BASIC SHIRT BLACK
                        </a>
                        <p>IDR 105.000</p>                        
                    </div>
                </div>
                <div class="col-3-auto m-4 mt-5">
                    <div class="product-image">
                        <a href="#" class="">
                            <img src="asset/img/storage/clothing_6.jpg" alt="">
                            COTTON BASIC SHIRT LIGHT BROWN
                        </a>
                        <p>IDR 155.000</p>                        
                    </div>
                </div> -->
            </div>  
        </div>
    </div>