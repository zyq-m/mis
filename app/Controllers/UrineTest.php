<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;

class UrineTest extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $data['title'] = "Urine Test";
        $data['patient'] = [];
        $data['patient_id'] = null;

        return view('urine_test/urine_test', $data);
    }

    public function viewPatient()
    {
        $rules = [
            'patient' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Search your patient first.',
                    'numeric' => 'Search a valid IC No. '
                ]
            ]
        ];

        $id = $this->request->getGet('patient');

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }


        $patient = model(PatientModel::class);
        $patient_details = $patient->getPatient($id);

        $data['patient'] = $patient_details;
        $data['title'] = "Urine Test";

        if (empty($data['patient'])) {
            return redirect()->back()->with('error', 'Patient not found');
        }

        $data['patient_id'] = $patient_details[0]['id'];

        return view('urine_test/urine_test', $data);
    }

    public function submitForm()
    {
        /**
         * Urine Test Form contains
         * - full name
         * - date of birth
         * - current symptoms
         */
        if (!$this->request->is('post')) {
            return redirect()->back()->withInput();
        }

        $rules = [
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required|max_length[200]|min_length[10]|alpha_numeric',
                'errors' => [
                    'required' => 'Please enter your full name',
                    'max_length' => 'Your full name must be less than 200 characters',
                    'min_length' => 'Your full name must be more than 10 characters',
                    'alpha_numeric' => 'Your full name can only contain letters and numbers'
                ]
            ],
            'date_of_birth' => [
                'label' => 'Date of Birth',
                'rules' => 'required|date',
                'errors' => [
                    'required' => 'Please enter your date of birth',
                    'date' => 'Please enter a valid date of birth'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost(); // Use getPost() to retrieve POST data

        $urineTest = model(UrineTestModel::class);
        $urineTest->save($data);
    }
}
