<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $pageTitle = ["title" => "Dashboard"];

        return view('user/Dashboard.php', $pageTitle);
    }
}
