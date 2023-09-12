<?php

namespace App\Controllers;

use App\Models\ImageRepoModel;
use App\Models\PatientModel;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;

class ImageRepo extends BaseController
{
    protected $helpers = ['form'];
    protected $validation = \Config\Services::validation();

    public function index()
    {
        $imageRepo = model(ImageRepoModel::class);
        $images = $imageRepo->findAll();

        $data = ['title' => 'Image Repository', 'images' => $images];

        return view('image_repo/index', $data);
    }

    public function form()
    {
        $data['title'] = "Image Repository";
        $data['patient_id'] = null;

        return view('image_repo/form', $data);
    }

    public function upload()
    {
        // Get validation for memo image
        $rules = $this->validation->getRuleGroup('upload_img_repo');

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        // Grab submitted form data
        $formData = $this->request->getPost();

        // Handle upload multiple files
        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile['memo_img'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $fileName = $img->getName();
                    $fileInfo = new File($img->store('memo-img', $fileName));

                    // Store path in database
                    $imageRepo = model(ImageRepoModel::class);
                    $formData['path'] = $fileInfo->getPathname();
                    $imageRepo->save($formData);
                }
            }

            return redirect()->to('image_repo');
        }

        return redirect()->back()->withInput();
    }

    public function searchPatient()
    {
        $rules = $this->validation->getRuleGroup('search_patient');

        $id = $this->request->getGet('patient');

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $patient = model(PatientModel::class);
        $patient_details = $patient->getPatient($id);

        $data['patient'] = $patient_details;
        $data['title'] = "Image Repository";

        if (empty($data['patient'])) {
            return redirect()->back()->with('error', 'Patient not found');
        }

        $data['patient_id'] = $patient_details[0]['id'];

        return view('image_repo/form', $data);
    }

    public function fakeImageRepo()
    {
        $imageRepo = model(ImageRepoModel::class);

        return var_dump($imageRepo->fake());
    }

    public function onFakeImageRepo($total)
    {
        $imageRepo = model(ImageRepoModel::class);
        $imageRepo->generateFakeImage($total);

        return var_dump($total . ' images created');
    }
}
