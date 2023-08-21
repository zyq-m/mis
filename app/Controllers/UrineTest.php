<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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

    public function searchPatient()
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
        if (!$this->request->is('post')) {
            return redirect()->back()->withInput();
        }

        $rules = [
            'blood' => [
                'label' => 'Blood',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter {field}',
                ]
            ],
            'bilirubin' => [
                'label' => 'Bilirubin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter {field}',
                ]
            ],
            'urobilinogen' => [
                'label' => 'Urobilinogen',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter {field}',
                ]
            ],
            'keton' => [
                'label' => 'Keton',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter {field}',
                ]
            ],
            'nitrit' => [
                'label' => 'Nitrit',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter {field}',
                ]
            ],
            'protein' => [
                'label' => 'Protein',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter {field}',
                ]
            ],
            'glucose' => [
                'label' => 'Glucose',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter {field}',
                ]
            ],
            'pH' => [
                'label' => 'pH',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter {field}',
                ]
            ],
            's_gravity' => [
                'label' => 'Specific gravity',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter {field}',
                ]
            ],
            'leukocytes' => [
                'label' => 'Leukocytes',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter {field}',
                ]
            ],
            'test_taken' => [
                'label' => 'Test taken',
                'rules' => 'required|date',
                'errors' => [
                    'required' => 'Please enter {field}',
                    'date' => 'Please enter a valid {field}'
                ]
            ],
            'test_result' => [
                'label' => 'Result',
                'rules' => 'required|date',
                'errors' => [
                    'required' => 'Please enter {field}',
                    'date' => 'Please enter a valid {field}'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost(); // Use getPost() to retrieve POST data

        $urineTest = model(UrineTestModel::class);
        $urineTest->save($data);

        return redirect()->to('urine_test');
    }
}
