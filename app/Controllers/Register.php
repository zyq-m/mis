<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        $pageTitle = ["title" => "Register"];

        return view('user/register', $pageTitle);
    }
}
