<?php

namespace App\Controllers;

use App\Models\PatientModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $patient = model(PatientModel::class);

        $totalPatient = $patient->countAllResults();
        $totalMalePatient = $patient->where('gender', 'Male')->countAllResults();
        $totalFemalePatient = $patient->where('gender', 'Female')->countAllResults();

        $data = [
            "title" => "Dashboard",
            "totalPatient" => $totalPatient,
            "totalMalePatient" => $totalMalePatient,
            "totalFemalePatient" => $totalFemalePatient,
            "totalStaff" => 200
        ];

        return view('dashboard', $data);
    }
}
