<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\ImageRepoModel;

class ImageRepo extends BaseController
{
    protected $helpers = ['form'];
    protected $title = "Image Repository";

    public function index()
    {
        $pageTitle = ["title" => $this->title, 'errors' => [], 'success' => null];

        return view('form/image_repo', $pageTitle);
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
            $data = ['errors' => $this->validator->getErrors(), 'title' => $this->title];

            return view('form/image_repo', $data);
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
            return view('form/image_repo', ['title' => $this->title, 'success' => 'Your file successfully uploaded']);
        }

        $data = ['errors' => 'The file has already been moved.', 'title' => $this->title];

        return view('form/image_repo', $data);
    }
}
