<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Test\Fabricator;

class PatientModel extends Model
{
    protected $table = "patients";
    protected $primaryKey = "id";

    protected $allowedFields = ['name', 'gender', 'phone_number', 'address', 'avatar'];

    public function fake()
    {
        $fab = new Fabricator($this);
        $faker = $fab->getFaker();

        return [
            'name' => $faker->name,
            'gender' => $faker->randomElement(['male', 'female']),
            'phone_number' => $faker->phoneNumber,
            'address' => $faker->address,
            'avatar' => $faker->imageUrl
        ];
    }

    public function generateFakePatients($patient)
    {
        for ($i = 0; $i < $patient; $i++) {
            $this->insert($this->fake());
        }
    }
}
