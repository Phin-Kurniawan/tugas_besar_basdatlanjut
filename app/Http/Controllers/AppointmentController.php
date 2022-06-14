<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
use App\Vets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController
{
    public function index(){
        $appointment = Appointment::all();
        $vets = Vets::all();
        $doctors = User::all()->where('role', 'doctor');
        return view('Appointment.appointment', ['appointment'=>$appointment, 'vets' => $vets, 'doctors' => $doctors]);
    }

    public function delete(Appointment $appointment){
        $appointment->delete();

        return redirect(route('appointment'));
    }

    public function add(Request $req){
        $appointment = new Appointment();
        $appointment->owner_id = Auth::user()->id;
        $appointment->pet_id = $req->petId;
        $appointment->vet_id = $req->vetId;
        $appointment->doctor_id = $req->doctorId;
        $appointment->date = $req->date;

        $appointment->save();
        return redirect(route('appointment'));
    }

    public function edit(Appointment $appointment){
        return view('Appointment.edit-appointment', ['appointment' => $appointment]);
    }

    public function update(Appointment $appointment, Request $req){
        $validatedData = validator($req->all(), [
            'date' => 'required'
        ])->validate();

        $appointment->date = $validatedData['date'];
        $appointment->save();
        return redirect(route('appointment'));
    }

}