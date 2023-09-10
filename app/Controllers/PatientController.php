<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\DemographicModel;
use App\Models\ClinicalHistroyModel;
use CodeIgniter\Files\File;

class PatientController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $data['title'] = "Patients";
        $patient = model(PatientModel::class);

        $patientList = $patient->getPatient();
        $data = ['title' => 'Patients', 'patientList' => $patientList];

        return view('patient/index', $data);
    }

    public function addPatient()
    {
        // request validation
        if ($this->request->is('get')) {
            $data['title'] = 'Add Patient';

            return view('patient/register', $data);
        }

        if (!$this->request->is('post')) {
            return redirect()->back()->withInput();
        }

        // data validation
        $validation = \Config\Services::validation();
        $rules = $validation->getRuleGroup('register_patient');

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $post = $this->request->getPost();

        // Identity data
        // get img
        $img = $this->request->getFile('avatar');

        $filePath = null;
        // store img
        if ($img->isValid()) {
            $filepath = $img->store('avatar');
            $fileInfo = new File($filepath);
            $filePath = $fileInfo->getPathname();
        }

        $identity = [
            'name'          => $post['name'],
            'email'         => $post['email'],
            'myKad'         => $post['myKad'],
            'avatar'        => $filePath,
            'phone_number'  => $post['phone_number'],
            'address'       => $post['address'],
        ];

        // Demographic data
        $demographic = [
            'myKad' => $post['myKad'],
            'sex' => $post['sex'],
            'race' => $post['other_race'] ? $post['other_race'] : $post['race'],
            'educational_status' => $post['educational_status'],
            'marital_status' => $post['marital_status'],
            'occupation' => $post['other_occupation'] ? $post['other_occupation'] : $post['other_occupation'],
        ];

        // Clinical data
        $med_history = $post['med_history'];
        if (!empty($post['other_med_history'])) {
            $med_history = $post['other_med_history'];
        }
        if (!empty($post['stage'])) {
            $med_history = 'Kidney disease stage ' . $post['stage'];
        }

        $metastases = $post['metastases_symptom'];
        if (!empty($post['other_illness_present'])) {
            $metastases = $post['other_illness_present'];
        }
        if (!empty($post['weight_loss'])) {
            $metastases =  $post['weight_loss'] . 'kg weight loss';
        }

        $clinical = [
            'myKad' => $post['myKad'],
            'presenting_illness' => $post['other_illness_present'] ? $post['other_illness_present'] : $post['illness_present'],
            'metastases_symptom' => $metastases,
            'medical_history' => $med_history
        ];

        // save data
        $identityModel = model(PatientModel::class);
        $demographicModel = model(DemographicModel::class);
        $clinicalModel = model(ClinicalHistroyModel::class);

        if ($identityModel->save($identity)) {
            $demographicModel->save($demographic);
            $clinicalModel->save($clinical);
        }
        return redirect()->back()->with('register_success', 'Patient successfully registered');
        try {
        } catch (\Throwable $th) {

            return var_dump($th);
            //TODO: Remove image in fold
            return redirect()->back()->with('register_error', 'Registration failed. Patient already been registered');
        }
    }

    public function viewPatient($id = 0)
    {
        /**
         * @param string $is_img
         * Need to be refactored
         * This line of code will pass image path to
         * 
         */
        $is_img = $this->request->getGet('img');

        if ($is_img) {
            $session = session();
            $session->setFlashdata('img', $is_img);
        }

        $patient = model(PatientModel::class);
        $patient_data = $patient->getPatientDetails($id);
        $data = ['title' => 'Patient Details', 'patient' => $patient_data, 'id' => $id, 'is_img' => null];

        return view('patient/view', $data);
    }

    public function fakePatient()
    {
        $patient = model(PatientModel::class);

        return var_dump($patient->fake());
    }

    public function onFakePatient($value = 0)
    {
        $patient = model(PatientModel::class);
        $patient->generateFakePatients($value);

        return $value . ' has been created';
    }
}
