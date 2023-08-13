<?php
$db = \Config\Database::connect();
$uri = service('uri');

$session = \Config\Services::session();

// $u_fullname = $session->get('userdata')['u_fullname'];
// $role = $session->get('userdata')['u_role'];


?>
<aside class="main-sidebar elevation-4 sidebar-dark-pink">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>dashboard" class="brand-link bg-white">
        <img src="<?php echo base_url(); ?>assets/images/pink-ribbon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>BreastCancer</b>IS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/images/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-house"></i>
                        <p class="text">
                            Menu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item active">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="text">Sub Menu</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-house"></i>
                        <p class="text">Sub Menu</p>
                    </a>
                </li>



                </li>

                <li class="nav-header">ACCOUNT</li>
                <li class="nav-item ">
                    <a href="<?php echo base_url() ?>profile" class="nav-link<?= ($uri->getSegment(1) == "profile" && $uri->getSegment(2) == "") ? " active" : "" ?>">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p class="text">Profile</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="<?php echo base_url() ?>profile/password" class="nav-link<?= ($uri->getSegment(1) == "profile" && $uri->getSegment(2) == "password") ? " active" : "" ?>">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p class="text">Change Password</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>logout" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Log Out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>