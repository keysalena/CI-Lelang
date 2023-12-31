<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <img class="icon" src="<?php echo base_url() ?>assets/img/paus.png" alt="">
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php
            $currentPage = $this->uri->segment(2); // Assuming the controller method is the second URI segment

            function isMenuItemActive($menuItem, $currentPage)
            {
                return $menuItem === $currentPage ? 'active' : '';
            }
            ?>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo isMenuItemActive('dashboard_admin', $currentPage); ?>">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard_admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Nav Item - Data Barang -->
            <li class="nav-item <?php echo isMenuItemActive('data_barang', $currentPage); ?>">
                <a class="nav-link" href="<?php echo base_url('admin/data_barang') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Barang</span>
                </a>
            </li>

            <li class="nav-item <?php echo isMenuItemActive('data_lelang', $currentPage); ?>">
                <a class="nav-link" href="<?php echo base_url('admin/data_lelang') ?>">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Data Lelang</span>
                </a>
            </li>
            <li class="nav-item <?php echo isMenuItemActive('history', $currentPage); ?>">
                <a class="nav-link" href="<?php echo base_url('admin/history') ?>">
                    <i class="fas fa-fw fa-filter"></i>
                    <span>History</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">

            <div class="row align-items-end mt-3">
                <li class="nav-item col">
                    <a class="nav-link" href="<?php echo base_url('registrasi') ?>">
                        <i class="fas fa-fw fa-dragon"></i>
                        <span>Sign-up</span>
                    </a>
                </li>

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline col">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </div>

        </ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Centered User Information -->
                        <div class="d-flex align-items-center">

                            <?php if ($this->session->userdata('username')) { ?>
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('username') ?> </span>
                                        <img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/img/hiro_soma_fruits_basket.jpeg">
                                    </a>

                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>

                            <?php } else { ?>
                                <li>
                                    <?php echo anchor('auth/login', 'Login') ?>
                                </li>
                            <?php } ?>

                        </div>


                    </ul>
                </nav>
                <!-- End of Topbar -->