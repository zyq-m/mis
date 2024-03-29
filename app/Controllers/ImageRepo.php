<?php

namespace App\Controllers;

use App\Models\ImageRepoModel;
use App\Models\PatientModel;

use App\Controllers\BaseController;
use ZipArchive;
use CodeIgniter\Files\File;

class ImageRepo extends BaseController
{
    protected $helpers = ['form', 'filesystem'];

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
        $memo_img = [
            'myKad' => $this->request->getPost('myKad'),
            'session' => $this->request->getPost('session'),
            'hospital' => $this->request->getPost('hospital'),
            'screening_date' => $this->request->getPost('screening_date'),
            'screening_time' => $this->request->getPost('screening_time'),
            'description' => $this->request->getPost('description'),
        ];

        // Handle upload multiple files
        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile['memo_img'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $fileName = $img->getName();
                    $img->store('memo-img/' . $memo_img['myKad'] . '/session-' . $memo_img['session'], $fileName);

                    // Store path in database
                    $imageRepo = model(ImageRepoModel::class);
                    $memo_img['file_name'] = $fileName;

                    $imageRepo->save($memo_img);
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

    public function downloadImages($param = null)
    {
        $myKad = $this->request->getPost('myKad');
        $images = $this->request->getPost('selectedImg');
        $zip = new ZipArchive;
        $zip_name = WRITEPATH . 'uploads/memo-img/' . $myKad . '/' . $myKad . '.zip';

        // If file exist, delete
        if (is_file($zip_name)) {
            unlink($zip_name);
        }

        $res = $zip->open($zip_name, ZipArchive::CREATE);

        if ($param === 'file' && $res === TRUE) {
            $session = $this->request->getPost('session');

            if ($res === TRUE) {
                $file_dir = WRITEPATH . 'uploads/memo-img/' . $myKad . '/session-' . $session;
                $sub_dir = 'session-' . $session;

                // Add file
                foreach ($images as $image) {
                    $zip->addFile($file_dir . '/' . $image, $sub_dir . '/' . $image);
                }

                // Close zip
                $zip->close();

                return $this->response->download($zip_name, null);
            }
        }

        if ($param === 'folder' && $res === TRUE) {
            foreach ($images as $session) {
                $dir_path = WRITEPATH . 'uploads/memo-img/' . $myKad . '/session-' . $session;
                $sub_dir = 'session-' . $session;
                $zip->addEmptyDir($sub_dir);

                $files = glob($dir_path . '/*.*');

                foreach ($files as $file) {
                    $zip->addFile($file, $sub_dir . '/' . basename($file));
                }
            }

            $zip->close();

            return $this->response->download($zip_name, null);
        }

        return redirect()->back();
    }
}
