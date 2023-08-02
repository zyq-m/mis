<?php

namespace App\Controllers;

class LoginPage extends BaseController
{
    public function index()
    {
        $pageTitle = ["title" => "Login"];

        return view('user/LoginPage.php', $pageTitle);
    }

    public function login()
    {
        // check if form submited
        if (!$this->request->is('post')) {
            return $this->index();
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
