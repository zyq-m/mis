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
            'full_name' => 'required|max_length[200]|min_length[10]|alphabetic',
            'date_of_birth' => 'required|date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost(); // Use getPost() to retrieve POST data

        $urineTest = model(UrineTestModel::class);
        $urineTest->save($data);
    }
}
