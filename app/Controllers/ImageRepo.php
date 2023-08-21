<?php

namespace App\Controllers;

use App\Models\ImageRepoModel;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;

class ImageRepo extends BaseController
{
    protected $helpers = ['form'];

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
        $validationRule = [
            'memo_img' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[memo_img]',
                    'is_image[memo_img]',
                    'mime_in[memo_img,image/jpg,image/jpeg,image/png]',
                    'max_size[memo_img,1000]',
                    // 'max_dims[memo_img,1024,768]',
                ],
                'errors' => [
                    'uploaded' => 'Please upload an image',
                    'is_image' => 'Please upload an image',
                    'mime_in' => 'Only JPG, JPEG and PNG images are allowed',
                    'max_size' => 'Your image size exceeds 1000kb',
                ]
            ],
        ];

        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput();
        }

        // Handle upload multiple files
        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile['memo_img'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $fileName = $img->getName();
                    $fileInfo = new File($img->store('memo-img', $fileName));

                    // Store path in database
                    $imageRepo = model(ImageRepoModel::class);
                    $imageRepo->save([
                        'path' => $fileInfo->getPathname(),
                        'descriptions' => $this->request->getPost(['descriptions'])
                    ]);

                    return redirect()->to('image_repo');
                }
            }
        }

        return redirect()->back()->withInput();
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
