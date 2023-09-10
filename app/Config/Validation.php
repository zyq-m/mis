<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public array $register_patient = [
        'name' => [
            'label' => 'Name',
            'rules' => 'required|max_length[200]|min_length[5]',
            'errors' => [
                'required' => 'Please enter a {field}',
                'max_length' => 'Your {field} must not exceed 200 characters',
                'min_length' => 'Your {field} must at least 5 characters'
            ]
        ],
        'myKad' => [
            'label' => 'My Kad',
            'rules' => 'required|max_length[12]|min_length[12]|is_unique[patients.myKad]',
            'errors' => [
                'required' => 'Please enter a {field}',
                'max_length' => 'Your {field} must be 12 characters',
                'min_length' => 'Your {field} must be 12 characters',
                'is_unique' => '{field} has already been used'
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
                // 'uploaded[avatar]',
                'is_image[avatar]',
                'mime_in[avatar,image/jpg,image/jpeg,image/png]',
                'max_size[avatar,200]',
            ],
            'errors' => [
                // 'uploaded' => 'Please upload a {field}',
                'is_image' => 'Please upload a valid {field}',
                'mime_in' => 'Only {field} with JPG, JPEG and PNG are allowed',
                'max_size' => 'Your {field} exceeds 200kb',
            ]
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[patient.email]',
            'errors' => [
                'required' => 'Please enter {field}',
                'valid_email' => 'Invalid {field}',
                'is_unique' => '{field} has already been used',
            ]
        ],
        'sex' => [
            'label' => 'Sex',
            'rules' => 'required',
            'errors' => [
                'required' => 'Please choose a {field}'
            ]
        ],
        'race' => [
            'label' => 'Race',
            'rules' => 'required',
            'errors' => [
                'required' => 'Please choose a {field}'
            ]
        ],
    ];
}
