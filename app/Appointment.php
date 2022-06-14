<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
      'owner_id','pet_id', 'vet_id', 'doctor_id', 'date'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function doctor(){
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function vet(){
        return $this->belongsTo(Vets::class,'vet_id');
    }

    public function pet(){
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}
