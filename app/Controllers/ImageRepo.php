<?php

namespace App\Controllers;

use App\Models\ImageRepoModel;
use App\Models\PatientModel;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;

class ImageRepo extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $imageRepo = model(ImageRepoModel::class);
        $images = $imageRepo->select('patients.name, patients.myKad')
            ->join('patients', 'patients.myKad = image_repo.myKad')
            ->groupBy('patients.name,patients.myKad')
            ->findAll();

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
        $validation = \Config\Services::validation();
        $rules = $validation->getRuleGroup('upload_img_repo');

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        // Grab submitted form data
        $formData = [
            'myKad' => $this->request->getPost('myKad'),
            'screening_date' => $this->request->getPost('screening_date'),
            'screening_time' => $this->request->getPost('screening_time'),
            'description' => $this->request->getPost('description'),
        ];
        $memoSession = $this->request->getPost('session');

        // Handle upload multiple files
        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile['memo_img'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $fileName = $img->getName();
                    $fileInfo = new File($img->store('memo-img/' . $formData['myKad'] . '/session-' . $memoSession, $fileName));

                    // Store path in database
                    $imageRepo = model(ImageRepoModel::class);
                    $formData['file_name'] = $fileName;
                    $formData['path'] = $fileInfo->getPathname();
                    $imageRepo->save($formData);
                }
            }

            return redirect()->to('image_repo');
        }

        return redirect()->back()->withInput();
    }

    public function searchPatient()
    {
        $validation = \Config\Services::validation();
        $rules = $validation->getRuleGroup('search_patient');

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

        $data['patient_id'] = $patient_details[0]['myKad'];

        return view('image_repo/form', $data);
    }

    public function searchFile($mykad = null, $memo_session = null)
    {
        $imgModel = model(ImageRepoModel::class);

        $data['images'] = $imgModel
            ->select('*')
            ->join('patients', 'patients.myKad = image_repo.myKad')
            ->where(['patients.myKad' => $mykad])
            ->find();

        if (empty($data)) {
            return redirect()->back()->withInput();
        }

        if (empty($memo_session)) {
            $data['title'] = "Memogram Session";
            $data['images'] = $imgModel
                ->select('patients.myKad, COUNT(session), session, name')
                ->join('patients', 'patients.myKad = image_repo.myKad')
                ->groupBy('session')
                ->orderBy('session', 'ASC')
                ->where(['patients.myKad' => $mykad])
                ->find();

            return view('image_repo/memo_session', $data);
        } else {
            $data['title'] = "Image Repository";
            // Get all image & user detail
            $data['images'] = $imgModel
                ->select('*')
                ->join('patients', 'patients.myKad = image_repo.myKad')
                ->where(['patients.myKad' => $mykad, 'session' => $memo_session])
                ->find();

            return view('image_repo/detail', $data);
        }
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

    public function downloadImages()
    {
        $files = [ // Array of image files
            new File('/path/to/file/image1.png'),
            new File('/path/to/file/image2.png')
        ];
        $zipFile = new File('/root/myarchive.zip'); // Zip file path
        $zipFile->compress($files); // Create the zip file with the image files

    }
}
