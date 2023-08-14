<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Test\Fabricator;

class PatientModel extends Model
{
    protected $table = "patients";
    protected $primaryKey = "id";

    protected $allowedFields = ['name', 'gender', 'phone_number', 'address', 'avatar', 'ic_no'];

    public function fake()
    {
        $fab = new Fabricator($this);
        $faker = $fab->getFaker();

        return [
            'name' => $faker->name,
            'gender' => $faker->randomElement(['Male', 'Female']),
            'ic_no' => $faker->unique()->dateTimeBetween('-30 years', '-5 years')->format('ymd') . $faker->unique()->numerify('######'),
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

    public function getPatient($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->find();
    }
}
