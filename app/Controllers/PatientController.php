<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;
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
        $rules = [
            'name' => [
                'label' => 'Name',
                'rules' => 'required|max_length[200]|min_length[5]',
                'errors' => [
                    'required' => 'Please enter a {field}',
                    'max_length' => 'Your {field} must not exceed 200 characters',
                    'min_length' => 'Your {field} must at least 5 characters'
                ]
            ],
            'gender' => 'required',
            'ic_no' => [
                'label' => 'IC Number',
                'rules' => 'required|max_length[12]|min_length[12]|numeric',
                'errors' => [
                    'required' => 'Please enter a {field}',
                    'max_length' => 'Your {field} must be 12 characters',
                    'min_length' => 'Your {field} must be 12 characters',
                    'numeric' => 'Please enter a valid {field}'
                ]
            ],
            'phone_number' => [
                'label' => 'Phone Number',
                'rules' => 'required|max_length[15]|min_length[10]|numeric',
                'errors' => [
                    'required' => 'Please enter a {field}',
                    'max_length' => 'Your {field} must not exceed 15 characters',
                    'min_length' => 'Your {field} must be at least 10 characters',
                    'numeric' => 'Please enter a valid {field}'
                ]
            ],
            'address' => [
                'label' => 'Address',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter a {field}',
                ]
            ],
            'avatar' => [
                'label' => 'Avatar',
                'rules' => [
                    'uploaded[avatar]',
                    'is_image[avatar]',
                    'mime_in[avatar,image/jpg,image/jpeg,image/png]',
                    'max_size[avatar,200]',
                ],
                'errors' => [
                    'uploaded' => 'Please upload a {field}',
                    'is_image' => 'Please upload a valid {field}',
                    'mime_in' => 'Only {field} with JPG, JPEG and PNG are allowed',
                    'max_size' => 'Your {field} exceeds 200kb',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        // get img
        $img = $this->request->getFile('avatar');

        // store img
        $filepath = $img->store('avatar');
        $fileInfo = new File($filepath);

        $data = $this->request->getPost();
        $data['avatar'] = $fileInfo->getPathname();

        // save data
        $patient = model(PatientModel::class);

        try {
            $patient->save($data);

            return redirect()->back()->with('register_success', 'Patient successfully registered');
        } catch (\Throwable $th) {

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
