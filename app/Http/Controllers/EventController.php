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

    public function detail(Event $event){
        return view('Event.event-detail', ['path'=>$event]);
    }

    public function delete(Event $event){
        $event->delete();
        return redirect(route('event'));
    }

    public function edit(Event $event){
        return view('Event.event-edit', ['path' => $event]);
    }

    public function update(Event $event, Request $req){
        $validatedData = validator($req->all(), [
            'txtTitle' => 'required',
            'txtNews' => 'required',
            'txtDate' => 'required',
            'txtPicture' => 'required',
            'txtLink' => 'required',
        ])->validate();
        
        $event->title = $validatedData['txtTitle'];
        $event->news = $validatedData['txtNews'];
        $event->date = $validatedData['txtDate'];
        $event->picture = $validatedData['txtPicture'];
        $event->link = $validatedData['txtLink'];
        
        if ($req->isFeatured != NULL){
            $event->featured = "true";
        } else {
            $event->featured = "";
        }

        $event->save();
        return redirect(route('event'));
    }

    public function add(Request $req){
        $event = new Event();
        $validatedData = validator($req->all(), [
            'txtTitle' => 'required',
            'txtNews' => 'required',
            'txtDate' => 'required',
            'txtPicture' => 'required',
            'txtLink' => 'required',
        ])->validate();
        
        $event->title = $validatedData['txtTitle'];
        $event->news = $validatedData['txtNews'];
        $event->date = $validatedData['txtDate'];
        $event->picture = $validatedData['txtPicture'];
        $event->link = $validatedData['txtLink'];
        
        if ($req->isFeatured != NULL){
            $event->featured = "true";
        }

        $event->save();
        return redirect(route('event'));
    }
}
