<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\DemographicModel;
use App\Models\ClinicalHistroyModel;
use App\Models\GeneticFactorModel;
use CodeIgniter\Files\File;
use CodeIgniter\Shield\Entities\User;

class PatientController extends BaseController
{
    protected $helpers = ['form'];

    protected function loadOptions($data)
    {
        $data['sex_option'] = $this->sexOption();
        $data['race_option'] = $this->raceOption();
        $data['educational_option'] = $this->educationalOption();
        $data['marital_option'] = $this->maritalOption();
        $data['occupation_option'] = $this->occupationOption();
        $data['illness_option'] = $this->illnessOption();
        $data['symptom_option'] = $this->symptomOption();
        $data['medical_option'] = $this->medicalOption();
        $data['family_option'] = $this->familyHistoryOption();
        $data['parental_option'] = $this->parentalOption();
        $data['disease_option'] = $this->diseaseOption();
        $data['family_option'] = $this->familyHistoryOption();
        $data['past_option'] = $this->pastCancerOption();

        return $data;
    }

    public function index()
    {
        $data['title'] = "Patients";
        $patient = model(PatientModel::class);

        $patientList = $patient->getPatient();
        $data = ['title' => 'Patients', 'patientList' => $patientList];

        return view('patient/index', $data);
    }

    public function addPatient()
    {
        // request validation
        if ($this->request->is('get')) {
            $data['title'] = 'Add Patient';
            $data = $this->loadOptions($data);

            return view('patient/register', $data);
        }

        if (!$this->request->is('post')) {
            return redirect()->back()->withInput();
        }

        // data validation
        $validation = \Config\Services::validation();
        $rules = $validation->getRuleGroup('register_patient');

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $post = $this->request->getPost();
        $identity = $this->indentityData($post);
        $demographic = $this->demographicData($post);
        $clinical = $this->clinicalData($post);
        $genetic = $this->geneticFactorData($post);

        // Create user account
        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();
        $user = new User([
            'username' => null,
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('myKad'),
        ]);

        // save data
        $identityModel = model(PatientModel::class);
        $demographicModel = model(DemographicModel::class);
        $clinicalModel = model(ClinicalHistroyModel::class);
        $geneticModel = model(GeneticFactorModel::class);

        if ($users->save($user)) {
            $identityModel->save($identity);
            $demographicModel->save($demographic);
            $clinicalModel->save($clinical);
            $geneticModel->save($genetic);

            // To get the complete user object with ID, we need to get from the database
            $user = $users->findById($users->getInsertID());

            // Add to default group
            $users->addToDefaultGroup($user);
        } else {
            return redirect()->back()->with('register_error', 'Email has already been registered');
        }

        return redirect()->back()->with('register_success', 'Patient successfully registered');
    }

    public function viewPatient($myKad)
    {
        $patient = model(PatientModel::class);
        $patient_data = $patient->getPatientDetails($myKad);

        if (empty($patient)) {
            return redirect()->back();
        }

        $data = ['title' => 'Patient Details', 'patient' => $patient_data];

        return view('patient/view', $data);
    }

    public function editPatient($myKad = 0)
    {
        $patientModel = model(PatientModel::class);
        $clinicalModel = model(ClinicalHistroyModel::class);
        $demographicModel = model(DemographicModel::class);
        $geneticModel = model(GeneticFactorModel::class);

        // Load data from db
        if ($this->request->is('get')) {
            $join = $patientModel->select('*')->join('clinical_history', 'clinical_history.myKad = patients.myKad')
                ->join('demographic', 'demographic.myKad = patients.myKad')
                ->join('genetic_factor', 'genetic_factor.myKad = patients.myKad')
                ->where('patients.myKad', $myKad)
                ->find();

            $data = ['title' => 'Edit patient', 'patient' => $join];
            $data = $this->loadOptions($data);

            return view('/patient/edit', $data);
        }

        if ($this->request->is('post')) {
            // data validation
            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('edit_patient');

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput();
            }

            $post = $this->request->getPost();
            $identity = $this->indentityData($post);
            $demographic = $this->demographicData($post);
            $clinical = $this->clinicalData($post);
            $genetic = $this->geneticFactorData($post);

            $patientModel->set($identity)->where(['myKad' => $myKad])->update();
            $demographicModel->set($demographic)->where(['myKad' => $myKad])->update();
            $clinicalModel->set($clinical)->where(['myKad' => $myKad])->update();
            $geneticModel->set($genetic)->where(['myKad' => $myKad])->update();

            return redirect()->back()->with('register_success', 'Patient successfully updated');
        }

