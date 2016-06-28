<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'taskName',
        'taskBody',
        'deadline',
        'assignedTo'
    ];

    public function users(){
        $this->belongsTo(User::class, 'assignedTo');
    }
}
