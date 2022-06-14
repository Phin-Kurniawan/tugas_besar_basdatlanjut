<?php

namespace App\Http\Controllers;

use App\MedicalHistory;

class MedicalHistoryController
{
    public function index(){
        $medical = MedicalHistory::all();
        return view('medical_history.medical_history', ['medical_history'=>$medical]);
    }


}