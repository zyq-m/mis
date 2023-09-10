<?php

namespace App\Models;

use CodeIgniter\Model;

class DemographicModel extends Model
{
    protected $table = "demographic";
    protected $primaryKey = "id";

    protected $allowedFields = ['myKad', 'sex', 'educational_status', 'marital_status', 'occupation'];

    public function create($myKad, $age, $sex, $educational_status, $marital_status, $occupation): bool
    {
        return $this->save([$myKad, $age, $sex, $educational_status, $marital_status, $occupation]);
    }
}
