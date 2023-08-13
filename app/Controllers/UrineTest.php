<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UrineTest extends BaseController
{
    public function index()
    {
        $data['title'] = "Urine Test Request Form";
        helper('form');
        return view('urinetest/urine_test', $data);
    }
    public function submitForm()
    {
        /**
         * Urine Test Form contains
         * - full name
         * - date of birth
         * - current symptoms
         */
        $form = $this->request->getPost(); // Use getPost() to retrieve POST data

        // Check if the form data was properly received
        if ($form) {
            $urineTest = model(UrineTestModel::class);

            $isCreated = $urineTest->save([
                'full_name' => $form['fullname'],
                'date_of_birth' => $form['dob'],
                'descriptions' => $form['descriptions'],
            ]);

            if (!$isCreated) {
                return view('error_view'); // Replace with an appropriate error view
            }

            return $this->index();
        } else {
            return view('error_view'); // Handle error if form data is not received
        }
    }
}
