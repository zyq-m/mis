<?php

$uri = service('uri');

$menuItems = [
    [
        'id' => 1,
        'name' => 'Dashboard',
        'icon' => 'fa-home',
        'subItems' => []
    ],
    [
        'id' => 2,
        'name' => 'Patients',
        'icon' => 'fa-bed-pulse', // You can choose the appropriate icon class
        'subItems' => [
            ['id' => 21, 'name' => 'Patients List', 'icon' => ''],
            ['id' => 22, 'name' => 'Register Patient', 'icon' => ''],
        ]
    ],
    [
        'id' => 3,
        'name' => 'Image Repository',
        'icon' => 'fa-images', // You can choose the appropriate icon class
        'subItems' => [
            ['id' => 52, 'name' => 'Images', 'icon' => ''],
            ['id' => 53, 'name' => 'Upload', 'icon' => ''],
        ]
    ],
    [
        'id' => 5,
        'name' => 'Urine Test',
        'icon' => 'fa-flask', // You can choose the appropriate icon class
        'subItems' => [
            ['id' => 51, 'name' => 'Add new test', 'icon' => ''],
        ]
    ],
];

function getMenuHref($itemId)
{
    // Replace this logic with your actual URLs for each menu item
    switch ($itemId) {
        case 1:
            return 'dashboard';
        case 21:
            return 'patient';
        case 22:
            return 'patient/register';
        case 51:
            return 'urine_test';
        case 52:
            return 'image_repo';
        case 53:
            return 'image_repo/form';
        default:
            return '#'; // Default case if no match found
    }
}

function isMenuItemActive($itemId)
{
    $uri = service('uri');
    $currentSegment = $uri->getSegment(1); // Assuming the segment for your menu item is at index 1
    $menuItemSegment = getMenuHref($itemId);

    // Check if the current URL segment matches the menu item segment
    if ($currentSegment === $menuItemSegment) {
        return ' active';
    }

    return '';
}

function isSubMenuItemActive($subItemId)
{
    $uri = service('uri');
    $currentUrl = current_url(); // Get the current full URL
    $subMenuItemUrl = site_url(getMenuHref($subItemId)); // Generate sub-menu URL

    // Check if the current URL matches the sub-menu URL
    if ($currentUrl === $subMenuItemUrl) {
        return ' active';
    }

    return '';
}

?>
<aside class="main-sidebar elevation-4 sidebar-dark-pink">
    <!-- Brand Logo -->
    <a href="<?= site_url() ?>dashboard" class="brand-link bg-white">
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
                <p class="d-block text-white">
                    <?= auth()->user()->getEmail() ?>
                </p>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach ($menuItems as $menuItem) : ?>
                    <li class="nav-item">
                        <a href="<?= site_url(getMenuHref($menuItem['id'])) ?>" class="nav-link<?= isMenuItemActive($menuItem['id']) ?>">
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
                                        <a href="<?= site_url(getMenuHref($subItem['id'])) ?>" class="nav-link<?= isSubMenuItemActive($subItem['id']) ?>">
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
                    <a href="<?= site_url("profile") ?>" class=" nav-link<?= ($uri->getSegment(1) == "profile" && $uri->getSegment(2) == "") ? " active" : "" ?>">
                        <i class="nav-icon fa fa-user"></i>
                        <p class="text">Profile</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="<?= site_url("profile/password") ?>" class="nav-link<?= ($uri->getSegment(1) == "profile" && $uri->getSegment(2) == "password") ? " active" : "" ?>">
                        <i class="nav-icon fa fa-key"></i>
                        <p class="text">Change Password</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= site_url('logout'); ?>" class="nav-link">
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