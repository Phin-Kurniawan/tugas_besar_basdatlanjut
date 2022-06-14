<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    'news', 'picture', 'link', 'title', 'date', 'featured'
    ];
    protected $table = 'events';
}
