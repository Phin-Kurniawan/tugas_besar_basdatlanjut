<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'user_id', 'name', 'age', 'weight', 'type'
    ];
    public function medicalHistory(){
        return $this->hasMany(MedicalHistory::class);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }
}
