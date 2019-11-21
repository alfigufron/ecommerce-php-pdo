<?php
    require ('../../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data User</title>
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
                        <li class="nav-item has-treeview">
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
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-warehouse"></i>
                            <p>
                                Inventory
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a id="add-inventory" class="nav-link" href="add-inventory.php">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Add Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="data-inventory" class="nav-link active" href="data-inventory.php">
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
                                <li class="breadcrumb-item active">Data Inventory</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close Header Main Content -->

            <!-- Main content -->
            <div class="content">
				<div class="content-inventory">
					<div class="content-data-inevntory">
						<h3>Data Inventory</h3>
						<section class="content">
							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Table Goods</h3>
										</div>
										<div class="card-body">
											<table id="example2" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th>No</th>
														<th>Code</th>
														<th>Goods Name</th>
														<th>Category</th>
                                                        <th>Photo</th>
														<th>Price</th>
														<th>Stock</th>
														<th>Note</th>
														
													</tr>
												</thead>
												<tbody>
                                                <?php
                                                    // $no
                                                    $def = new project1();
                                                    $goodsdata = $def->goodsData();
                                                    while($d = $goodsdata->fetch(PDO::FETCH_OBJ)){
                                                        echo
                                                        "
                                                            <tr>
                                                                <td>1</td>
                                                                <td>$d->code_goods</td>
                                                                <td>$d->name</td>
                                                                <td class='text-uppercase'>$d->category</td>
                                                                <td><img class='goods-pict-adm' src='../../asset/img/pict-goods/$d->picture'></td>
                                                                <td>$d->price</td>
                                                                <td>$d->stock</td>
                                                                <td>$d->note</td>
													        </tr>
                                                        ";
                                                    }
                                                ?>
													<!-- <tr>
														<td>1</td>
														<td>1231313</td>
														<td>Milk</td>
														<td>IDR 25.000</td>
														<td>102</td>
														<td>Nanana</td>
													</tr> -->
												</tbody>
											</table>
										</div>
									</div> 
								</div>
							</div>
						</section>
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