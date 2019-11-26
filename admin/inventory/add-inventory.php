<?php
    require ('../../config.php');
    if(empty($_SESSION['codeadmin'])){
        echo "  <script>
                    alert('Login terlebih dahulu');
                    window.location.href='../index.php';
                </script>";
    }else{
        // echo "<script>alert('Selamat Datang Admin!')</script>";
    }
    if(isset($_POST['addGoods'])){
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
        
        $random = ngacak(8);
        $name = filter_input(INPUT_POST, 'goods_name', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'goods_price', FILTER_SANITIZE_STRING);
        $stock = filter_input(INPUT_POST, 'goods_stock', FILTER_SANITIZE_STRING);
        $note = filter_input(INPUT_POST, 'goods_note', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_POST, 'goods_category', FILTER_SANITIZE_STRING);
        $photo = $_FILES['goods_photo'];
        $def = new project1();
        $add = $def->addInventory($random, $name, $price, $stock, $note, $category, $photo);
        if($add == "sukses"){
            echo "<script>alert('Berhasil')</script>";
        }else{
            echo "<script>alert('Gagal')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Inventory</title>
    <link rel="stylesheet" href="../../asset/css/style.css">
    <link rel="stylesheet" href="../../asset/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../asset/css/adminlte.min.css">
    <link rel="stylesheet" href="../../asset/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
            
        <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href="../logout.php">
                        <!-- <i class=""></i> -->
                        Log Out
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Close Navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary bg-navy elevation-4">
            
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="../../asset/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-bold">Project 1</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../asset/img/profile-icon.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block font-weight-bold">M Alfi Gufron</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        
                        <!-- User Menu -->
                        <li class="nav-item has-treeview">
                            <a id="dashboard" class="nav-link" href="../dashboard.php">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a id="add-user" class="nav-link" href="../user/add-user.php">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Add Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="data-user" class="nav-link" href="../user/data-user.php">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="payment" class="nav-link" href="#">
                                        <i class="fas fa-money-bill nav-icon"></i>
                                        <p>
                                            Payment
                                            <span class="right badge badge-danger">New</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="transaction" class="nav-link" href="#">
                                        <i class="fas fa-money-check-alt nav-icon"></i>
                                        <p>Transaction</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Inventory Menu -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-warehouse"></i>
                            <p>
                                Inventory
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a id="add-inventory" class="nav-link active" href="add-inventory.php">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Add Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="data-inventory" class="nav-link" href="data-inventory.php">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Data</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Styling Menu -->
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-paint-brush"></i>
                            <p>
                                Styling
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a id="slide-show" class="nav-link" href="#">
                                        <i class="fas fa-images nav-icon"></i>
                                        <p>Slide Show</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Contact Menu -->
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-phone-alt"></i>
                            <p>
                                Contact
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a id="social-media" class="nav-link" href="#">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Social Media</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- Close Sidebar -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content-->
        <div class="content-wrapper">
            <!-- Header Main Content -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark font-weight-bold">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right url-dashboard">
                                <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item">Inventory</li>
                                <li class="breadcrumb-item active">Add Inventory</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close Header Main Content -->

            <!-- Main content -->
            <div class="content">
                <div class="content-inventory">
                    <div class="content-add-inventory">
                        <h3>Add Inventory</h3>
                        <div class="card">
                            <div class="card-body">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input id="" class="form-control" type="text" name="goods_name" placeholder="Enter Name Goods">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input id="" class="form-control" type="number" name="goods_price" placeholder="Enter Price Goods">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Stock</label>
                                        <input id="" class="form-control" type="number" name="goods_stock" placeholder="Enter Stock Goods">
                                    </div>
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea class="form-control" rows="3" name="goods_note" placeholder="Enter Note"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="custom-select" name="goods_category">
                                            <option value="clothes">Clothes</option>
                                            <option value="pants">Pants</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="goods_photo" class="custom-file-input" id="">
                                                <label class="custom-file-label" for="">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="addGoods" class="btn btn-primary w-100">Submit</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close content -->
        </div>
        <!-- Close Content -->

        <!-- Footer -->
        <footer class="main-footer bg-gray-dark">
            <div class="float-right d-none d-sm-inline">
                Designed by Gufron
            </div>
            <strong>Copyright &copy; 2019-2020 <a href="#">Hexabyte</a>.</strong> All rights reserved.
        </footer>

    </div>
    <!-- Close Wrapper -->

    <script src="../../asset/js/jquery.js"></script>
    <script src="../../asset/js/bootstrap.bundle.min.js"></script>
    <script src="../../asset/js/adminlte.min.js"></script>
    <script src="../../asset/js/bootstrap.min.js"></script>
    <script src="../../asset/js/popper.min.js"></script>
</body>
</html>