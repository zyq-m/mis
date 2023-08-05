<?php

namespace App\Models;

use CodeIgniter\Model;

class UrineTestModel extends Model
{
    protected $table = "urine_test";
    protected $primaryKey = "id";

    protected $allowedFields = ['full_name', 'date_of_birth', 'concerns'];
}
