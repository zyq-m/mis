<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = "patients";
    protected $primaryKey = "id";

    protected $allowedFields = ['name', 'gender', 'phone_number', 'address', 'avatar'];
}
