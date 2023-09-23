<?php

namespace App\Helpers;

class MenuHelper
{
    protected array $adminMenu = [
        [
            'name' => 'Dashboard',
            'icon' => 'fa-home',
            'link' => 'dashboard'
        ],
        [
            'name' => 'Patients',
            'icon' => 'fa-bed-pulse', // You can choose the appropriate icon class
            'link' => '#',
            'subItems' => [
                ['name' => 'Patients List', 'link' => 'patient'],
                ['name' => 'Register Patient', 'link' => 'patient/register'],
            ]
        ],
        [
            'name' => 'Image Repository',
            'icon' => 'fa-images', // You can choose the appropriate icon class
            'link' => '#',
            'subItems' => [
                ['name' => 'Images', 'link' => 'image_repo'],
                ['name' => 'Upload', 'link' => 'image_repo/form'],
            ]
        ],
        [
            'name' => 'Urine Test',
            'icon' => 'fa-flask', // You can choose the appropriate icon class
            'link' => '#',
            'subItems' => [
                ['name' => 'Add new test', 'link' => 'urine_test'],
            ]
        ],
    ];

    protected array $userMenu = [];

    public function getMenu()
    {
        if (auth()->user()->inGroup('admin')) {
            return $this->adminMenu;
        }

        return $this->userMenu;
    }
}
