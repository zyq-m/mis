<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UrineTest extends BaseController
{
    public function index()
    {
        $data['title'] = "Urine Test Request Form";
        helper('form');
        return view('urinetest/urine_test', $data);
    }
}
