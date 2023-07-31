<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('login_page.php');
    }

    public function login()
    {
        // check if form submited
        if (!$this->request->is('post')) {
            return view('login_page.php');
        }

        // get data pass from login form
        $data = $this->request->getPost(['email', 'password']);
        $email = $data['email'];
        $password = $data['password'];

        // validate email & password
        $userModel = model(UserModel::class);
        $isAuth = $userModel->auth($email, $password);

        // generate token


        return var_dump($isAuth);
    }
}
