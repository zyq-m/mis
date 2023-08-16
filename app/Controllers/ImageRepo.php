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
        $data['title'] = "Image Repository";

        return view('image_repo/image_repo', $data);
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
            'file_name' => [
                'label' => 'File Name',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required.',
                ],
            ]
        ];

        $name = $this->request->getPost('file_name');

        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput();
        }

        $img = $this->request->getFile('memo_img');

        if (!$img->hasMoved()) {
            // store image in upload folder
            $fileName = $name . "." . $img->getExtension();
            $fileInfo = new File($img->store('memo-img', $fileName));

            // Store path in database
            $imageRepo = model(ImageRepoModel::class);
            $imageRepo->save([
                'path' => $fileInfo->getPathname(),
                'descriptions' => $this->request->getPost(['descriptions'])
            ]);

            return redirect()->to('image_repo');
        }

        return redirect()->back()->withInput();
    }
}
