<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "email";

    protected $useAutoIncrement = false;
    protected $allowedFields = ['email, password', 'role_id'];

    public function auth($email = null, $password = null)
    {
        $data = ['email' => $email, 'password' => $password];
        $auth = $this->where($data)->countAllResults();

        if ($auth == 0) {
            return false;
        }

        return true;
    }
}
