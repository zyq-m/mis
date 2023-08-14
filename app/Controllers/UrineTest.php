<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UrineTest extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $data['title'] = "Urine Test";

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
