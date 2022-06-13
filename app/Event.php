<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    'news', 'picture', 'link', 'title', 'date'
    ];
    protected $table = 'events';
}
