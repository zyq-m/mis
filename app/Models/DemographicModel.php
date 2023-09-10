<?php

namespace App\Models;

use CodeIgniter\Model;

class DemographicModel extends Model
{
    protected $table = "demographic";
    protected $primaryKey = "id";

    protected $allowedFields = ['myKad', 'sex', 'educational_status', 'marital_status', 'occupation'];
}
