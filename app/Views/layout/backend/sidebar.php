<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-navy bg-custom1 elevation-4">
    <a href="../assets/backend/index3.html" class="brand-link">
        <!-- <img src="../assets/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">Jhona Catering</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- <?php if (session()->get('role') == 'Admin'): ?> -->
                <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('admin/konsumen')?>" class="nav-link {{title=='Konsumen' ? 'active': ''}}">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>
                            Konsumen
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('admin/fasilitas')?>" class="nav-link {{title=='Fasilitas' ? 'active': ''}}">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>
                            Fasilitas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('admin/pesanan')?>" class="nav-link {{title=='Pesanan' ? 'active': ''}}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Pesanan
                            <span ng-if="warning > 0" class="right badge badge-warning">{{warning}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('admin/laporan')?>" class="nav-link {{title=='Laporan' ? 'active': ''}}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                <!-- <?php endif;?> -->


                <?php if (session()->get('role') == 'Konsumen'): ?>
                <li class="nav-item">
                    <a href="<?=base_url('customer/home')?>" class="nav-link {{title=='Home' ? 'active': ''}}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('konsumen/boking')?>" class="nav-link {{title=='Pesanan' ? 'active': ''}}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Pesanan
                        </p>
                    </a>
                </li>

                <?php endif;?>
                <li class="nav-item">
                    <a href="<?=base_url('jadwal')?>" class="nav-link {{title=='Jadwal' ? 'active': ''}}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Cek Jadwal
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('auth/logout')?>" class="nav-link {{title=='LogOut' ? 'active': ''}}">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>