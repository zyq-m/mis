<?php

namespace App\Models;

use CodeIgniter\Model;

class ClinicalHistroyModel extends Model
{
    protected $table = "clinical_history";
    protected $primaryKey = "id";

    protected $allowedFields = ['myKad', 'presenting_illness', 'metastases_symptom', 'medical_history'];

    public function create($myKad, $illness, $symptom, $med_history): bool
    {
        return $this->save([$myKad, $illness, $symptom, $med_history]);
    }
}
