<?php

namespace App\Controllers;

use App\Models\ImageRepoModel;

class ImageController extends BaseController
{
    /**
     * This controller is responsible for handling the image request 
     * and response from the server and displaying the image.
     * 
     * Instead of reveal the actual image path, it response the image itself
     * and URL.
     */
    public function index($file_name = null)
    {

        $img_model = model(ImageRepoModel::class);
        $img_data = $img_model
            ->select('*')
            ->where(['file_name' => $file_name])
            ->find();

        $path = WRITEPATH . 'uploads/memo-img/' . $img_data[0]['myKad']
            . '/' . 'session-' . $img_data[0]['session'] . '/' . $img_data[0]['file_name'];

        if (file_exists($path)) {
            $mime = mime_content_type($path); //<-- detect file type
            header('Content-Length: ' . filesize($path)); //<-- sends filesize header
            header("Content-Type: $mime"); //<-- send mime-type header
            header('Content-Disposition: inline; filename="' . $path . '";'); //<-- sends filename header
            readfile($path); //<--reads and outputs the file onto the output buffer
            exit(); // or die()
        }

        return $this->response->setStatusCode(404);
    }
}
