<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ImageRepo extends BaseController
{
    public function index()
    {
        $data['title'] = "Image Repository";
        helper('form');
        return view('imagerepo/image_repo', $data);
    }
}
