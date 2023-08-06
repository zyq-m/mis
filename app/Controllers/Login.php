<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $pageTitle = ["title" => "Login"];

        return view('user/login_page', $pageTitle);
    }
}
