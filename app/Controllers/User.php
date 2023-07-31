<?php

namespace App\Controllers;

use App\Models\UserModel;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class User extends BaseController
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
        $key = 'example_key';
        $payload = [
            'iss' => 'http://example.org', // server name
            'iat' => 1356999524, // time when token created
            'nbf' => 1357000000,  // time token should be valid
            'user' => 'email'
        ];

        if ($isAuth) {
            $jwt = JWT::encode($payload, $key, 'HS256');

            return var_dump($jwt);
        }

        return view('login_page.php');
    }
}
