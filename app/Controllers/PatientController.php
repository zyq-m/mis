<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use CodeIgniter\Test\Fabricator;

class PatientController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $data['title'] = "Patient";

        return view('patient/index', $data);
    }

    public function addPatient()
    {
        // request validation
        if (!$this->request->is('post')) {
            return redirect()->back()->withInput();
        }

        // data validation
        $rules = [
            'name' => 'required|max_length[200]|min_length[5]',
            'gender' => 'required',
            'phone_number' => 'required|max_length[13]|min_length[10]',
            'avatar' => 'required',
            'address' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        // save data
        $patient = model(PatientModel::class);
        $data = $this->request->getPost();
        $patient->save($data);

        // load fake data
        $formater = [
            'name' => 'name',
            'gender' => 'gender',
            'phone_number' => 'phoneNumber',
            'avatar' => 'imageUrl',
            'address' => 'address',
        ];

        // $fabricator = new Fabricator($patient, $formater);
        // $data = $fabricator->make();

        // $patient->save();

        return '<h1>SUCCESS!</h1>';
    }

    public function viewPatient($id)
    {
        $patient = model(PatientModel::class);
        $data = $patient->find($id);

        return view('patient/view', $data);
    }
}
