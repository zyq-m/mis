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

    public function getPatient($myKad = null)
    {
        if ($myKad == null) {
            return $this->findAll();
        }

        $data = $this->where(['myKad' => $myKad])->find();

        if (!empty($data)) {
            return $data;
        }
    }

    // Get all records related to patient
    public function getPatientDetails($myKad)
    {
        $profile = $this->getPatient($myKad);
        $demographic = model(DemographicModel::class)->where(['myKad' => $myKad])->find();
        $urine_test = model(UrineTestModel::class)->where(['myKad' => $myKad])->find();
        $img_repo = model(ImageRepoModel::class)->where(['myKad' => $myKad])->find();

        $patient = $this->select('*')
            ->join('clinical_history', 'clinical_history.myKad = patients.myKad')
            ->join('demographic', 'demographic.myKad = patients.myKad')
            ->join('urine_test', 'urine_test.myKad = patients.myKad')
            ->join('image_repo', 'image_repo.myKad = patients.myKad')
            ->where('patients.myKad', $myKad)
            ->find();

        // return $patient;
        $data = [
            'profile' => $profile,
            'demographic' => $demographic,
            'urine_test' => $urine_test,
            'img_repo' => $img_repo
        ];

        return $data;
    }
}
