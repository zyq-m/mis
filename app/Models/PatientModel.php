<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Test\Fabricator;
use CodeIgniter\Shield\Entities\User;

class PatientModel extends Model
{
    protected $table = "patients";
    protected $primaryKey = "id";

    protected $allowedFields = ['name', 'phone_number', 'avatar', 'myKad', 'email'];

    public function fake()
    {
        $fab = new Fabricator($this);
        $faker = $fab->getFaker();
        $email = $faker->email;
        $myKad = $faker->unique()->dateTimeBetween('-30 years', '-5 years')->format('ymd') . $faker->unique()->numerify('######');

        return [
            'name' => $faker->name,
            'myKad' => $myKad,
            'phone_number' => $faker->phoneNumber,
            'address' => $faker->address,
            'email' => $email
        ];
    }

    protected function createAccount($email, $myKad)
    {
        $userModel = auth()->getProvider();
        $user = new User([
            'username' => null,
            'email'    => $email,
            'password' => $myKad,
        ]);
        $userModel->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $userModel->findById($userModel->getInsertID());

        // Add to default group
        $userModel->addToDefaultGroup($user);
    }

    public function generateFakePatients($patient)
    {
        for ($i = 0; $i < $patient; $i++) {
            $user = $this->fake();
            $this->insert($user);
            $this->createAccount($user['email'], $user['myKad']);
            $this->createDemographic($user['myKad']);
            $this->createClinicalHistory($user['myKad']);
        }
    }

    public function getPatient($myKad = null)
    {
        if ($myKad == null) {
            return $this
                ->select('*')
                ->join('demographic', 'demographic.myKad = patients.myKad')
                ->findAll();
        }

        $data = $this->where(['myKad' => $myKad])->find();

        if (!empty($data)) {
            return $data;
        }
    }

    protected function createDemographic($myKad)
    {
        $demographicModel = model(DemographicModel::class);
        $fab = new Fabricator($this);
        $faker = $fab->getFaker();
        $gender = $faker->randomElement(['Male', 'Female']);
        $race = $faker->randomElement(['Malay', 'Chinese', 'Indian']);

        $demographicModel->save([
            'myKad' => $myKad,
            'sex' => $gender,
            'educational_status' => 'Not set',
            'marital_status' => 'Not set',
            'occupation' => 'Not set',
            'race' => $race
        ]);
    }

    protected function createClinicalHistory($myKad)
    {
        $clinicalModel = model(ClinicalHistroyModel::class);
        $fab = new Fabricator($this);
        $faker = $fab->getFaker();

        $clinicalModel->save([
            'myKad' => $myKad,
            'presenting_illness' => 'Not set',
            'metastases_symptom' => 'Not set',
            'medical_history' => 'Not set',
        ]);
    }

    // Get all records related to patient
    public function getPatientDetails($myKad)
    {
        $profile = $this->getPatient($myKad);
        $demographic = model(DemographicModel::class)->where(['myKad' => $myKad])->find();
        $clinical = model(ClinicalHistroyModel::class)->where(['myKad' => $myKad])->find();
        $genetic = model(GeneticFactorModel::class)->where(['myKad' => $myKad])->find();
        $urine_test = model(UrineTestModel::class)->where(['myKad' => $myKad])->find();
        $img_repo = model(ImageRepoModel::class)->where(['myKad' => $myKad])->find();

        $data = [
            'profile' => $profile,
            'demographic' => $demographic,
            'clinical' => $clinical,
            'genetic' => $genetic,
            'urine_test' => $urine_test,
            'img_repo' => $img_repo,
        ];

        return $data;
    }
}
