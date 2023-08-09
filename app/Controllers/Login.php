<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        helper('form');
        return view('login/login_page');
    }
    public function loginhandler()
    {
        echo "testtt login handler";
    }
}
