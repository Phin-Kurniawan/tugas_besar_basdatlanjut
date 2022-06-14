<?php

namespace App\Http\Controllers;

use App\MedicalHistory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalHistoryController
{
    public function index(){
        $pets = Auth::user()->pet;
        $users = User::all()->where('role', 'owner');
        return view('medical_history.medical_history', ['pets'=>$pets, 'users' => $users]);
    }

    public function filter(Request $req){
        $pets = User::find($req->txtFilter)->pet;
        $users = User::all()->where('role', 'owner');
        return view('medical_history.medical_history', ['pets'=>$pets, 'users' => $users]);
    }


}