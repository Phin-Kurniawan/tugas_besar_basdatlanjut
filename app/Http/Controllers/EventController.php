<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function index(){
        $path = Event::all();
        return view('Event.event',['path'=>$path]);
    }
}
