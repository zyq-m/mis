<?php
$db = \Config\Database::connect();
$uri = service('uri');

$session = \Config\Services::session();

// $u_fullname = $session->get('userdata')['u_fullname'];
// $role = $session->get('userdata')['u_role'];

$menuItems = [
    [
        'id' => 1,
        'name' => 'Dashboard',
        'icon' => 'fa-home',
        'subItems' => []
    ],
    [
        'id' => 2,
        'name' => 'Registration',
        'icon' => 'fa fa-user',
        'subItems' => []
    ],
    [
        'id' => 3,
        'name' => 'Community',
        'icon' => 'fa-map-marker',
        'subItems' => []
    ],
    [
        'id' => 4,
        'name' => 'Hospital',
        'icon' => 'fa-hospital',
        'subItems' => []
    ],
    [
        'id' => 5,
        'name' => 'Form',
        'icon' => 'fa-file-alt', // You can choose the appropriate icon class
        'subItems' => [
            ['id' => 51, 'name' => 'Urine Test', 'icon' => ''],
            ['id' => 52, 'name' => 'Image Repository', 'icon' => ''],
        ]
    ],
    [
        'id' => 6,
        'name' => 'Report',
        'icon' => 'fa-chart-pie',
        'subItems' => [
            ['id' => 61, 'name' => 'Profil Orang Asli', 'icon' => ''],
            ['id' => 62, 'name' => 'Program Agensi', 'icon' => ''],
            ['id' => 63, 'name' => 'Pengislaman', 'icon' => ''],
            ['id' => 64, 'name' => 'Sumbangan', 'icon' => '']
        ]
    ],
    [
        'id' => 7,
        'name' => 'Setting',
        'icon' => 'fa-cog',
        'subItems' => [
            ['id' => 71, 'name' => 'Daerah', 'icon' => ''],
            ['id' => 72, 'name' => 'Pos', 'icon' => ''],
            ['id' => 73, 'name' => 'Kampung', 'icon' => ''],
            ['id' => 74, 'name' => 'Suku Kaum', 'icon' => ''],
            ['id' => 75, 'name' => 'Donor Agency', 'icon' => ''],
            ['id' => 76, 'name' => 'Organizing Agency', 'icon' => ''],
            ['id' => 77, 'name' => 'Users', 'icon' => ''],
        ]
    ],
];

function getMenuHref($itemId)
{
    // Replace this logic with your actual URLs for each menu item
    switch ($itemId) {
        case 1:
            return './dashboard';
        case 2:
            return './registration';
        case 3:
            return './community';
        case 4:
            return './hospital';
        case 51:
            return './urinetest';
        case 52:
            return './imagerepo';
        default:
            return '#'; // Default case if no match found
    }
}

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
                <?php foreach ($menuItems as $menuItem) : ?>
                    <li class="nav-item">
                        <a href="<?= getMenuHref($menuItem['id']) ?>" class="nav-link">
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
                                        <a href="<?= getMenuHref($subItem['id']) ?>" class="nav-link">
                                            <div class="d-flex align-items-center">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p class="text ml-2"><?= $subItem['name'] ?></p>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Add "active" class to clicked link and initialize active menu item
        $('.nav-link').on('click', function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });

        // Initialize active menu item on page load
        $('.nav-link').each(function() {
            if ($(this).attr('href') === window.location.pathname) {
                $(this).addClass('active');
            }
        });
    });
</script>