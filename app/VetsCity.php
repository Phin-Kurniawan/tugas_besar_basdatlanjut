<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VetsCity extends Model
{
    protected $fillable = [
        'city'
    ];

    public function vets(){
        return $this->hasMany(Vets::class);
    }
}
