<?php

namespace App\Controllers;

use App\Models\UrineTestModel;

class UrineTest extends BaseController
{
    public function index()
    {
        $pageTitle = ["title" => "Urine Test"];

        return view('form/urine_test', $pageTitle);
    }

    public function submitForm()
    {
        /**
         * Urine Test Form contains
         * - full name
         * - date of birth
         * - current symptoms
         */
        $form = $this->request->getGetPost();
        $urineTest = model(UrineTestModel::class);

        $isCreated = $urineTest->save([
            'full_name' => $form['fullname'],
            'date_of_birth' => $form['dob'],
            'descriptions' => $form['descriptions'],
        ]);

        if (!$isCreated) {
            return view('<h1>Failed</h1>');
        }

        return $this->index();
    }
}
