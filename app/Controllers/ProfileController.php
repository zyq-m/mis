<?php

namespace App\Controllers;

use App\Models\PatientModel;

class ProfileController extends BaseController
{
    protected $helpers = ['form'];

    public function profile()
    {
        $email_input  = [
            'name' => 'email',
            'type' => 'email',
            'class' => 'form-control',
            'readonly' => true,
            'value' => auth()->user()->getEmail()
        ];
        $name_input  = [
            'name' => 'name',
            'type' => 'name',
            'class' => validation_show_error('name') ? 'form-control is-invalid' : 'form-control',
        ];
        $phone_input  = [
            'name' => 'phone_no',
            'type' => 'phone_no',
            'class' => validation_show_error('phone_no') ? 'form-control is-invalid' : 'form-control',
        ];

        $data = [
            "title" => "Profile",
            'email' => $email_input, 'name' => $name_input, 'phone' => $phone_input
        ];

        return view('profile/edit_profile', $data);
    }

    public function password()
    {
        $data = [
            "title" => "Password",
        ];

        return view('profile/change_password', $data);
    }
}
