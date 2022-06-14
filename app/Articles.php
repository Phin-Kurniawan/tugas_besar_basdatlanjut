<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'pic', 'header', 'subtitle', 'content_path', 'featured'
    ];
}
