<?php

namespace App\Controllers;

use App\Models\PatientModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $patient = model(PatientModel::class);

        $totalPatient = $patient->countAllResults();

        $data = [
            "title" => "Dashboard",
            "totalPatient" => $totalPatient,
            "totalMalePatient" => 2,
            "totalFemalePatient" => 2,
            "totalStaff" => 200
        ];

        return view('dashboard', $data);
    }
}
