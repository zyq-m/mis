<?php

namespace App\Models;

use CodeIgniter\Model;

class UrineTestModel extends Model
{
    protected $table = "urine_test";
    protected $primaryKey = "id";

    protected $allowedFields = [
        'descriptions',
        'blood',
        'bilirubin',
        'urobilinogen',
        'keton',
        'protein',
        'nitrit',
        'glucose',
        'pH',
        's_gravity',
        'leukocytes',
        'test_taken',
        'test_result',
        'myKad'
    ];
}
