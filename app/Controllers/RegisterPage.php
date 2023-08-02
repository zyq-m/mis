<?php

namespace App\Controllers;

class RegisterPage extends BaseController
{
    public function index()
    {
        $pageTitle = ["title" => "Register"];

        return view('user/RegisterPage.php', $pageTitle);
    }
}
