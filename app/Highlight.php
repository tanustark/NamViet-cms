<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    protected $fillable = [
        'title',
        'body',
        'author',
        'updatedAt'
    ];
}
