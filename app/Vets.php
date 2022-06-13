<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vets extends Model
{
    protected $fillable = [
        'name', 'address', 'city_id', 'phone'
    ];

    public function city(){
        return $this->belongsTo(VetsCity::class);
    }
}
