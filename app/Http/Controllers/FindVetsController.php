<?php

namespace App\Http\Controllers;

use App\Vets;
use Illuminate\Http\Request;


class FindVetsController extends Controller
{
    public function index(){
        $path = Vets::all();
        return view('layouts.find_vets',['vets'=>$path]);

    }
}
