<?php

namespace App\Models;

use CodeIgniter\Model;

class ClinicalHistroyModel extends Model
{
    protected $table = "clinical_history";
    protected $primaryKey = "id";

    protected $allowedFields = ['myKad', 'presenting_illness', 'metastases_symptom', 'medical_history'];
}
