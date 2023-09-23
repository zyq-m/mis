<?php

use App\Helpers\MenuHelper;

$uri = service('uri');
$menu = new MenuHelper();

$menuItems = $menu->getMenu();
?>
<aside class="main-sidebar elevation-4 sidebar-dark-pink">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>dashboard" class="brand-link bg-white">
        <img src="<?= base_url('assets/images/pink-ribbon.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>BreastCancer</b>IS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/images/avatar.png') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="d-block text-white">
                    <?= auth()->user()->getEmail() ?>
                </span>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach ($menuItems as $menuItem) : ?>
                    <li class="nav-item">
                        <a href="<?= site_url($menuItem['link']) ?>" class="nav-link <?= current_url() == site_url($menuItem['link']) ? 'active' : '' ?>">
                            <i class="nav-icon fas <?= $menuItem['icon'] ?>"></i>
                            <p class="text">
                                <?= $menuItem['name'] ?>
                                <?php if (!empty($menuItem['subItems'])) : ?>
                                    <i class="fas fa-angle-left right"></i>
                                <?php endif; ?>
                            </p>
                        </a>
                        <?php if (!empty($menuItem['subItems'])) : ?>
                            <ul class="nav nav-treeview">
                                <?php foreach ($menuItem['subItems'] as $subItem) : ?>
                                    <li class="nav-item">
                                        <a href="<?= site_url($subItem['link']) ?>" class="nav-link <?= current_url() == site_url($subItem['link']) ? 'active' : '' ?>">
                                            <div class="d-flex align-items-center">
                                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                                <p class="text" style="margin-left: 2rem;"><?= $subItem['name'] ?></p>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>

                <li class="nav-header text-bold text-lg">Account</li>
                <li class="nav-item ">
                    <a href="<?= base_url("profile") ?>" class=" nav-link<?= ($uri->getSegment(1) == "profile" && $uri->getSegment(2) == "") ? " active" : "" ?>">
                        <i class="nav-icon fa fa-user"></i>
                        <p class="text">Profile</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="<?= base_url("profile/password") ?>" class="nav-link <?= ($uri->getSegment(1) == "profile" && $uri->getSegment(2) == "password") ? " active" : "" ?>">
                        <i class="nav-icon fa fa-key"></i>
                        <p class="text">Change Password</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('logout'); ?>" class="nav-link">
                        <!-- <i class="nav-icon far fa-circle text-danger"></i> -->
                        <i class="nav-icon fa fa-right-from-bracket"></i>
                        <p class="text">Log Out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>