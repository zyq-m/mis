<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\ImageRepoModel;

use App\Controllers\BaseController;

class ImageRepo extends BaseController
{
    public function index()
    {
        $data['title'] = "Image Repository Form";
        helper('form');
        return view('imagerepo/image_repo', $data);
    }

    public function upload()
    {
        // Get validation for memo image
        $validationRule = [
            'memoimg' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[memoimg]',
                    'is_image[memoimg]',
                    'mime_in[memoimg,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[memoimg,1000]',
                    // 'max_dims[memoimg,1024,768]',
                ],
            ],
        ];
        if (!$this->validate($validationRule)) {
            $data = [
                'errors' => $this->validator->getErrors(),
                'title' => 'Image Repository Form', // Use the appropriate title here
                'success' => null,
            ];

            return view('imagerepo/image_repo', $data);
        }

        $img = $this->request->getFile('memoimg');

        if (!$img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $uploadInfo = new File($filepath);

            // Store path in database
            $imageRepo = model(ImageRepoModel::class);
            $imageRepo->save([
                'path' => $uploadInfo->getPathname(),
                'descriptions' => $this->request->getPost(['descriptions'])
            ]);
            // $data = ['uploaded_fileinfo' => new File($filepath)];

            // return 'Success';
            return view('imagerepo/image_repo', ['title' => 'Image Repository Form', 'error' => [], 'success' => 'Your file successfully uploaded']);
        }

        $data = ['errors' => 'The file has already been moved.', 'title' => $this->title];

        return view('imagerepo/image_repo', $data);
    }
}
