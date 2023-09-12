<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Test\Fabricator;

class PatientModel extends Model
{
    protected $table = "patients";
    protected $primaryKey = "id";

    protected $allowedFields = ['name', 'phone_number', 'avatar', 'myKad', 'email'];

    public function fake()
    {
        $fab = new Fabricator($this);
        $faker = $fab->getFaker();

        return [
            'name' => $faker->name,
            'myKad' => $faker->unique()->dateTimeBetween('-30 years', '-5 years')->format('ymd') . $faker->unique()->numerify('######'),
            'phone_number' => $faker->phoneNumber,
            'address' => $faker->address,
            'avatar' => $faker->imageUrl,
            'email' => $faker->email
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

        $data = $this->where(['id' => $id])->find();

        if (!empty($data)) {
            return $data;
        }

        $data = $this->where(['myKad' => $id])->find();

        if (!empty($data)) {
            return $data;
        }
    }

    // Get all records related to patient
    public function getPatientDetails($id = 0)
    {

        $profile = $this->getPatient($id);
        $urine_test = model(UrineTestModel::class)->where(['patient_id' => $id])->find();
        $img_repo = model(ImageRepoModel::class)->where(['patient_id' => $id])->find();

        $data = [
            'profile' => $profile,
            'urine_test' => $urine_test,
            'img_repo' => $img_repo
        ];

        return $data;
    }
}
