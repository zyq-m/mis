<?php

namespace App\Models;

use CodeIgniter\Model;

class GeneticFactorModel extends Model
{
    protected $table = "genetic_factor";
    protected $primaryKey = "id";

    protected $allowedFields = ['myKad', 'family_history', 'past_cancer', 'diagnose', 'diagnose_date'];
}