        return redirect()->back();
    }


    // HELPER FUNCTIONS
    public function fakePatient()
    {
        $patient = model(PatientModel::class);

        return var_dump($patient->fake());
    }

    public function onFakePatient($value = 0)
    {
        $patient = model(PatientModel::class);
        $patient->generateFakePatients($value);

        return $value . ' has been created';
    }

    protected function indentityData($post)
    {
        // Identity data
        // get img
        // $img = $this->request->getFile('avatar');

        // $filePath = null;
        // // store img
        // if ($img->isValid()) {
        //     $filepath = $img->store('avatar');
        //     $fileInfo = new File($filepath);
        //     $filePath = $fileInfo->getPathname();
        // }

        return [
            'name'          => $post['name'],
            'email'         => $post['email'],
            'myKad'         => $post['myKad'],
            // 'avatar'        => $filePath,
            'phone_number'  => $post['phone_number'],
        ];
    }

    protected function demographicData($post)
    {
        return [
            'myKad' => $post['myKad'],
            'sex' => $post['sex'],
            'race' => $post['other_race'] ? $post['other_race'] : $post['race'],
            'educational_status' => $post['educational_status'],
            'marital_status' => $post['marital_status'],
            'occupation' => $post['other_occupation'] ? $post['other_occupation'] : $post['occupation'],
        ];
    }

    protected function clinicalData($post)
    {
        // Clinical data
        $med_history = $post['med_history'];
        if (!empty($post['other_med_history'])) {
            $med_history = $post['other_med_history'];
        }
        if (!empty($post['stage'])) {
            $med_history = 'Kidney disease stage ' . $post['stage'];
        }

        $metastases = $post['metastases_symptom'];
        if (!empty($post['other_illness_present'])) {
            $metastases = $post['other_illness_present'];
        }
        if (!empty($post['weight_loss'])) {
            $metastases =  $post['weight_loss'] . 'kg weight loss';
        }

        return [
            'myKad' => $post['myKad'],
            'presenting_illness' => $post['other_illness_present'] ? $post['other_illness_present'] : $post['illness_present'],
            'metastases_symptom' => $metastases,
            'medical_history' => $med_history
        ];
    }

    protected function geneticFactorData($post)
    {
        return [
            'myKad' => $post['myKad'],
            'family_history' => $post['family_history'],
            'past_cancer' => $post['past_cancer_history'],
            'diagnose_date' => $post['date'],
            'diagnose' => $post['diagnose'],
        ];
    }

    // FORM HELPER SELECT OPTIONS
    protected function sexOption()
    {
        return [
            'name' => 'sex',
            'options' => [
                '' => 'Choose...',
                'Male' => 'Male',
                'Female' => 'Female',
            ],
            'selected' => set_value('sex'),
            'extra' => [
                'class' => validation_show_error('race') ? 'custom-select is-invalid' : 'custom-select',
            ]
        ];
    }
    protected function raceOption()
    {
        return [
            'name' => 'race',
            'options' => [
                '' => 'Choose...',
                'Malay' => 'Malay',
                'Chinese' => 'Chinese',
                'Indian' => 'Indian',
                'Others' => 'Others',
            ],
            'selected' => set_value('race'),
            'extra' => [
                'class' => validation_show_error('race') ? 'custom-select is-invalid' : 'custom-select',
                'onchange' => 'checkValue(this.value, "race", null);'
            ]
        ];
    }
    protected function maritalOption()
    {
        return [
            'name' => 'marital_status',
            'options' => [
                'Not set' => 'Choose...',
                'Single' => 'Single',
                'Married' => 'Married',
                'Divorced/Seperated' => 'Divorced/Seperated',
                'Widowed (Spoused died)' => 'Widowed (Spoused died)',
            ],
            'selected' => set_value('marital_status'),
            'extra' => [
                'class' => validation_show_error('marital') ? 'custom-select is-invalid' : 'custom-select',
            ]
        ];
    }
    protected function educationalOption()
    {
        return [
            'name' => 'educational_status',
            'options' => [
                'Not set' => 'Choose...',
                'None' => 'None',
                'Non-formal' => [
                    'Home Schooling' => 'Home Schooling',
                    'Religous Based School (Tahfiz, Pondok)' => 'Religous Based School (Tahfiz,Pondol)',
                    'Others' => 'Others',
                ],
                'Formal' => [
                    'Primary' => 'Primary',
                    'Secondary' => 'Secondary',
                ],
                'Tertiary' => [
                    'Sijil' => 'Sijil',
                    'Diploma' => 'Diploma',
                    'Degree' => 'Degree',
                    'Master' => 'Master',
                    'PhD' => 'PhD',
                ],
            ],
            'selected' => set_value('educational_status'),
            'extra' => [
                'class' => validation_show_error('educational_status') ? 'custom-select is-invalid' : 'custom-select',
                'onchange' => 'checkValue(this.value, "education", null)'
            ]
        ];
    }
    protected function occupationOption()
    {
        return [
            'name' => 'occupation',
            'options' => [
                'Not set' => 'Choose...',
                'Not working' => 'Not working',
                'Student' => 'Student',
                'Government' => [
                    'Police' => 'Police',
                    'Teacher' => 'Teacher',
                    'Army' => 'Army',
                    'HealthCare Worker' => 'Healthcare Worker',
                ],
                'Oil and Gases' => 'Oil and Gases',
                'Forestry, agriculture' => 'Forestry, agriculture',
                'Fishing' => 'Fishing',
                'Manufacturing' => 'Manufacturing',
                'Construction' => 'Construction',
                'Painting' => 'Painting',
                'Textile' => 'Textile',
                'Others' => 'Others',
            ],
            'selected' => set_value('occupation'),
            'extra' => [
                'class' => validation_show_error('occupation') ? 'custom-select is-invalid' : 'custom-select',
                'onchange' => 'checkValue(this.value, "occupation", null)'
            ]
        ];
    }

    protected function illnessOption()
    {
        return [
            'name' => 'illness_present',
            'options' => [
                'Not set' => 'Choose...',
                'Lump' => 'Lump',
                'Pain' => 'Pain',
                'Nipple discharge' => 'Nipple discharge',
                'Asymptomatic' => 'Asymptomatic',
                'Others' => 'Others',
            ],
            'selected' => set_value('illness_present'),
            'extra' => [
                'class' => 'custom-select',
                'onchange' => 'checkValue(this.value, "illness_present", null)'
            ]
        ];
    }
    protected function symptomOption()
    {
        return [
            'name' => 'metastases_symptom',
            'options' => [
                'Not set' => 'Choose...',
                'Shortness of breath' => 'Shortness of breath',
                "Lost of weight" => [
                    'weight' => 'Weight loss (kg)'
                ],
                'Jaudice' => 'Jaudice',
                'Headache' => 'Headache',
                'Bone pain' => 'Bone pain',
                'Others' => 'Others',
            ],
            'selected' => set_value('metastases_symptom'),
            'extra' => [
                'class' => 'custom-select',
                'onchange' => 'checkValue(this.value, "metastases_symptom", "weight"); checkValue(this.value, "metastases_symptoms", null);'
            ]
        ];
    }
    protected function medicalOption()
    {
        return [
            'name' => 'med_history',
            'options' => [
                'Not set' => 'Choose...',
                'Hypertension' => 'Hypertension',
                'Diabetes mellitus' => 'Diabetes mellitus',
                'Hyperlipidaemia' => 'Hyperlipidaemia',
                "Chronic kidney disease" => [
                    'stage' => 'Stage'
                ],
                'Others' => 'Others',
            ],
            'selected' => set_value('med_history'),
            'extra' => [
                'class' => 'custom-select',
                'onchange' => 'checkValue(this.value, "med_history", "stage"), checkValue(this.value, "med_history", null)'
            ]
        ];
    }
    protected function familyHistoryOption()
    {
        return [
            'name' => 'family_history',
            'options' => [
                'Not set' => 'Choose...',
                'No' => 'No',
                "Yes" => "Yes",
            ],
            'selected' => set_value('family_history'),
            'extra' => [
                'id' => 'family_history',
                'class' => 'custom-select',
            ]
        ];
    }
    protected function parentalOption()
    {
        return [
            'name' => 'parental',
            'options' => [
                'Not set' => 'Choose...',
                "Paternal (Father Side)" => "Paternal (Father Side)",
                "Maternal (Mother Side)" => "Maternal (Mother Side)",
            ],
            'selected' => set_value('parental'),
            'extra' => [
                'class' => 'custom-select',
            ]
        ];
    }
    protected function diseaseOption()
    {
        return [
            'name' => 'disease',
            'options' => [
                'Not set' => 'Choose...',
                'Breast cancer' => 'Breast cancer',
                'Ovarian cancer' => 'Ovarian cancer',
                'Uterine cancer' => 'Uterine cancer',
                'Colorectal cancer' => 'Colorectal cancer',
                'Thyroid cancer' => 'Thyroid cancer',
                'Prostate cancer' => 'Prostate cancer',
                'Unknown' => 'Unknown',
                'Others' => 'Others',
            ],
            'selected' => set_value('disease'),
            'extra' => [
                'class' => 'custom-select',
                'onchange' => 'checkValue(this.value, "family_history", null);',
            ]
        ];
    }

    protected function pastCancerOption()
    {
        return [
            'name' => 'past_cancer_history',
            'options' => [
                'Not set' => 'Choose...',
                'No' => 'No',
                "Yes" => "Yes",
            ],
            'selected' => set_value('past_cancer_history'),
            'extra' => [
                'id' => 'past_cancer_history',
                'class' => 'custom-select',
            ]
        ];
    }
}
