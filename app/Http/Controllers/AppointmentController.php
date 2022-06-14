<?php

namespace App\Http\Controllers;

use App\Appointment;

class AppointmentController
{
    public function index(){
        $appointment = Appointment::all();
        return view('Appointment.appointment', ['appointment'=>$appointment]);
    }

    public function delete(Appointment $appointment){
        $appointment->delete();

        return redirect(route('appointment'));
    }

}